<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
 
    public function index()
    {
     
        $data = User::get();
   
    
        return  view('dashbord.users.index',compact('data')) ;
    }



    public function store(UserRequest $request)
    {
       
        try {

            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = $request->password;
       


         
            User::create($data);

            return response()->json($data);
            // session()->flash('success','The data has been Created successfully');
            // return redirect()->route('products.index');


        } catch (\Exception $ex) {

            return redirect()->back()->with(['error' => $ex->getmessage()]);

        }
    }

    public function update(UserRequest $request, $id)
        {
          
            $user = User::find($request->user_id);
        
       
           
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = $request->password;
       
           
             
    
              
                $user->update($data);
                session()->flash('success','The data has been Updated successfully');
                return redirect()->back();
    
    
       
        }
    
     
        public function destroy(Request $request)
        {
           
            try {
    
                $user = User::find($request->user_id);
                //check the not exits
                if (empty($user)) {
                    return redirect()->back()->with(['error' => 'Sorry, the data cannot be accessed']);
    
                }
    
                $user->delete();
                session()->flash('success','The data has been Deleted successfully');
                return redirect()->back();
            }catch
            (\Exception $ex) {
    
                return redirect()->back()->with(['error' => $ex->getmessage()]);
    
            } 
        }

}
