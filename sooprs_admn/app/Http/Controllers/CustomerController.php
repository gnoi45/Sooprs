<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\CustomerQuery;
use App\Models\JoinProfessional;


class CustomerController extends Controller
{
    public function allCustomers(){
        $all = JoinProfessional::where(['is_buyer'=>1])->orderBy('id','desc')->get();
        // $itsQueries = [];
        foreach($all as $x){
            $allQueries = CustomerQuery::where(['customer_id'=>$x->id])->get();
            $x->itsQueries = $allQueries;
        }
        
       return view('admin.customer.all',['all'=>$all,'tabname'=>'Customers']);
    }

    public function geteditCustomer($id){

        $prof = JoinProfessional::where(['id'=>$id])->first();
        
        return view('admin.customer.edit',['prof'=>$prof]);

    }

    public function posteditCustomer(Request $request){
        $request->validate([
            'id'=>'required|integer',
            'name'=>'required|string',
            'email'=>'required|email',
            'mobile'=>'required',                  
            'is_verified'=>'required',
            'wallet'=>'nullable',
        ]);

        $data = $request->all();

        $prof = JoinProfessional::where(['id'=>$request->id])->first();

        
        
        if( $prof->update($data)){
            return redirect()->back()->with('success','customer details updated successfully');            
        }

        return redirect()->back()->with('error','Problem updating customer');


    }
}
