<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use App\Models\SrPage;
use App\Models\SrAnswer;
use App\Models\SrService;
use App\Models\SrServicesNew;

use App\Models\SpSkill;

use App\Models\SrQuestion;
use Illuminate\Support\Str;

use App\Models\PageCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
 


class ServiceController extends Controller
{
    public function allServices()
    {
        $allservices = SrService::orderBy('id', 'desc')->where(['status' => 1])->get();
        return view('admin.services.all', ['allservices' => $allservices]);
    }

   

    public function allSkills()
    {
        $allskills = SpSkill::orderBy('skill_id', 'desc')->where(['status' => 1])->get();
        return view('admin.skills.all', ['allskills' => $allskills]);
    }

    public function addServices(Request $request)
    {
        // dd($request->service_name_new);
        $upload = new SrService;
        $upload->service_name = $request->service_name_new;
        $upload->status = $request->service_status;


        $upload->save();
        return redirect()->back()->with('success', 'Service uploaded successfully');
    }

    public function addSkills(Request $request)
    {
        $formattedString = Str::replace('.', '-',$request->service_name_new);
        $skillSlug = Str::of($formattedString)->slug('-');

        if(SpSkill::where(['skill_slug'=>$skillSlug])->exists()){
        return redirect()->back()->with('error', 'Skill already exists');

        }
        // dd($request->service_name_new);
        
        $upload = new SpSkill;
        $upload->skill_slug = $skillSlug;
        $upload->skill_name = $request->service_name_new;
        $upload->status = $request->service_status;


        $upload->save();
        return redirect()->back()->with('success', 'Skill uploaded successfully');
    }

    public function deleteservice($serviceid)
    {
        SrService::where(['id' => $serviceid])->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }

    public function deleteskill($serviceid)
    {
        SpSkill::where(['skill_id' => $serviceid])->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }

    public function editService(Request $request)
    {

        $serv_name = $request->service_name;
        $service_status_edit = $request->service_status_edit;

        $success_message = 'Service updated successfully.';
        $response = array('serv_name' => $serv_name, 'success' => $success_message);


        $service = SrService::where(['id' => $request->sr_id])->first();
        $service->service_name = $serv_name;
        $service->cat_id = $service_status_edit;

        if ($service->save()) {
            return response()->json($response, 200);
        }
        return response()->json('something went wrong!', 500);


    }

    public function editSkill(Request $request)
    {

        $serv_name = $request->service_name;
        $service_status_edit = $request->service_status_edit;

        $success_message = 'Skill updated successfully.';
        $response = array('serv_name' => $serv_name, 'success_message' => $success_message);

        $skillSlug = Str::of($serv_name)->slug('-');

        $service = SpSkill::where(['skill_id' => $request->sr_id])->first();
        $service->skill_name = $serv_name;
        $service->skill_slug = $skillSlug;

        $service->status = $service_status_edit;

        if ($service->save()) {
            return response()->json($response, 200);
        }
        return response()->json('something went wrong!', 500);


    }





















    public function allQuestions($id=null)
    {

        if (!$id) {
            $allquestions = SrQuestion::orderBy('ques_id', 'desc')->get();

        } else {

            $allquestions = SrQuestion::orderBy('ques_id', 'desc')->where(['service_id' => $id])->get();

        }


        $allServ = SrService::where(['status' => 1])->get();

        foreach ($allquestions as $quest) {
            $selected_q = SrService::where(['id' => $quest->service_id])->first('service_name');

            if ($selected_q == null) {
                $quest->serviceName = 'N/A';
            } else {
                $quest->serviceName = $selected_q->service_name;
            }


        }

        return view('admin.services.questions', ['allquestions' => $allquestions, 'allServ' => $allServ,'service_id'=>$id]);
    }

    public function addQuestions(Request $request)
    {



        $upload = new SrQuestion;
        $upload->question_title = $request->question;
        $upload->service_id = $request->services;

        if ($request->is_first == 'on') {
            $upload->is_first_question = 1;
        } else {
            $upload->is_first_question = 0;
        }

        $upload->save();
        return redirect()->back()->with('success', 'Question Uploaded successfully');


    }

    public function editQuestion(Request $request)
    {



        // dd($request->question_id,$request->question,$request->services,$request->is_first);
        $queId = SrQuestion::where(['ques_id' => $request->question_id])->first();
        $queId->question_title = $request->question_title;
        // $queId->service_id = $request->services;


        if ($request->is_first == 'on') {
            $queId->is_first_question = 1;
        } else {
            $queId->is_first_question = 0;
        }
        // dd($queId);
        $queId->save();
        return redirect()->back()->with('success', 'Question updated successfully');


    }



