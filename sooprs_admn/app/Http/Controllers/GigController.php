<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfessionalGig;
use App\Models\JoinProfessional;
use App\Models\SrServicesNew;



class GigController extends Controller
{
    public function allGigs(){
        $all = ProfessionalGig::where(['gig_status'=>1])->get();
        if($all){
            return view('admin.gigs.all',['all'=>$all, 'tabname'=>'Gigs']);

        }else{
            return view('admin.gigs.all',['all'=>$all, 'tabname'=>'Gigs']);

        }
    }

    public function view_gig_page($gig_unique_id){
        // $request->validate([
        //     'gig_unique_id'=>'required'
        // ]);

        $gig = ProfessionalGig::where(['gig_unique_id'=>$gig_unique_id])->first();
       
        $professional = JoinProfessional::where(['slug'=>$gig->professional_id])->first(['id','name','email','mobile','slug']);
           
        $sub_categories = SrServicesNew::where(['status'=>1])->where('cat_id','!=',0)->orderBy('id', 'desc')->get(['id', 'service_name','service_slug', 'cat_id', 'status']);
        $main_categories = SrServicesNew::where(['status'=>1, 'cat_id'=> 0])->orderBy('id', 'desc')->get(['id', 'service_name','service_slug', 'cat_id', 'status']);

       $tags_array = explode(',',$gig->gig_tags);

        return view('admin.gigs.view',['gig'=>$gig,'gig_professional'=>$professional,'sub_categories'=>$sub_categories,'main_categories'=> $main_categories,'tags_array'=>$tags_array]);

    }



    public function edit_gig(Request $request){
        $request->validate([
            'gig_unique_id'=>'required'
        ]);

        $data = $request->all();

        $data['gig_technologies'] = implode(',',$data['gig_technologies']);
        // dd($data);
        $gig = ProfessionalGig::where(['gig_unique_id'=>$request->gig_unique_id])->first();
        $professional = JoinProfessional::where(['slug'=>$gig->professional_id])->first(['id','name','email','mobile','slug']);
        $sub_categories = SrServicesNew::where(['status'=>1])->where('cat_id','!=',0)->orderBy('id', 'desc')->get(['id', 'service_name','service_slug', 'cat_id', 'status']);
        $main_categories = SrServicesNew::where(['status'=>1, 'cat_id'=> 0])->orderBy('id', 'desc')->get(['id', 'service_name','service_slug', 'cat_id', 'status']);
        $tags_array = explode(',',$gig->gig_tags);
        if($gig){
            if($gig->update($data)){
                return redirect()->back()->with('success_message', 'Updated Successfully');
                // return view('admin.gigs.view',['success'=>'Updated Successfully','gig'=>$gig,'gig_professional'=>$professional,'sub_categories'=>$sub_categories,'main_categories'=> $main_categories,'tags_array'=>$tags_array]);

            }
        }else{
            return redirect()->back()->with('error_message', 'Updated un-successful');

            // return view('admin.gigs.view',['error'=>'can not be updated','gig'=>$gig,'gig_professional'=>$professional,'sub_categories'=>$sub_categories,'main_categories'=> $main_categories,'tags_array'=>$tags_array]);

        }


    }


    
    public function deleteGig($id){
        ProfessionalGig::where(['gig_unique_id'=>$id])->delete();
        return redirect()->back()->with('success_message', 'Gig deleted successfully');
        
    }



}
