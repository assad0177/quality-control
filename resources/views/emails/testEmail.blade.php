<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Email View</title>
</head>
<body>
    <h3>You Have applied for {{count($details)}} Plans. To use those plans following are the usernames and passwords for the termianls</h3>
    <p><b>Note:</b> this is one time generated email. </p>
    <?php
        $i=1;
    ?>
    @foreach ($details as $detail)
        <h4>Credentials Terminal {{$i++}}</h4>
         <p><b>Username: </b> {{$detail['username']}}</p>
         <p><b>Password: </b> {{$detail['password']}}</p>
    @endforeach
    <p>Thankyou For Using Our Service</p>
</body>
</html>








