<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Models\Affiliate;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Services\Response\ResponseService;
use App\Http\Requests\Web\AffiliateRequest;

class AffiliateController extends Controller
{
    private $view = 'web.auth.';

    /**
     * view of seller_register
     * @return view
     */
    public function affiliate_register()
    {
        $count_photos = 0;
        $action = route('web.affiliate_request');
        $cities = Governorate::withDescription()->get();
        $title = __('web.affiliate_system');

        return view($this->view . 'affiliate_register', get_defined_vars());
    }
    public function check(AffiliateRequest $request): JsonResponse
    {
        $content = [
            'name' => $request->name,
            'phone' => $request->phone,
            'governorate_id' => $request->city,
            'email' => $request->email,

        ];
        $seller_request = Affiliate::create($content);

        if ($seller_request) {
            $email = User::where('email', $seller_request->email)->first();
            if ($email) {
                $status = 200;
                $msg = __('web.we_send_you_email_in_one_business_day');
                $target = route('web.index');
            } else {
                $seller_request->delete();
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:255',
                    'phone' => ['required', 'numeric', Rule::unique('users')],
                    'email' => 'required|email|unique:users|max:255',
                    'city' => 'required|exists:governorates,id',
                ], [], [
                    'phone' => __('web.phone_val')
                ]);

                if ($validator->fails()) {
                    return ResponseService::response([
                        'status' => 400,
                        'msg' => [$validator->errors()->first()],
                        'data' => route('web.index'),
                    ]);
                }
                User::create([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'governorate_id' => $request->city,
                    'password' => 'affiliate',
                    'role' => 'affiliate'
                ]);
                $seller_request->restore();
                $status = 200;
                $msg = __('web.we_send_you_email_in_one_business_day');
                $target = route('web.index');
            }
        } else {
            $status = 400;
            $msg = ["failed"];
            $target = route('web.index');
        }


        $response =
            [
                'status' => $status,
                'msg' => $msg,
                'data' => $target,
            ];
        return ResponseService::response($response);
    }
}
