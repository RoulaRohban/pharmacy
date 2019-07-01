<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', ['categories' => $categories]);
    }

  
    public function create()
    {
        return view('categories.create');
    }
    public function store(Category $category)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $category->title = $attributes['title'];
        $category->description = $attributes['description'];
        $category->timestamps = false;
        $category->save();

        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $category->title = $attributes['title'];
        $category->description = $attributes['description'];
        $category->timestamps = false;
        $category->save();

        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/categories');
    }
}
