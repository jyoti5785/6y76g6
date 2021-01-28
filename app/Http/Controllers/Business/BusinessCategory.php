<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bcategory;
use Illuminate\Support\Facades\Auth;

class BusinessCategory extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Bcategory::where('business_id',Auth::user()->business->id)->get();
        return view('store.category.index', compact('categories'));
    }
}
