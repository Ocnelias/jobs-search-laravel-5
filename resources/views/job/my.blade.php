@extends('layouts.app')

@section('content')




<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Your Jobs</h3> </div>
        <div class="panel-body">
            @if ((Auth::user()->role)!='employeer')

            Sign in or  register as an employeer to see this page.  
            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                Account log out.
            </a>
            @else

            @if(Session::has('flash_message_job'))
            <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_job') !!}</em></div>
            @endif





            @foreach($jobs as $job)




            @endforeach

            <a href="{{ url('/job/create') }}" class="navbar navbar-brand">Post a new job now |</a> 
            <a href="{{ url('/company/my') }}" class="navbar navbar-brand">Edit Company profile |</a>
            @endif   </div></div></div>

@endsection