    public function deletequestion($questionid)
    {
        SrQuestion::where(['ques_id' => $questionid])->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }

    public function quesFilter($id)
    {



        $data = SrQuestion::where(['service_id' => $id])->get();

        return response()->json($data, 200);
    }





























    public function allAnswers($id=null, $serviceid=null)
    {

        if (!$id) {
            $allanswers = SrAnswer::orderBy('answer_id', 'desc')->get();

        } else {
            $allanswers = SrAnswer::orderBy('answer_id', 'desc')->where(['ques_id' => $id])->get();

        }

        if(!$serviceid){
            $allquestions = SrQuestion::all();

        }else{
            $allquestions = SrQuestion::where(['service_id'=>$serviceid])->get();

        }


        foreach ($allanswers as $ans) {
            $ques_conn = SrQuestion::where(['ques_id' => $ans->ques_id])->first();
            if($ques_conn !== null){
                $ans->quesconn = $ques_conn->question_title;
            }else{
                $ans->quesconn = "no connected question";

            }

            if ($ans->connected_ques_id !== null) {
                $conn_ques = SrQuestion::where(['ques_id' => $ans->connected_ques_id])->first();
                $ans->connques = $conn_ques->question_title;
            }
        }

        return view('admin.services.answers', ['allanswers' => $allanswers, 'allquestions' => $allquestions,'question_id'=>$id,'serviceid'=>$serviceid]);
    }


    // All answers with scroll ajax 
    // public function allAnswers(){
    //     $allanswers = SrAnswer::paginate(10);
    //     $allquestions = SrQuestion::all();

    //     foreach($allanswers as $ans){
    //         $ques_conn = SrQuestion::where(['ques_id'=>$ans->ques_id])->first();
    //         $ans->quesconn = $ques_conn->question_title;

    //         if($ans->connected_ques_id !== null){
    //             $conn_ques = SrQuestion::where(['ques_id'=>$ans->connected_ques_id])->first();
    //             $ans->connques = $conn_ques->question_title;
    //         }
    //     }


    //     $answers_result = '';

    //     foreach ($allanswers as $oneanswer) {
    //         $answers_result.="<tr>\
    //             <td>".$oneanswer->answer_id."</td>\
    //             <td>".$oneanswer->answer_text."</td>\
    //             <td>".$oneanswer->quesconn."</td>\
    //             <td>".$oneanswer->connques."</td>\
    //             </tr>";
    //     }    

    //     return response()->json($answers_result, 200);

    // }



    public function addAnswers(Request $request)
    {



        // $q_to_add = SrQuestion::where(['ques_id'=>$request->conn_question])->first();


        // $add_qq = new SrQuestion;
        // $add_qq->question_title = $request->next_question_conn;
        // $add_qq->is_first_question = 0;
        // $add_qq->question_title = $request->next_question_conn;



        $upload = new SrAnswer;
        $upload->answer_text = $request->answer;
        $upload->ques_id = $request->conn_question;
        $upload->connected_ques_id = $request->next_question_conn_edit;

        $upload->save();
        return redirect()->back()->with('success', 'Answer uploaded successfully');


    }



    public function editAnswer(Request $request)
    {

       

        // dd($request->question_id,$request->question,$request->services,$request->is_first);
        $ansId = SrAnswer::where(['answer_id' => $request->answer_id])->first();
        $ansId->answer_text = $request->answer_text;
        $ansId->connected_ques_id = $request->next_question_conn_edit;
        // $ansId->connected_ques_id = $request->conn_question;



        // dd($ansId);
        $ansId->save();
        return redirect()->back()->with('success', 'Answer updated successfully');


    }





    public function deleteanswer($answerid)
    {
        SrAnswer::where(['answer_id' => $answerid])->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }










































    public function allservicePage()
    {

        $allPages = SrPage::all();
        // dd($allPages);
        foreach($allPages as $single){
            $categoryd = PageCategory::where(['id'=> $single->service_category])->first();
            $single->cat_name = $categoryd->category;
        }
        return view('admin.dynamic-pages.all', ['allPages' => $allPages]);
    }



    public function servicePage()
    {
        $categories = PageCategory::all();
        $services = SrService::where(['status'=>1])->get();
        return view('admin.dynamic-pages.create',['categories'=>$categories,'services'=>$services]);
    }

