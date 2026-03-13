<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Models\User;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    
    {
    //    return Products::all();
    
    // abort_if(!Auth::user()->can('product.index'), 403, 'You can not access this page');
        if($request->ajax()){

            $data = Products::with('Category')->where('status','approved')->get();
        //  $data = Products::with('Category')->get();
            return DataTables::of($data)
            ->addColumn('action',function($row){
                 $csrf_field = csrf_field();
                 $method_failed = method_field('Delete');

                return '<a href="'.route('product.edit',$row->id).'" class="btn btn-primary w-100 mb-2">Edit</a>'.'
                <form action="'.route('product.destroy',$row->id).'" method="POST">
                '.$csrf_field.'
                '.$method_failed.'
                    <button type="submit" class="btn btn-danger w-100">Delete</button>
                </form>
                ';
            })->addColumn('image',function($row){
                $url = asset('storage/'.$row->image);
                 return   "<img src='".$url."' width='70' height='70'>";
            })
            ->rawColumns(['action','image'])
            ->make(true);
        }
    
        return view('product.index');



        // $search = $request->input('search');
        
        // if($search){
        //      $products = Products::withWhereHas('Category',function($query) use($search){
        //        return $query->where('name',"Like","%{$search}%");
        //     })->with('Category')->orderBy('price','Desc')->get();
        // }
        // else{
        //     $products = Products::with('Category')->orderBy('price','Desc')->get();
             
        // }
        //  $total = Products::sum('price');
        //  return view('product.index',compact('products','total'));
        // $products = Products::with('Category')->orderBy('name','asc')->orderBy('price','desc')->get();
        // $products = Products::->get();
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(!Auth::user()->can('product.create'), 403,'you can not access this page');
        $categories = Category::all(); 
        return view("product.create",compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
         $data = $request->all();
        $file = $request->file('image')->store('/image','public');
        $data['image'] = $file;
         Products::create($data);
         return redirect()->route('product.index');
       
        
    }
    //  * Display the specified resource.
    //  */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort_if(!Auth::user()->can('product.edit'),403,'you can not aceess this page');
        $product = Products::find($id);
        $categories = Category::all();
        return view('product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Products::find($id);
        $data = $request->all();
        if($request->hasfile('image')){
            $file = $request->file('image')->store('/image','public');
            $data['image']=$file;
        }
        $products->update($data);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect()->route('product.index');
        // dd($product);
    }
}
