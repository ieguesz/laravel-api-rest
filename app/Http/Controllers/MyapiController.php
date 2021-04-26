<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Business;
use App\Category;
use App\User;
use DB;
use Illuminate\Http\Request;

class MyapiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $json = array("detalle" =>'no encontrado');

        return json_encode($json,true);
    }

    public function apiBusiness($id = null)
    {
        if($id!=null){
            $busi = Business::select('id_business as id','name_busi as business')->findOrFail($id);
        }else{
            $busi = Business::select('id_business as id','name_busi as business')->get();
        }

        $json = array(
                "status"=> 200,
                "total_records"=> $id!=null? "1" : count($busi),
                "details"=>$busi
            );
        return json_encode($json, true);
    }

    public function apiUsers($id = null)
    {
        if($id!=null){
        $users = User::join('business', 'users.id_business','=','business.id_business')->select('id_user as id','name_user as user','name_busi as work_company')->findOrFail($id);
        }else{
        $users = User::join('business', 'users.id_business','=','business.id_business')->select('id_user as id','name_user as user','name_busi as work_company')->get();
        }
        $json = array(
                "status"=> 200,
                "total_records"=> $id!=null? "1" : count($users),
                "details"=>$users
            );
        return json_encode($json, true);
    }

    public function apiCategory($id = null)
    {
        if($id!=null){
        $cate = Category::join('business', 'categories.id_business','=','business.id_business')->select('id_category as id','name_cate as category','name_busi as business')->findOrFail($id);
        }else{

        $cate = Category::join('business', 'categories.id_business','=','business.id_business')->select('id_category as id','name_cate as category','name_busi as business')->get();
        }
        $json = array(
                "status"=> 200,
                "total_records"=> $id!=null? "1" : count($cate),
                "details"=>$cate
            );
        return json_encode($json, true);
    }

    public function apiAssignment($id = null)
    {
        if($id!=null){
            $users =  Assignment::join('users', 'assignments.id_user','=','users.id_user')->join('categories', 'assignments.id_category','=','categories.id_category')->select('id_assignment as id','users.name_user as user','categories.name_cate as category_level')->findOrFail($id);
        }else{
            $users =  Assignment::join('users', 'assignments.id_user','=','users.id_user')->join('categories', 'assignments.id_category','=','categories.id_category')->select('id_assignment as id','users.name_user as user','categories.name_cate as category_level')->get();
        }
        // $users = DB::table('assignments')->get();
        $json = array(
                "status"=> 200,
                "total_records"=> $id!=null? "1" : count($users),
                "details"=>$users
            );
        return json_encode($json, true);
    }

    public function apiHierarchyBasic()
    {
        //FORMA 1 estable

        $jerarquia = Business::join('users', 'business.id_business','=','users.id_business')->
        join('categories', 'business.id_business','=','categories.id_business')
         ->join('assignments', function ($join) {
        $join->on('assignments.id_user','=','users.id_user')
             ->on('assignments.id_category','=','categories.id_category');
        })
        ->select('assignments.id_assignment','name_busi','name_user','name_cate')->groupBy('assignments.id_assignment','name_busi','name_user','name_cate')
        // ->orderBy('name_busi', 'asc')
        // ->orderBy('name_user', 'asc')
        ->orderBy('assignments.id_assignment','asc')->get();

        // FORMA 2 Declaracion sql simple = FUNCIONAL
        // $sql = "
        //         SELECT
        //         name_busi AS business,
        //         name_user AS user,
        //         name_cate AS category,
        //         id_assignment AS code
        //         FROM business, users, categories, assignments
        //         WHERE business.id_business=users.id_business AND business.id_business=categories.id_business AND
        //         assignments.id_user=users.id_user AND assignments.id_category=categories.id_category
        //     ";

        // $jerarquia = Business::hydrate(
        //         DB::select( $sql )
        //     );
        //
        $json = array(
                "status"=> 200,
                "total_records"=> count($jerarquia),
                "details"=>$jerarquia
            );
        return json_encode($json, true);
    }

}
