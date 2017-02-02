@extends('layouts.app')

@section('content')



<div class="col-md-8">
    <div class="panel panel-default">


        <div class="panel-heading">
            <span class="text-muted">Job        <span> posted {{ Carbon\Carbon::parse($job->created_at)->diffForHumans() }} </span> </span>
        </div>
        <div class="panel-body">


            <div class="col-sm-8">

                <a> <h1>{{ $job->position }}  </h1> </a>
                <h2>
                    @if (!empty($job->salary)) <span class="text-muted nowrap">${{ $job->salary }} per month</span>@endif 
                </h2>


                <dl class="dl-horizontal">

                    <dt>Company:</dt> 
                    <dd><a href="../company/{{$job->firm->id}}">  {{ $job->firm->title }} </a> <span class="text-muted"></span></dd> 
                    <dt>City:</dt>
                    <dd>{{ $job->city }}</dd>
                    <dt>Employment:</dt>
                    <dd>{{ $job->employment_type }}</dd>
                    <dt>Experience:</dt>
                    <dd>{{ $job->experience }}</dd>
                    <dt>Education:</dt>
                    <dd>{{ $job->education }}</dd>
                </dl>  
            </div>




            <div class="pull-right no-pull-xs">
                <p class="add-top">   @if (!empty($job->firm->logo))  <img src="{{asset('/logo/' . $job->firm->logo)}}" width="64" /> @else <img src="{{asset('/logo/nologo.jpg')}}" width="64" />  @endif</p>
            </div>


            <div class="col-sm-8">


                <hr/>
                <h2>Description</h2>
                <div style="word-break: break-all"> 
                <p>  {{ $job->description}} </p>
                </div>


            </div>   


        </div>
    </div>
</div>


<div class="col-md-4">
    <h4> Active vacancies of this company: </h4> <hr>
    @foreach($company_jobs as $res)
    <ul>

        <li> 

            <a href=" {{$res->id}}">  {{$res->position}}  <span class="glyphicon glyphicon-chevron-right"></span> </a>  <br> 
            {{$res->city}},  @if (!empty($res->salary)) <span class="text-muted nowrap">${{ $res->salary }} per month.</span>@endif    
        </li> </ul>
    @endforeach  
    <hr>   

    <h4>Similar jobs: </h4> <hr>




    @foreach($similar as $res)


    <ul>

        <li> 

            <a href=" {{$res->id}}">  {{$res->position}}  <span class="glyphicon glyphicon-chevron-right"></span> </a>  <br> 
            {{$res->city}},  @if (!empty($res->salary)) <span class="text-muted nowrap">${{ $res->salary }} per month.</span>@endif    
        </li> </ul>
    @endforeach






</div>






@endsection
