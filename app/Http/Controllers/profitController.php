<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drug;
use App\profit;
use DB;
use App\SaleDrug;
use App\Sale;

class profitController extends Controller
{
//     public function showprofit()
//     {
//     $drugs = Drug::all();
//     $Sales=SaleDrug::all();
//    // $sales = SaleDrug::with('Drug')->get();
//     // $sales = DB::table('SaleDrug')
//     //         ->join('Drug', 'Drug.id', '=', 'SaleDrug.drug_id')
//     //         ->select('SaleDrug.amount', 'Drug.title')->get();
//     // $profits=new profit();
//     // $data=DB::table('SaleDrug')
//     //         ->join('Drug', 'Drug.id', '=', 'SaleDrug.drug_id')
//     //       //  ->join('profit', 'Drug.id', '=', 'profit.drug_id')
//     //         ->select('SaleDrug.amount', 'Drug.balance','Drug.OrginalPrice','Drug.price')->get();
//     //  $profit->drugprofit= ( $data->balance * $data->OrginalPrice ) - ($data->amount * $data->price );
//     return view('profit', [
//             'drugs' => $drugs,
//             'Sales' => $Sales
//         ]);
// }
 public function profitHistory()
    {
        $months = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ];
        $params = request()->all();
        $max_year = now()->year;
        $min_year = now()->year - 4;
        $year = array_key_exists('year', $params) ? $params['year'] : $max_year;
        if ($year > $max_year) $year = $max_year;
        $currentMonth = now()->month;
        $sales = Sale::whereYear('created_at', $year)->get();
        $drugs=Drug::whereYear('PurchaseDate', $year)->get();
        $formattedSales = [];
        $Purchase = [];
        foreach ($sales as $sale) {
            if(!array_key_exists($sale->created_at->month, $formattedSales)) {
                $formattedSales[$sale->created_at->month] = [];
                array_push($formattedSales[$sale->created_at->month], $sale);
            } else {
                array_push($formattedSales[$sale->created_at->month], $sale);
            }
        }
         foreach ($drugs as $drug) {
            if(!array_key_exists($drug->PurchaseDate, $Purchase)) {
                $Purchase[$drug->PurchaseDate] = [];
                array_push($Purchase[$drug->PurchaseDate], $drug);
            } else {
                array_push($Purchase[$drug->PurchaseDate], $drug);
            }
        }

         // foreach($sales->drugs as $drug)
         //         {  
         //          $expense+=$drug->pivot->amount * $drug->price ;
                   
         //          $revenue+= $drug->balance * $drug->OrginalPrice;
         //      }

         //   $profits=new profit();
         //   $profits->drugprofit=$expense-$revenue;         

        return view('profit', [
            'year' => $year,
            'max_year' => $max_year,
            'min_year' => $min_year,
            'sales' => $formattedSales,
            'purchase' => $Purchase,
            'months' => $months,
            'current_month' => $currentMonth,
            //'profits' => $profits ,
        ]);
    }
}
