@extends('layouts.app')

@section('content')






<div class="text-center" >
    <form class="form-inline" action="{{url('/job')}}">
        <div class="form-group">
            <input name="search_job" id="search_job" class="typeahead form-control" placeholder="start typing the job" style="margin:5px;width:300px;" type="text">
        </div>
        <div class="form-group">
            <input name="search_city" id="search_city" class="typeahead form-control" placeholder="start typing the city"  style="margin:5px;width:300px;" type="text">
        </div>

        <button type="submit" name="mainsearch" value="mainsearch" class="btn btn-primary"> <i class="fa fa-hand-o-right" aria-hidden="true"></i> Find </button>
    </form>

</div>


<div class="text-center">
    <a href="{{ url('/job') }}" class="">advanced search</a> 
</div>

<div class="col-xs-4">
<h4> By Categories </h4>
@foreach ($cats as $cat)
<ul>        
    <li> 
        <a href="{{ url('/job?search_category='.$cat->category.'') }}"> {{$cat->category}}  </a> 
        ({{$cat->user_count}})
    </li>
</ul>
@endforeach
</div>


 <div class="col-xs-4">
     <h4> By Cities </h4>
   <div id="mymap"></div>
  </div>

<div class="col-xs-4">
<h4> By Companies </h4>
@foreach ($firms as $firm)
<ul>        
    <li> 
        <a href="{{ url('/company/'.$firm->id.'') }}"> {{$firm->title}}  </a> 
 
    </li>
</ul>

@endforeach
</div>



<script type="text/javascript">


    var locations = <?php print_r(json_encode($locations)) ?>;

    var mymap = new GMaps({
      el: '#mymap',
      lat: 38.000000,
      lng: -77.000000,
      zoom:7
    });

    $.each( locations, function( index, value ){
	    mymap.addMarker({
	      lat: value.lat,
	      lng: value.lng,
	      title: value.city,
	      click: function(e) {
	      window.location.href = 'job?search_city='+value.city+'';
               
               }
	    });
   });

  </script>
  
 
</script>
  
  
 
  
 
  
@endsection