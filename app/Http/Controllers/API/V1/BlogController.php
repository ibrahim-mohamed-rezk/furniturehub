<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogsResource;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return view
     */
    public function index(Request $request)
    {
        $query = Article::withDescription();
        $filter = $this->filter($request, $query);
        $blogs = $filter['blogs'];
        return BlogsResource::collection($blogs);


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

        if ($request->title) {
            $query->where('ad.title', 'LIKE', '%' . $request->title . '%');
        }
        if ($request->start_date) {
            $query->whereDate('articles.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('articles.created_at', '<=', $request->end_date);
        }
        $articles = $query->paginate($paginate);
        return [
            'blogs' => $articles,
        ];
    }
    public function show($id)
    {
 
        $article = Article::withDescription()
            ->where('articles.id', $id)
            ->firstOrFail();

        $relate_blogs = Article::withDescription()
            ->where('articles.id', '!=',$article->id)
            ->paginate(4);
        
        $data = [
            'blog'=>new BlogsResource($article),
            'relate_blogs' => BlogsResource::collection($relate_blogs)
        ];
        return $data;
    }
}
