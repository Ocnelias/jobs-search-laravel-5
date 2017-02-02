@extends('layouts.app')

@section('content')




<div class="col-md-8">

    <div class="panel panel-default">
        <div class="panel-heading"><h3>Сompanies</h3> </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-md-9">
                    <h4 class="add-top text-basic text-muted">
                        registered companies: {{ $companies->total() }}</h4>
                </div>
      
            </div>




            <hr>
            <div id="show_sort"> 
                @foreach($companies as $company)


                <h2>
                    <img src="{{asset('/images/' . $company->logo)}}" width="64" height="64" />

                    <a href="company/{{$company->id}}"> {{ $company->title}}</a>
                </h2>

                <div>
                    <span></span>&nbsp;
                    <span class="text-muted ">· </span>
                    <span >{{ $company->city}}<span class="text-muted">&nbsp;&middot;&nbsp;</span>


                </div>

                <div style="word-break: break-all">
                    <div class="text-muted overflow"> 
                        {!! substr(strip_tags($company->description,'<p><strong> <ul> <li>'), 0, 200) !!}...
                                        </div>
                                        <a href="company/{{$company->id}}">
                                            <span class="glyphicon glyphicon-chevron-right"></span></a></div> 


                                        <hr><hr>


                                        @endforeach

                                        {!! $companies->appends(request()->all())->render(); !!}
                                        </div> </div>


                                        </div>  </div> 





@endsection
