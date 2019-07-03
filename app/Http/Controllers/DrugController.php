<?php

namespace App\Http\Controllers;

use App\Category;
use App\Drug;
use App\Provider;
use Carbon\Carbon;
use DB;
use Charts;

class DrugController extends Controller
{
    public function index() {
        $drugs = Drug::all();

        return view('drugs.index', [
            'drugs' => $drugs
        ]);
    }

    public function create() {
        $providers = Provider::all();
        $categories = Category::all();
        return view('drugs.create', [
            'providers' => $providers,
            'categories' => $categories
        ]);
    }

function chartt()
    {
     $data = DB::table('drugs')
       ->select(
        DB::raw('title as title'),
        DB::raw('count(*) as number'))
       ->groupBy('title')
       ->get();
     $array[] = ['title', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->title, $value->number];
     }
     return view('chartt')->with('title', json_encode($array));
    }

    public function store(Drug $drug)
    {
        $Date = Carbon::today()->format('Y-m-d');
        $attributes = request()->validate([
            'title' => 'required',
            'provider_id' => 'required',
            'measure' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'balance' => 'required',
            'OrginalPrice' => 'required',
            'ExpiredDate' => 'required',
            'limitQTY' => 'required',
        ]);

        $drug->title = $attributes['title'];
        $drug->provider_id = $attributes['provider_id'];
        $drug->measure = $attributes['measure'];
        $drug->price = $attributes['price'];
        $drug->category_id = $attributes['category_id'];
        $drug->balance = $attributes['balance'];
        $drug->OrginalPrice = $attributes['OrginalPrice'];
        $drug->ExpiredDate = $attributes['ExpiredDate'];
        $drug->limitQTY = $attributes['limitQTY'];
        $drug->timestamps = false;
        $drug->PurchaseDate=$Date;
       // dd($attributes);
        $drug->save();

        return redirect('/drugs');
    }

    public function edit(Drug $drug)
    {
        $providers = Provider::all();
        $categories = Category::all();
        return view('drugs.edit', [
            'drug' => $drug,
            'providers' => $providers,
            'categories' => $categories,
        ]);
    }

    public function update(Drug $drug)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'provider_id' => 'required',
            'measure' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'balance' => 'required',
            'OrginalPrice' => 'required',
            'ExpiredDate' => 'required',
            'limitQTY' => 'required',
        ]);

        $drug->title = $attributes['title'];
        $drug->provider_id = $attributes['provider_id'];
        $drug->measure = $attributes['measure'];
        $drug->price = $attributes['price'];
        $drug->category_id = $attributes['category_id'];
        $drug->balance = $attributes['balance'];
        $drug->OrginalPrice = $attributes['OrginalPrice'];
        $drug->ExpiredDate = $attributes['ExpiredDate'];
        $drug->limitQTY = $attributes['limitQTY'];
        $drug->timestamps = false;
        $drug->save();

        return redirect('/drugs');
    }

    public function destroy($drug_id)
    {
        Drug::find($drug_id)->delete();
        return redirect('/drugs');
    }

    public function show(Drug $drug)
    {
        return view('drugs.show', compact('drug'));
    }
    function CheckDate()
    {
        $providers = Provider::all();
        $categories = Category::all();
        $nowdate=Carbon::today()->format('Y-m-d');
        $drugs = Drug::expired()->get();
        //dd($drugs);
        //dd(Carbon::today());
         return view('CheckDate', [
            'drugs' => $drugs,
            'providers' => $providers,
            'categories' => $categories,
        ]);
    }

    function CheckQTY()
    {
        $providers = Provider::all();
        $categories = Category::all();
        
        $drugs = DB::table('drugs')
                ->where('limitQTY','>=', DB::raw('balance'))
                ->get();
               // dd($drugs);
       return view('CheckQTY',[
            'drugs' => $drugs,
            'providers' => $providers,
            'categories' => $categories,
        ]);
    }
    public function topOrders()
{              $items = DB::table('drugs')
                  ->join('sales_drugs', 'drugs.id', '=', 'sales_drugs.drug_id')
                  ->select(
                  DB::raw('sum(sales_drugs.amount) as sum'),
                  DB::raw('drugs.title as drug'),
                  DB::raw('drugs.id as id'))
                  ->groupBy('drugs.title')
                   ->groupBy('drugs.id')
                  ->orderByRaw('SUM(sales_drugs.amount) DESC')
                  ->take(5)
                  ->get();
                     //return $items;
                  
     //  $array[] = ['drug', 'Sum'];
     // foreach($items as $key => $value)
     // {
     //  $array[++$key] = [$value->drug, $value->sum];
     // }
     // return view('TopSaller')->with('drug', json_encode($array));
                return view('TopSaller',compact('items'));
    }
    public function TopSaleChart()
    {
        $items = DB::table('drugs')
                  ->join('sales_drugs', 'drugs.id', '=', 'sales_drugs.drug_id')
                  ->select(
                  DB::raw('sum(sales_drugs.amount) as sum'),
                  DB::raw('drugs.title as drug'),
                  DB::raw('drugs.id as id'))
                  ->groupBy('drugs.title')
                 ->groupBy('drugs.id')
                  ->orderByRaw('SUM(sales_drugs.amount) DESC')
                  ->take(5)
                  ->get();
         $chart = Charts::database($items, 'bar', 'highcharts')
                  ->title("Monthly new Register Users")
                  ->elementLabel("Total Users")
                  ->dimensions(1000, 500)
                  ->responsive(false);
                // ->groupByMonth(date('Y'), true);

        $pie  =  Charts::create('pie', 'highcharts')
                    ->title('My nice chart')
                    ->labels(['First', 'Second', 'Third'])
                    ->values([5,10,20])
                    ->dimensions(1000,500)
                    ->responsive(false);
        return view('TopSaleChart',compact('chart','pie'));
    }
}
