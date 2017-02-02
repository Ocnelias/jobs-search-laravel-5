@extends('layouts.app')

@section('content')



<div class="col-md-8">
    <div class="panel panel-default">


        <div class="panel-heading">
            <span class="text-muted">Company description </span>
        </div>
        <div class="panel-body">


            <div class="col-sm-8">

                <a> <h1>{{ $company->title }}  </h1> </a>
                <h2>
                </h2>


                <dl class="dl-horizontal">

                    <dt>City:</dt>
                    <dd>{{ $company->city }}</dd>
                    <dt>Category:</dt>
                    <dd>{{ $company->category }}</dd>
                    <dt>Web site:</dt>
                    <dd><a href="http://{{ $company->website }}" target="_blank">{{ $company->website }} </a></dd>
                     <dt>Email:</dt>
                    <dd>{{ $company->email }}</dd>
                     <dt>Phone:</dt>
                    <dd>{{ $company->phone }}</dd>
                </dl>  
            </div>




            <div class="pull-right no-pull-xs">
                <p class="add-top">   @if (!empty($company->logo))  <img src="{{asset('/logo/' . $company->logo)}}" width="64" /> @else <img src="{{asset('/logo/nologo.jpg')}}" width="64" />  @endif</p>
            </div>


            <div class="col-sm-8">


                <hr/>
                <h2>Description</h2>
                <div style="word-break: break-all">
                    
               
                <p>  {{ $company->description}} </p>
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

            <a href=" ../job/{{$res->id}}">  {{$res->position}}  <span class="glyphicon glyphicon-chevron-right"></span> </a>  <br> 
            {{$res->city}},  @if (!empty($res->salary)) <span class="text-muted nowrap">${{ $res->salary }} per month.</span>@endif    
        </li> </ul>
    @endforeach  
    <hr>   








</div>






@endsection
