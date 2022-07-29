<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function register(){
        return view('auth.register');
    }
    public function manage(){

        $data = User::latest()->paginate(5);
    
        return view('admin.manage',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function weeklyreport(){
        $report = DB::table('collection')
        ->get();
              
        view()->share('report',$report);             
        

          PDF::setOptions(['dpi'=>'150','defaultFont'=>'sans-serif']);
          $pdf = PDF::loadView('admin.weeklyreport');
          return $pdf->download('weeklyreport.pdf');
    }

    public function store(Request $request){
     
        $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           
        ]);
       
        $data = new User();
       
            $data->name = $request->name;
            $data->secondname =  $request->secondname;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->usertype = $request->usertype;
            $data->password = Hash::make($request->phone);
            $data->save();
           
            // dd($request);
        return redirect()->back()->with('success','Submit successfully');
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'secondname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'usertype' => 'required',
        ]);

         $post = User::findOrFail($id);
    
        $post->update($request->all());
        $post->save();
    
        return redirect()->route('manage')
                        ->with('success','User updated successfully');
    }
    
    public function edit($id)
    {
        
        $post = User::findOrFail($id);

        return view('admin.edit',compact('post'));
        
    }

    public function view($id)
    {
        
        $post = User::findOrFail($id);
        return view('admin.edit',compact('post'));
        
    }
    public function deleteUser($id)
    {
        $post= User::findOrFail($id);
        $post->delete();
             
        return redirect('manage')->with('success','User has been deleted successfully!!!');
    }



    public function generatereport( $email){

       
        


        $report = DB::table('collection')
        ->where('userId', '=', $email)
        ->get();
       
              view()->share('report',$report);             
              

                PDF::setOptions(['dpi'=>'150','defaultFont'=>'sans-serif']);
                $pdf = PDF::loadView('admin.individualreport');
                return $pdf->download('report.pdf');
                              
    }
   

}
