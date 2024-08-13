<!DOCTYPE html>
<html lang="en">
<head>
    @php


        $i=0;
    @endphp

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>
    <h1>List Courses</h1>
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr class="">
            <th>SI.No</th>
            <th>Title</th>
            <th>Category</th>
        </tr>
        </thead>

        @foreach($get_table as $get)

                
                @php
                    $category_id = $get->category;
                    $get_category = DB::table('categories')->where(['id'=>$category_id])->first();
                    $i++
                @endphp
                
                <tr>
                    
                    <td>{{$i}}</td>
                    <td>{{$get->title}}</td>
                    <td>{{$get_category->category}}</td>
                
                </tr>
                
            @endforeach
            

        </table>
        
        <div class="d-flex justify-content-center ">
            {{ $get_table->links('pagination::bootstrap-4') }}
        </div>

        <div class="buttons" style="display: flex;justify-content:space-around;margin-top:50px;">
            <a href="home" ><input type="button" value="My Courses" ></a>
            <a href="courses_display"><input type="button" value="Courses"></a>
        </div>
        
</body>
</html>