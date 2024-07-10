<?php

namespace App\Http\Controllers\API\V1;

use App\Models\User;
use App\Models\Address;
use App\Models\PhoneCode;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Web\LoginRequest;
use App\Http\Requests\Web\RegisterRequest;
use App\Services\Response\ApiResponseService;
use App\Services\OTP\OTPService;
use App\Http\Requests\Web\ForgetRequest;
use App\Http\Requests\API\Verfiy_Code;
use App\Http\Requests\API\ResetRequest;

class AuthController extends Controller
{
    /**
     * Function for Web login to the cms.
     *
     * @param RegisterRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $content = $request->all();
        $content['role'] = 'user';
        $content['photo'] = 'public/storage/person.jpg';

        $user = User::create($content);
        $message = __('web.failed');

        $response =
            [
                'status' => 400,
                'msg' => $message,
                'data' => [],
            ];
        if ($user) {
            $address = Address::create([
                'first_name' => $request->name,
                'address_1' => $request->address_1,
                'post_code' => $request->post_code,
                'user_id' => $user->id,
                'default_address' => 1,
                'governorate_id' => $request->gevernorate_id,
                'phone' => $request->phone,
            ]);
            $token = $user->createToken('token')->plainTextToken;
            if ($request->device_token) {
                $user->update([
                    'device_token' => $request->device_token
                ]);
            }
            $message = __('web.success');
            $response =
                [
                    'status' => 200,
                    'msg' => $message,
                    'data' => [
                        'token' => $token,
                        'data' => new UserResource($user)
                    ],
                ];
            return ApiResponseService::response($response);
        }
        return $this->respondFailedValidation($message);
    }
    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {

            $password_Correct = Hash::check($request->password, $user->password);
            if ($password_Correct) {
                $token = $user->createToken('token')->plainTextToken;
                if ($request->device_token) {
                    $user->update([
                        'device_token' => $request->device_token
                    ]);
                }
                $message = __('web.success');
                $status = 200;
                $msg = $message;
                $data = [
                    'token' => $token,
                    'data' => new UserResource($user)
                ];
            } else {
                $message = __('web.this_password_not_correct');
                $status = 400;
                $msg = $message;
                $data = [];
            }
        } else {
            $message = __('web.this_email_not_found');
            $status = 400;
            $msg = $message;
            $data = [];
        }
        $response =
            [
                'status' => $status,
                'msg' => $msg,
                'data' => $data,
            ];

        return ApiResponseService::response($response);
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        $message = __('web.success');
        $status = 200;
        $msg = $message;
        $data = [];
        $response =
            [
                'status' => $status,
                'msg' => $msg,
                'data' => $data,
            ];
        return ApiResponseService::response($response);
    }
    public function Send_code(ForgetRequest $request)
    {
        $code = rand(1000, 9999);
        $type = 'email';
        $target = $request->{$type};
        $user = User::where($type, $target)->first();
        if (!$user) {
            $message = __('web.the_provided_credentials_are_incorrect');
            $response =
                [
                    'status' => 400,
                    'msg' => $message,
                ];
            return ApiResponseService::response($response);
        }
        $content =
        [
            'target'=>$target,
            'type'=>$type
        ];
        $send_code = OTPService::SendOTP($content);
        $status = $send_code['status'];
        if($status != 200)
        {
            $message = __('web.max_count');
            $response =
                [
                    'status' => 400,
                    'msg' => $message,
                ];
            return ApiResponseService::response($response);
        }
        $message = __('web.code_send_successfully');
        $response =
            [
                'status' => 200,
                'msg' => $message,
                'data' => [
                    'data' => []
                ],
            ];
        return ApiResponseService::response($response);
    }
    public function verfiy_code(Verfiy_Code $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $message = __('web.the_provided_credentials_are_incorrect');
            $response =
                [
                    'status' => 400,
                    'msg' => $message,
                ];
            return ApiResponseService::response($response);
        }
        $phoneCode = PhoneCode::where('email',$request->email)->orderBy('id','DESC')->first();
        if ($phoneCode->code == $request->code) {
            $message = 'Correct Code';
            $response =
                [
                    'status' => 200,
                    'msg' => $message,
                    'data' => [
                        'data' => []
                    ],
                ];
            return ApiResponseService::response($response);
        }

        $message = __('web.the_provided_credentials_are_incorrect');
        $response =
            [
                'status' => 400,
                'msg' => $message,
            ];
        return ApiResponseService::response($response);
    }
    public function reset_password(ResetRequest $request)
    {
        $request->validated();
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $message = __('web.the_provided_credentials_are_incorrect');
            $response =
                [
                    'status' => 400,
                    'msg' => $message,
                ];
            return ApiResponseService::response($response);
        } else {
            $user->update([
                'password' => $request->password
            ]);
            $message = __('web.change_password_successfully');
            $response =
                [
                    'status' => 200,
                    'msg' => $message,
                    'data' => [
                        'data' => []
                    ],
                ];
            return ApiResponseService::response($response);
        }
        
    }
    // public function handleGoogleLogin(Request $request, string $uid)
    // {
    //     try {
    //         $firebase = Firebase::auth();
    //         $userData = $firebase->getUser($uid);
    //         $user = User::where('email', $userData->email)->first();
    //         $access_token = Str::random(64);
    //         if ($user != null) {
    //             $user->update(['token' => $access_token]);
    //             Auth::login($user);
    //             return service::responseData(new UserResource($user), 'Login successful');
    //         } else {
    //             $access_token = Str::random(64);
    //             $newuser = new User();
    //             $newuser->name = $userData->displayName;
    //             $newuser->email = $userData->email;
    //             $newuser->google_id = $userData->providerData[0]->uid;
    //             $newuser->email_verified_at = now();
    //             $newuser->password = $userData->uid . now();
    //             $newuser->token = $access_token;
    //             $newuser->role_id = Role::where('name', 'user')->value('id');
    //             $newuser->save();
    //             return service::responseData(new UserResource($user), 'You are successfully registered');
    //         }
    //     } catch (UserNotFound $e) {
    //         return response()->json(['error' => $e->getMessage()], 404);
    //     }
    // }

    // public function handleFacebookLogin(Request $request, string $uid)
    // {
    //     try {
    //         $firebase = Firebase::auth();
    //         $userData = $firebase->getUser($uid);
    //         $user = User::where('email', $userData->email)->first();
    //         $access_token = Str::random(64);

    //         if ($user != null) {
    //             $user->update(['token' => $access_token]);
    //             Auth::login($user);
    //             return service::responseData(new UserResource($user), 'Login successful');
    //         }
    //         $access_token = Str::random(64);
    //         $newuser = new User();
    //         $newuser->name = $userData->displayName;
    //         $newuser->facebook_id = $userData->providerData[0]->uid;
    //         $newuser->email_verified_at = now();
    //         $newuser->password = $userData->uid . now();
    //         $newuser->token = $access_token;
    //         $newuser->role_id = Role::where('name', 'user')->value('id');
    //         $newuser->save();

    //         return service::responseData(new UserResource($newuser), 'You are successfully registered');
    //     } catch (UserNotFound $e) {
    //         return response()->json(['error' => $e->getMessage()], 404);
    //     }
    // }
}
