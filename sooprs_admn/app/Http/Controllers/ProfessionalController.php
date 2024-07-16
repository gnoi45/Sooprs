<?php

namespace App\Http\Controllers;

use App\Models\GetVerifiedUser;
use App\Models\UserExp;
use App\Models\SrService;
use App\Models\SrServicesNew;

use App\Models\SpSkill;

use Illuminate\Support\Str;
use App\Models\UserAcademic;
use Illuminate\Http\Request;
use App\Models\JoinProfessional;
use Illuminate\Support\Facades\Hash;
use App\Models\ProfessionalPortfolio;
use PHPUnit\Framework\Constraint\IsEmpty;


class ProfessionalController extends Controller
{

    public function getAddProfessional(){

        $allServices = $this->allServices();
        
        return view('admin.professionals.add',['allServices'=>$allServices]);
    }
    


    public function storeProfessional(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'mobile'=>'required|integer',
            'organisation'=>'nullable|string',
            'services'=>'required',
            'password'=>'required',
            'status'=> 'required',
            'is_verified'=> 'required',
            

        ]);

        $data = $request->all();

        $servicesArray = $data['services'];
        $servicesStr = implode(',',$servicesArray);
        // dd($servicesStr);
        $data['services'] = $servicesStr;

        $data['password'] = Hash::make($request->password);

        $slug = Str::slug($request->name);
        
        $i = 1;
        while(JoinProfessional::where('slug',$slug)->exists()){
            $slug = $slug . '-' . $i;
            $i++;
        }
        // dd($slug);
        $data['slug'] = $slug;
        $uplaod = JoinProfessional::create($data);
         if($uplaod){
            return redirect()->back()->with('success','Professional added successfully');
         }

         return redirect()->back()->with('error','Problem in adding Professional');


    }

    public function getAllProfessionals(){
        $all = JoinProfessional::where(['is_buyer'=>0])->orderBy('id','desc')->get();
        foreach($all as $x){
            $servicesAr = explode(',', $x->services);

            $services = SrServicesNew::whereIn('id', $servicesAr)->pluck('service_name')->toArray();

            $x['hisServices'] =$services;
        }
        
    
    
        return view('admin.professionals.all',['all'=>$all]);
    }

    public function deleteProfessional($id){
        $prof = JoinProfessional::where(['id'=>$id])->delete();
        return redirect()->back()->with('success','Professional Deleted successfully');
    }

    public function geteditProfessional($id){

        $allServices = $this->allServices();
        $allSkills = $this->allSkills();


        $prof = JoinProfessional::where(['id'=>$id])->first();
        $servicesArray = explode(',',$prof->services);

        $servicesArr  =[];
        foreach($servicesArray as $service){
            $service_id = SrServicesNew::where(['id'=>$service])->first('id');
            if($service_id){
                $servicesArr[] = $service_id->id;
            }
        }

        $skillsArray = explode(',',$prof->skills);

        $skillsArr  =[];
        foreach($skillsArray as $skill){
            $skill_id = SpSkill::where(['skill_id'=>$skill])->first('skill_id');
            if($skill_id){
                $skillsArr[] = $skill_id->skill_id;
            }
        }
        return view('admin.professionals.edit',['prof'=>$prof,'allServices'=>$allServices,'servicesArr'=>$servicesArr,'allSkills'=>$allSkills,'skillsArr'=>$skillsArr]);

    }

    public function getViewProfessional($id){       

        $prof = JoinProfessional::where(['id'=>$id])->first();

        // services 
        $servicesArray = explode(',',$prof->services);
        $servicesArr  =[];
        foreach($servicesArray as $service){
            $serviceName = SrServicesNew::where(['id'=>$service])->first('service_name');
            if($serviceName){
                $servicesArr[] = $serviceName->service_name;
            }
        }

        // portfolios 
        $portfolios = ProfessionalPortfolio::where(['professional_id'=>$id])->get();
        if($portfolios->isNotEmpty()){

            foreach($portfolios as $portfolio){

                $portFilesArray = explode(',',$portfolio->files);
                $images_with_path = [];
                foreach($portFilesArray as $each){
                    $image_path = env('SITE_URL')."assets/portfolio-images/".$each;
                    $images_with_path[] = $image_path;
                }
                $portfolio->p__images = $images_with_path;
                
                // $portfolio['portfolio__images'] = $images_with_path;
                
            }
           

        }

        // skills 
        $skillsArray = explode(',',$prof->skills);
        $skillsArr  =[];
        foreach($skillsArray as $skill){
            $skillName = SpSkill::where(['skill_id'=>$skill])->first(['skill_id','skill_name']);
            if($skillName){
                $skillsArr[] = $skillName->skill_name;
            }
        }
        // dd($skillsArr);


        $exps = UserExp::where('user_id', $id)->get();
        $academics = UserAcademic::where('user_id', $id)->get();

        return view('admin.professionals.view',['prof'=>$prof,'servicesArr'=>$servicesArr,'skillsArr'=>$skillsArr,'portfolios'=>$portfolios, 'exps' => $exps, 'academics' => $academics]);

    }

    public function posteditProfessional(Request $request){
        $request->validate([
            'id'=>'required|integer',
            'name'=>'required|string',
            'email'=>'required|email',
            'mobile'=>'required',
            'organisation'=>'nullable|string',
            'services'=>'nullable',        
            'skills'=>'nullable',        
            'is_verified'=>'required',        


            'wallet'=>'nullable',        


        ]);

        $data = $request->all();


        $prof = JoinProfessional::where(['id'=>$request->id])->first();

        
        if($request->services){
            $servicesStr = implode(',',$data['services']);       
            $data['services'] = $servicesStr;            
        }
        if($request->skills){
            $skillsStr = implode(',',$data['skills']);       
            $data['skills'] = $skillsStr;            
        }
        
        // dd($data);

       
       
        if( $prof->update($data)){
            return redirect()->back()->with('success','Professional details updated successfully');            
        }

        return redirect()->back()->with('error','Problem updating Professional');


    }


    public function getAllKycs(){
        $all = GetVerifiedUser::orderBy('id','desc')->get();
       foreach($all as $kyc){
        $user = JoinProfessional::where(['slug'=>$kyc->user_id])->first(['slug','is_kyc_verified']);
        $kyc->is_kyc_verified = $user->is_kyc_verified;
       }
        return view('admin.kyc.all',['all'=>$all]);
    }

   
    public function geteditKyc($id){
        $kyc = GetVerifiedUser::where(['id'=>$id])->first();
       
        $user = JoinProfessional::where(['slug'=>$kyc->user_id])->first(['slug','is_kyc_verified']);
        $kyc->is_kyc_verified = $user->is_kyc_verified;
        
        return view('admin.kyc.edit',['kyc'=>$kyc]);

    }



    public function saveKycStatus(Request $request){
        $request->validate([
            'slug'=>'required|string',
            'is_kyc_verified'=>'required|integer',            
        ]);

        $data = $request->all();

        $prof = JoinProfessional::where(['slug'=>$request->slug])->first();
        
        if($prof){

            if( $prof->update([
                'is_kyc_verified'=>$request->is_kyc_verified
            ])){
                return redirect()->back()->with('success',"User's KYC updated successfully");            
            }
            return redirect()->back()->with('error','Please try again');

        }
        

        return redirect()->back()->with('error','User not found');


    }
    
}
