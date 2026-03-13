<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class Categorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

     abort_if(!Auth::user()->can('category.index'),403,'you can not aceess this page');
        // $category = Category::all();
        $category = Category::with('Products')->get();
         return view("category.index",compact('category'));
        //  return $category;
        // $category = Category::all()->with('Product');
         
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(!Auth::user()->can('category.create'),403,'You can not access this page');
        
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         abort_if(!Auth::user()->can('category.edit'),403,'you can not aceess this page');
        $category = Category::find($id) ;
        // dd($category);
       return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categorys  = Category::find($id);
        $categorys->name = $request->name;
        $categorys->save();
        return redirect()->route('category.index');
        // dd($categorys);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
       $category->delete();
        return redirect()->route('category.index');
    }
}
