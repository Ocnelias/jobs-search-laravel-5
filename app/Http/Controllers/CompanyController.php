<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use DB;
use Auth;
use Storage;
use Image;
use App\Country;
use App\City;
use App\State;
use App\Job;
use App\Firm;
use App\User;

class CompanyController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {




        $companies = Firm::paginate(10);


        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $user_firms = User::find(Auth::user()->id)->firm;

        if (count($user_firms) == 0) {
            return view('company/create');
        } else {
            return redirect('company/my');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request) {

        $firm = new Firm;

        $firm->title = $request->title;
        $firm->city = $request->search_city;
        $firm->category = $request->categories;
        $firm->website = $request->website;
        $firm->email = $request->email;
        $firm->phone = $request->phone;
        $firm->show_website = $request->show_website;
        $firm->show_email = $request->show_email;
        $firm->show_phone = $request->show_phone;
        $firm->description = $request->description;
        $firm->user_id = Auth::user()->id;


        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = Auth::user()->id . '_' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('logo/' . $filename);
            Image::make($image)->save($location);

            $firm->logo = $filename;
        }


        $firm->save();




        // Firm::create($request->all());
        session()->flash('flash_message', 'Your company has been successfully added!');
        return redirect('company/my');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {


        $company = Firm::find($id);
        $company_jobs = Job::where('firm_id', '=', '' . $id . '')->limit(10)->get();

        return view('company.show', compact('company', 'company_jobs'));
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


        $company = User::find(Auth::user()->id)->firm;

        $company_jobs = Job::where('firm_id', '=', '' . $company->id . '')->limit(10)->get();


        if (count($company) == 0) {
            return redirect('company/create');
        } else {
            return view('company/my', compact('company', 'company_jobs'));
        }
    }

}
