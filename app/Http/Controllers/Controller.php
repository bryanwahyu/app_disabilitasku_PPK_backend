<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function paginate_json($data,Int $code,String $msg)
    {
        $json['data']=$data->items();
        $json['paginate']=[
            'next_page_url'  => $data->nextPageUrl(),
            'prev_page_url' => $data->previousPageUrl(),
            'total'        => $data->total(),
            'per_page'     => $data->perPage(),
            'current_page' => $data->currentPage(),
            'last_page'    => $data->lastPage(),
        ];
        $json['code']=$code;
        $json['message']=$msg;

        return response()->json($json,200);
    }
    public function send_json($data,Int $code,String $msg)
    {
        $json['data']=$data;
        $json['code']=$code;
        $json['message']=$msg;
        return response()->json($json,$code);
    }
}
