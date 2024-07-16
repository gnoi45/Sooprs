<?php

namespace App\Http\Controllers;

use App\Models\SrServicesNew;
use Illuminate\Http\Request;

use App\Models\Lead;
use App\Models\MyLead;

use App\Models\LeadStaff;
use App\Models\JoinProfessional;

use App\Models\LeadStatus;
use App\Models\SrService;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Customer;
use App\Models\CustomerQuery;
use App\Models\ModelHasRole;
use App\Models\Role;

use Str;


class LeadController extends Controller
{
    public function allLeads(){

         $leads = Lead::all();
         foreach ($leads as $lead) {
            $service = SrServicesNew::where('id', $lead->category)->first();
            if($service !== null){
                $lead->service_name = $service->service_name;
            }
            else{
                $lead->service_name = 'not found';
            }
            $lead->description = Str::limit($lead->description,200);
         }
        
        // $auth_role = $this->authIsAdmin();       // Admin or User

        // $authUserId = \Auth::user()->id;         // auth user id
        // // dd($authUserId);

        // // $user_in_array = [];
        // // $leads_all_check = Lead::all();
        // // dd($leads_all_check);
        // // foreach($leads_all_check as $onecehck){
        // //     $staff_array = $onecehck->assigned_staff;
        // //     if (in_array($authUserId, $staff_array)) {
        // //         $user_in_array[] = $authUserId;
        // //     } 
        // // }
        // // dd($user_in_array);


        // $lead_ids_array = [];

        // if($auth_role == "Admin"){
        //     $allLeads = Lead::all();

        // }else{
        //     $staffuser = LeadStaff::where(['user_id'=>$authUserId])->get();            
        //     foreach($staffuser as $su){
        //         $lead_ids_array[] = $su->lead_id;
        //     }   
            
        //     $allLeads = [];
        //     foreach($lead_ids_array as $liar){
        //         $allLeads[] =  Lead::where(['id'=>$liar])->first();
        //     }
        // }

        // // dd($allLeads);

                       

        // // $allLeads = Lead::all();
        // $allUsers = User::all();
        // $all = Customer::all();
        
        // foreach($allLeads as $item){
            
        //     $queryGrp = CustomerQuery::where(['lead_id'=>$item->id])->get();
        //     $item->queryPack = $queryGrp;

        //     // All Status activities 
        //     $statuses = LeadStatus::where(['lead_id'=>$item->id])->orderBy('id', 'desc')->get();
        //     if($statuses){
        //         foreach($statuses as $s){
        //             $s->onlydate = Str::substr($s->date,0,10);

        //         }
        //     }            
        //     $item->statusArr = $statuses ;


        //     // Latest lead status 
        //     $laststatus = LeadStatus::where(['lead_id'=>$item->id])->orderBy('id', 'desc')->first();
        //     if($laststatus){
        //         $item->lastS = $laststatus->status;
        //         $item->lastD = Str::substr($laststatus->date,0,10);
        //         // dd($item->lastD);
        //     }       



            
            
        // }
      
        return view('admin.lead.all',['all'=>$leads, 'tabname'=>'Leads']);
    }

    public function allLeadsSlug(){

        $leads = Lead::all();
        foreach ($leads as $lead) {
           
            $slug = Str::of($lead->project_title)->slug('-');
            if(Lead::where(['slug' => $slug])->exists()){
                $slug = $slug."-".Carbon::now()->format('YmdHis');
            }else{

                $lead->update([
                    'slug' => $slug
                ]);
            }
           
        }
       
       
     
       return true;
   }




    public function view_lead_page(Request $request){
        $request->validate([
            'lead_id'=>'required'
        ]);

        $lead = Lead::where(['id'=>$request->lead_id])->first();
        $bids = MyLead::where(['lead_id'=>$request->lead_id])->get();
        foreach($bids as $bid){
            $professional = JoinProfessional::where(['id'=>$bid->professional_id])->first(['id','name','email','mobile']);
            $bid->professional = $professional;
        }

        // dd($bids);
        return view('admin.lead.view',['lead'=>$lead,'bids'=>$bids]);

    }








