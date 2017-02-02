<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;
use DB;
use Auth;
use App\Country;
use App\City;
use App\State;
use App\Job;
use App\User;
use App\Firm;
use Response;

class JobController extends Controller {

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
        if ($request->keywords)
            $where = addWhere($where, "`position` like '%$request->keywords%' ");
        if ($request->search_city)
            $where = addWhere($where, "`city` = '$request->search_city' ");
        if (!empty($request->categories))
            $where = addWhere($where, "`category` = '$request->categories' ");
        if (!empty($request->employment_type))
            $where = addWhere($where, "`employment_type` = '$request->employment_type' ");
        if (!empty($request->education))
            $where = addWhere($where, "`education` = '$request->education' ");
        if (!empty($request->experience))
            $where = addWhere($where, "`experience` = '$request->experience' ");
        if ($request->salary_from)
            $where = addWhere($where, "`salary` >= $request->salary_from");
        if ($request->salary_to)
            $where = addWhere($where, "`salary` <= $request->salary_to");
        if ($request->search_category)
            $where = addWhere($where, "`category` = '$request->search_category' ");
        if ($request->search_job)
            $where = addWhere($where, "`position` like '%$request->search_job%' ");




        $search = Job::paginate(10);
        if ($where) {
            $search = Job::whereRaw($where)->paginate(10);
        }


        // $search = Job::orderBy('position','asc')->paginate(10);
        //  dd($search);

        return view('job.index', compact('search'));
    }

    public function sort(Request $request) {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $user_firms = User::find(Auth::user()->id)->firm;

      
        //$states = DB::table("cities")->where('iso2','us')->groupBy('province')->lists('province','id');
        // $states = DB::table("states")->pluck("name", "id");


        return view('job.create', compact('user_firms'));
    }

    public function store(JobRequest $request) {
        $user_firms = User::find(Auth::user()->id)->firm;


        $job = new Job;

        $job->position = $request->position;
        $job->city = $request->search_city;
        $job->category = $request->categories;
        $job->salary = $request->salary;
        $job->employment_type = $request->employment_type;
        $job->education = $request->education;
        $job->experience = $request->experience;
        $job->description = $request->description;
        $job->firm_id = $user_firms->id;
        $job->save();


     
        session()->flash('flash_message_job', 'Your Job has been successfully added!');
        return redirect('company/my');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $job = Job::find($id);
        $similar = Job::where('position', 'like', '' . substr($job->position, 0, 1) . '%')->where('id', '<>', '' . $id . '')->limit(5)->get();
        $company_jobs = Job::where('firm_id', '=', '' . $job->firm->id . '')->where('id', '<>', '' . $id . '')->limit(5)->get();

        return view('job.show', compact('job', 'similar', 'company_jobs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
    }

    public function update(Request $request, $id) {
        
    }

    /**
     * Get country's cities.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function my() {
    

        return view('job.my');
    }

    public function find(Request $request) {
        return Job::search($request->get('q'))->get();
    }

  

}
