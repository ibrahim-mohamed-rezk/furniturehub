<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\Slider;


class BlogController extends Controller
{

    private $view = 'web.blog.';
    private $routes = 'web.blog';

    /**
     * show all blogs
     * @return view
     */

    public function index(Request $request): View
    {
        $title = __('articles.index');
        $banners = Slider::withDescription([17, 53, 54, 55])->get();
        $query = Article::join('article_descriptions AS ad', 'articles.id', 'ad.article_id')
            ->join('languages', 'languages.id', 'ad.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->select(['ad.*', 'articles.*']);

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $blogs = $filter['blogs'];

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
        $paginate = $request->number;
        $sortBy = $request->sort_by;
        $action = route($this->routes);

        if ($sortBy) {
            $sortBy = $request->input('sort_by');
            if ($sortBy == __('web.oldest_posts')) {
                $query->oldest();
            } else {
                $query->latest();
            }
        }

        if ($paginate) {
            $blogs = $query->paginate($paginate)->withQueryString();
        } else {
            $blogs = $query->paginate(16)->withQueryString();
        }

        return [
            'action' => $action,
            'blogs' => $blogs,
        ];
    }
    /**
     * show all blogs
     * @return view
     */

    public function blog_details($title): View
    {

        $array = explode('/', $title);
        if (count($array) < 2) {
            abort(404);
        }
        $article = Article::withDescription()
            ->where('articles.id', $array[0])
            ->firstOrFail();

        $relate_blogs = Article::withDescription()
            ->where('articles.id', '!=', $article->id)
            ->paginate(4);
        $title = $article->title;
        return view($this->view . 'blog_details', get_defined_vars());
    }
}
