<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return view
     */
    private $view = 'admin.mails.';
    private $redirect = '/admin/mails/';
    private $routes = 'mails';

    public function index(Request $request): View
    {
        $title = __('mails.index');
        $query = Mail::latest();

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $mails = $filter['mails'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $mail_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->email) {
            $query->where('email', 'LIKE', '%' . $request->email . '%');
        }
        if ($request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $mails = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $mails = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'mails' => $mails,
            'count' =>$count,
            'trashed_title' => $trashed_title,
            'delete_button' => $delete_button,
        ];
    }



    /**
     * Remove Or Return the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $mail = Mail::where('id', $id)->withTrashed()->first();

        if (is_null($mail->deleted_at)) {
            $mail->delete();
        } else {
            $mail->restore();
        }

        return redirect(getCurrentLocale().$this->redirect);
    }
}