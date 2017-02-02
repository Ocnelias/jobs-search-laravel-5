<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Job search</title>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">	 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  
    <script src="http://maps.google.com/maps/api/js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>



    <script src="{{ asset('/js/bootstrap-filestyle.min.js') }}" type="text/javascript" charset="utf-8" ></script>	
    <script src="{{ asset('/js/ckeditor/ckeditor.js') }}" type="text/javascript" charset="utf-8" ></script>
    <link href="{{ asset('/css/main.css') }}"  rel="stylesheet" type="text/css" />



</head>


<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> Job Search</a>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Jobseeker<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('resume/my') }}">My resume</a></li>


                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('resume/create') }}"> Create a resume <span class="sr-only">(current)</span></a>
                    </li>
                    <li>
                        <a href="{{ url('company') }}"> Show companies <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Employer<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('company/my') }}">Company Profile</a></li>

                            <li class="divider"></li>
                            <li><a href="{{ url('job/my') }}">My jobs</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('job/response') }}">Responses to job</a></li>
                            <li class="divider"></li>

                        </ul>
                    </li>
                    <li>
                    <li>
                        <a href="{{ url('job/create') }}">Post a job <span class="sr-only">(current)</span></a>

                    </li>
                    <li>
                        <a href="{{ url('resume') }}">Show resumes <span class="sr-only">(current)</span></a>

                    </li>
                </ul>




                <ul class="nav navbar-nav navbar-right">


                    <!-- Authentication Links -->
                    @if (Auth::guest())

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Join us<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">

                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>


                        </ul>
                    </li>

                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/home') }}">Control panel</a></li>

                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav> 







    <div class="container">
        @yield('content')
    </div>

    <script type="text/javascript">
        var path = "{{ route('autocompletec') }}";
        $('#search_city').typeahead({
            hint: true,
            highlight: true,
            minLength: 1,
            source: function (query, process) {
                return $.get(path, {query: query}, function (datac) {
                    return process(datac);
                });
            }
        });
    </script>

    <script type="text/javascript">
        var path2 = "{{ route('autocomplete') }}";
        $('#search_job').typeahead({
            hint: true,
            highlight: true,
            minLength: 1,
            source: function (query, process) {
                return $.get(path2, {query: query}, function (data) {
                    return process(data);
                });
            }
        });

    </script>
    <script src="{{ asset('/js/main.js') }}" type="text/javascript" charset="utf-8" ></script>

    <script>  var editor = CKEDITOR.replace('description');</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</body>



