<?php
    //sample data
    //$name = "Johann Vivas";
    //$email = "dtinternjvivas.payreto@gmail.com";
    //date_default_timezone_set('Asia/Manila');
    //$date = date('m/d/Y h:i:s a', time());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3> Good day, <?php echo e($name); ?>! </h3>
        <b>We received a request to reset your password on <?php echo e($date); ?>.</b>
        
        <p class="mt-10">Rest assured that we are currently working on  resolving your issue.

        <br><br>Here is the information we recieved from the password reset form submission:
            <ul>
                <li>Email address: <?php echo e($email); ?></li>
                <li>Name: <?php echo e($name); ?></li>
            </ul>

        <br><br>
        If you did not request a password reset, please email Payreto's technical team at <b>INSERT PAYRETO TECH SUPPORT EMAIL</b> regarding the matter.
        
        <br>
        Thank you!
        </p>
</body>
</html><?php /**PATH C:\Users\user\Downloads\IISP\resources\views/users/forgot_password_email.blade.php ENDPATH**/ ?>