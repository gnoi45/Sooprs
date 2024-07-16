<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\User;
use App\Models\Customer;
use App\Models\Banner;

use App\Models\SrService;
use App\Models\SpCountry;

use App\Models\Permission;
use Illuminate\Http\Request;

use App\Models\CustomerQuery;
use App\Models\JoinProfessional;

class DashboardController extends Controller
{
    public function index(){
        $leads = Lead::all();
        $customers = JoinProfessional::where(['is_buyer'=>1])->count();
        $professionals = JoinProfessional::where(['is_buyer'=>0])->count();

        $allservices = SrService::where(['status'=>1])->count();
       
        return view('admin.index', ['leads'=>$leads,'customers'=>$customers,'allservices'=>$allservices,'professionals'=>$professionals]);

    }


    public function allPermissions(){
        $allPerm = Permission::all();
        return view('admin.permissions.all',['allPerm'=>$allPerm]);
    }

    public function addPermissions(Request $request){
         // dd($request->service_name_new);
         $upload = new Permission;
         $upload->name =  $request->perm_name_new;
         $upload->guard_name =  $request->perm_guard;
        
 
         $upload->save();
         return redirect()->back()->with('success_message','Permission uploaded successfully');
    }

    public function deletePermission($permid){
        Permission::where(['id'=>$permid])->delete();
         return redirect()->back()->with('success_message','Permission deleted successfully');
    }

    public function editPermission(Request $request){
        $reqpermname = $request->perm_name ;
        $reqpid = $request->p_id ;
        $success_message = 'Permission updated successfully.';
        $data = array('reqpermname'=>$reqpermname,'success_message'=>$success_message);

       $fetchId =  Permission::where(['id'=>$reqpid])->first();
       $fetchId->name = $reqpermname;

       if($fetchId->save()){
        return response()->json($data, 200);
       }else{
        return response()->json('Something went wrong!', 400);
       }

    }



    public function allBanners(){

        $banners = Banner::all();
        foreach($banners as $banner){
            $banner->image = env("APP_URL")."/storage/banners/".$banner->image;
        }
        return view('admin.banners.all',['banners'=>$banners]);
    }

    public function addBanner(Request $request){

        if($request->hasFile('image')){
            $filename = uniqid().$request->image->getClientOriginalName();
            $request->image->storeAs('banners',$filename,'public');
            $banner  = new Banner;
            $banner->image = $filename;
            if($banner->save()){
                return redirect()->back()->with('success','Banner uploaded');
            }
            return redirect()->back()->with('error','Banner uploading failed!');            
        }
        return redirect()->back()->with('error','please select image');

    }

    public function deleteBanner($permid){
        Banner::where(['id'=>$permid])->delete();
         return redirect()->back()->with('success_message','Banner deleted successfully');
    }



    public function allCountries(){

        $countries = SpCountry::all();
        foreach($countries as $country){
            $country->svg = env("APP_URL")."/storage/countries/".$country->svg;
        }
        return view('admin.countries.all',['countries'=>$countries]);
    }

    public function addCountry(Request $request){
        $request->validate([
            'country_name' => 'required|string',
            'country_code' => 'required|string',
            'svg' => 'nullable',
            'dial_code' => 'nullable',           
            'status' => 'required'
        ]);

        $data = $request->all();
        // dd($data);       

        if($file = $request->file('svg')){
            $allowedFileExtension = ['jpg', 'png', 'webp','jpeg','svg'];           
            $extension = $file->getClientOriginalExtension();

            $check = in_array($extension, $allowedFileExtension);
            if ($check) {
               
                $finalFilename = md5(rand(1000, 10000)).$request->svg->getClientOriginalName();
                $request->svg->storeAs('countries',$finalFilename,'public');            
                $data['svg'] = $finalFilename;
            } else {
                return redirect()->back()->with('error', 'Only upload .png, .jpg, .webp .jpeg , svg');                
            }                    
        }

        // dd($request->all());

        if(SpCountry::create($data)){
            return redirect()->back()->with('success','Country added successfully');
        }
        
        return redirect()->back()->with('error','Country adding unsuccessful');
    }


    public function editCountry($id){
       
        $newCountryDetails = SpCountry::where(['country_id'=>$id])->first();
        $newCountryDetails->svg = env("APP_URL")."/storage/countries/".$newCountryDetails->svg;
        return view('admin.countries.edit',['country'=>$newCountryDetails]);
    }

    public function editCountrySave(Request $request){
        $request->validate([
            'id'=>'required',
            'country_name' => 'required|string',
            'country_code' => 'required|string',
            'svg' => 'nullable',
            'dial_code' => 'nullable',            
            'status' => 'required'
        ]);

        $country = SpCountry::where(['country_id'=>$request->id])->first();
        $data = $request->all();
        if($file = $request->file('svg')){
            $allowedFileExtension = ['jpg', 'png', 'webp','jpeg','svg'];           
            $extension = $file->getClientOriginalExtension();

            $check = in_array($extension, $allowedFileExtension);
            if ($check) {
               
                $finalFilename = md5(rand(1000, 10000)).$request->svg->getClientOriginalName();
                $request->svg->storeAs('countries',$finalFilename,'public');            
                $data['svg'] = $finalFilename;
            } else {
                return redirect()->back()->with('error', 'Only upload .png, .jpg, .webp .jpeg, svg');                
            }                    
        }

        if($country->update($data)){
            return to_route('all.countries');               

        }
        return redirect()->back()->with('error', 'country not updated. Try again');                



    }


    public function removeCountry($id)
    {
        SpCountry::where(['country_id' => $id])->delete();
        return redirect()->back()->with('success', 'Country deleted successfully');
    }
}
