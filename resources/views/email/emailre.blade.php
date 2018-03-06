<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }

.tabl,.tabl th,.tabl td {
    border: 1px solid black;
}

.table
{
width: 100%;
border: 1px solid #e7ecf1;
margin-bottom: 20px;
max-width: 100%;
background-color: transparent;
border-collapse: collapse;
border-spacing: 0;





}


.conc{
border: 1px solid #55B2D7;
background-color: #32c5d2;
padding: 0px !important;
margin-top: 0px;
margin-bottom: 25px;
margin-top: 0px;
margin-bottom: 25px;
padding: 0px;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
box-shadow: 0 2px 3px 2px rgba(0,0,0,.03);
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
-ms-border-radius: 2px;
-o-border-radius: 2px;
box-sizing: border-box;
-moz-box-sizing: border-box;
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;





}

.portlet-title{

border-bottom: 0;
padding: 0 10px;
margin-bottom: 0;
color: #fff;


border-bottom: 0;
padding: 0 10px;
margin-bottom: 0;
color: #fff;
border-bottom: 1px solid #eee;
padding: 0;
margin-bottom: 10px;
min-height: 41px;
-webkit-border-radius: 4px 4px 0 0;
-moz-border-radius: 4px 4px 0 0;
-ms-border-radius: 4px 4px 0 0;
-o-border-radius: 4px 4px 0 0;
border-radius: 4px 4px 0 0;


border-bottom: 1px solid #eee;
padding: 0;
margin-bottom: 10px;
min-height: 41px;
-webkit-border-radius: 2px 2px 0 0;
-moz-border-radius: 2px 2px 0 0;
-ms-border-radius: 2px 2px 0 0;
-o-border-radius: 2px 2px 0 0;
border-radius: 2px 2px 0 0;

-webkit-box-sizing: border-box;
    box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;




}

