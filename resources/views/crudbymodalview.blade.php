{{--<script>--}}
{{--    @include(jquery.bootstrap-growl.min.js)--}}
{{--</script>--}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <title></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>



<div id="successMessage" style="font-size:20px;color:white;font-weight:bold;background: #1c7430"></div>


<div class="container">
    <h2>Crud by Modal</h2>
    <hr style="{width: 300px;margin-left: auto;margin-right: auto;height: 100px;background-color:#666;opcaity: 0.5;}" ></hr>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Insert</button>
    <hr style="{width: 300px;margin-left: auto;margin-right: auto;height: 100px;background-color:#666;opcaity: 0.5;}" ></hr>
    <h2>Data</h2>
    <hr style="{width: 300px;margin-left: auto;margin-right: auto;height: 100px;background-color:#666;opcaity: 0.5;}" ></hr>

    <?php
    $data = \App\mymodel::all();
    ?>

    <table >
        <tr>
            <td><strong>ID</strong></td><td><strong style="padding-left: 20px">   Name</strong></td><td><strong style="margin-left: 20px">Email</strong></td><td><strong  style="margin-left: 20px">Actions</strong></td>
        </tr>
        @foreach($data as $daata)
            <tr>
                <td>
                    {{ $daata['id']}}
                </td>
                <td>
                    <div class="idbu">
                        {{ $daata['name']}}
                    </div>
                </td>
                <td>
                    <div class="idbu">

                        {{   $daata['email']}}
                    </div>

                </td>


                <td>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <form  method="POST" id="abcd{{$daata['id']}}" class="idbu">
                        @csrf
                        <button type="button"  value="delete"  id="delete" class="btn btn-default"  name="delete"  onclick="confirmDeleteModal({{$daata['id']}})" >Delete</button>

                    </form>
                </td>

                <td>

                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <form  method="POST" >
                        @csrf
                        <button type="button" id="edit" data-toggle="modal" class="btn btn-default"  data-target="#myModal{{$daata->id}}">Edit</button>
                        <!--  <button type="button" value="edit"  id="edit" name="edit"  >Edit</button>-->
                    </form>
                    <!--<input type="submit" value="Edit"  id="edit" name="edit"  />-->
                </td>

            </tr>
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
                            if( window.localStorage ) {
                                if (!localStorage.getItem('firstLoad')) {
                                    localStorage['firstLoad'] = true;
                                    window.location.reload();
                                } else
                                    localStorage.removeItem('firstLoad');
                                if (!localStorage.getItem('firstLoad')) {
                                    localStorage['firstLoad'] = true;
                                    window.location.reload();
                                }
                                //  window.location.reload();
                            }
                        }
                    });
                }
            </script>



            <div class="modal fade" id="myModal{{$daata->id}}" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit values.</h4>
                        </div>
                        <div class="modal-body">
                            <form  method="post" >
                                @csrf
                                <h3>Username.</h3>
                                <input type="text" id="name1" name="name"  value="{{$daata->name}}"><br>
                                <h3>Email</h3>
                                <input type="text" id="email1" name="email" value="{{$daata->email}}" ><br><br>
                                <h3>Password</h3>
                                <input type="text" id="password1" name="password"  value="{{$daata->password}}" ><br><br>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <form  method="post" id="abcde{{$daata['id']}}">

                                <input type="submit" class="btn btn-default" value="Update"  id="submit1" name="submit1"  />

                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
              //  $('#abcde{{$daata['id']}}').on('click',function(event){
                   // event.preventDefault()
                    $('#abcde{{$daata['id']}}').on('submit',function(event){
                        event.preventDefault()
                        id= {{$daata->id}};
                      //  alert   (id);

                        name = $('#name1').val();
                        email = $('#email1').val();
                        password = $('#password1').val();
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
                                    if( window.localStorage ) {
                                        if (!localStorage.getItem('firstLoad')) {
                                            localStorage['firstLoad'] = true;
                                            window.location.reload();
                                        } else
                                            localStorage.removeItem('firstLoad');
                                    }
                                //     //   $('#edit').show();
                                //     // $(".success").show();
                                // }
                            }
                        });
                    });
             //   });
            </script>

        @endforeach

    </table>

    <hr style="{width: 300px;margin-left: auto;margin-right: auto;height: 100px;background-color:#666;opcaity: 0.5;}" ></hr>


    <!--///////////////////////////////////////////Modal////////////////////////////////////////////////////////////////////-->
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
                        <h3>Username.</h3>
                        <input type="text" id="name" name="name"  ><br>
                        <span class="text-danger" id="emailerror"></span>

                        <h3>Email</h3>
                        <input type="text" id="email" name="email"   ><br>
                        <span class="text-danger" id="nameerror"></span>

                        <h3>Password</h3>
                        <input type="password" id="password" name="password" /><br>
                        <span class="text-danger" id="passworderror"></span>




                    </form>
                </div>
                <div class="modal-footer">
                    <form  method="post" id="abc">

                        <input type="submit"  class="btn btn-default" value="submit"  id="submit" name="submit"  />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!--////////////////////////////////////////////////Modal End//////////////////////////////////////////////////////////////////////////-->



<!--////////////////////////////////////////////////Insert data Script start//////////////////////////////////////////////////////////////////////////-->
<script type="text/javascript">
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
                if( window.localStorage ) {
                    if (!localStorage.getItem('firstLoad')) {
                        localStorage['firstLoad'] = true;
                        window.location.reload();
                    } else
                        localStorage.removeItem('firstLoad');
                    window.location.reload();
                }
            },
            error: function (error){
                console.log(error.responseJSON.errors);
                $('#nameerror').text(error.responseJSON.errors.email);
                $('#emailerror').text(error.responseJSON.errors.name);
                $('#passworderror').text(error.responseJSON.errors.password);
            }
        });
    });
    // function clear(){
    //     $('#name').val('');
    //     $('#email').val('');
    //     $('#password').val('');
    //     $('#nameerror').val('');
    //     $('#emailerrorerror').val('');
    //     $('#passworderror').val('');
    //
    //
    // }
</script>
<!--////////////////////////////////////////////////Insert data Script end//////////////////////////////////////////////////////////////////////////-->


<!--//////////////////////////////////////////////Modal1////////////////////////////////////////////////////////////////////-->

<!--//////////////////////////////////////////////Modal1 end///////////////////////////////////////////////////////////////////////////-->
<script type="text/javascript">
</script>
<div class="container" style="padding:150px;">

    <!----modal starts here--->
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
    <!--Modal ends here--->

    {{--    <button type="button" class="btn btn-info btn-lg" onclick="confirmDeleteModal('112')">Delete Data With Id 112</button><br>--}}































    <style>
        .idbu{
            padding-left: 20px;
        }
        #delete{
            background: #e71313;
            color: whitesmoke;
        }
                #edit{
            background: #25606b;
            color: whitesmoke;

        }
    </style>

</div>
