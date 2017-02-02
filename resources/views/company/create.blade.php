@extends('layouts.app')

@section('content')


<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Company Details</h3> </div>
        <div class="panel-body">

            @if ((Auth::user()->role)!='employeer')

            Sign in or  register as an employeer to see this page.  
            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                Account log out.
            </a>
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

            {!! Form::open(['method' => 'POST', 'action' => 'CompanyController@store','files' => true]) !!}

            <div class="form-group">
                {!! Form::label('title','Company Name' ) !!}
                {!! Form::text('title', null, array('class' => 'form-control','autofocus')) !!}
            </div>

            <div class="form-group">


                {!! Form::label('file','Photo' ) !!}
                <br/><span class="btn btn-default btn-file"> 
                    <div><img alt="" id="image_preview" src=""/></div>
                    <div><input type="file" id="image" name="file"/></div>
                </span>


            </div>


            <div class="form-group">
                {!! Form::label('search_city','City' ) !!}
                {!! Form::text('search_city', null, array('class' => 'form-control', 'id'=>'search_city', 'placeholder'=>'start typing the city')) !!}

            </div>

            <div class="form-group">
                {!! Form::label('category','Main business scope') !!}
                @include ('includes.categories')
            </div>

            <div class="form-group">
                {!! Form::label('website','Website' ) !!}
                {!! Form::text('website', '', array('class' => 'form-control'))!!}
                {!! Form::checkbox('show_website', 1, true) !!}  show to registered users
            </div>




            <div class="form-group">
                {!! Form::label('email','Email' ) !!}
                {!! Form::text('email', null, array('class' => 'form-control')) !!}
                {!! Form::checkbox('show_email', 1) !!}  show to registered users
            </div>


            <div class="form-group">
                {!! Form::label('phone','Phone' ) !!}
                {!! Form::text('phone', null, array('class' => 'form-control')) !!}
                {!! Form::checkbox('show_phone', 1) !!}  show to registered users
            </div>



            <div class="form-group">
                {!! Form::label('description', 'Tell about your company') !!}
                {!! Form::textarea('description', ' About us:',
                array('class' => 'form-control')) !!}
            </div>



            <div class="form-group">
                {!! Form::label('agree', 'You have to agree with our Terms and Conditions ') !!}
                <br/>
                {!! Form::checkbox('agree', 'yes') !!} 
                I accept <a class="" href="{{ url('./terms') }}" target="_blank"> the Terms and Conditions </a>
            </div>


            <div class="form-group">

                {!! Form::submit('Submit!', array('class' => 'btn btn-primary form-control ')) !!}
            </div>




            {!! Form::close() !!}
            @endif 
        </div></div></div>

@endsection
