<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class SettingController extends Controller
{
    /** Redirect to this path after each operation success*/
    private $redirect= '/admin/settings';
    /** View folder */
    private $viewDirectory= 'admin.settings.';

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index() :View
    {
        $title= __('settings.head');
        $action = route('settings.store');
        $query = Setting::cursor();

        $settings = array();
        foreach($query as $row){
            $settings[$row->key] = $row->value;
        }
        return view($this->viewDirectory.'index', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request): RedirectResponse
    {
        $this->saveData($request);

        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Handle Save form data
     *
     * @param SettingRequest $request
     * @return void
     */

    private function saveData(Request $request):void
    {
        $data = $request->all();

        foreach ($data as $key => $value) {

            Setting::where('key', $key)->update([
                'value' => $value
            ]);

        }

    }

}
