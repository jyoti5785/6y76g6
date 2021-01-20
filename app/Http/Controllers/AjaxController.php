<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function workspace(Request $req)
    {
        $business = Business::where('slug',$req->slug)->count();
        $business=+1;
        if($business>1){
            return "<span class='text-danger'>Not Available</span>";
        }else{
            return "<span class='text-success'>Available</span>";
        }
    }
    public function notFound()
    {
        return view('err.404');
    }
}
