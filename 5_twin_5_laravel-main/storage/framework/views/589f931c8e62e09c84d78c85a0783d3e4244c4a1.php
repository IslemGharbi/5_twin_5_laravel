<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
</head>

<body>
    <h1>Message from <?php echo e($details['name']); ?></h1>
    <p>Email: <?php echo e($details['email']); ?> </p><br><br>
    <p><?php echo e($details['message']); ?></p>
</body>

</html>
<?php /**PATH C:\Users\FELFEL\Downloads\5_twin_5_laravel-main (1)\5_twin_5_laravel-main\resources\views/contactMail.blade.php ENDPATH**/ ?>