    public function storeservicePage(Request $request)
    {

        $upload = SrPage::create([
            'page_title' => $request->page_title,
            'heading' => $request->heading,
            'slug' => Str::slug($request->page_title, '-'),
            'content' => $request->contentarea,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'banner_image' => $request->banner_image,
            'thumb_image' => $request->thumb_image,
            'content_image' => $request->content_image,
            'status' => $request->status,
            'service_category' => $request->service_category,
            'service_id' => $request->service_id


        ]);

        // $request->validate([
        //     'banner_image' => 'mimes:png,jpg,jpeg|max:2048',
        //     'content_image' => 'mimes:png,jpg,jpeg|max:2048',
        //     'thumb_image' => 'mimes:png,jpg,jpeg|max:2048',
        // ]);


        // if ($request->hasFile('thumb_image')) {
        //     $thumbImage = $request->thumb_image;
        //     if ($thumbImage->isValid()) {
        //         $thumbImageName = time() . '_' . $thumbImage->getClientOriginalName();
        //         $thumbImage->storeAs('public/pages', $thumbImageName);
        //         $upload->update(['thumb_image' => $thumbImageName]);
        //     } else {
        //         return redirect()->back()->with('error_message', 'File type or size not correct!');
        //     }
        // }

        // if ($request->hasFile('banner_image')) {
        //     $bannerImage = $request->banner_image;
        //     if ($bannerImage->isValid()) {
        //         $bannerImageName = time() . '_' . $bannerImage->getClientOriginalName();
        //         $bannerImage->storeAs('public/pages', $bannerImageName);
        //         $upload->update(['banner_image' => $bannerImageName]);
        //     } else {
        //         return redirect()->back()->with('error_message', 'File type or size not correct!');
        //     }
        // }



        // if ($request->hasFile('content_image')) {
        //     $contentImage = $request->content_image;
        //     if ($contentImage->isValid()) {
        //         $contentImageName = time() . '_' . $contentImage->getClientOriginalName();
        //         $contentImage->storeAs('public/pages', $contentImageName);
        //         $upload->update(['content_image' => $contentImageName]);
        //     } else {
        //         return redirect()->back()->with('error_message', 'File type or size not correct!');
        //     }
        // }




        // $upload->banner_image =  $bannerImageName;
        // $upload->content =  $contentImageName;




        return redirect()->back()->with('success', 'Page uploaded succesfully');
    }

    public function deletePage($id)
    {
        SrPage::where(['id' => $id])->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }


    public function geteditPage($id)
    {

        $pageId = SrPage::where(['id' => $id])->first();
        $categories = PageCategory::all();
        $services = SrService::where(['status'=>1])->get();


        return view('admin.dynamic-pages.edit', ['pageId' => $pageId,'categories'=>$categories,'services'=>$services]);

    }

    public function deleteContentImage($id)
    {

        SrPage::where(['id' => $id])->update(['content_image' => null]);
        // $sr_page = SrPage::where(['id'=>$id])->first(); 
        // $sr_page->content_image = null;
        return redirect()->back()->with('success', 'Image deleted successfully');
    }

    public function deleteBannerImage($id)
    {

        SrPage::where(['id' => $id])->update(['banner_image' => null]);
        // $sr_page = SrPage::where(['id'=>$id])->first(); 
        // $sr_page->content_image = null;
        return redirect()->back()->with('success', 'Image deleted successfully');
    }


