<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
     
        $data = Team::get();
   
    
        return  view('dashbord.teams.index',compact('data')) ;
    }



    public function store(TeamRequest $request)
    {
       
        try {

            $data['title'] = $request->title;
            $data['slug'] = $request->slug;
           
            if ($request->has('image')) {
                $the_file_path = uploadFile('uploads',$request->image);
                $data['image'] = $the_file_path;
            }


         
            Team::create($data);

            return response()->json($data);
            // session()->flash('success','The data has been Created successfully');
            // return redirect()->route('products.index');


        } catch (\Exception $ex) {

            return redirect()->back()->with(['error' => $ex->getmessage()]);

        }
    }
    public function update(TeamRequest $request, $id)
    {
      
        $team = Team::find($request->team_id);
    
   
       
        $data['title'] = $request->title;
            $data['slug'] = $request->slug;

      
            $team->update($data);


            session()->flash('success','The data has been Updated successfully');
            return redirect()->back();


   
    }

 
    public function destroy(Request $request)
    {
       
      

            $team = Team::find($request->team_id);
            //check the not exits
            if (empty($team)) {
                return redirect()->back()->with(['error' => 'Sorry, the data cannot be accessed']);

            }

         
            $team->delete();
            session()->flash('success','The data has been Deleted successfully');
            return redirect()->back();
        }


}
