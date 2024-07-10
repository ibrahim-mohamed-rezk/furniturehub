<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offer;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\OfferRequest;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    private $view = 'admin.offers.';
    private $redirect = '/admin/offers/';
    private $routes = 'offers';

    public function index(Request $request): View
    {
        $title = __('offers.index');
        $query = Offer::latest();

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $offers = $filter['offers'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }
    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $offer_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->status) {
            $query->where('status', 'LIKE', '%' . $request->status . '%');
        }
        if ($request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $offers = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $offers = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'offers' => $offers,
            'count' =>$count,
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
        $title = __('offers.create');
        $action = route('offers.store');


        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OfferRequest $request
     * @return RedirectResponse
     */
    public function store(OfferRequest $request): RedirectResponse
    {
        Offer::create($request->all());

        return redirect(getCurrentLocale().$this->redirect);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Offer $offer
     * @return View
     */
    public function edit(Offer $offer): View
    {
        $title = __('offers.edit');
        $action = route('offers.update', $offer->id);

            

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OfferRequest $request
     * @param Offer $offer
     * @return RedirectResponse
     */
    public function update(OfferRequest $request, Offer $offer): RedirectResponse
    {
        $offer->update($request->all());

        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * 
     */
    public function destroy($id): RedirectResponse
    {
        $offer = Offer::where('id', $id)->withTrashed()->first();

        if (is_null($offer->deleted_at)) {
            $offer->delete();
        } else {
            $offer->restore();
        }

        return redirect(getCurrentLocale().$this->redirect);
    }
}
