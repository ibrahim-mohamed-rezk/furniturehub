<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SellerRequest;
use App\Models\Seller;
use App\Services\Upload\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    private $view = 'admin.sellers.';
    private $redirect = '/admin/sellers/';
    private $routes = 'sellers';

    public function index(Request $request): View
    {
        $title = __('sellers.index');
        $query = Seller::where('active','active')->latest()
            ->select('sellers.*');

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $sellers = $filter['sellers'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $seller_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->name) {
            $query->where('sellers.name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->start_date) {
            $query->whereDate('sellers.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('sellers.created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $sellers = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $sellers = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'sellers' => $sellers,
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
        $title = __('sellers.create');
        $action = route('sellers.store');

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SellerRequest $request
     * @return RedirectResponse
     */
    public function store(SellerRequest $request): RedirectResponse
    {
        $request->merge(['active'=>'active']);
        $data = $request->all();
        $token = str_replace(str_split('\\/:*?"<>|.'), '', bcrypt(rand(11111,99999).time()));
        $request->merge(['token'=>$token]);
        if ($request->file('photo')) {
            $imagePath = ImageService::uploadImage($request->photo);
            $data['photo'] = $imagePath;
        }

        Seller::create($data);
        return redirect(getCurrentLocale().$this->redirect);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Seller $seller
     * @return View
     */
    public function edit(Seller $seller): View
    {
        $title = __('sellers.edit');
        $action = route('sellers.update', $seller->id);

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SellerRequest $request
     * @param Seller $seller
     * @return RedirectResponse
     */
    public function update(SellerRequest $request, Seller $seller): RedirectResponse
    {
        $data = $request->all();

        if ($request->file('photo')) {
            $imagePath = ImageService::uploadImage($request->photo);
            $data['photo'] = $imagePath;
        }
        $seller->update($data);

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
        $seller = Seller::where('id', $id)->withTrashed()->first();

        if (is_null($seller->deleted_at)) {
            $seller->delete();
        } else {
            $seller->restore();
        }

        return redirect(getCurrentLocale().$this->redirect);
    }
}