    public function updateServicePage(Request $request, $id)
    {
        $request->validate([
            'page_title' => 'required|string',
            'heading' => 'required|string',
            'content' => 'required',
            'service_category' => 'required|integer',
            'service_id' => 'required|integer',

            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'status' => 'required',     
            'banner_image' => 'required',
            'thumb_image' => 'required',
            'content_image' => 'required',     

        ]);

        $input = $request->all();
        // dd($input);
       
        // $sr_page->page_title = $request->page_title;
        // $sr_page->heading = $request->heading;
        $input['slug'] = Str::slug($request->page_title, '-');
        // $sr_page->content = $request->contentarea;
        // $sr_page->service_category = $request->service_category;
        // $sr_page->meta_title = $request->meta_title;
        // $sr_page->meta_description = $request->meta_description;
        // $sr_page->meta_keywords = $request->meta_keywords;
        // $sr_page->status = $request->status;



        // $request->validate([
        //     'banner_image' => 'mimes:png,jpg,jpeg|max:2048',
        //     'content_image' => 'mimes:png,jpg,jpeg|max:2048',
        //     'thumb_image' => 'mimes:png,jpg,jpeg|max:2048',
        // ]);

        // if ($request->hasFile('thumb_image')) {
        //     $thumbImage = $request->thumb_image;
        //     if ($thumbImage->isValid()) {
        //         $thumbImageName = time() . '_' . $thumbImage->getClientOriginalName();
        //         $thumbImage->storeAs('public/pages', $thumbImageName);
        //         // $sr_page->update(['thumb_image' => $thumbImageName]);
        //         $input['thumb_image'] = $thumbImageName;
        //     } else {
        //         return redirect()->back()->with('error_message', 'File type or size not correct!');
        //     }
        // }

        // if ($request->hasFile('banner_image')) {
        //     $bannerImage = $request->banner_image;
        //     if ($bannerImage->isValid()) {
        //         $bannerImageName = time() . '_' . $bannerImage->getClientOriginalName();
        //         $bannerImage->storeAs('public/pages', $bannerImageName);
        //         // $sr_page->update(['banner_image' => $bannerImageName]);
        //         $input['banner_image'] = $bannerImageName;

        //     } else {
        //         return redirect()->back()->with('error_message', 'File type or size not correct!');
        //     }
        // }



        // if ($request->hasFile('content_image')) {
        //     $contentImage = $request->content_image;
        //     if ($contentImage->isValid()) {
        //         $contentImageName = time() . '_' . $contentImage->getClientOriginalName();
        //         $contentImage->storeAs('public/pages', $contentImageName);
        //         // $sr_page->update(['content_image' => $contentImageName]);
        //         $input['content_image'] = $contentImageName;

        //     } else {
        //         return redirect()->back()->with('error_message', 'File type or size not correct!');
        //     }
        // }

        // dd($request->all());
        $sr_page = SrPage::where(['id' => $id])->first();
        if($sr_page->update($input)){
            return redirect()->back()->with('success', 'Updated Successfully');

        }

        return redirect()->back()->with('error_message', 'Updated Unsuccessful');






    }


    public function pageCategories(){

        $categories = PageCategory::all();
        return view('admin.dynamic-pages.page-categories',['categories'=>$categories]);
    }


    public function storePagecategory(Request $request){

        $request->validate([
            'category'=>'required|string'
        ]);
        
        $request['slug'] = Str::slug($request->category,'-');
        // dd($request->all());
        $category = PageCategory::create($request->all());
        if($category){
            return redirect()->back()->with('success','Category created');

        }

        return redirect()->back()->with('error_message','Problem creating category. Try again');

    }


    public function editPageCategory(Request $request){
        $request->validate([
            'id' => 'required|integer',
            'category' => 'required|string'
        ]);

        $request['slug'] = Str::slug($request->category,'-');
        $category = PageCategory::where(['id' => $request->id])->update($request->except('_token'));

        if($category){
            return redirect()->back()->with('success','category updated successfully');
        }

        return redirect()->back()->with('error_message','Problem updating category. Try again');

    }


    public function deleteCategory($id)
    {
        $delCat = PageCategory::where(['id' => $id])->delete();
        if($delCat){
            return redirect()->back()->with('success', 'Category deleted successfully');
        }

        return redirect()->back()->with('error_message','Problem deleting category. Try again');

    }



    // New Services adding here 
    public function allNewServices()
    {
        $allNewServices = SrServicesNew::orderBy('id', 'desc')->get();
        foreach($allNewServices as $one){
            // $one->service_bg_img = env("APP_URL")."/storage/services-backgrounds/".$one->service_bg_img;
            $one->service_desc = Str::limit($one->service_desc, 300);

            if($one->cat_id !== 0){
                $parentCat = SrServicesNew::where(['id'=>$one->cat_id])->first();
                $one->parentCategory = $parentCat->service_name;
            }
        }
        return view('admin.new-services.all', ['allNewServices' => $allNewServices]);
    }