    public function assignLead(Request $request){

        $leadIdInput = $request->input('leadId');                // "109"
        $users = $request->input('user');                        // ["2","5"."3"]
        // dd($leadIdInput);            
        
        


        $upload = new LeadStaff;
        
        foreach($users as $user){
            $upload->lead_id = $leadIdInput;
            $upload->user_id = $user;
        }
        $upload->save();





       
        // Inserting user ids in array in assigned_staff column and date in assigned_date column
        $matchLeadid = Lead::where(['id'=>$leadIdInput])->first();
        $matchLeadid->assigned_staff = $users;
        $matchLeadid->assigned_date = Carbon::now()->toDateString();



        
        $userNames = [];
        foreach($users as $single){
            $matchUserid = User::where(['id'=>$single])->first();
            $userNames[] = $matchUserid->name;            
        }
        // dd($userNames);
        $stringArray = implode(",", $userNames);
        $matchLeadid->assigned_staff_name = $stringArray;

        $matchLeadid->save();


        $dataArray = array('status'=>"Assigned",'lead_id'=>$leadIdInput,'date'=>Carbon::now()->toDateString());
        LeadStatus::create($dataArray);

        return redirect()->back()->with('success_message', 'Lead assigned successfully');
    }






    public function leadStatus(Request $request){  



        $requestvar = $request->all();
        // dd($requestvar);
        $status = $requestvar['status'];
        $leadId = $requestvar['leadId'];
        $date = $requestvar['status_date'];

        $start_date = Carbon::parse($date)->toDateString();
        
        // dd($start_date);
        
        $dataArray = array('status'=>$status,'lead_id'=>$leadId,'date'=>$start_date);
        LeadStatus::create($dataArray);


        // $lead_id = Lead::where(['id'=>$requestvar['leadId'] ])->first();
        // $lead_id->latest_status = $requestvar['status'];

        // $lead_id->save();

        return redirect()->back()->with('success_message','Status updated successfully.');


    }






    public function StatusFilter(Request $request){

        $allUsers = User::all();
        $all = Customer::all();

        $req_date = $request->spantext;
        $start_date_raw = Str::substr($req_date,0,13);
        $end_date_raw = Str::substr($req_date,16,29);  

        return response()->json($end_date_raw, 200);
        

        
       
            $start_date_parse = Carbon::parse($start_date_raw)->toDateString();
            $end_date_parse = Carbon::parse($end_date_raw)->toDateString();


            // $allLeads = LeadStatus::whereBetween('date',[$start_date,$end_date])->get();
            $allLeads = Lead::whereBetween('assigned_date',[$start_date_parse,$end_date_parse])->get();
            // dd($allLeads);
            foreach($allLeads as $item){
            
                $queryGrp = CustomerQuery::where(['lead_id'=>$item->id])->get();
                $item->queryPack = $queryGrp;
    
                // All Status activities 
                $statuses = LeadStatus::where(['lead_id'=>$item->id])->orderBy('id', 'desc')->get();
                // if($statuses){
                //     foreach($statuses as $s){
                //         $s->onlydate = Str::substr($s->date,0,10);

                //     }
                // }            
                $item->statusArr = $statuses ;
    
                
                $laststatus = LeadStatus::where(['lead_id'=>$item->id])->orderBy('id', 'desc')->first();
                if($laststatus){
                    $item->lastS = $laststatus->status;
                    $item->lastD = $laststatus->date;
                }       
                
            }
            
            return response()->json($allLeads, 200);
        // dd($allLeads);
        // return view('admin.lead.all',['all'=>$all,'allUsers'=>$allUsers,'allLeads'=>$allLeads,'tabname'=>'Leads']);
    }

    public function StatusFilter2(Request $request){

        
        $req_date = $request->spantext;        
        // Extract start and end dates from the string
        $dateRange = explode('-', $req_date);

        // Assuming format M/D/YYYY for the date string
        $startDate = Carbon::createFromFormat('n/j/Y', trim($dateRange[0]))->startOfDay();
        $endDate = Carbon::createFromFormat('n/j/Y', trim($dateRange[1]))->endOfDay();

        // $allLeads = LeadStatus::whereBetween('date',[$start_date,$end_date])->get();
        $allLeads = Lead::whereBetween('created_at',[$startDate,$endDate])->get();            
            
        return response()->json(['allLeads'=>$allLeads, 'status'=>200], 200);
        // dd($allLeads);
        // return view('admin.lead.all',['all'=>$all,'allUsers'=>$allUsers,'allLeads'=>$allLeads,'tabname'=>'Leads']);
    }









    public function leadType(Request $request){
        // dd($request->lead_id,$request->lead_type);


        $lid = Lead::where(['id'=>$request->lead_id])->first();
        $lid->type = $request->lead_type;

        $lid->save();
         return redirect()->back()->with('success_message','Lead type updated');
        
    }

    public function deleteLead($id){
        Lead::where(['id'=>$id])->delete();
        return redirect()->back()->with('success_message', 'Lead deleted successfully');
        
    }

}