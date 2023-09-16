<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

  
        public function index()
        {
         
            $data = About::get();
       
        
            return  view('dashbord.abouts.index',compact('data')) ;
        }



        public function store(AboutRequest $request)
        {
           
         
            $data['title'] = $request->title;
                $data['year'] = $request->year;
       
                $data['summary'] = $request->summary;
           
    
                if ($request->has('image')) {
                    $the_file_path = uploadFile('uploads',$request->image);
                    $data['image'] = $the_file_path;
                }
                
                About::create($data);
    
                return response()->json($data);
                // session()->flash('success','The data has been Created successfully');
                // return redirect()->route('products.index');
    
    
         
        }
        public function update(AboutRequest $request, $id)
        {
          
            $about = About::find($request->about_id);
        
       
           
            $data['year'] = $request->year;
            $data['title'] = $request->title;
            $data['summary'] = $request->summary;
    
                if ($request->has('image')) {
                    $the_old_path = $about->getRawOriginal('image');
                    if (file_exists('uploads/'.$the_old_path) and !empty($the_old_path)) {
                        unlink('uploads/'.$the_old_path);
                    }
                    $the_file_path = uploadFile('uploads',$request->image);
                    $data['image'] = $the_file_path;
                }
    
                $about->update($data);
    
    
                session()->flash('success','The data has been Updated successfully');
                return redirect()->back();
    
    
       
        }
    
     
        public function destroy(Request $request)
        {
           
            try {
    
                $about = About::find($request->about_id);
                //check the not exits
                if (empty($about)) {
                    return redirect()->back()->with(['error' => 'Sorry, the data cannot be accessed']);
    
                }
    
                if (file_exists('uploads/'.$about->getRawOriginal('image')) and !empty($about->getRawOriginal('image'))) {
                    unlink('uploads/'.$about->getRawOriginal('image'));
                }
                $about->delete();
                session()->flash('success','The data has been Deleted successfully');
                return redirect()->back();
            }catch
            (\Exception $ex) {
    
                return redirect()->back()->with(['error' => $ex->getmessage()]);
    
            } 
        }
    }
    

