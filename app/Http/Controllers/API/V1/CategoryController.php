<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withDescription()->whereNull('categories.category_id')->with([
            'models' => function ($query) {
                $query->with('details');
            }
        ])->get();
        return CategoryResource::collection($categories);
    }
    public function show($id)
    {
        $category = Category::withDescription()
            ->where('categories.id', $id)->with([
                'models' => function ($query) {
                    $query->with('details');
                }
            ])
            ->firstOrFail();
        return new CategoryResource($category);
    }
}
