<?php

namespace App\Http\Controllers;

use App\Category;
use App\Drug;
use App\Provider;
use App\Sale;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function providersByCities()
    {
        $providers = Provider::all();
        $cities = [];
        foreach ($providers as $provider) {
            if (!in_array($provider->city, $cities)) {
                array_push($cities, $provider->city);
            }
        }
        return view('reports.providers', ['cities' => $cities, 'providers' => $providers]);
    }

    public function DrugByCategory()
    {
        $categories = Category::all();
        $drugs = Drug::all();
        return view('reports.DrugByCategory', [
            'categories' => $categories,
            'drugs' => $drugs,
        ]);
    }

    public function receipt($id)
    {
        $sale = Sale::find($id);
        return view('reports.receipt', ['sale' => $sale]);
    }

    public function salesList()
    {
        $sales = Sale::all();
        return view('sales-list', ['sales' => $sales]);
    }

    public function sales()
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
        $formattedSales = [];
        foreach ($sales as $sale) {
            if(!array_key_exists($sale->created_at->month, $formattedSales)) {
                $formattedSales[$sale->created_at->month] = [];
                array_push($formattedSales[$sale->created_at->month], $sale);
            } else {
                array_push($formattedSales[$sale->created_at->month], $sale);
            }
        }

        return view('reports.sales', [
            'year' => $year,
            'max_year' => $max_year,
            'min_year' => $min_year,
            'sales' => $formattedSales,
            'months' => $months,
            'current_month' => $currentMonth,
        ]);
    }
}
