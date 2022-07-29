{{--<script>--}}
{{--    @include(jquery.bootstrap-growl.min.js)--}}
{{--</script>--}}
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
    <h2>Crud by Modal</h2>
    <hr style="{width: 300px;margin-left: auto;margin-right: auto;height: 100px;background-color:#666;opcaity: 0.5;}" ></hr>
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal">Insert</button>
    <hr style="{width: 300px;margin-left: auto;margin-right: auto;height: 100px;background-color:#666;opcaity: 0.5;}" ></hr>
    <h2>Data</h2>
    <hr style="{width: 300px;margin-left: auto;margin-right: auto;height: 100px;background-color:#666;opcaity: 0.5;}" ></hr>
    <?php
    $data = \App\mymodel::all();
    ?>
    <table class="table table-hover">
        <thead>
        <tr>
            <td><strong>ID</strong></td><td><strong style="padding-left: 20px">   Name</strong></td><td><strong style="margin-left: 20px">Email</strong></td><td><strong  style="margin-left: 20px">Actions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
        </tr>
        </thead>
<script>
    i=0 ;
</script>
        @foreach($data as $daata)
            <tr>
                <td>
                    <script>
                        i++;
                        document.write(i);
                    </script>
                </td><td><div class="idbu">{{ $daata['name']}}</div></td><td><div class="idbu">{{$daata['email']}}</div></td><td>

                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <form  method="POST" id="abcd{{$daata['id']}}" class="idbu">
                        @csrf
                        <button type="button"  value="delete"  id="delete" class="btn btn-default"  name="delete"  onclick="confirmDeleteModal({{$daata['id']}})" >Delete</button>
                    </form>
                </td>
                <td>
                    <meta name="csrf-token"  content="{{ csrf_token() }}">
                    <form  method="POST" >
                        @csrf
                        <button type="button" id="edit"  data-toggle="modal" class="btn btn-default"  data-target="#myModal{{$daata->id}}">Edit</button>
                    </form>
                </td>

            </tr>
            <div class="modal fade"  id="myModal{{$daata->id}}"   role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit values.</h4>
                        </div>
                        <div class="modal-body">
                            <form  method="post" >
                                @csrf
                                <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text"  class="form-control"id="name1{{$daata['id']}}" name="name"  value="{{$daata->name}}"><br>
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="text"  class="form-control"id="email1{{$daata['id']}}" name="email" value="{{$daata->email}}" ><br><br>
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control" id="password1{{$daata['id']}}" name="password"  value="{{$daata->password}}" ><br><br>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <form  method="post" id="abcde{{$daata['id']}}">
                                <input type="submit" class="btn btn-primary" value="Update"  id="submit1" name="submit1"  />
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </form>

                            <script type="text/javascript">
                                $('#abcde{{$daata['id']}}').on('submit',function(event){
                                    event.preventDefault()
                                    id  = {{$daata['id']}};
                               name = $('#name1{{$daata->id}}').val();
                               email = $('#email1{{$daata->id}}').val();
                               password = $('#password1{{$daata->id}}').val();
                                    $.ajax({
                                        url: "/myajax2",
                                        type: 'POST', // replaced from put
                                        data:{
                                            "_token": "{{ csrf_token() }}",
                                            id:id,
                                            name:name,
                                            email:email,
                                            password:password,
                                        },
                                        success: function(dataResult) {
                                            $('#myModal{{$daata->id}}').modal('hide');
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </table>

    <hr style="{width: 300px;margin-left: auto;margin-right: auto;height: 100px;background-color:#666;opcaity: 0.5;}" ></hr>
<!------------------------------------------Delete data Script start------------------------------->
    <script type="text/javascript">
        function confirmDeleteModal(id){
            $('#deleteModal').modal();
            $('#deleteButton').html('<a class="btn btn-danger" onclick="deleteData('+id+')">Delete</a>');
        }
        function deleteData(id){
            $.ajax({
                url: "/myajax1",
                type: 'POST',
                data:{
                    "_token": "{{ csrf_token() }}",
                    id:id
                },
                success: function(dataResult) {
                    $('#deleteModal').modal('hide');
                }
            });
        }
    </script>
<!------------------------------------------Delete data Script end--------------------------------->

<!------------------------------------------Insert Modal------------------------------------------->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Insert values.</h4>
                </div>
                <div class="modal-body">
                    <form  method="post" >
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                        <input class="form-control" type="text" id="name" name="name"  ><br>
                        <span class="text-danger" id="emailerror"></span>

                            <label for="exampleInputEmail1">Email address</label>
                        <input  class="form-control" type="text" id="email" name="email"   ><br>
                        <span class="text-danger" id="nameerror"></span>

                            <label for="exampleInputPassword1">Password</label>
                        <input class="form-control" type="password" id="password" name="password" /><br>
                        <span class="text-danger" id="passworderror"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <form  method="post" id="abc">
                        <input type="submit"  class="btn btn-primary" value="submit"  id="submit" name="submit"  />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
<!------------------------------------------Modal End---------------------------------------------->

<!------------------------------------------Insert data Script start------------------------------->
<script type="text/javascript"6>
    $('#abc').on('submit',function(event){
        event.preventDefault();
        name = $('#name').val();
        email = $('#email').val();
        password = $('#password').val();
        $.ajax({
            url: "/myajax",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                name:name,
                email:email,
                password:password,
            },
            success: function(){
                $('#myModal').modal('hide');

            },
            error: function (error){
                console.log(error.responseJSON.errors);
                $('#nameerror').text(error.responseJSON.errors.email);
                $('#emailerror').text(error.responseJSON.errors.name);
                $('#passworderror').text(error.responseJSON.errors.password);
            }
        });
    });
</script>
<!------------------------------------------Insert data Script end--------------------------------->

<!------------------------------------------Delete Confirmation---------------------------------!-->
<div class="container" style="padding:150px;">
    <div id="deleteModal" class="modal fade" role='dialog'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Delete </h4>
                </div>
                <div class="modal-body">
                    <p>Do You Really Want to Delete This ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <span id= 'deleteButton'></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------Delete Confirmation end-----------------------------!-->

<!------------------------------------------style-----------------------------------------------!-->
    <style>
        .idbu{
            padding-left: 20px;
        }
        #delete{
            background: #dc2828;
            color: whitesmoke;
        }
        #edit{
            background: #25606b;
            color: whitesmoke;
        }
    </style>
<!------------------------------------------style end-------------------------------------------!-->


