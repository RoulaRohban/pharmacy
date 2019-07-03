<?php

namespace App\Http\Controllers;

use DB;

class UserController extends Controller
{
    function genderchart()
    {
     $data = DB::table('users')
       ->select(
        DB::raw('gender as gender'),
        DB::raw('count(*) as number'))
       ->groupBy('gender')
       ->get();
     $array[] = ['gender', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->gender, $value->number];
     }
     return view('Gender')->with('gender', json_encode($array));
    }
}
