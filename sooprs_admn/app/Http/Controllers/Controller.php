<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\SrService;
use App\Models\SpSkill;

use App\Models\SrServicesNew;


use App\Models\ModelHasRole;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    

    public function authIsAdmin(){

        $auth_user = User::where(['id'=>\Auth::user()->id])->first();
        $auth_user->id;

        $idInModelHasRole = ModelHasRole::where(['model_id'=>$auth_user->id])->first();
        $idInModelHasRole->role_id;

        $authRole = Role::where(['id'=>$idInModelHasRole->role_id])->first();

        // dd($authRole->name);

        return $authRole->name;
    }


    public function allServices()
    {
        $allservices = SrServicesNew::orderBy('id', 'desc')->where(['status' => 1])->get();
        return $allservices;
    }

    public function allSkills()
    {
        $allskills = SpSkill::orderBy('skill_id', 'desc')->where(['status' => 1])->get();
        return $allskills;
    }

    
}
