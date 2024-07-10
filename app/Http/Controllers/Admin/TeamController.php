<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeamRequest;
use App\Models\Team;
use App\Models\TeamDescription;
use App\Services\Upload\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    private $view = 'admin.teams.';
    private $redirect = '/admin/teams/';
    private $routes = 'teams';

    public function index(Request $request): View
    {
        $title = __('teams.index');
        $query = Team::latest()
            ->join('team_descriptions AS td', 'teams.id', 'td.team_id')
            ->join('languages', 'languages.id', 'td.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->select(['td.name', 'td.job', 'teams.*']);

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $teams = $filter['teams'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $team_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->name) {
            $query->where('td.name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->start_date) {
            $query->whereDate('teams.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('teams.created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $teams = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $teams = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'teams' => $teams,
            'count'  =>$count,
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
        $title = __('teams.create');
        $action = route('teams.store');

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeamRequest $request
     * @return RedirectResponse
     */
    public function store(TeamRequest $request): RedirectResponse
    {
        $data = $request->all();
        $imagePath = ImageService::uploadImage($request->image);

        $data ['image'] = $imagePath;

        $data = Team::create($data);
        $this->saveData($request, $data->id);
        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Team $team
     * @return View
     */
    public function edit(Team $team): View
    {
        $title = __('teams.edit');
        $action = route('teams.update', $team->id);

        $query = TeamDescription::where('team_id', $team->id)
            ->join('languages', 'languages.id', 'team_descriptions.language_id')
            ->select(['team_descriptions.*', 'languages.local']);
            

        $teamDescription = $query->get();

        foreach ($teamDescription as $row) {
            $team[$row->local] = $row;
        }

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeamRequest $request
     * @param Team $team
     * @return RedirectResponse
     */
    public function update(TeamRequest $request, Team $team): RedirectResponse
    {
        $content = $request->all();
        if($request->hasFile('image')) {
            $content['image'] = ImageService::uploadImage($request->image);
        } else {
            unset($content['image']);
        }
        $team->update($content);

        TeamDescription::where('team_id', $team->id)->delete();

        $this->saveData($request, $team->id);
        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Handle Save form data
     *
     * @param TeamRequest $request
     * @param int $team_id
     * @return void
     */
    private function saveData(TeamRequest $request, int $team_id): void
    {
        $requestData = $request->all();
        foreach (languages() as $lang) {
            $data = [
                'team_id' => $team_id,
                'language_id' => $lang->id,
                'job' => $requestData['job_' . $lang->local],
                'name' => $requestData['name_' . $lang->local],
            ];
            TeamDescription::create($data);
        }
    }

    /**
     * Remove Or Return the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $team = Team::where('id', $id)->withTrashed()->first();

        if (is_null($team->deleted_at)) {
            $team->delete();
        } else {
            $team->restore();
        }
        return redirect(getCurrentLocale().$this->redirect);
    }
}
