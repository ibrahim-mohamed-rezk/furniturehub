<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MemberRequest;
use App\Models\User;
use App\Services\Upload\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    private $view = 'admin.members.';
    private $redirect = '/admin/members/';
    private $routes = 'members';

    public function index(Request $request): View
    {
        $title = __('members.index');
        $query = User::latest()->where('role','user');

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $members = $filter['members'];
        $count = $filter['count'];
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
            $query->whereDate('users.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('users.created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $members = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $members = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'members' => $members,
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
        $title = __('members.create');
        $action = route('members.store');
        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MemberRequest $request
     * @return RedirectResponse
     */
    public function store(MemberRequest $request): RedirectResponse
    {
        $data= $request->all();
        $data['password']= bcrypt( $data['password'] );
        $data['photo'] = ImageService::uploadImage($request->photo);
        $data['role'] = 'user';

        $member = User::create($data);

        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $member
     * @return View
     */
    public function edit(User $member): View
    {
        $title = __('members.edit');
        $action = route('members.update', $member->id);
        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MemberRequest $request
     * @param User $member
     * @return RedirectResponse
     */
    public function update(MemberRequest $request, User $member): RedirectResponse
    {
        $data= $request->all();
        if($data['password']) {
            $data['password']= bcrypt( $data['password'] );
        } else {
            unset($data['password']);
        }
        if($request->hasFile('photo')) {
            $data['photo'] = ImageService::uploadImage($request->photo);
        } else {
            unset($data['photo']);
        }
        $data['role'] = 'user';
        $member->update($data);

        return redirect(getCurrentLocale().$this->redirect);
    }


    /**
     * Remove Or Return the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $member = User::where('id', $id)->withTrashed()->first();

        if (is_null($member->deleted_at)) {
            $member->delete();
        } else {
            $member->restore();
        }

        return redirect(getCurrentLocale().$this->redirect);
    }
}
