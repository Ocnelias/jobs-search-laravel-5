<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResumeRequest;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Auth;
use Storage;
use Image;

class ResumeController extends Controller {

    public function __construct() {

        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        function addWhere($where, $add, $and = true) {
            if ($where) {
                if ($and)
                    $where .= " AND $add";
                else
                    $where .= " OR $add";
            } else
                $where = $add;
            return $where;
        }

        $where = "";
        if ($request->objective)
            $where = addWhere($where, "`objective` like '%$request->objective%' ");
        if ($request->search_city)
            $where = addWhere($where, "`city` = '$request->search_city' ");

        if (!empty($request->employment_type))
            $where = addWhere($where, "`employment_type` = '$request->employment_type' ");
        if (!empty($request->education))
            $where = addWhere($where, "`education_qualification` = '$request->education' ");

        if ($request->salary_from)
            $where = addWhere($where, "`salary` >= $request->salary_from");
        if ($request->salary_to)
            $where = addWhere($where, "`salary` <= $request->salary_to");



        $search = User::paginate(10);
        if ($where) {
            $search = User::whereRaw($where)->paginate(10);
        }



        return view('resume.index', compact('search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('resume.create');
    }

    public function preview(ResumeRequest $request) {


        if ($request->has('first_name')) {

            session()->flash('f_name', $request->first_name);



            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = Auth::user()->id . '_' . time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $filename);
                Image::make($image)->save($location);

                session()->flash('photo', $filename);
            }





            return view('resume.preview');
        } else {
            return redirect('resume.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

          $user = User::find(Auth::user()->id);

                    
        $user->contact_email = $request->contact_email;
  

            $user->objective= $request->objective;
            $user->salary=$request->salary;
            $user->employment_type=$request->employment_type;


            $user->first_name=$request->first_name;
            $user->last_name=$request->last_name;
           
            $user->city=$request->search_city;
            $user->birth=$request->birth;
            $user->sex=$request->sex;
            $user->phone=$request->objective;

            $user->education_qualification=$request->education_qualification;
            $user->education_occupation=$request->education_occupation;
            $user->education_university=$request->education_university;
            $user->education_from_month=$request->education_from_month;
            $user->education_from_year=$request->education_from_year;
            $user->education_to_month=$request->education_to_month;
            $user->education_to_year=$request->education_to_year;

            $user->exp1_title=$request->exp1_title;
            $user->exp1_company=$request->exp1_company;
            $user->exp1_from_month=$request->exp1_from_month;
            $user->exp1_to_month=$request->exp1_to_month;
            $user->exp1_from_year=$request->exp1_from_year;
            $user->exp1_to_year=$request->exp1_to_year;
            $user->exp1_description=$request->exp1_description;

            $user->public=$request->public;
         
            $user->description=$request->description;
          
          
          
       

        if ($request->hasFile('file')) {
                $image = $request->file('file');
                $filename = Auth::user()->id . '_' . time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('photo/' . $filename);
                Image::make($image)->save($location);


            $user->photo = $filename;
        }
        

        $user->save();
        
    
        session()->flash('flash_message_resume', 'Your resume has been successfully created!');
        return redirect('resume/my');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::find($id);
        $similar = User::where('objective', 'like', '' . substr($user->objective, 0, 1) . '%')->where('id', '<>', '' . $id . '')->limit(10)->get();
        //dd($similar);
        return view('resume.show', compact('user', 'similar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('resume.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function my() {
        $user = User::find(Auth::user()->id);
        return view('resume.my', compact('user'));
    }

}
