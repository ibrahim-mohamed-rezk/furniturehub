<?php

namespace App\Http\Controllers\Web;

use App\Models\Address;
use App\Models\Governorate;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Web\AddressRequest;
use App\Services\Response\ResponseService;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = __('web.add_address');
        $governorates = Governorate::latest()
            ->join('governorate_descriptions AS gd', 'governorates.id', 'gd.governorate_id')
            ->join('languages', 'languages.id', 'gd.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->where('governorates.deleted_at', null)
            ->select('gd.*', 'governorates.*')->get();

        $action = route('address.store');
        $prev = URL::previous();
        return view('web.pages.address', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request)
    {
        $content = $request->all();
        $content['user_id'] = Auth::user()->id;
        $create = Address::create($content);

        $count = Address::where('user_id',Auth::user()->id)->count();
        if($count == 1){
            $create->update([
                'default_address' => 1,
            ]);
        }

        if ($create) {
            $status = 200;
            $msg = [__('web.success')];
            $target = $content['prev'];

        } else {
            $status = 400;
            $msg = [__('web.failed')];
            $target = route('address.index');

        }

        $response =
            [
            'status' => $status,
            'msg' => $msg,
            'data' => $target,
        ];
        return ResponseService::response($response);

    }

    public function default_address($id)
    {
        $address = Address::findOrFail($id);

        $address->update([
            'default_address' => 1,
        ]);

        Address::where('id', '<>', $id)
            ->where('user_id', Auth::user()->id)
            ->update([
                'default_address' => 0,
            ]);

        return redirect(getCurrentLocale() . '/account');

    }
    public function edit(string $id)
    {
        $title = __('web.edit_address');
        $address = Address::findOrFail($id);
        $prev = URL::previous();

        $action = route('address.update', $id);
        $governorates = Governorate::latest()
            ->join('governorate_descriptions AS gd', 'governorates.id', 'gd.governorate_id')
            ->join('languages', 'languages.id', 'gd.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->where('governorates.deleted_at', null)
            ->select('gd.*', 'governorates.*')->get();

        return view('web.pages.address', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request, $id)
    {
        $address = Address::findOrFail($id);

        $update = $address->update($request->all());
        if ($update) {
            $status = 200;
            $msg = [__('web.success')];
            $target = route('account.index');

        } else {
            $status = 400;
            $msg = [__('web.failed')];
            $target = route('account.index');

        }

        $response =
            [
            'status' => $status,
            'msg' => $msg,
            'data' => $target,
        ];
        return ResponseService::response($response);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $delete = $address->delete();
        if ($delete) {
            $response = [
                'status' => 200,
                'msg' => __('web.success'),
                'data'=>route('account.index')
            ];
        } else {
            $response = [
                'status' => 400,
                'msg' => __('web.failed'),
                'data'=>route('account.index')
            ];
        }
        
        return ResponseService::response($response);
    }

}
