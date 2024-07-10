<?php

namespace App\Http\Controllers\Affiliate;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\AffiliateSystem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AffiliateUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    private $view = 'affiliate.users.';
    private $redirect = '/affiliate/users/';
    private $routes = 'users';

    public function index(Request $request): View
    {
        $title = __('members.index');
        $user_affiliate = User::where('email', Auth::user()->email)->where('role', 'affiliate')->first();
        $affiliate_count = AffiliateSystem::where('user_id', $user_affiliate->id)->first();
        $query = User::latest()->where('role','user')->where('affiliate_id', $user_affiliate->id);

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $members = $filter['members'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $membersid
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->name) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->email) {
            $query->where('email', $request->email );
        }
        if ($request->phone) {
            $query->where('phone', $request->phone );
        }
        if ($request->start_date) {
            $query->whereDate('members.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('members.created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $members = $query->onlyTrashed()->paginate($paginate);
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $members = $query->paginate($paginate);
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'members' => $members,
            'trashed_title' => $trashed_title,
            'delete_button' => $delete_button,
        ];
    }

}
