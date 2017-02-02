@extends('layouts.app')

@section('content')

<div class="col-md-8">
    <div class="panel panel-default">
 @if ((Auth::user()->role)!='jobseeker')

            Sign in or  register as a jobseeker to see this page.  
            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                Account log out.
            </a>
            @else

        <div class="panel-heading">
            <span class="text-muted">resume from {{ substr($user->created_at,0,10) }}</span>
        </div>
        <div class="panel-body">
            @if(Session::has('flash_message_resume'))
            <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_resume') !!}</em></div>
            @endif

            <div class="col-sm-8">

                <a> <h1>{{ $user->first_name }} {{ $user->last_name }}  </h1> </a>
                <h2>{{ $user->objective }}
                    @if (!empty($user->salary)) <span class="text-muted nowrap">${{ $user->salary }} per month.</span>@endif 
                </h2>

                <?php

                function getAgeFromDate($date) {
                    return floor((time() - strtotime($date)) / (60 * 60 * 24 * 365.25));
                }
                ?>
                <dl class="dl-horizontal">
                    @if (($user->birth)!='2000-01-01') 
                    <dt>Birth:</dt> 
                    <dd> {{$user->birth}}  <span class="text-muted">({{getAgeFromDate($user->birth)}} years old)</span></dd> @endif
                    <dt>City:</dt>
                    <dd>{{ $user->city }}</dd>
                    <dt>Employment type:</dt>
                    <dd>{{ $user->employment_type }}</dd>
                </dl>  
            </div>




            <div class="pull-right no-pull-xs">
                <p class="add-top">   @if (!empty($user->photo))  <img src="{{asset('/photo/' . $user->photo)}}" width="150" /> @else <img src="{{asset('/photo/nophoto.png')}}" width="150" />  @endif</p>
            </div>


            <div class="col-sm-8">


                <hr/>
                <h2>Experience</h2>
                <h3>{{ $user->exp1_title }}</h3>
                <p>  <i> from {{ $user->exp1_from_month}} {{ $user->exp1_from_year}} to {{ $user->exp1_to_month}} {{ $user->exp1_to_year}} </i> 
                    <br>  &quot;{{$user->exp1_company}}&quot; <br>  </p> <span class="text-muted"> </span>
                {{ $user->exp1_description}}

                <h3>{{ $user->exp2_title }}</h3>
                <p>  <i>  from {{ $user->exp2_from_month}} {{ $user->exp2_from_year}} to {{ $user->exp2_to_month}} {{ $user->exp2_to_year}} </i> </p> <br>
                &quot;{{$user->exp2_company}}&quot;  <span class="text-muted"> </span>
                {{ $user->exp2_description}}

                <hr/>
                <h2>Education</h2>
                <h3>{{ $user->education_occupation}}</h3>
                <p>  <i> from {{ $user->education_from_month}} {{ $user->education_from_year}} to {{ $user->education_to_month}} {{ $user->education_to_year}} </i> </p>
                <span class="text-muted"> </span>
                {{ $user->education_university}}. {{ $user->education_qualification}} 

                <hr/>
                <h2>About</h2>
                <p>  {{ $user->description}} </p>



            </div>   


        </div>
           
    </div>
<a class="btn btn-primary" href="edit/{{$user->id}}" role="button">Update your resume now!</a>
</div> @endif


<div class="col-md-4">


</div>





@endsection
