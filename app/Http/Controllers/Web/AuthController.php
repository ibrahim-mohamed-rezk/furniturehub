<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Models\Address;
use Illuminate\View\View;
use App\Mail\registerMail;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Models\AffiliateSystem;
use App\Services\OTP\OTPService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Services\Login\LoginService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Web\LoginRequest;
use App\Http\Requests\Web\ResetRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Web\ForgetRequest;
use App\Http\Requests\Web\VerifyRequest;
use App\Services\Login\LoginAuthService;
use App\Http\Requests\Web\RegisterRequest;
use App\Services\Response\ResponseService;
use Socialite;

class AuthController extends Controller
{

    private $view = 'web.auth.';

    public function login(): View
    {
        $title = __('web.login');
        $previous = URL::previous();
        $action = route('web.login');
        $forget_action = route('web.forget_password');
        $regist_action = route('web.register');
        return view($this->view . 'login', get_defined_vars());
    }

    public function check(LoginRequest $request): JsonResponse
    {
        $login = new LoginService(new LoginAuthService());
        $response = $login->authLogin($request->all());

        return ResponseService::response($response);
    }

    /**
     * view of register
     * @return view
     */
    public function register(): View
    {
        $title = __('web.register');
        $action = route('web.register_check');
        $previous = URL::previous();
        $governorates = Governorate::withDescription()->get();
        return view($this->view . 'register', get_defined_vars());
    }

    /**
     * Function for Web login to the cms.
     *
     * @param RegisterRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function registerCheck(RegisterRequest $request): JsonResponse
    {
        $content = $request->all();
        $content['role'] = 'user';
        if ($content['ref'] != null) {
            $affiliate = AffiliateSystem::where('affiliate_code', $content['ref'])->first();

            $affiliate->update([
                'affiliate_count_user' => ++$affiliate->affiliate_count_user
            ]);
            $content['affiliate_id'] = $affiliate->user_id;
        }

        $user = User::create($content);
        $address = Address::create([
            'first_name' => $request->name,
            'address_1' => $request->address_1,
            'post_code' => $request->post_code,
            'user_id' => $user->id,
            'default_address' => 1,
            'governorate_id' => $request->gevernorate_id,
            'phone' => $request->phone,
        ]);

        $login = new LoginService(new LoginAuthService());
        $response = $login->authLogin($request->all());
        $data['name'] = Auth::user()->name;
        $data['subject'] = "FurnitureHub";
        $sendMail = Mail::to(Auth::user()->email)->send(new registerMail($data));
        return ResponseService::response($response);
    }

    /**
     * Web logout.
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->back()->withHeaders([
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }



    /**
     * forgetpassword
     *
     * @return view
     */
    public function forgetpassword(): View
    {
        $title = __('web.forgetpassword');
        $action = route('web.forgetting_password');
        $login_action = route('web.login');
        return view($this->view . 'forget_password', get_defined_vars());
    }

    /**
     * Verify Email Forget Password
     *
     * @param Request $request
     * @return view
     */
    public function forgettinPpassword(ForgetRequest $request): JsonResponse
    {
        $content =
            [
                'target' => $request->email,
                'type' => 'email'
            ];
        $check_code = OTPService::CheckSendOTP($content);
        return ResponseService::response($check_code);
    }

    public function verify(ForgetRequest $request)
    {
        $url = url()->full();
        $title = __('web.verify');
        $type = 'email';
        $target = $request->{$type};

        $user = User::where($type, $target)->first();
        if (!$user) {
            return redirect(route('web.forget_password'))->with('error', __('web.checkinput'));
        }
        $content =
            [
                'target' => $target,
                'type' => $type
            ];
        $send_code = OTPService::SendOTP($content);
        $status = $send_code['status'];
        if ($status != 200) {
            return redirect(route('web.forget_password'))->with('error', __('web.checkinput'));
        }

        $action = route('web.verifying_forget_password');

        return view($this->view . 'verify', get_defined_vars());
    }

    public function verifying(VerifyRequest $request): JsonResponse
    {
        $link = url()->previous();
        $url_components = parse_url($link);
        parse_str($url_components['query'], $params);

        if (!isset($params['email'])) {
            $error = __('web.error_refresh_req');
            return ResponseService::response([$error]);
        }
        $email = $params['email'];
        $content =
            [
                'target' => $email,
                'type' => 'email',
                'code' => $request->code
            ];
        $send_code = OTPService::CheckOTP($content);

        return ResponseService::response($send_code);
    }

    /**
     * reset password
     *
     * @param Request $request
     * @return view
     */
    public function resetPassword(Request $request)
    {
        $target = Session::get('target');
        if (!$target) {
            return redirect(route('web.forget_password'))->with('error', __('web.email_req'));
        }

        $title = __('web.resetpassword');
        $action = route('web.resetting_password');
        return view($this->view . 'reset_password', get_defined_vars());
    }

    /**
     * reseting password
     *
     * @param Request $request
     * @return view
     */
    public function resettingPassword(ResetRequest $request): JsonResponse
    {
        $target = Session::get('target');
        $type = Session::get('type');

        $user = User::where($type, $target)->first();

        Session::forget('target');
        Session::forget('type');

        $user->update(['password' => bcrypt($request->password)]);

        $request->merge(['email' => $target]);
        $login = new LoginService(new LoginAuthService());
        $response = $login->authLogin($request->all());
        return ResponseService::response($response);
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request, $provider)
    {

        // try {
        //     if ($provider == 'twitter') {
        //         $user = Socialite::driver('twitter')->user();
        //     } else {
        //         $user = Socialite::driver($provider)->stateless()->user();
        //     }
        // } catch (\Exception $e) {
        //     flash("Something Went wrong. Please try again.")->error();
        //     return redirect()->route('user.login');
        // }
        $user = Socialite::driver($provider)->stateless()->user();
        $existingUserByProviderId = User::where('provider_id', $user->id)->first();
        if ($existingUserByProviderId) {
            auth()->login($existingUserByProviderId, true);
        } else {
            $existingUser = User::where('email', $user->email)->first();

            if ($existingUser) {
                $existing_User = $existingUser;
                $existing_User->provider_id = $user->id;
                $existing_User->save();

                auth()->login($existing_User, true);
            } else {
                if ($request->ref != null) {
                    $affiliate = AffiliateSystem::where('affiliate_code', $request->ref)->first();

                    $affiliate->update([
                        'affiliate_count_user' => ++$affiliate->affiliate_count_user
                    ]);
                    $affiliate_id = $affiliate->user_id;
                }
                $newUser = new User;
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->photo = $user->user['picture'];
                $newUser->email_verified_at = date('Y-m-d Hms');
                $newUser->provider_id = $user->id;
                $newUser->affiliate_id = $affiliate_id ?? null;
                $newUser->save();

                auth()->login($newUser, true);
            }
        }
        $status = 200;
        $msg = __('web.success');
        $target = $requestContent['previous'] ?? route('web.index');
        $response =
            [
                'status' => $status,
                'msg' => $msg,
                'data' => $target,
            ];
        return redirect($target)->with('success', $msg);
    }
}
