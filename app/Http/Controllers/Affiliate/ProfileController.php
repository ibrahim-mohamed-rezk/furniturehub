<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use App\Services\Upload\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    private $view = 'affiliate.profile_affiliate.';
    private $redirect = '/affiliate/profile_affiliate/';

    public function index(Request $request): View
    {
        $title = __('profile.index');
        $action = route('profile_affiliate.store');
        $member = \Auth::user();
        return view($this->view . 'index', get_defined_vars());

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param ProfileRequest $request
     * @return RedirectResponse
     */
    public function store(ProfileRequest $request): RedirectResponse
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
        $data['role'] = 'affiliate';
        $user = \Auth::user();
        $user->update($data);

        return redirect(getCurrentLocale().$this->redirect);
    }
}
