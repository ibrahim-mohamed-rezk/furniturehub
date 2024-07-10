<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return view
     */
    private $view = 'admin.contacts.';
    private $redirect = '/admin/contacts/';
    private $routes = 'contacts';

    public function index(Request $request): View
    {
        $title = __('contacts.index');
        $query = Contact::latest();

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $contacts = $filter['contacts'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $query
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->email) {
            $query->where('email', 'LIKE', '%' . $request->email . '%');
        }
        if ($request->name) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->phone) {
            $query->where('phone', 'LIKE', '%' . $request->phone . '%');
        }
        if ($request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $contacts = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $contacts = $query->paginate($paginate);
            $count = $query->count();

            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'contacts' => $contacts,
            'count'=>$count,
            'trashed_title' => $trashed_title,
            'delete_button' => $delete_button,
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contact $contact
     * @return View
     */
    public function edit(Contact $contact): View
    {
        $title = __('contacts.edit');

        return view($this->view . 'form', get_defined_vars());
    }


    /**
     * Remove Or Return the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $contact = Contact::where('id', $id)->withTrashed()->first();

        if (is_null($contact->deleted_at)) {
            $contact->delete();
        } else {
            $contact->restore();
        }

        return redirect(getCurrentLocale().$this->redirect);
    }
}