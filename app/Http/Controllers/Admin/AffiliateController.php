<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Affiliate;
use App\Models\UserModule;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\mail as MailMail;
use App\Models\AffiliateSystem;
use App\Services\Mail\SendMail;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Client\Request as ClientRequest;

class AffiliateController extends Controller
{
    private $view = "admin.affiliates.";
    private $redirect = "/admin/affiliates/";
    private $routes = 'affiliates';

    public function index(Request $request)
    {
        $title = __('affiliates.index');
        $query = Affiliate::latest();


        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $affiliates = $filter['affiliates'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];
        return view($this->view . 'index', get_defined_vars());
    }
    public function show($id)
    {
        $affiliate = Affiliate::where('id', $id)->first();
        $title = $affiliate->name;
        $user_affiliate = User::where('email', $affiliate->email)->where('role', 'affiliate')->whereNotNull('affiliate')->first();
        if ($user_affiliate) {
            $affiliate_count = AffiliateSystem::where('user_id', $user_affiliate->id)->first();
            $users = User::where('affiliate_id', $user_affiliate->id)->get();
            $users_ids = User::where('affiliate_id', $user_affiliate->id)->pluck('id');
            $query = Order::whereIn('user_id', $users_ids);
            $orders = $query->get();
            $orders_count = $query->count();
            $profits = $query->sum('affiliate_profit');
            $totals = $query->sum('total');
            $affiliate_count->update([
                'affiliate_count_order' => $orders_count
            ]);

            $users_chart = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                ->whereYear('created_at', date('Y'))->whereNull('deleted_at')
                ->groupBy('month')
                ->orderBy('month')
                ->where('affiliate_id', $user_affiliate->id)
                ->get();
            $orders_chart = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                ->whereYear('created_at', date('Y'))->whereNull('deleted_at')
                ->groupBy('month')
                ->orderBy('month')
                ->whereIn('user_id', $users_ids)
                ->get();
            $data_users = [];
            $data_orders = [];
            for ($i = 1; $i < 12; $i++) {
                $month = date('F', mktime(0, 0, 0, $i, 1));
                $count = 0;
                foreach ($users_chart as $user) {
                    if ($user->month == $i) {
                        $count = $user->count;
                        break;
                    }
                }
                array_push($data_users, $count);
            }
    
            for ($i = 1; $i < 12; $i++) {
                $month = date('F', mktime(0, 0, 0, $i, 1));
                $count = 0;
                foreach ($orders_chart as $order) {
                    if ($order->month == $i) {
                        $count = $order->count;
                        break;
                    }
                }
                array_push($data_orders, $count);
            }
            $visitors = json_encode($data_users);
            $sales = json_encode($data_orders);
        }
        return view($this->view . 'create', get_defined_vars());
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
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $affiliates = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $affiliates = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'affiliates' => $affiliates,
            'count' => $count,
            'trashed_title' => $trashed_title,
            'delete_button' => $delete_button,
        ];
    }

    public function destroy($id): RedirectResponse
    {
        $affiliate = Affiliate::where('id', $id)->withTrashed()->first();
        if (is_null($affiliate->deleted_at)) {
            $affiliate->delete();
        } else {
            $affiliate->restore();
        }
        return redirect(getCurrentLocale() . $this->redirect);
    }
    public function accept($id)
    {
        $affiliate = Affiliate::where('id', $id)->first();
        $user = User::where('email', $affiliate->email)->first();
        if($user){

            $user->update([
                'role' => 'affiliate',
                'affiliate' => 'accepted',
            ]);
            $affiliate->update([
                'status'=>'accepted'
            ]);
            $affiliate_code = Str::random(4);
            $add_affiliate = AffiliateSystem::create([
                'user_id' => $user->id,
                'affiliate_code' => $affiliate_code,
                'affiliate_count_user' => 0,
                'affiliate_count_order' => 0,
            ]);
            foreach ([168,165,164] as $row){
                UserModule::create([
                    'user_id'=>$user->id,
                    'module_id'=>$row,
                ]);
    
            }
            // dd($add_affiliate);
            $domain = URL::to('/');
            $url = $domain . '/register?ref=' . $affiliate_code;
            $dashboard = $domain. '/affiliate';
    
            $data['subject'] = 'Registered';
            $data['url'] = $url;
            $data['dashboard'] = $dashboard;
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['password'] =  (Hash::check('affiliate', $user->password)) ? 'affiliate':'Use your password that you used to register on the site for the first time';
            $sendMail = Mail::to($user->email)->send(new MailMail($data));
            if ($sendMail) {
                return back()->with([
                    'key' => "Send Successfully"
                ]);
            }
        }else{
            $affiliate->delete();
            return redirect(getCurrentLocale() . $this->redirect);
        }
        return back()->with([
            'key' => "Send Failed"
        ]);
    }
    public function refuse($id)
    {
        $affiliate = Affiliate::where('id', $id)->first();
        $user = User::where('email', $affiliate->email)->first();
        if($user){
            $user->update([
                'role' => 'user',
                'affiliate' => 'refused',
    
            ]);
            $affiliate->update([
                'status'=>'refused'
            ]);
        }else{
            $affiliate->delete();
            return redirect(getCurrentLocale() . $this->redirect);
        }
        // $title = "";
        // $massage = "";
        // $sendMail = Mail::to($user->email)->send(new MailMail($data));
        // if ($sendMail) {
        //     return back()->with([
        //         'key' => "Send Successfully"
        //     ]);
        // } 
        return back()->with([
            'key' => "Send Failed"
        ]);
    }
}
