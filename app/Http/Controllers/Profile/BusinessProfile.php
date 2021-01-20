<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Business;
use App\Models\Image;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BusinessProfile extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $req)
    {
        $business = Auth::user()->business;
        // dd($business);
    }
    public function completeBusinessProfile()
    {
        return view('profile.completeBusinessProfile');
    }
    public function completeProfile(Request $req)
    {
        $messages =[

        ];
        $validated = $req->validate([
            'business_name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:businesses'],
            'address.*' => ['required'],
            'logo' => ['mimes:jpg,jpeg,svg,png,gif','max:2048'],
        ], $messages);
        $destinationPath = public_path('/uploads/'. $req->slug);
        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }
        if ($req->file()) {
            $filepath = $destinationPath . '/' . Image::sanitize($req->logo->getClientOriginalName());
            $fileinfo = pathinfo(Image::generateFilename($filepath));
            $imageName = $fileinfo['basename'];
            $req->logo->move($destinationPath, $imageName);
            // $logoPath = asset('uploads/' . $req->slug.'/' . $imageName);
            // $logoPath = $imageName;
        }
        $business=new Business();
        $business->user_id = Auth::user()->id;
        $business->business_name=$req->business_name;
        $business->slug = $req->slug;
        $business->business_email = $req->business_email;
        $business->business_logo = ($imageName)??'';
        $business->business_phone = $req->business_phone;
        if($business->save()){
            $business->categories()->sync($req->business_category);
            $address = new Address();
            $address->business_id = $business->id;
            $address->line1= $req->address['line1'];
            $address->line2 = $req->address['line2'];
            $address->city = $req->address['city'];
            $address->state = $req->address['state'];
            $address->zip_code = $req->address['zip_code'];
            $address->country = $req->address['country'];
            $address->save();
            toastr()->success('Successfully Updated', '');
            return redirect()->route('home');
        }else{
            toastr()->error('Something went wrong', '');
            return redirect()->back();
        }
    }
}

