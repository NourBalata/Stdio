<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use GuzzleHttp\Psr7\ServerRequest;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
        {
         
            $data = Service::get();
       
        
            return  view('dashbord.services.index',compact('data')) ;
        }



        public function store(ServiceRequest $request)
        {
           
            try {
    
                $data['summary'] = $request->summary;
                $data['title'] = $request->title;
               
           
                if ($request->has('image')) {
                    $the_file_path = uploadFile('uploads',$request->image);
                    $data['image'] = $the_file_path;
                }
                
    
    
                
                Service::create($data);
    
                return response()->json($data);
                // session()->flash('success','The data has been Created successfully');
                // return redirect()->route('products.index');
    
    
            } catch (\Exception $ex) {
    
                return redirect()->back()->with(['error' => $ex->getmessage()]);
    
            }
        }
        public function update(ServiceRequest $request, $id)
        {
          
            $service = Service::find($request->service_id);
        
       
           
            $data['summary'] = $request->summary;
            $data['title'] = $request->title;
    
           
             
    
                if ($request->has('image')) {
                    $the_old_path = $service->getRawOriginal('image');
                    if (file_exists('uploads/'.$the_old_path) and !empty($the_old_path)) {
                        unlink('uploads/'.$the_old_path);
                    }
                    $the_file_path = uploadFile('uploads',$request->image);
                    $data['image'] = $the_file_path;
                }
                $service->update($data);
                session()->flash('success','The data has been Updated successfully');
                return redirect()->back();
    
    
       
        }
    
     
        public function destroy(Request $request)
        {
           
            try {
    
                $service = Service::find($request->service_id);
                //check the not exits
                if (empty($service)) {
                    return redirect()->back()->with(['error' => 'Sorry, the data cannot be accessed']);
    
                }
    
                $service->delete();
                session()->flash('success','The data has been Deleted successfully');
                return redirect()->back();
            }catch
            (\Exception $ex) {
    
                return redirect()->back()->with(['error' => $ex->getmessage()]);
    
            } 
        }
}
