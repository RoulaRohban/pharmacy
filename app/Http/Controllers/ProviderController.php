<?php
namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::all();

        return view('providers.index', ['providers' => $providers]);
    }

    public function create()
    {
        return view('providers.create');
    }

    public function store(Provider $provider)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'city' => 'required',
            'address' => 'required',
            'manager' => 'required',
            'phone' => 'required',
        ]);

        $provider->title = $attributes['title'];
        $provider->city = $attributes['city'];
        $provider->address = $attributes['address'];
        $provider->manager = $attributes['manager'];
        $provider->phone = $attributes['phone'];
        $provider->timestamps = false;
        $provider->save();

        return redirect('/providers');
    }

    public function show(Provider $provider)
    {
        return view('providers.show', ['provider' => $provider]);
    }

    public function edit(Provider $provider)
    {
        return view('providers.edit', ['provider' => $provider]);
    }

    public function update(Provider $provider)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'city' => 'required',
            'address' => 'required',
            'manager' => 'required',
            'phone' => 'required',
        ]);

        $provider->title = $attributes['title'];
        $provider->city = $attributes['city'];
        $provider->address = $attributes['address'];
        $provider->manager = $attributes['manager'];
        $provider->phone = $attributes['phone'];
        $provider->timestamps = false;
        $provider->save();

        return redirect('/providers');
    }
}
