<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>User registration</h1>
    <center>
    <form action="{{url('/add_user')}}" method="post">

        @csrf

        First name :
        <input type="text" name="first_name" class="m-3"><br>
        
        Last name :
        <input type="text" name="last_name" class="m-3"><br>

        Phone Number :
        <input type="text" name="phone_number" class="m-3"><br>

        Username :
        <input type="text" name="username" class="m-3"><br>

        Email: 
        <input type="text" name="email" class="m-3"><br>
        
        Password:
        <input type="password" name="password" class="m-3"><br>
        
        Confirm Password:
        <input type="password" name="confirm_password" class="m-3"><br>

        <input type="submit" name="" class="btn btn-primary m-5" >
    </form>
    </center>
</body>
</html>