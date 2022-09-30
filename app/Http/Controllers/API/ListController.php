<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Disability;
use App\Models\Job;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function disability(Request $req)
    {
        $disability=new Disability;
        return $this->send_json($disability->get(),200,'List of Disabilty');
    }
    public function job(Request $req)
    {
        $job=Job::with('disabilty');
        if ($req->has('category')){

        }
        if ($req->has('author')){

        }
        if($req->has('company')){

        }
        if($req->has('disability')){
            $disability=explode(',', $req->disability);
            $job=$job->has('disability',function ($query) use($disability){
                
            });
        }
        if($req->has(['order','by'])){
            $job=$job->orderBy($req->order,$req->by);
        }
        if($req->has(['page_size',"page"])){
            return $this->paginate_json($job->paginate($req->page_size),200,'List of job');
        }
        return $this->send_json($job->get(),200,"LIST OF JOB");
    }
}