.b{background-color: #F4F6F7 !important;}
.w{background-color: #fff !important;}


.td{border: 1px solid #e7ecf1;text-align: center;}
.th{border: 1px solid #e7ecf1;text-align: center;}
.caption{
color: #FFFFFF;

padding: 11px 0 9px;

float: left;
    display: inline-block;
    font-size: 18px;
    line-height: 18px;
    padding: 10px 0;
font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
}






.fa {margin: 5px;}
    </style>
</head>

<?php

$style = [
    /* Layout ------------------------------ */

    'body' => 'margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;',
    'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;',

    /* Masthead ----------------------- */

    'email-masthead' => 'padding: 25px 0; text-align: center;',
    'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;',

    'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;',
    'email-body_inner' => ' max-width: 100%; margin: 0 auto; padding: 0;',
    'email-body_cell' => 'padding: 35px;',

    'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',

    /* Body ------------------------------ */

    'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
    'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;',

    /* Type ------------------------------ */

    'anchor' => 'color: #3869D4;',
    'header-1' => 'margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;',
    'paragraph' => 'margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;',
    'paragraph-sub' => 'margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;',
    'paragraph-center' => 'text-align: center;',

    /* Buttons ------------------------------ */

    'button' => 'display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 25px;
                 text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',

    'button--green' => 'background-color: #22BC66;',
    'button--red' => 'background-color: #dc4d2f;',
    'button--blue' => 'background-color: #3869D4;',
];
?>

<?php $fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;'; ?>

<body style="{{ $style['body'] }}">
    <table style="{{ $style['email-body_inner'] }}" align="center" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="{{ $style['email-wrapper'] }}" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                        <img src="http://207.154.192.87/assets/logo.png" style="min-height:auto; width:100%; border:0; max-width:191px">

                 

                    <!-- Email Body -->
                    <tr>
                        <td style="{{ $style['email-body'] }}" width="100%">









                            <table style="{{ $style['email-body_inner'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="{{ $fontFamily }} {{ $style['email-body_cell'] }}">
                                        <!-- Greeting -->
                                        <h1 style="{{ $style['header-1'] }}">
                                            Welcome to Tayseer Technology Company 
                                        </h1>

                                        <!-- Intro -->

                                            <p style="{{ $style['paragraph'] }}">
                                               

                                            </p>


                                        <!-- table -->

                        <div class="portlet box con green" style="border: 1px solid #55B2D7;">
                                <div class="portlet-title" style="background-color: #55B2D7;">
                                    <div class="caption">
                                        <i class="fa fa-spinner"></i>Private Request</div>
                                    <div class="tools">


                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                        
                                        <!-- <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                                        <a href="javascript:;" class="remove" data-original-title="" title=""> </a> -->
                                    </div>
                                </div>
                                <div class="portlet-body flip-scroll">
                                    <table class="table table-bordered table-striped table-condensed flip-content">
                                        <thead class="flip-content">
                                            <tr style="background-color: #e1e7ea;">
                                                    <th class="th" width="50%"> Feature </th>
                                                    <th class="th"width="50%"> Value </th>
                                          
                                              
                                                </tr>
                                             </thead>
                                             <tbody>
   

                                                <tr  class="w">
                                                    <td class="td">
                                                    company  
                                                        </td>
                                                    <td class="td">
                                                     {{$company}}
                                                       </td>
                                                </tr>

                                              <tr  class="b">
                                                    <td class="td">
                                                    Full Name  
                                                        </td>
                                                    <td class="td">
                                                     {{$name}}
                                                       </td>
                                                </tr>


  

                                                <tr  class="w">
                                                    <td class="td">
                                                    Email  
                                                        </td>
                                                    <td class="td">
                                                     {{$email}}
                                                       </td>
                                                </tr>

                                              <tr  class="b">
                                                    <td class="td">
                                                    Telephone  
                                                        </td>
                                                    <td class="td">
                                                     {{$telephone}}
                                                       </td>
                                                </tr>




                                                <tr  class="w">
                                                    <td class="td">
                                                    Mobile  
                                                        </td>
                                                    <td class="td">
                                                     {{$Mobile}}
                                                       </td>
                                                </tr>

                                              <tr  class="b">
                                                    <td class="td">
                                                    Website  
                                                        </td>
                                                    <td class="td">
                                                     {{$url_website}}
                                                       </td>
                                                </tr>





                                                <tr  class="w">
                                                    <td class="td">
                                                    Annual payment provider  
                                                        </td>
                                                    <td class="td">
                                                     {{$Annual}}
                                                       </td>
                                                </tr>

                                              <tr  class="b">
                                                    <td class="td">
                                                    Monthly installments  
                                                        </td>
                                                    <td class="td">
                                                     {{$installments}}
                                                       </td>
                                                </tr>





                                                <tr  class="w">
                                                    <td class="td">
                                                    Number of establishments  
                                                        </td>
                                                    <td class="td">
                                                     {{$establishments}}
                                                       </td>
                                                </tr>

                                              <tr  class="b">
                                                    <td class="td">
                                                    Storages  
                                                        </td>
                                                    <td class="td">
                                                     {{$storages}}
                                                       </td>
                                                </tr>





                                                <tr  class="w">
                                                    <td class="td">
                                                    Bandwidth  
                                                        </td>
                                                    <td class="td">
                                                     {{$bandwidth}}
                                                       </td>
                                                </tr>

                                              <tr  class="b">
                                                    <td class="td">
                                                    Email Per Month  
                                                        </td>
                                                    <td class="td">
                                                     {{$emailing}}
                                                       </td>
                                                </tr>





                                                <tr  class="w">
                                                    <td class="td">
                                                    Backups  
                                                        </td>
                                                    <td class="td">
                                                     {{$backup}}
                                                       </td>
                                                </tr>

                                              <tr  class="b">
                                                    <td class="td">
                                                    Trial  
                                                        </td>
                                                    <td class="td">
                                                     {{$trial}}
                                                       </td>
                                                </tr>





                                                <tr  class="w">
                                                    <td class="td">
                                                    Domain  
                                                        </td>
                                                    <td class="td">
                                                     {{$domain}}
                                                       </td>
                                                </tr>

                                              <tr  class="b">
                                                    <td class="td">
                                                    Users & Employees  
                                                        </td>
                                                    <td class="td">
                                                     {{$member}}
                                                       </td>
                                                </tr>
{{-- 
'HR'=>$request->hr,
        'Accounts'=>$request->Accounts,
        'Stock'=>$request->stock,
        'CRM'=>$request->crm,
        'Project-management'=>$request->project_management,
        'Manufacturing'=>$request->manufacturing,
        'School'=>$request->school,
                                                
 --}}


{{-- 

                                                <tr  class="b">
                                                    <td class="td">
                                                    HR  
                                                        </td>
                                                    <td class="td">
                                                     {{$hr}}
                                                       </td>
                                                </tr>

<tr  class="b">
                                                    <td class="td">
                                                    Users & Employees  
                                                        </td>
                                                    <td class="td">
                                                     {{$member}}
                                                       </td>
                                                </tr>
<tr  class="b">
                                                    <td class="td">
                                                    Users & Employees  
                                                        </td>
                                                    <td class="td">
                                                     {{$member}}
                                                       </td>
                                                </tr>
<tr  class="b">
                                                    <td class="td">
                                                    Users & Employees  
                                                        </td>
                                                    <td class="td">
                                                     {{$member}}
                                                       </td>
                                                </tr>
<tr  class="b">
                                                    <td class="td">
                                                    Users & Employees  
                                                        </td>
                                                    <td class="td">
                                                     {{$member}}
                                                       </td>
                                                </tr>
<tr  class="b">
                                                    <td class="td">
                                                    Users & Employees  
                                                        </td>
                                                    <td class="td">
                                                     {{$member}}
                                                       </td>
                                                </tr>
 --}}




                                           
                                             </tbody>
                                        </table>
                                    </div>
                                </div>

  <!--end table -->




                                          
                                            </table>
                                   
<!-- Sub Copy -->
                                             <p style="{{ $style['paragraph'] }}">
{{$description}}
                                            </p>
                                            <table style="{{ $style['body_sub'] }}">
                                                <tr>
                                                    <td style="{{ $fontFamily }}">
                                                       

                                         
                                                    </td>
                                                </tr>
                                            </table>
                                  
                                        <!-- Outro -->

                                            {{-- <p style="{{ $style['paragraph'] }}">
                                               Thank you for choosing Tayseer ERPNext System. You may reach Customer Support by visiting http://tayseer-tech.com.sa 
                                            </p>
 --}}

                                        <!-- Salutation -->
                                        <p style="{{ $style['paragraph'] }}">
                                            Regards,<br>{{ config('app.name') }}
                                        </p>

                                        
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td>
                            <table style="{{ $style['email-footer'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="{{ $fontFamily }} {{ $style['email-footer_cell'] }}">
                                        <p style="{{ $style['paragraph-sub'] }}">
                                            &copy; {{ date('Y') }}
                                            <a style="{{ $style['anchor'] }}" href="{{ url('/') }}" target="_blank">{{ config('app.name') }}</a>.
                                            All rights reserved...
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
