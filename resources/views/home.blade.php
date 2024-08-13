<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @php

        $i=0;

        $user = session()->get('user');

        $user_id = $user->id;

        $get_table = DB::table('courses')->where(['user_id'=>$user_id])->get();

        $get_table_count = $get_table->count();


    @endphp
    
</head>
<body>
    @if(session('user'))

        @csrf
        
        <div class="nav" style="display: flex;justify-content: space-between">
            <h1>Course List</h1>
            <div class="left_nav" style="display: flex;justify-content: space-around">
                <h3 style="margin: 16px 20px">{{ session('user')->username }}</h3>
                <a href=""><input type="button" value="Logout" style="margin: 20px 20px"></a>
            </div>
        </div>

        <table class="table table-bordered ">
            <thead class="thead-dark">
            <tr class="">
                <th>SI.No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>

            @foreach($get_table as $get)
                
                @php

                    $i++;
                
                    $category_id = $get->category;
                
                    $get_table = DB::table('categories')->where(['id'=>$category_id])->first();

                @endphp
                
                <tr>
                    
                    <td>{{$i}}</td>
                    <td>{{$get->title}}</td>
                    <td>{{$get_table->category}}</td>
                    <td><a href="{{ url('/courses_update') }}?id={{ $get->id }}"><input type="button" name="update" value="Update" class="btn btn-primary"></a></td>
                    <td><a href=""><input type="button" name="Delete" value="Delete" class="btn btn-danger"></a></td>
                </tr>
            @endforeach

        </table>
       
        <a href="courses-create"><input type="button" value="Add course" class="btn btn-success m-5"></a><br>
        <div class="buttons" style="display: flex;justify-content:space-around;margin-top:50px;">
            <a href="courses-create" ><input type="button" value="My Courses" ></a>
            <a href="courses_display"><input type="button" value="Courses"></a>
        </div>
    @endif
</body>
</html>