<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
            crossorigin="anonymous"></script>
</head>
<body style="background: lightgray">

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="/insert" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">Roll no</label>
                            <input type="text" class="form-control " title="Please dont change this field!"
                                   name="roll_no" value="{{$roll_no+1}}">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Name</label>
                            <input type="text" class="form-control " name="name">
                        </div>
                        <div class="form-group">
                            {{--                                                    <label class="font-weight-bold">First Name</label>--}}
                            <input type="hidden" class="form-control " value="fname" name="fname">
                        </div>

                        <div class="form-group">
                            {{--                        QS
                                                           <label class="font-weight-bold">Last Name</label>--}}
                            <input type="hidden" class="form-control " value="lname" name="lname">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" class="form-control " name="email">

                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Age</label>
                            <input type="number" class="form-control " name="age">

                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">CNIC</label>

                            <input type="number" name="cnic"
                                   class="form-control " name="cnic" placeholder="323XX-XXXXXXX-X">

                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Phone number</label>
                            <input type="number" class="form-control " name="phone_number" placeholder="+92 XXXXXXXXXX">

                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Class</label>
                            <input type="Number" class="form-control " name="class">

                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Section</label>
                            <input type="text" class="form-control " name="section">

                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label class="font-weight-bold">Section</label>--}}
{{--                            <input type="hidden" class="form-control " name="deleted_at" value="a">--}}


{{--                        </div>--}}


                        <div class="form-group">
                            <label class="font-weight-bold">Hieght</label>
                            <input type="number" class="form-control " name="hieght" placeholder="Hieght in cm ">

                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Wieght</label>
                            <input type="number" class="form-control " name="wieght" placeholder="Wieght in Kg">

                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Country</label>
                            <div class="form-group">
                                <select class="form-group" name="country" aria-label="Default select example">
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}
                                            - {{$country->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{--                                    <option>Pakistan</option>--}}
                            {{--                                    <option>Saudia-Arabia</option>--}}
                            {{--                                    <option>China</option>--}}
                            </select>
                        </div>


                        <div class="form-group">
                            <label class="font-weight-bold">City</label>
                            <input type="text" class="form-control " name="city">

                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Zip code</label>
                            <input type="text" class="form-control " name="zip_code" placeholder="PAK-xxxx(Format)">

                        </div>

                        {{--                        <div class="form-group">--}}
                        {{--                            <label class="font-weight-bold">Image upload</label>--}}
                        {{--                            <input type="file" name ="image" onchange="readURL(this);" />--}}
                        {{--                            <img id="blah" src="#" alt="your image" />--}}



                        {{--                        </div>--}}
                        <div class="form-group">
                            <label class="font-weight-bold">Image upload</label>
                            {{--                    <input type="file" name ="image" name="image" accept="image/* onchange="loadFile(event)" style="display: none;"/>--}}
                            <input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)"
                                   style="display: none;">
                            <label for="file" style="cursor: pointer;">Upload Image</label>
                            <p><img id="output" width="200"/></p>
                        </div>
                        <script>
                            var loadFile = function (event) {
                                var image = document.getElementById('output');
                                image.src = URL.createObjectURL(event.target.files[0]);
                            };
                        </script>
                        <button style="margin-left: 900px" type="submit" class="btn btn-md btn-primary">Insert</button>
                        <a href="{{ URL::previous() }}" class="btn btn-warning"> <i class="fas fa-arrow-left"></i> Go
                            Back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result).width(150).height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
</body>
</html>
