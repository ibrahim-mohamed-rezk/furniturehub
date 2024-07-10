<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TypeRequest;
use App\Models\Type;
use App\Models\TypeDescription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    private $view = 'admin.types.';
    private $redirect = '/admin/types/';
    private $routes = 'types';

    public function index(Request $request): View
    {
        $title = __('types.index');
        $query = Type::latest()
            ->join('type_descriptions AS td', 'types.id', 'td.type_id')
            ->join('languages', 'languages.id', 'td.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->select(['td.name', 'types.*']);

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $types = $filter['types'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $type_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->name) {
            $query->where('td.name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->start_date) {
            $query->whereDate('types.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('types.created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $types = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $types = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'types' => $types,
            'count' => $count,
            'trashed_title' => $trashed_title,
            'delete_button' => $delete_button,
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $title = __('types.create');
        $action = route('types.store');

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TypeRequest $request
     * @return RedirectResponse
     */
    public function store(TypeRequest $request): RedirectResponse
    {
        $data = Type::create($request->all());
        $this->saveData($request, $data->id);
        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Type $type
     * @return View
     */
    public function edit(Type $type): View
    {
        $title = __('types.edit');
        $action = route('types.update', $type->id);

        $query = TypeDescription::where('type_id', $type->id)
            ->join('languages', 'languages.id', 'type_descriptions.language_id')
            ->select(['type_descriptions.*', 'languages.local']);

        $typeDescription = $query->get();

        foreach ($typeDescription as $row) {
            $type[$row->local] = $row;
        }

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TypeRequest $request
     * @param Type $type
     * @return RedirectResponse
     */
    public function update(TypeRequest $request, Type $type): RedirectResponse
    {
        $type->update($request->all());

        TypeDescription::where('type_id', $type->id)->delete();

        $this->saveData($request, $type->id);
        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Handle Save form data
     *
     * @param TypeRequest $request
     * @param int $type_id
     * @return void
     */
    private function saveData(TypeRequest $request, int $type_id): void
    {
        $requestData = $request->all();
        foreach (languages() as $lang) {
            $data = [
                'type_id' => $type_id,
                'language_id' => $lang->id,
                'name' => $requestData['name_' . $lang->local],
            ];
            TypeDescription::create($data);
        }
    }

    /**
     * Remove Or Return the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $type = Type::where('id', $id)->withTrashed()->first();

        if (is_null($type->deleted_at)) {
            $type->delete();
        } else {
            $type->restore();
        }
        return redirect(getCurrentLocale().$this->redirect);
    }
}
