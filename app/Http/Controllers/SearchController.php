<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;
use App\City;
use App\Firm;
use DB;

class SearchController extends Controller
{
     public function search()
    {
    $cats = Job::select(DB::raw('count(*) as user_count, category'))
                     ->groupBy('category')
                     ->orderBy('category','asc')
                     ->get();
     $locations =  City::where('iso2','US')->get();
     $firms = Firm::orderBy('title','asc')->get();
     
        return view('welcome',compact('cats','locations','firms'));
    
    }
    
    
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $data = Job::distinct()->where("position","LIKE","%{$request->input('query')}%")->pluck('position');
    return response()->json($data);
        
        }
    
    public function autocompletec(Request $request)
    {
        $data = City::where("city","LIKE","%{$request->input('query')}%")->pluck('city');
  
        return response()->json($data);
       
    }
}
