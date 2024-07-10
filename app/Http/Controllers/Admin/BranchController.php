<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\BranchDescription;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\BranchRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return view
     */
    private $view = 'admin.branches.';
    private $redirect = '/admin/branches/';
    private $routes = 'branches';
    public function index(Request $request): View
    {
        $title = __('branches.index');
        $query = Branch::latest()
            ->join('branch_descriptions AS bd', 'branches.id', 'bd.branch_id')
            ->join('languages', 'languages.id', 'bd.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->select(['bd.*', 'branches.*']);

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $branches = $filter['branches'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $branch_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->address) {
            $query->where('bd.address', 'LIKE', '%' . $request->address . '%');
        }
        if ($request->start_date) {
            $query->whereDate('branches.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('branches.created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $branches = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $branches = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'branches' => $branches,
            'count'=>$count,
            'trashed_title' => $trashed_title,
            'delete_button' => $delete_button,
        ];
    }

    /**
     * Show the form for creating a new resource.
     * @return view
     */
    public function create(): View
    {
        $title = __('branches.create');
        $action = route('branches.store');

        return view($this->view . 'form', get_defined_vars());

    }

    /**
     * Store a newly created resource in storage.
     * @param BranchRequest $request
     * @return RedirectResponse
     */
    public function store(BranchRequest $request): RedirectResponse
    {
        $requestData = $request->all();

        $data = Branch::create($requestData);
        $this->saveData($request, $data->id);

        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Branch $branch
     * @return View
     */
    public function edit(Branch $branch): View
    {
        $title = __('branches.edit');
        $action = route('branches.update', $branch->id);

        $query = BranchDescription::where('branch_id', $branch->id)
            ->join('languages', 'languages.id', 'branch_descriptions.language_id')
            ->select(['branch_descriptions.*', 'languages.local']);

        $branchDescription = $query->get();

        foreach ($branchDescription as $row) {
            $branch[$row->local] = $row;
        }

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BranchRequest $request
     * @param Branch $branch
     * @return RedirectResponse
     */
    public function update(BranchRequest $request, Branch $branch): RedirectResponse
    {
        $requestData = $request->all();

        $branch->update($requestData);

        BranchDescription::where('branch_id', $branch->id)->delete();

        $this->saveData($request, $branch->id);

        return redirect(getCurrentLocale().$this->redirect);
    }
    /**
     * Handle Save form data
     *
     * @param BranchRequest $request
     * @param int $branch_id
     * @return void
     */
    private function saveData(BranchRequest $request, int $branch_id): void
    {
        $requestData = $request->all();
        foreach (languages() as $lang) {
            $data = [
                'branch_id' => $branch_id,
                'language_id' => $lang->id,
                'address' => $requestData['address_' . $lang->local],
                'work_time' => $requestData['work_time_' . $lang->local],
            ];
            BranchDescription::create($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
     /**
     * Remove Or Return the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $branch = Branch::where('id', $id)->withTrashed()->first();

        if (is_null($branch->deleted_at)) {
            $branch->delete();
        } else {
            $branch->restore();
        }

        return redirect(getCurrentLocale().$this->redirect);
    }
}
