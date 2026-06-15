<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryContorller extends Controller
{
    public function index()
    {
        $categories = Category::all();
        // dd($categories);
        return view('categories.list', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store()
    {
        // dd(request()->all());
        // dd(request()->name);
        Category::create(
            [
                'name' => request()->name,
                'dec' => request()->dec,
            ]
        );
        // return view('categories.list');
        return redirect('/categories');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        // dd($category);
        return view('categories.edit', compact('category'));
    }

    public function update($id)
    {
        $user = Category::find($id);
        $user->update([
            'name' => request()->name,
            'dec' => request()->dec,
        ]);
        // dd(request()->all());
        return redirect('/categories');
    }

    public function destroy($id)
    {
        // return $id;
        Category::find($id)->delete();
        return redirect('/categories');
    }
}
