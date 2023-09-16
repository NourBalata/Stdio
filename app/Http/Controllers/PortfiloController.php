<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfiloRequest;
use App\Models\Portfilo;
use Illuminate\Http\Request;

class PortfiloController extends Controller
{
   
    public function index()
    {
     
        $data = Portfilo::get();
   
    
        return  view('dashbord.portfilos.index',compact('data')) ;
    }



    public function store(PortfiloRequest $request)
    {
       
        try {

            $data['slug'] = $request->slug;
            $data['title'] = $request->title;
           
       


            if ($request->has('image')) {
                $the_file_path = uploadFile('uploads',$request->image);
                $data['image'] = $the_file_path;
            }
            Portfilo::create($data);

            return response()->json($data);
            // session()->flash('success','The data has been Created successfully');
            // return redirect()->back();


        } catch (\Exception $ex) {

            return redirect()->back()->with(['error' => $ex->getmessage()]);

        }
    }
    public function update(PortfiloRequest $request, $id)
    {
      
        $portfilo = Portfilo::find($request->portfilo_id);
    
   
        $data['slug'] = $request->slug;
        $data['title'] = $request->title;

            if ($request->has('image')) {
                $the_old_path = $portfilo->getRawOriginal('image');
                if (file_exists('uploads/'.$the_old_path) and !empty($the_old_path)) {
                    unlink('uploads/'.$the_old_path);
                }
                $the_file_path = uploadFile('uploads',$request->image);
                $data['image'] = $the_file_path;
            }

            $portfilo->update($data);


            session()->flash('success','The data has been Updated successfully');
            return redirect()->back();


   
    }

 
    public function destroy(Request $request)
    {
       
        try {

            $portfilo = Portfilo::find($request->portfilo_id);
            //check the not exits
            if (empty($portfilo)) {
                return redirect()->back()->with(['error' => 'Sorry, the data cannot be accessed']);

            }

            if (file_exists('uploads/'.$portfilo->getRawOriginal('image')) and !empty($portfilo->getRawOriginal('image'))) {
                unlink('uploads/'.$portfilo->getRawOriginal('image'));
            }
            $portfilo->delete();
            session()->flash('success','The data has been Deleted successfully');
            return redirect()->back();
        }catch
        (\Exception $ex) {

            return redirect()->back()->with(['error' => $ex->getmessage()]);

        } 
    }
}
