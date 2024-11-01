<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\File;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
class FetchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return view
     */
    private $view = 'admin.ajax.';


    
    public function addphoto(Request $request): View
    {
        $key = $request->key;
        return view($this->view . 'photo', get_defined_vars());
    }
    public function removephoto(Request $request)
    {
        $id = $request->id;
        $photo = ProductPhoto::find($id);

        if ($photo) {

            $photo->delete();
    
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => 'Photo not found'], 404);
        }
    }
    public function addsection(Request $request): View
    {
        $key = $request->key;
        return view($this->view . 'section', get_defined_vars());
    }
    public function addpoint(Request $request): View
    {
        $key = $request->key;
        return view($this->view . 'point', get_defined_vars());
    }
    public function additem(Request $request): View
    {
        $key = $request->key;
        return view($this->view . 'item', get_defined_vars());
    }
    public function addtag(Request $request): View
    {
        $key = $request->key;
        return view($this->view . 'tag', get_defined_vars());
    }
    public function searchProduct(Request $request)
    {
        $products = Product::latest()
            ->join('product_descriptions AS ad', 'products.id', 'ad.product_id')
            ->select(['ad.*', 'products.*'])->where('ad.name', 'like', '%' . $request->name . '%')->get();

        return json_encode($products);
    }
    public function searchCategory(Request $request)
    {
        $categories = Category::latest()
            ->join('category_descriptions AS ad', 'categories.id', 'ad.category_id')
            ->join('languages', 'languages.id', 'ad.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->select(['ad.*', 'categories.*'])->where('ad.title', 'like', '%' . $request->name . '%')->get();

        return json_encode($categories);
    }
    public function upload_ckeditor(Request $request){
        if($request->hasFile('upload')){
            $image = $request->file('upload');
            $imageConverter = Image::make($image);
            $imageConverter->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $newFileName = rand(10000, 99999) . time() . '.webp';
            Storage::disk('s3')->put('products/' . $newFileName, $imageConverter->encode('webp',80)->stream(), 's3');
            return response()->json([
                'fileName'=>$newFileName,
                'uploaded'=> 1,
                'url'=>'https://furnturehubactive.s3.eu-central-1.amazonaws.com/products/' . $newFileName
            ]);

        }
    }
}
