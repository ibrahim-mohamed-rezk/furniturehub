<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Module;
use App\Models\Product;
use App\Models\Track;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Services\Upload\ImageService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\TaskRequest;
use App\Models\Article;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    private $view = 'admin.users.';
    private $redirect = '/admin/users/';
    private $routes = 'users';

    public function index(Request $request): View
    {
        $title = __('users.index');
        $query = User::latest()->where('role', 'admin');

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $users = $filter['users'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $usersid
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
            $query->where('email', $request->email);
        }
        if ($request->phone) {
            $query->where('phone', $request->phone);
        }
        if ($request->start_date) {
            $query->whereDate('users.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('users.created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $users = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $users = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'users' => $users,
            'count' => $count,
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
        $title = __('users.create');
        $action = route('users.store');
        $modules = Module::get();
        $user_modules = [];
        $edit = 0;

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $data['photo'] = ImageService::uploadImage($request->photo);
        $data['role'] = 'admin';

        $user = User::create($data);
        $user->modules()->attach($request->modules);
        return redirect(getCurrentLocale() . $this->redirect);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        $title = __('users.edit');
        $action = route('users.update', $user->id);
        $tracks = Track::where('user_id', $user->id)->get();

        $actionCreateTask = route('users.create_task', $user->id);
        $edit = 1;
        $modules = Module::get();
        $products_created = Product::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))->where('admin_id', $user->id)
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $products_updated = Product::selectRaw('MONTH(updated_at) as month, COUNT(*) as count')
            ->whereYear('updated_at', date('Y'))->where('admin_update_id', $user->id)
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $articles_created = Article::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))->where('user_id', $user->id)
            ->groupBy('month')
            ->orderBy('month')
            ->get();


        $data_products_created = [];
        $data_products_updated = [];
        $data_articles_created = [];

        for ($i = 1; $i < 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $count = 0;
            foreach ($products_created as $product) {
                if ($product->month == $i) {
                    $count = $product->count;
                    break;
                }
            }
            array_push($data_products_created, $count);
        }

        for ($i = 1; $i < 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $count = 0;
            foreach ($products_updated as $product) {

                if ($product->month == $i) {
                    $count = $product->count;
                    break;
                }
            }
            array_push($data_products_updated, $count);
        }

        for ($i = 1; $i < 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $count = 0;
            foreach ($articles_created as $articel) {
                if ($articel->month == $i) {
                    $count = $articel->count;
                    break;
                }
            }
            array_push($data_articles_created, $count);
        }

        $labels = [__('web.Jan'), __('web.Feb'), __('web.Mar'), __('web.Apr'), __('web.May'), __('web.Jun'), __('web.Jul'), __('web.Aug'), __('web.Sep'), __('web.Oct'), __('web.Nov'), __('web.Dec')];


        $products_created_daily = Product::selectRaw('DATE(created_at) as day, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))->where('admin_id', $user->id)
            ->where('admin_id', $user->id)
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        $data_products_created_daily = [];
        $labels_daily = [];
        $startDate = \Carbon\Carbon::now()->startOfMonth();
        $endDate = \Carbon\Carbon::now()->endOfMonth();
        while ($startDate->lte($endDate)) {
            $day = $startDate->toDateString();
            $count = 0;
            $product = $products_created_daily->firstWhere('day', $day);
            if ($product) {
                $count = $product->count;
            }

            array_push($data_products_created_daily, $count);
            array_push($labels_daily, $startDate->format('m-d'));
            $startDate->addDay();
        }
        $articles_created_daily = Article::selectRaw('DATE(created_at) as day, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))->where('user_id', $user->id)
            ->where('user_id', $user->id)
            ->groupBy('day')
            ->orderBy('day')
            ->get();
        $startDate = \Carbon\Carbon::now()->startOfMonth();
        $endDate = \Carbon\Carbon::now()->endOfMonth();
        $data_articles_created_daily = [];

        while ($startDate->lte($endDate)) {
            $day = $startDate->toDateString();
            $count = 0;
            $article = $articles_created_daily->firstWhere('day', $day);
            if ($article) {
                $count = $article->count;
            }
            array_push($data_articles_created_daily, $count);
            $startDate->addDay();
        }

        $products_updated_daily = Product::selectRaw('DATE(updated_at) as day, COUNT(*) as count')
            ->whereYear('updated_at', date('Y'))->where('admin_update_id', $user->id)
            ->groupBy('day')
            ->orderBy('day')
            ->get();
        $startDate = \Carbon\Carbon::now()->startOfMonth();
        $endDate = \Carbon\Carbon::now()->endOfMonth();
        $data_products_updated_daily = [];
        while ($startDate->lte($endDate)) {
            $day = $startDate->toDateString();
            $count = 0;
            $product = $products_updated_daily->firstWhere('day', $day);
            if ($product) {
                $count = $product->count;
            }
            array_push($data_products_updated_daily, $count);
            $startDate->addDay();
        }
        $user_modules = old('modules',  $user->modules()->pluck('modules.id')->toArray() ?? []);

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $data = $request->all();

        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        if ($request->hasFile('photo')) {
            $data['photo'] = ImageService::uploadImage($request->photo);
        } else {
            unset($data['photo']);
        }
        $data['role'] = 'admin';
        $user->update($data);
        $user->modules()->sync($request->modules);
        return redirect(getCurrentLocale() . $this->redirect);
    }


    /**
     * Remove Or Return the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $user = User::where('id', $id)->withTrashed()->first();

        if (is_null($user->deleted_at)) {
            $user->delete();
        } else {
            $user->restore();
        }
        return redirect(getCurrentLocale() . $this->redirect);
    }
    public function track($id)
    {
        $track = Track::where('user_id', $id)->first();
        if ($track) {
            $track->update([
                'admin_id' => auth()->user()->id,
                'user_id' => $id
            ]);
        } else {

            Track::create([
                'admin_id' => auth()->user()->id,
                'user_id' => $id
            ]);
        }
        return back();
    }
    public function make_task(TaskRequest $request, User $user)
    {
        $track = Track::where('user_id', $user->id)->first();
        if ($track) {
            Track::create([
                'task' => $request->task,
                'type' => $request->type,
                'end' => $request->end_date,
                'admin_id' => $track->admin_id,
                'user_id' => $user->id
            ]);
        } else {
            Track::create([
                'task' => $request->task,
                'type' => $request->type,
                'end' => $request->end_date,
                'admin_id' => auth()->user()->id,
                'user_id' => $user->id
            ]);
        }
        return back();
    }
}
