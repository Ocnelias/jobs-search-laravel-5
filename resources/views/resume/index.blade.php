@extends('layouts.app')

@section('content')







<div class="col-md-8">

    <div class="panel panel-default">
        <div class="panel-heading"><h3>List of resumes</h3> </div>
        <div class="panel-body">


            <hr>
            <div id="show_sort"> 
                @foreach($search as $res)


                <h2>
                    <span class="text-muted"> 
                        <a href="resume/{{$res->id}}">{{ $res->first_name }} {{ $res->last_name }} </a>
                    </span> 

                    <br>{{ $res->objective }}<span class="text-muted"><span >,</span><span class="nowrap"> ${{ $res->salary}}&nbsp;</span></span>
                </h2>



                <div style="word-break: break-all">
                    <div class="text-muted overflow"> 
                        {!! substr(strip_tags($res->description,'<p><strong> <ul> <li>'), 0, 200) !!}...
                                        </div>
                                        <a href="{{$res->id}}">
                                            <span class="glyphicon glyphicon-chevron-right"></span></a></div> 


                                        <hr><hr>


                                        @endforeach

                                        {!! $search->appends(request()->all())->render(); !!}
                                        </div> </div>


                                        </div>  </div> 




                                        <div class="col-md-4">


                                            <h4>Filter by: </h4> <hr>




                                            {!! Form::open(['method' => 'GET', 'action' => 'ResumeController@index']) !!}



                                            <div class="form-group">
                                                {!! Form::label('objective','Objective' ) !!}
                                                {!! Form::text('objective', null, array('class' => 'form-control')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('city','City') !!}
                                                {!! Form::text('search_city', null, array('class' => 'form-control','id' => 'search_city','placeholder' => 'start typing the city')) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('category','Category') !!}
                                                @include ('includes.categories')
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('employment_type', 'Employment type') !!}
                                                {!! Form::select('employment_type',[''=>'No matter','Full-time'=>'Full-time','Part-time'=>'Part-time','Remote'=>'Remote','Temporary'=>'Temporary'], 'No matter', ['class' => 'form-control']) !!}
                                            </div>


                                            <div class="form-group">
                                                {!! Form::label('education', 'Education') !!}
                                                {!! Form::select('education',[''=>'No matter','High school or equivalent'=>'High school or equivalent','Associate'=>'Associate','Bachelor'=>'Bachelor','Master'=>'Master','Doctor'=>'Doctor'], 'No matter', ['class' => 'form-control']) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('experience', 'Experience') !!}
                                                {!! Form::select('experience',['No matter','<0,5 year','0,5-1 year','1-2 years','2-3 years','3-5 years','5-10 years','10 years'], 'No matter', ['class' => 'form-control']) !!}
                                            </div>



                                            <div class="form-inline">
                                                {!! Form::label('salary','Salary requirements') !!} <br>
                                                <input name="salary_from" id="search_job" class="typeahead form-control" placeholder="from" style="margin:5px;width:70px;" type="text">

                                                <input name="salary_to" id="search_city" class="typeahead form-control" placeholder="to"  style="margin:5px;width:70px;" type="text">
                                            </div>



                                            <input type="submit" name="filter" value="filter" class="btn btn-primary form-control">  </button>

                                            {!! Form::close() !!}




                                        </div>

                                        @endsection
