@extends('layouts.app')

@section('content')







<div class="col-md-8">

    <div class="panel panel-default">
        <div class="panel-heading"><h3>List of vacancies</h3> </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-md-9">
                    <h4 class="add-top text-basic text-muted">
                        found positions: {{ $search->total() }}</h4>
                </div>
                <div class="col-xs-2 col-sm-3 col-md-3">
                    <div class="add-top dropdown pull-right">

                        <a href="javascript:;" class="dropdown-toggle" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"><span class="hidden-xs">Sort by</span><span class="hidden-xs glyphicon glyphicon-chevron-down glyph-indent"></span><span class="glyphicon glyphicon-cog visible-xs-inline-block text-muted"></span></a>

                        <ul id="sort" class="dropdown-menu s" role="menu">

                            <li class="active"><a href="/job/?sort=1">date from newest to oldest</a></li>
                            <li><a href="?sort=2">salary from high to low</a></li>
                            <li><a href="/job/?sort=3">salary from low to high </a></li>
                            <li><a href="/job/?sort=4">name</a></li>



                            <li role="separator" class="divider"></li>
                        </ul>
                    </div>
                </div>
            </div>




            <hr>
            <div id="show_sort"> 
                @foreach($search as $job)


                <h2>
                    <img src="{{asset('/images/' . $job->firm->logo)}}" width="64" height="64" />

                    <a href="job/{{$job->id}}"> {{ $job->position}}</a><span class="text-muted"><span >,</span><span class="nowrap"> ${{ $job->salary}}&nbsp;</span></span>
                </h2>

                <div>
                    <span>{{ $job->firm->title}}</span>&nbsp;
                    <span class="text-muted ">· </span>
                    <span >{{ $job->city}}<span class="text-muted">&nbsp;&middot;&nbsp;</span>
                        <span> posted {{ Carbon\Carbon::parse($job->created_at)->diffForHumans() }} </span>


                </div>

                <div style="word-break: break-all">
                    <div class="text-muted overflow"> 
                        {!! substr(strip_tags($job->description,'<p><strong> <ul> <li>'), 0, 200) !!}...
                                        </div>
                                        <a href="job/{{$job->id}}">
                                            <span class="glyphicon glyphicon-chevron-right"></span></a></div> 


                                        <hr><hr>


                                        @endforeach

                                        {!! $search->appends(request()->all())->render(); !!}
                                        </div> </div>


                                        </div>  </div> 




                                        <div class="col-md-4">


                                            <h4>Filter by: </h4> <hr>




                                            {!! Form::open(['method' => 'GET', 'action' => 'JobController@index']) !!}



                                            <div class="form-group">
                                                {!! Form::label('keywords','Keywords' ) !!}
                                                {!! Form::text('keywords', null, array('class' => 'form-control')) !!}
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
                                                {!! Form::label('salary','Salary') !!} <br>
                                                <input name="salary_from" id="search_job" class="typeahead form-control" placeholder="from" style="margin:5px;width:70px;" type="text">

                                                <input name="salary_to" id="search_city" class="typeahead form-control" placeholder="to"  style="margin:5px;width:70px;" type="text">
                                            </div>



                                            <input type="submit" name="filter" value="filter" class="btn btn-primary form-control">  </button>

                                            {!! Form::close() !!}




                                        </div>

                                        @endsection
