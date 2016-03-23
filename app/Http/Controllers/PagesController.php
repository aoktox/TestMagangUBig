<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function starter(){
        $page_data=[
            "title" => "Starter Page",
            "description" => "Description",
            "current" => "Data siswa"
        ];
        return view('master.layout',$page_data);
    }
}
