<?php
$categories=[
''=>'No matter',   
'Accounting'=>'Accounting',
'Administrative/Clerical'=>'Administrative/Clerical',
'Arts/Entertainment/Media'=>'Arts/Entertainment/Media',
'Automotive'=>'Automotive',
'Biotechnology'=>'Biotechnology',
'Business'=>'Business',
'Construction'=>'Construction',
'Customer Service'=>'Customer Service',
'Education'=>'Education',
'Engineering'=>'Engineering',
'Executive'=>'Executive',
'Facilities'=>'Facilities',
'Financial Services'=>'Financial Services',
'Government'=>'Government',
'Healthcare'=>'Healthcare',
'Hospitality'=>'Hospitality',
'Human Resources'=>'Human Resources',
'Information Technology'=>'Information Technology',
'Insurance'=>'Insurance',
'Law Enforcement'=>'Law Enforcement',
'Legal'=>'Legal',
'Manufacturing/Production'=>'Manufacturing/Production',
'Marketing'=>'Marketing',
'Other'=>'Other',
'Real Estate'=>'Real Estate',
'Retail/Wholesale'=>'Retail/Wholesale',
'Sales'=>'Sales',
'Science'=>'Science',
'Telecommunications'=>'Telecommunications',
'Transportation/Warehouse'=>'Transportation/Warehouse'
    ];
?>
{!! Form::select('categories',$categories, '', ['class' => 'form-control']) !!}



