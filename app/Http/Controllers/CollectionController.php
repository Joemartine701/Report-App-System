<?php

namespace App\Http\Controllers;


use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
     public function __construct()
    {
        
            $this->middleware('auth');
       
    }
    public function collection(){
        return view('user.collectdetails');
    }
    public function viewreport(){
        $data = Collection::latest()->paginate(5);
    
        return view('user.viewreport',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function customerdetails(){

        $data = Collection::latest()
        ->where('userId', '=', Auth::user()->email)->paginate(5);
    
        return view('user.customerdetails',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request){
    
        $data = new Collection();
        $data->name = $request->input('name');
        $data->secondname = $request->input('secondname');
        $data->phone =  $request->input('phone');
        $data->age =  $request->input('age');
        $data->residence =  $request->input('residence');
        $data->groupname =  $request->input('groupname');
        $data->description = $request->input('description');
        $data->userId =  $request->input('userId');
        $data->save();
             
            
        return redirect()->back()->with('success','Customer details Submited successfully');
    }

}
