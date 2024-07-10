<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\FaqRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\FaqDescription;
use Illuminate\Http\RedirectResponse;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    private $view = 'admin.faqs.';
    private $redirect = '/admin/faqs/';
    private $routes = 'faqs';
    public function index(Request $request): View
    {
        $title = __('faqs.index');
        $query = Faq::withDescription();
        // dd($query->get());  

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $faqs = $filter['faqs'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $currency_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->title) {    
            $query->where('fd.request', 'LIKE', '%' . $request->title . '%');
        }
        if ($request->start_date) {
            $query->whereDate('faqs.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('faqs.created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $faqs = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $faqs = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'faqs' => $faqs,
            'count'=>$count,
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
        $title = __('faqs.create');
        $action = route('faqs.store');

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FaqRequest $request
     * @return RedirectResponse
     */
    public function store(FaqRequest $request): RedirectResponse
    {
        $data = Faq::create($request->all());
        $this->saveData($request, $data->id);

        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Faq $faq
     * @return View
     */
    public function edit(Faq $faq): View
    {
        $title = __('faqs.edit');
        $action = route('faqs.update', $faq->id);

        $query = FaqDescription::where('faq_id', $faq->id)
            ->join('languages', 'languages.id', 'faq_descriptions.language_id')
            ->select(['faq_descriptions.*', 'languages.local']);

        $faqDescription = $query->get();

        foreach ($faqDescription as $row) {
            $faq[$row->local] = $row;
        }

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FaqRequest $request
     * @param Faq $faq
     * @return RedirectResponse
     */
    public function update(FaqRequest $request, Faq $faq): RedirectResponse
    {
        $faq->update($request->all());

        FaqDescription::where('faq_id', $faq->id)->delete();

        $this->saveData($request, $faq->id);

        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Handle Save form data
     *
     * @param FaqRequest $request
     * @param int $faq_id
     * @return void
     */
    private function saveData(FaqRequest $request, int $faq_id): void
    {
        $requestData = $request->all();
        foreach (languages() as $lang) {
            $data = [
                'faq_id' => $faq_id,
                'language_id' => $lang->id,
                'request' => $requestData['request_' . $lang->local],
                'response' => $requestData['response_' . $lang->local],
            ];
            FaqDescription::create($data);
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
        $faq = Faq::where('id', $id)->withTrashed()->first();

        if (is_null($faq->deleted_at)) {
            $faq->delete();
        } else {
            $faq->restore();
        }

        return redirect(getCurrentLocale().$this->redirect);
    }
}
