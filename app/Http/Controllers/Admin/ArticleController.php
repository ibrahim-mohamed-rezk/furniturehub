<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\User;
use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ArticleDescription;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Upload\ImageService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ArticleRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use DOMDocument;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return view
     */
    private $view = 'admin.articles.';
    private $redirect = '/admin/articles/';
    private $routes = 'articles';
    public function index(Request $request): View
    {
        $title = __('articles.index');
        $query = Article::latest()
            ->join('article_descriptions AS ad', 'articles.id', 'ad.article_id')
            ->join('languages', 'languages.id', 'ad.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->select(['ad.*', 'articles.*']);

        $routes = $this->routes;
        $redirect = $this->redirect;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $articles = $filter['articles'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];
        $users = User::where('role','admin')->cursor();
        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $article_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->title) {
            $query->where('ad.title', 'LIKE', '%' . $request->title . '%');
        }
        if ($request->start_date) {
            $query->whereDate('articles.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('articles.created_at', '<=', $request->end_date);
        }
        if ($request->user_id) {
            $query->where('articles.user_id', $request->user_id);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $articles = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $articles = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'articles' => $articles,
            'count' => $count,
            'trashed_title' => $trashed_title,
            'delete_button' => $delete_button,
        ];
    }

    /**
     * Show the form for creating a new resource.
     * @return view
     */
    public function create(): View
    {
        $title = __('articles.create');
        $action = route('articles.store');
        $types = Type::withDescription()->cursor();
        $users = User::where('role', 'admin')->get();
        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     * @param ArticleRequest $request
     * @return RedirectResponse
     */
    public function store(ArticleRequest $request): RedirectResponse
    {
        $content = $request->all();
        $content['show'] = '0';
        $data = Article::create($content);
        $this->saveData($request, $data->id);

        return redirect(getCurrentLocale() . $this->redirect);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return View
     */
    public function edit(Article $article): View
    {
        $title = __('articles.edit');
        $action = route('articles.update', $article->id);
        $query = ArticleDescription::where('article_id', $article->id)
            ->join('languages', 'languages.id', 'article_descriptions.language_id')
            ->select(['article_descriptions.*', 'languages.local']);
        $users = User::where('role', 'admin')->get();
        $articleDescription = $query->get();

        foreach ($articleDescription as $row) {
            $article[$row->local] = $row;
        }

        $types = Type::withDescription()->cursor();

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticleRequest $request
     * @param Article $article
     * @return RedirectResponse
     */
    public function update(ArticleRequest $request, Article $article): RedirectResponse
    {
        $content = $request->all();
        $article->update($content);

        $this->saveData($request, $article->id);

        return redirect(getCurrentLocale() . $this->redirect);
    }
    /**
     * Handle Save form data
     *
     * @param ArticleRequest $request
     * @param int $article_id
     * @return void
     */
    private function saveData(ArticleRequest $request, int $article_id): void
    {
        $requestData = $request->all();
        $slug = Str::slug($requestData['title_en']);
        Article::where('id', $article_id)->update([
            'slug_title' => $slug
        ]);
        foreach (languages() as $lang) {
            $data = [
                'title' => $requestData['title_' . $lang->local],
                'user' => $requestData['user_' . $lang->local],
                'slug' => $requestData['slug_' . $lang->local],
                'meta_description' => $requestData['meta_description_' . $lang->local],
                'keywords' => $requestData['keywords_' . $lang->local],
                'description' => $requestData['description_' . $lang->local],
            ];
            if ($requestData['image_' . $lang->local]) {
                // $imagePath = ImageService::uploadImageBlog($requestData['image_' . $lang->local]);
                // $data['image'] = $imagePath;
                $data['image'] = $requestData['image_' . $lang->local];
            }
            if ($requestData['image_two_' . $lang->local]) {

                // $imageTwoPath = ImageService::uploadImageBlog($requestData['image_two_' . $lang->local]);
                // $data['image_two'] = $imageTwoPath;
                $data['image_two'] = $requestData['image_two_' . $lang->local];
            }
            if ($requestData['user_image_' . $lang->local]) {

                // $imageUserPath = ImageService::uploadImageBlog($requestData['user_image_' . $lang->local]);
                // $data['user_image'] = $imageUserPath;
                $data['user_image'] = $requestData['user_image_' . $lang->local];
            }
            if ($requestData['image_logo_' . $lang->local]) {

                // $imageLogoPath = ImageService::uploadImageBlog($requestData['image_logo_' . $lang->local]);
                // $data['image_logo'] = $imageLogoPath;
                $data['image_logo'] = $requestData['image_logo_' . $lang->local];
            }
            

            $blog = ArticleDescription::where('article_id', $article_id)->where('language_id', $lang->id)->first();
            if ($blog) {
                $blog->Update($data);
            } else {
                $data['article_id'] = $article_id;
                $data['language_id'] = $lang->id;
                ArticleDescription::create($data);
            }
        }
    }

    public function show($id)
    {
        $article = Article::withDescription()
            ->where('articles.id', $id)
            ->firstOrFail();

        $relate_blogs =  Article::withDescription()
            ->where('articles.id', '!=', $article->id)->where('type_id', $article->type_id)->where('show', 1)
            ->paginate(4);

        $title = $article->title;
        return view($this->view . 'show', get_defined_vars());
    }
    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove Or Return the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $article = Article::where('id', $id)->withTrashed()->first();

        if (is_null($article->deleted_at)) {
            $article->delete();
        } else {
            $article->restore();
        }

        return redirect(getCurrentLocale() . $this->redirect);
    }
    public function show_article($id): RedirectResponse
    {
        $article = Article::where('id', $id)->withTrashed()->first();
        if ($article->show == 1) {
            $article->update([
                'show' => 0
            ]);
        } else {
            $article->update([
                'show' => 1
            ]);
        }
        return redirect(getCurrentLocale() . $this->redirect);
    }
    
}
