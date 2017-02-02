
  $(document).ready(function() {
    var max_fields      = 5; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
  

      
      
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            
             var myDate = new Date();
             
             var year = myDate.getFullYear();
            
	  
               
             
  
            
            $(wrapper).append('<div> \n\
<div class="form-group"> </div>\n\ \n\
{!! Form::label("exp_title", "Job title") !!} \n\
{!! Form::text("exp_title[]", null, array("class" => "form-control")) !!} \n\
\n\</div>\n\
<div class="form-group"> \n\
\n\<div class="form-group"> </div>\n\ \n\
{!! Form::label("exp_company", "Company") !!} \n\
{!! Form::text("exp_company[]", null, array("class" => "form-control")) !!} \n\
\n\</div>\n\
<div class="form-group">\n\
                                {!! Form::label("years", "Years") !!}\n\
                                <div class="form-inline">\n\
                                    <div class="form-group">\n\ <select name="exp1_from_year[]" class ="form-control"> <option value="1">1 </option> <option value="2">2 </option> </select>\n\
                                    </div>\n\
<div class="form-group"> \n\
{!! Form::label("exp_description[]", "Vacancy description") !!}  \n\
{!! Form::textarea("exp_description[]", " ", array("class" => "form-control")) !!} </div> \n\
<a href="#" class="remove_field">Remove</a></div>'); //add input box
         } 
  
        
        
        
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

$('#image').change(function() {
    var input = $(this)[0];
    if ( input.files && input.files[0] ) {
        if ( input.files[0].type.match('image.*') ) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else console.log('is not image mime type');
    } else console.log('not isset files data or files API not supordet');
});
$('#form').bind('reset', function() {
    $('#image_preview').attr('src', '');
});

        $('#edit-modal').on('show.bs.modal', function(e) {
             var objective = $("#objective").val();
             var first_name = $("#first_name").val();
             var last_name = $("#last_name").val();
             var salary=$("#salary").val();
             var birth=$("#birth").val();
             var search_city=$("#search_city").val();
             var employment_type=$("#employment_type").val();
             var  exp1_title=$("#exp1_title").val();
             var  exp1_company=$("#exp1_company").val();
             var  exp1_from_month=$("#exp1_from_month").val();
             var  exp1_to_month=$("#exp1_to_month").val();
             var  exp1_from_year=$("#exp1_from_year").val();
             var  exp1_to_year=$("#exp1_to_year").val();
             var  exp1_company=$("#exp1_company").val();
             var exp1_description=$("#exp1_description").val();
             var education_qualification=$("#education_qualification").val();
             var education_occupation=$("#education_occupation").val();
             var education_university=$("#education_university").val();
             var  education_from_month=$("#education_from_month").val();
             var  education_to_month=$("#education_to_month").val();
             var  education_from_year=$("#education_from_year").val();
             var  education_to_year=$("#education_to_year").val();
             var description=$("#description").val();
            var $modal = $(this),
                esseyId = e.relatedTarget.id;
            
//            $.ajax({
//                cache: false,
//                type: 'POST',
//                url: 'backend.php',
//                data: 'EID='+essay_id,
//                success: function(data) 
//                {
                    $modal.find('.edit-content').html('\n\
                        <div class="col-md-10"> \n\
<div class="col-sm-10"> <a> <h1> '+first_name+' '+last_name+'  </h1> </a> <h3> '+objective+' <span class="text-muted nowrap">$ '+salary+'</span> </h3> \n\
  <dl class="dl-horizontal">\n\
                    <dt>Birth:</dt> \n\
                    <dd>  '+birth+'  </dd> \n\
                    <dt>City:</dt>\n\
                    <dd> '+search_city+' </dd>\n\
                    <dt>Employment type:</dt>\n\
                    <dd>'+employment_type+' </dd>\n\
                </dl>  \n\
 <hr/>\n\
                <h2>Experience</h2>\n\
                <h3>'+exp1_title+' </h3>\n\
\n\ <p>  <i> from '+exp1_from_month+' '+exp1_from_year+' to '+exp1_to_month+' '+exp1_to_year+' </i>  <br> \n\
 &quot;'+exp1_company+'&quot; <br>  </p> '+exp1_description+' \n\
      <hr/>\n\
                <h2>Education</h2>\n\
                <h3>'+education_occupation+'</h3>\n\
                <p>  <i> from '+education_from_month+' '+education_from_year+' to '+education_to_month+' '+education_to_year+' </i> </p>\n\
                <span class="text-muted"> </span>\n\
               '+education_university+'.  '+education_qualification+' \n\
                <hr/>\n\
                <h2>About</h2>\n\
                <p>   '+description+' </p>\n\
\n\
\n\</div> <div class="pull-right no-pull-xs"> <p class="add-top"> <img src="" width="150">    </p> </div> </div>\n\
\n\
\n\
'
            
            );
    
    
    
    
    
    
//                }
//            });
            
        })
   
