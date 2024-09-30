<?php

namespace App\Http\Controllers\Web;

use App\Models\Bank;
use App\Models\Mail;
use App\Models\Page;
use App\Models\Team;
use App\Models\Cobon;
use App\Models\Offer;
use App\Models\Branch;
use App\Models\Slider;
use App\Models\Article;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
use App\Models\CobonProduct;
use App\Models\OrderProduct;
use App\Models\ProductOffer;
use App\Models\CobonCategory;
use Illuminate\Http\JsonResponse;
use App\Mail\newSetterWelcomeMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Web\MessageRequest;
use App\Services\Response\ResponseService;
use App\Http\Requests\Web\NewsLetterRequest;
use Illuminate\Support\Facades\Mail as SendMail;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class WebController extends Controller
{
    private $view = 'web.';
    /**
     * view of home
     * @return view
     */
    public function index(): View
    {
        $categories_all = Cache::remember(LaravelLocalization::getCurrentLocale() . 'categories_all',60000, function () {
            return Category::withDescription()->where('categories.category_id', null)->orderByDesc('id')->get();
        });
        $categories = [];
        $index = 0; 

        // $cachedCategories = cache(LaravelLocalization::getCurrentLocale() .'categories');

        // if ($cachedCategories) {
        //     $categories = $cachedCategories;
        // } else {
        //     $categories = [];
        //     $index = 0;
        
        //     for ($i = 0; $i < count($categories_all); $i++) {
        //         $categories[$index][] = $categories_all[$i];
        
        //         if (count($categories[$index]) == $index + 1) {
        //             $index += 1;
        //         }
        //     }
        //     cache()->put(LaravelLocalization::getCurrentLocale() .'categories', $categories, now()->addMinutes(60)); // Adjust the cache duration as needed
        // }

        $offer_ids = $this->cobonproductsNow()['ids'];
        // $currentLanguage = LaravelLocalization::getCurrentLocale();

        $banners = Cache::remember( LaravelLocalization::getCurrentLocale() . 'banners', 600, function () {
            return Slider::withDescription([4, 5, 7, 8, 9, 10, 13, 14, 15, 16, 18, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47])
            ->orderBy('sliders.id', 'ASC')->select('sliders.id', 'sliders.link','ad.image')
            ->get();
        }); 

        $sliders = Cache::remember(LaravelLocalization::getCurrentLocale().'sliders', 600, function () {
            return Slider::withDescription()->where('sliders.status', 'slider')->select('sliders.id', 'sliders.link','ad.image')->get();
        }); 
        $news_products = Cache::remember(LaravelLocalization::getCurrentLocale().'news_products', 600, function () {
            // return Product::withDescription()->orderBy('id', 'DESC')->whereIn('products.sku_code', ["ofb0011", "fh0116", "why00063"])->where('products.only_offer', 'no')->take(3)->get();
        }); 
        $sale_products = Cache::remember(LaravelLocalization::getCurrentLocale().'sale_products', 600, function () {
            // return Product::withDescription()->whereIn('products.sku_code', ["FAY0042", "FH0111", "YAS0059"])->where('products.only_offer', 'no')->inRandomOrder()->take(3)->get();
        }); 
        $hot_products = Cache::remember(LaravelLocalization::getCurrentLocale().'hot_products', 600, function () {
            // return Product::withDescription()->where('products.cost_discount', '!=', null)->whereIn('products.sku_code', ["FH0106", "SSF0042", "lio0008"])->orderBy('id', 'DESC')->where('products.only_offer', 'no')->take(3)->get();
        }); 
        $shipping_products = Cache::remember(LaravelLocalization::getCurrentLocale().'shipping_products', 600, function () use ($offer_ids){
            // return Product::withDescription()->whereRaw("products.id IN (" . implode(',', $offer_ids) . ")")->orderByRaw("field(products.id," . implode(',', $offer_ids) . ")")->take(6)->get();
        }); 
        $cobonProduct = Cache::remember(LaravelLocalization::getCurrentLocale().'cobonProduct', 600, function () {
            // return Cobon::where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->where('type', 'product')->orderBy('id', 'DESC')->first();
        }); 
        $cobonCategory = Cache::remember(LaravelLocalization::getCurrentLocale().'cobonCategory', 600, function () {
            // return Cobon::where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->where('type', 'category')->orderBy('id', 'DESC')->first();
        }); 
        $only_product_offer = Cache::remember(LaravelLocalization::getCurrentLocale().'only_product_offer', 600, function () {
            // return Product::withDescription()->where('products.only_offer', 'yes')->first();
        }); 

        $offer_categories_ids = $this->cobonNow()['ids'];
        $articles =  Cache::remember(LaravelLocalization::getCurrentLocale().'articles', 600, function () {
            return Article::withDescription()->paginate(5);
        }); 
        return view($this->view . 'index', get_defined_vars());
    }
    public function cobonNow()
    {
        $ids = [];
        $cobons_ids = [];
        $cobons = Cobon::where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->orderBy('id', 'ASC')->get();
        foreach ($cobons as $cobon) {
            $category_ids = CobonCategory::where('cobon_id', $cobon->id)->pluck('category_id')->toArray();
            $cobons_id = CobonCategory::where('cobon_id', $cobon->id)->pluck('cobon_id')->toArray();
            $product_ids = Product::whereIn('category_id', $category_ids)->pluck('id')->toArray();
            $ids = array_merge($ids, $product_ids);
            $cobons_ids = array_merge($cobons_ids, $cobons_id);

            $data = [
                'ids' => $ids,
                'cobons' => $cobons_ids
            ];
        }
        if (count($ids) == 0) {
            $data = [
                'ids' => ['0'],
                'cobons' => ''
            ];
        }
        return $data;
    }
    public function cobonproductsNow()
    {
        $ids = [];
        $cobons = Cobon::where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->where('type', 'product')->orderBy('id', 'ASC')->get();
        foreach ($cobons as $cobon) {
            $product_ids = CobonProduct::where('cobon_id', $cobon->id)->pluck('product_id')->toArray();
            $ids = array_merge($ids, $product_ids);

            $data = [
                'ids' => $ids
            ];
        }
        if (count($ids) == 0) {
            $data = [
                'ids' => ['0'],
            ];
        }
        return $data;
    }
    // private function offerNext()
    // {
    //     $ids = [];
    //     $offers = Offer::where('start_date', '>=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->orderBy('id', 'DESC')->get();
    //     foreach ($offers as $offer) {
    //         $product_ids = ProductOffer::where('offer_id', $offer->id)->pluck('product_id')->toArray();
    //         $ids = array_merge($ids, $product_ids);
    //     }
    //     if (count($ids) == 0) {
    //         $ids = ['0'];
    //     }
    //     return $ids;
    // }
    // private function soldIds()
    // {
    //     $product_ids = OrderProduct::select('product_id', DB::raw('sum(count) as count'))
    //         ->groupBy('product_id')
    //         ->orderBy('count', 'DESC')
    //         ->take(4)
    //         ->pluck('product_id')->toArray();
    //     if (count($product_ids) == 0) {
    //         $product_ids = ['0'];
    //     }
    //     return $product_ids;
    // }

    public function cobon()
    {
        $title = __('web.cobon');
        $cobons = Cobon::cursor();;
        return view($this->view . 'cobon.index', get_defined_vars());
    }
    /**
     * view of contact-us
     * @return view
     */
    public function contact(): View
    {
        $title = __('web.contact_us');
        $action = route('message.send');
        $query = Branch::latest()
            ->join('branch_descriptions AS bd', 'branches.id', 'bd.branch_id')
            ->join('languages', 'languages.id', 'bd.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->where('branches.deleted_at', null)
            ->select(['bd.*', 'branches.*']);

        $branches = $query->get();

        $first_branch = $query->first();

        return view($this->view . 'pages.contact', get_defined_vars());
    }
    /**
     * send message
     * @param MessageRequest $request
     *
     * @return RedirectResponse
     */
    public function send_message(MessageRequest $request): JsonResponse
    {
        $contact = $request->all();
        $contact['name'] = $request->first_name . ' ' . $request->last_name;
        $message = Contact::create($contact);
        if ($message) {
            $status = 200;
            $msg = __('web.success');
            $target = route('web.index');
        } else {
            $status = 400;
            $msg = __('web.failed');
            $target = route('web.index');
        }
        $response =
            [
                'status' => $status,
                'msg' => $msg,
                'data' => $target,
            ];
        return ResponseService::response($response);
    }
    public function newsletter(NewsLetterRequest $request): JsonResponse
    {
        Mail::create(['email' => $request->email]);
        $data['subject'] = 'FurntureHub Newsletter';
        $sendMail = SendMail::to(Auth::user()->email)->send(new newSetterWelcomeMail($data));
        $response =
            [
                'status' => 200,
                'msg' => __('web.success'),
                'data' => url()->previous(),
            ];
        return ResponseService::response($response);
    }
    /**
     * view of about-us
     * @return view
     */
    public function about_us(): View
    {
        $title = __('web.about_us');
        $query = Branch::latest()
            ->join('branch_descriptions AS bd', 'branches.id', 'bd.branch_id')
            ->join('languages', 'languages.id', 'bd.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->where('branches.deleted_at', null)
            ->select(['bd.*', 'branches.*']);

        $queryTeam = Team::latest()
            ->join('team_descriptions AS td', 'teams.id', 'td.team_id')
            ->join('languages', 'languages.id', 'td.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->where('teams.deleted_at', null)
            ->select(['td.name', 'td.job', 'teams.*']);
        $teams = $queryTeam->get();

        $branches = $query->get();

        $first_branch = $query->first();
        return view($this->view . 'pages.about_us', get_defined_vars());
    }
    /**
     * view of soon
     * @return view
     */
    public function soon(): View
    {
        return view($this->view . 'pages.soon');
    }

    /**
     * view of checkout
     * @return view
     */
    public function checkout(): View
    {
        return view($this->view . 'pages.checkout');
    }

    /**
     * view of seller_register
     * @return view
     */
    public function seller_register(): View
    {
        $title = __('web.seller_register');
        return view($this->view . 'auth.seller_register',get_defined_vars());
    }
    public function condition(): View
    {
        $page = Page::withDescription(8)->first();
        return view($this->view . 'pages.page', get_defined_vars());
    }
    public function privacy(): View
    {

        $page = Page::withDescription(9)->first();
        return view($this->view . 'pages.page', get_defined_vars());
    }
    public function interest(): View
    {
        $page = Page::withDescription(10)->first();
        return view($this->view . 'pages.page', get_defined_vars());
    }
    public function vr(): View
    {
        $page = Page::withDescription(11)->first();
        return view($this->view . 'pages.page', get_defined_vars());
    }
    public function ar(): View
    {
        $page = Page::withDescription(12)->first();
        return view($this->view . 'pages.page', get_defined_vars());
    }

    /**
     * web privacy_policy
     * @return View
     */
    public function privacy_policy(): View
    {
        $title = __('web.privacy_policy');
        return view('web.pages.privacy_policy',get_defined_vars());
    }
    /**
     * web return_policy
     * @return View
     */
    public function return_policy(): View
    {
        $title = __('web.return_policy');

        return view('web.pages.return_policy',get_defined_vars());
    }

    /**
     * web common_questions
     * @return View
     */
    public function common_questions(): View
    {
        return view('web.pages.common_questions');
    }

    /**
     * web why_furniture_hub
     * @return View
     */
    public function why_furniture_hub(): View
    {
        return view('web.pages.why_furniture_hub');
    }


    /**
     * Web logout.
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return Redirect::to('login');
    }

    /**
     * Web account.
     * @return View
     */
    public function account(): View
    {
        return view('web.pages.account');
    }
}
