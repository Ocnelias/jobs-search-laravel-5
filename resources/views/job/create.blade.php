@extends('layouts.app')

@section('content')




<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Post a job</h3> </div>
        <div class="panel-body">

   @if ((Auth::user()->role)!='employeer')

            Sign in or  register as an employeer to see this page.  
            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                Account log out.
            </a>
            @else

            @if (count($user_firms)==0)

            <a href="{{ url('/company/create') }}" class="navbar navbar-brand">First add your company</a>

            @else
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {!! Form::open(['method' => 'POST', 'action' => 'JobController@store']) !!}

            <div class="form-group">
                {!! Form::label('position','Position' ) !!}
                {!! Form::text('position', null, array('class' => 'form-control','autofocus')) !!}
            </div>


            <div class="form-group">
                {!! Form::label('category','Category') !!}
                @include ('includes.categories')
            </div>

            <div class="form-group">
                                  {!! Form::label('city','City') !!}
                                  {!! Form::text('search_city', null, array('class' => 'form-control','id' => 'search_city','placeholder' => 'start typing the city')) !!}
             </div>

         
            
            
              <div class="form-group">
                {!! Form::label('salary','Salary, USD per month' ) !!}
                {!! Form::text('salary', null, array('class' => 'form-control')) !!}
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
                {!! Form::select('experience',[''=>'No matter','<0,5'=>'<0,5 year','0,5-1'=>'0,5-1 year','1-2'=>'1-2 years','2-3'=>'2-3 years','3-5'=>'3-5 years','5-10'=>'5-10 years','>10'=>'10 years'], 'No matter', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Vacancy description') !!}
                {!! Form::textarea('description', '<p>Requirements:</p> <p> Working conditions: </p>  <p> Job responsibilities: </p>  ',
                array('class' => 'form-control')) !!}
            </div>



            <div class="form-group">
                {!! Form::label('agree', 'You have to agree with our Terms and Conditions ') !!}
                <br/>
                {!! Form::checkbox('agree', 'yes') !!} 
                I accept <a class="" href="{{ url('./terms') }}" target="_blank"> the Terms and Conditions </a>
            </div>


            <div class="form-group">
                {!! Form::submit('Submit!', array('class' => 'btn btn-primary form-control ')); !!}
            </div>



            {!! Form::close() !!}




            @endif @endif


        </div> </div> </div> 



@endsection
