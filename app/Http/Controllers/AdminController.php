<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function index(Request $request){
        $totalpro = Products::count();
        $totalCate = Category::count();
        $notification = Auth::user()->notifications;
      
        return view('admin.admin-dashbord',compact('totalpro','totalCate','notification'));
    }

 
    public function PendingProducts(){
        $pendigpro = Products::where('status','pending')->get();
        // dd($pendingProducts);
        return view('admin.pending-product',compact('pendigpro'));
    }

    public function approve(string $id){
        $products = Products::find($id);
        $products->status = 'approved';
        $products->update();
        return redirect()->route('admin.pending-product')->with('success','Product Approved Successfully');
    }

    public function rejected(string $id){
        $products =Products::find($id);
        $products->status = "rejected";
        $products->update();
        return redirect()->route('admin.pending-product')->with('success','Product Rejected Successfully');
    }


}
