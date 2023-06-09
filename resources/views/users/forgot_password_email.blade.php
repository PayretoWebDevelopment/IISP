@php
    //sample data
    //$to_name = "Johann Vivas";
    //$to_mail = "dtinternjvivas.payreto@gmail.com";
    //date_default_timezone_set('Asia/Manila');
    //$date = date('m/d/Y h:i:s a', time());
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @if ($is_copy)
        <div class="bg-grey-50">
            You have received a copy of this reset email requested by {{ $to_name }}.
        </div>
    @endif

    <h3> Good day, {{ $to_name }}! </h3>

    <b>We received a request to reset your password on {{ $date }}.</b>
    
    <p class="m-10">Rest assured that we are currently working on  resolving your issue.

    <div>
        Here is the information we recieved from the password reset form submission:
        <ul>
            <li>Email address: {{ $to_mail }}</li>
            <li>Name: {{ $to_name }}</li>
        </ul>
    </div>

    If you did not request a password reset, please email Payreto's technical team at <b>INSERT PAYRETO TECH SUPPORT EMAIL</b> regarding the matter.
    
    <br>
    Thank you!
    </p>
</body>
</html>