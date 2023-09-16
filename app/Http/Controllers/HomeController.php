<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\About;
use App\Models\Message;
use App\Models\Portfilo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
       
    
       $portfilo=Portfilo::paginate(6);
       $abouts=About::paginate(5);
      

        return view('index',compact('portfilo','abouts'));
    }


    public function store(MessageRequest $request)
    {
       
      

            $data['name'] = $request->name;
            $data['phone'] = $request->phone;
            $data['email'] = $request->email;
            $data['note'] = $request->note;


        

            Message::create($data);

            return response()->json($data);
        


        } 
    }



