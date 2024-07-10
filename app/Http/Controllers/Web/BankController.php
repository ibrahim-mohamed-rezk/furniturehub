<?php

namespace App\Http\Controllers\Web;

use App\Models\Bank;
use App\Models\Period;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\InstallmentRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BankController extends Controller
{
    public function installment()
    {
        $banks = Bank::get();
        
        $firstPartition = array_slice($banks->toArray(), 0, count($banks) / 2);
        $secondPartition = array_slice($banks->toArray(), count($banks) / 2); 

        return view('web.pages.installment', get_defined_vars());
    }
    public function installment_pay()
    {
        $banks = Bank::latest()
            ->join('bank_descriptions AS bd', 'banks.id', 'bd.bank_id')
            ->join('languages', 'languages.id', 'bd.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->select('bd.*', 'banks.*')->get();


        return view('web.pages.installment_way', get_defined_vars());
    }
    public function getPeriods($bank)
    {
        $periods = Bank::find($bank)->periods;

        return response()->json($periods);
    }
    public function calculate(InstallmentRequest $request)
    {
        $period = Period::findOrFail($request->input('period'));
        $price = $request->input('price');
        $percent = $request->input('percent') / 100; 
        $numOfMonths = $period->period;
        $totalfees = $price *$percent * ($numOfMonths /12);

        $total = $totalfees +$price;
        $installment = $total / $numOfMonths;


        return response()->json([
            'result' => (int)($installment), 
            'price' => $price,
            'percent' => $percent,
            'total' => $total,
            'num_of_months' =>$numOfMonths ,
        ]);
    }
}
