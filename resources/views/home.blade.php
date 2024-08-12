<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(session('user'))

        @csrf
        
        <div class="nav" style="display: flex;justify-content: space-between">
            <h1>Course List</h1>
            <div class="left_nav" style="display: flex;justify-content: space-around">
                <h3>{{ session('user')->username }}</h3>
                <a href=""><input type="button" value="Logout" style="margin: 20px 20px"></a>
            </div>
        </div>

       <a href="courses-create"><input type="button" value="Add course"></a>

    @endif
</body>
</html>