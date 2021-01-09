<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessProfile extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $req)
    {
        $business = Auth::user()->business;
        dd($business);
    }
    public function completeBusinessProfile()
    {
        return view('profile.completeBusinessProfile');
    }
    public function completeProfile(Request $req)
    {
        dd($req->all());
    }
}