    public function showAddServicePage(){
        $allServices = SrServicesNew::where(['status'=>1,'cat_id'=>0])->get(['id','service_name','service_slug','cat_id']);
        $allChildServices = SrServicesNew::where(['status'=>1])->where('cat_id','<>',0)->get(['id','service_name','service_slug','cat_id']);


        return view('admin.new-services.add', ['allServices' => $allServices,'allChildServices' => $allChildServices]);

    }
    public function addNewServices(Request $request){
        $request->validate([
            'service_name' => 'required|string',
            'service_slug' => 'required|string',
            'service_desc' => 'nullable|string',
            'service_bg_img' => 'nullable',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'status' => 'required',
            //'sr_home'=>'nullable'
        ]);

        $data = $request->all();
        // dd($data);       
        $data['service_slug'] = Str::slug($request->service_slug);
        //if($request->sr_home){
        //    $servicesArray = $data['sr_home'];
        //    $servicesStr = implode(',',$servicesArray);       
         //   $data['sr_home'] = $servicesStr;
        //}
        // if($file = $request->file('service_bg_img')){
        //     $allowedFileExtension = ['jpg', 'png', 'webp','jpeg','svg'];           
        //     $extension = $file->getClientOriginalExtension();

        //     $check = in_array($extension, $allowedFileExtension);
        //     if ($check) {
               
        //         $finalFilename = md5(rand(1000, 10000)).$request->service_bg_img->getClientOriginalName();
        //         $request->service_bg_img->storeAs('services-backgrounds',$finalFilename,'public');            
        //         $data['service_bg_img'] = $finalFilename;
        //     } else {
        //         return redirect()->back()->with('error', 'Only upload .png, .jpg, .webp .jpeg, svg');                
        //     }                    
        // }

        // dd($request->all());

        if(SrServicesNew::create($data)){
            // return redirect()->back()->with('success','Service added successfully');
            // return to_route('all.new.services');
            return redirect()->route('all.new.services')->with('success', 'Service added successfully');
        }
        
        return redirect()->back()->with('error','Service adding unsuccessful');
    }


    public function editNewServices($id){
        $allServices = SrServicesNew::where(['status'=>1,'cat_id'=>0])->get(['id','service_name','service_slug','cat_id']);
        $newServiceDetails = SrServicesNew::where(['id'=>$id])->first();
        // $newServiceDetails->service_bg_img = env("APP_URL")."/storage/services-backgrounds/".$newServiceDetails->service_bg_img;

        $preServicesArray = explode(',',$newServiceDetails->sr_home);

        $allChildServicesArr = [];
        foreach($preServicesArray as $service){
            $service_id = SrServicesNew::where(['id'=>$service])->first('id');
            if($service_id){
                $allChildServicesArr[] = $service;
                }
            }
            
        $allChildServices = SrServicesNew::where(['status'=>1])->where('cat_id','<>',0)->get(['id','service_name','service_slug','cat_id']);
        return view('admin.new-services.edit',['service'=>$newServiceDetails,'allServices'=>$allServices,'allChildServices' => $allChildServices,'allChildServicesArr'=>$allChildServicesArr]);
    }

    public function editNewServiceSave(Request $request){
        $request->validate([
            'id'=>'required',
            'service_name' => 'required|string',
            'service_slug' => 'required|string',
            'service_desc' => 'nullable|string',
            'service_bg_img' => 'nullable',
            'banner_strip' => 'nullable',

            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'status' => 'required',
            'sr_home'=>'nullable'
        ]);

        $service = SrServicesNew::where(['id'=>$request->id])->first();
        $data = $request->all();
        if($request->sr_home){
            $servicesArray = $data['sr_home'];
            $servicesStr = implode(',',$servicesArray);       
            $data['sr_home'] = $servicesStr;
        }
    //    dd($data);

        // if($file = $request->file('service_bg_img')){
        //     $allowedFileExtension = ['jpg', 'png', 'webp','jpeg','svg'];           
        //     $extension = $file->getClientOriginalExtension();

        //     $check = in_array($extension, $allowedFileExtension);
        //     if ($check) {
               
        //         $finalFilename = md5(rand(1000, 10000)).$request->service_bg_img->getClientOriginalName();
        //         $request->service_bg_img->storeAs('services-backgrounds',$finalFilename,'public');            
        //         $data['service_bg_img'] = $finalFilename;
        //     } else {
        //         return redirect()->back()->with('error', 'Only upload .png, .jpg, .webp .jpeg,svg ');                
        //     }                    
        // }

        if($service->update($data)){
            return redirect()->back()->with('success', 'Service updated successfully');                

        }
        return redirect()->back()->with('error', 'Service not updated. Try again');                



    }


    public function removeService($serviceid)
    {
        SrServicesNew::where(['id' => $serviceid])->delete();
        return redirect()->back()->with('success', 'Service deleted successfully');
    }


    public function allSettings()
    {
        // $allservices = SrService::orderBy('id', 'desc')->where(['status' => 1])->get();
        return view('admin.settings.all');
    }


     // New Services main category  
     public function allnewMaincat()
     {
         $main_categories = SpSkill::orderBy('skill_id', 'desc')->where(['status' => 1])->get();
        
        return response()->json(['main_categories'=>$main_categories]);
     }


    //  public function allnewSubcat()
    //  {
    //      $sub_categories = SrServicesNew::where(['status'=>1])->where('cat_id','!=',0)->orderBy('id', 'desc')->get(['id', 'service_name','service_slug', 'cat_id', 'status']);
        
    //     return response()->json(['sub_categories'=>$sub_categories]);
    //  }


}