@extends('layouts.app')

@section('content')




<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Create a new resume</h3> </div>
        <div class="panel-body">



            @if ((Auth::user()->role)!='jobseeker')

            Sign in or  register as a jobseeker to see this page.  
            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                Account log out.
            </a>
            @else


            @if ((Auth::user()->first_name)!=null)

            <a href="{{ url('/resume/my') }}" class="navbar navbar-brand">Review your resume</a>

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

            {!! Form::open(['method' => 'POST', 'action' => 'ResumeController@store','files' => true]) !!}
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" href="#collapse_main">
                                    Main information
                                </a>
                            </h4>
                        </div>
                        <div id="collapse_main" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="form-group">
                                    {!! Form::label('objective','Objective' ) !!}
                                    {!! Form::text('objective', null, array('class' => 'form-control' ,'id' => 'objective')) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('salary','Salary requirements' ) !!}
                                    {!! Form::text('salary', null, array('class' => 'form-control','id' => 'salary')) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('employment_type', 'Employment type') !!}
                                    {!! Form::select('employment_type',[''=>'No matter','Full-time'=>'Full-time','Part-time'=>'Part-time','Remote'=>'Remote','Temporary'=>'Temporary'], 'Full-time', ['class' => 'form-control','id' => 'employment_type']) !!}
                                </div>


                            </div>
                        </div>
                    </div>








                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse"  href="#collapseOne">
                                Personal Information
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('first_name','First name' ) !!}
                                {!! Form::text('first_name', null, array('class' => 'form-control','autofocus','id' => 'first_name')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('last_name','Last name' ) !!}
                                {!! Form::text('last_name', null, array('class' => 'form-control','id' => 'last_name')) !!}
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
                                {!! Form::label('birth','Date of Birth' ) !!}
                                {!! Form::date('birth', '2001-01-01', array('class' => 'form-control','id' => 'birth')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::radio('sex', 'male',array('class' => 'form-control','id' => 'sex'))!!} male
                                {!! Form::radio('sex', 'female',array('class' => 'form-control','id' => 'sex'))!!} female
                            </div>


                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" href="#collapseTwo">
                                Contacts
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('contact_email','Email' ) !!}
                                {!! Form::text('contact_email', null, array('class' => 'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('phone','Phone' ) !!}
                                {!! Form::text('phone', null, array('class' => 'form-control')) !!}
                            </div>



                        </div>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse"  href="#collapseThree">
                                Education
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">



                            <div class="form-group">
                                {!! Form::label('education_qualification', 'Qualification') !!}
                                {!! Form::select('education_qualification',['High school or equivalent'=>'High school or equivalent','Associate'=>'Associate','Bachelor'=>'Bachelor','Master'=>'Master','Doctor'=>'Doctor'], '', ['class' => 'form-control','id' => 'education_qualification']) !!}
                            </div> 

                            <div class="form-group">
                                {!! Form::label('education_occupation', 'Occupation') !!}
                                {!! Form::text('education_occupation', null, array('class' => 'form-control','id' => 'education_occupation')) !!}
                            </div> 

                            <div class="form-group">
                                {!! Form::label('education_university', 'University/College/School') !!}
                                {!! Form::text('education_university', null, array('class' => 'form-control','id' => 'education_university')) !!}
                            </div> 

                            <?php
                            $month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                            function year() {
                                $y = 2020;
                                while ($y >= 1950) {
                                    echo "<option value='" . $y . "'>$y</option>";
                                    $y--;
                                }
                            }
                            ?>



                            <div class="form-group">
                                {!! Form::label('years', 'Years') !!}
                                <div class="form-inline">
                                    <div class="form-group">

                                        from {!! Form::select('education_from_month',$month, '', ['class' => 'form-control','id' => 'education_from_month']) !!}
                                        {!!  Form::selectRange('education_from_year', 2020, 1950,2020, ['class' => 'form-control','id' => 'education_from_year']) !!} 


                                    </div>

                                    <div class="form-group">

                                        &nbsp; to {!! Form::select('education_to_month',$month, '', ['class' => 'form-control','id' => 'education_to_month']) !!}

                                        {!!  Form::selectRange('education_to_year', 2020, 1950,2020, ['class' => 'form-control','id' => 'education_to_year']) !!} 
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>





                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse"  href="#collapse4">
                                Experience


                            </a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse">
                        <div class="panel-body">

                            <div class="form-group">
                                {!! Form::label('exp1_title', 'Job title') !!}
                                {!! Form::text('exp1_title', null, array('class' => 'form-control','id' => 'exp1_title')) !!}
                            </div> 

                            <div class="form-group">
                                {!! Form::label('exp1_company', 'Company') !!}
                                {!! Form::text('exp1_company', null, array('class' => 'form-control','id' => 'exp1_company')) !!}
                            </div> 


                            <div class="form-group">
                                {!! Form::label('years', 'Years') !!}
                                <div class="form-inline">
                                    <div class="form-group">

                                        from {!! Form::select('exp1_from_month',$month, '', ['class' => 'form-control','id' => 'exp1_from_month']) !!}

                                        <select name='exp1_from_year' class ='form-control' id ='exp1_from_year'>
                                            {!! year() !!}
                                        </select>
                                    </div>


                                    <div class="form-group">

                                        &nbsp; to {!! Form::select('exp1_to_month',$month, '', ['class' => 'form-control','id' => 'exp1_to_month']) !!}

                                        <select name='exp1_to_year' class ='form-control' id ='exp1_to_year' >
                                            {!! year() !!}
                                        </select>
                                    </div>
                                </div></div>

                            <div class="form-group">
                                {!! Form::label('exp1_description', 'Vacancy description') !!}
                                {!! Form::textarea('exp1_description', ' ', array('class' => 'form-control','id' => 'exp1_description')) !!}
                            </div>





                            <a class="accordion-toggle" data-toggle="collapse"  href="#collapseadd2">
                                add more experience
                            </a>


                            <div id="collapseadd2" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <div class="form-group">
                                        {!! Form::label('exp2_title', 'Job title') !!}
                                        {!! Form::text('exp2_title', null, array('class' => 'form-control')) !!}
                                    </div> 

                                    <div class="form-group">
                                        {!! Form::label('exp2_company', 'Company') !!}
                                        {!! Form::text('exp2_company', null, array('class' => 'form-control')) !!}
                                    </div> 


                                    <div class="form-group">
                                        {!! Form::label('years', 'Years') !!}
                                        <div class="form-inline">
                                            <div class="form-group">

                                                from {!! Form::select('exp2_from_month',$month, '', ['class' => 'form-control']) !!}

                                                <select name='exp2_from_year' class ='form-control'>
                                                    {!! year() !!}
                                                </select>
                                            </div>


                                            <div class="form-group">

                                                &nbsp; to {!! Form::select('exp2_to_month',$month, '', ['class' => 'form-control']) !!}

                                                <select name='exp2_to_year' class ='form-control'>
                                                    {!! year() !!}
                                                </select>
                                            </div>
                                        </div></div>

                                    <div class="form-group">
                                        {!! Form::label('exp2_description', 'Vacancy description') !!}
                                        {!! Form::textarea('exp2_description', ' ', array('class' => 'form-control')) !!}
                                    </div>



                                    <a class="accordion-toggle" data-toggle="collapse"  href="#collapseadd3">
                                        add more experience
                                    </a>


                                </div>
                            </div>

                            <div id="collapseadd3" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <div class="form-group">
                                        {!! Form::label('exp3_title', 'Job title') !!}
                                        {!! Form::text('exp3_title', null, array('class' => 'form-control')) !!}
                                    </div> 

                                    <div class="form-group">
                                        {!! Form::label('exp3_company', 'Company') !!}
                                        {!! Form::text('exp3_company', null, array('class' => 'form-control')) !!}
                                    </div> 


                                    <div class="form-group">
                                        {!! Form::label('years', 'Years') !!}
                                        <div class="form-inline">
                                            <div class="form-group">

                                                from {!! Form::select('exp3_from_month',$month, '', ['class' => 'form-control']) !!}

                                                <select name='exp3_from_year' class ='form-control'>
                                                    {!! year() !!}
                                                </select>
                                            </div>


                                            <div class="form-group">

                                                &nbsp; to {!! Form::select('exp3_to_month',$month, '', ['class' => 'form-control']) !!}

                                                <select name='exp3_to_year' class ='form-control'>
                                                    {!! year() !!}
                                                </select>
                                            </div>
                                        </div></div>

                                    <div class="form-group">
                                        {!! Form::label('exp3_description', 'Vacancy description') !!}
                                        {!! Form::textarea('exp3_description', ' ', array('class' => 'form-control')) !!}
                                    </div>

                                    <a class="accordion-toggle" data-toggle="collapse"  href="#collapseadd4">
                                        add more experience
                                    </a>


                                </div>
                            </div>  

                            <div id="collapseadd4" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <div class="form-group">
                                        {!! Form::label('exp4_title', 'Job title') !!}
                                        {!! Form::text('exp4_title', null, array('class' => 'form-control')) !!}
                                    </div> 

                                    <div class="form-group">
                                        {!! Form::label('exp4_company', 'Company') !!}
                                        {!! Form::text('exp4_company', null, array('class' => 'form-control')) !!}
                                    </div> 


                                    <div class="form-group">
                                        {!! Form::label('years', 'Years') !!}
                                        <div class="form-inline">
                                            <div class="form-group">

                                                from {!! Form::select('exp4_from_month',$month, '', ['class' => 'form-control']) !!}

                                                <select name='exp4_from_year' class ='form-control'>
                                                    {!! year() !!}
                                                </select>
                                            </div>


                                            <div class="form-group">

                                                &nbsp; to {!! Form::select('exp4_to_month',$month, '', ['class' => 'form-control']) !!}

                                                <select name='exp4_to_year' class ='form-control'>
                                                    {!! year() !!}
                                                </select>
                                            </div>
                                        </div></div>

                                    <div class="form-group">
                                        {!! Form::label('exp4_description', 'Vacancy description') !!}
                                        {!! Form::textarea('exp4_description', ' ', array('class' => 'form-control')) !!}
                                    </div>



                                    <a class="accordion-toggle" data-toggle="collapse"  href="#collapseadd5">
                                        add more experience
                                    </a>


                                </div>
                            </div> 

                            <div id="collapseadd5" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <div class="form-group">
                                        {!! Form::label('exp5_title', 'Job title') !!}
                                        {!! Form::text('exp5_title', null, array('class' => 'form-control')) !!}
                                    </div> 

                                    <div class="form-group">
                                        {!! Form::label('exp5_company', 'Company') !!}
                                        {!! Form::text('exp5_company', null, array('class' => 'form-control')) !!}
                                    </div> 


                                    <div class="form-group">
                                        {!! Form::label('years', 'Years') !!}
                                        <div class="form-inline">
                                            <div class="form-group">

                                                from {!! Form::select('exp5_from_month',$month, '', ['class' => 'form-control']) !!}

                                                <select name='exp5_from_year' class ='form-control'>
                                                    {!! year() !!}
                                                </select>
                                            </div>


                                            <div class="form-group">

                                                &nbsp; to {!! Form::select('exp5_to_month',$month, '', ['class' => 'form-control']) !!}

                                                <select name='exp5_to_year' class ='form-control'>
                                                    {!! year() !!}
                                                </select>
                                            </div>
                                        </div></div>

                                    <div class="form-group">
                                        {!! Form::label('exp5_description', 'Vacancy description') !!}
                                        {!! Form::textarea('exp5_description', ' ', array('class' => 'form-control')) !!}
                                    </div>





                                </div>
                            </div>    




                        </div>
                    </div>
                </div>   



                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse5">
                                About yourself
                            </a>
                        </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('description', 'Tell about yourself') !!}
                                {!! Form::textarea('description','',array('class' => 'form-control')) !!}
                            </div>





                        </div>
                    </div>
                </div>

            </div>





            <div><a class="btn btn-primary" href="#myModal" data-toggle="modal" id="1" data-target="#edit-modal">Preview</a></div>





            <!-- Modal -->
            <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <span class="text-muted">resume from 
                                <script type="text/javascript">
                                    var d = new Date();
                                    var day = d.getDate();
                                    var month = d.getMonth() + 1;
                                    var year = d.getFullYear();
                                    document.write(year + "." + month + "." + day);
                                </script> </span>

                        </div>
                        <div class="modal-body edit-content">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>    


            <div class="form-group">
                <br/>
                {!! Form::checkbox('public', '1', true ) !!} 
                Show your resume to registered users
                <br/>
                {!! Form::checkbox('agree', 'yes') !!} 
                I accept <a class="" href="{{ url('./terms') }}" target="_blank"> the Terms and Conditions </a>
            </div>


            <div class="form-group">
                {!! Form::submit('Create a new resume!', array('class' => 'btn btn-primary form-control ')); !!}
            </div>



            {!! Form::close() !!}




            @endif
            @endif





        </div> </div> </div> 


@endsection
