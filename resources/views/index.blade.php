<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>


<div class="container">
    <h2>Student-mangement-system</h2>
    <hr style="{width: 300px;margin-left: auto;margin-right: auto;height: 100px;background-color:#666;opcaity: 0.5;}"></hr>

    @php
        if ($roll_no ?? false){

        }
        else{
            $roll_no = 1 ;
        }

    @endphp
    <form action="insertbuttononclick/{{$roll_no}}">
        <button type="submit" class="btn btn-primary btn-lg btn">Insert</button>
    </form>
    <hr style="{width: 300px;margin-left: auto;margin-right: auto;height: 100px;background-color:#666;opcaity: 0.5;}"></hr>
    <h2>Data</h2>
    <hr style="{width: 300px;margin-left: auto;margin-right: auto;height: 100px;background-color:#666;opcaity: 0.5;}"></hr>

    <table class="table table-hover">
        <thead>
        <tr>
            <td><strong>Index</strong></td>
            <td><strong>Roll no</strong></td>
            <td><strong>Name</strong></td>
            <td><strong>class</strong></td>
            <td><strong>Section</strong></td>
            <td><strong>Action</strong></td>
        </tr>
        </thead>

        @foreach($Students as $Student)
            <tr>
                <td>
                    {{$index+=1}}
                </td>
                <td>{{$Student->roll_no}}</td>
                <td>{{$Student->name}}</td>
                <td>{{$Student->class}}</td>
                <td>{{$Student->section}}</td>
                {{--                <td>--}}
                {{--                    <img src="{{asset('uploads/'.$Student->image)}}" alt="Not valid format" size="511 × 720 px"></td>--}}
                <td>
                    {{--                <button type="submit"  href="edit/{{$Student->id}}" style="padding: 4px" class="btn btn-info">Details</button>--}}
                    <a href="detail/{{$Student->id}}" style="padding: 4px" class="btn btn-info">Detail</a>
                    <a href="delete/{{$Student->id}}" style="padding: 4px" class="btn btn-danger ">Delete</a>
                    <a href="edit/{{$Student->id}}" style="padding: 4px" class="btn btn-info ">Edit</a>

                </td>
            </tr>
        @endforeach
    </table>
</div>

