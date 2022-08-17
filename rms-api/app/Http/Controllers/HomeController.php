<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponseWithHttpSTatus;
use App\Models\Category;
use App\Models\MainJobDescription;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    use ApiResponseWithHttpSTatus;
    public function index()
    {
        $data['categories'] = Category::where(['status'=>'active'])->take(8)->get();
        $data['featured_job'] = MainJobDescription::where(['status'=>'active','is_featured'=>true])->get()->random(6);
        $data['latest'] = MainJobDescription::where(['status'=>'active'])->latest('created_at')->get()->random(6);
        return $this->apiResponse('success',$data,Response::HTTP_OK,true);
    }
    public function getAllJobs()
    {
        $data['job'] = MainJobDescription::where(['status'=>'active'])->get();
        return $this->apiResponse('success',$data,Response::HTTP_OK,true);
    }
    public function getSingleJobDetails($slug)
    {
        $data['job'] = MainJobDescription::where(['slug'=>$slug])->with('category')->first();
        $j_cat_id=$data['job']->cat_id;
        //echo $j_cat_id;
        $data['similar'] = MainJobDescription::where(['status'=>'active','cat_id'=>$j_cat_id])->get()->random(2);
        return $this->apiResponse('success',$data,Response::HTTP_OK,true);
    }

}
