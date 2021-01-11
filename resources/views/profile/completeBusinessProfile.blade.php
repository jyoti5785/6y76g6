@extends('layouts.layout')
@section('js')
<script>
$(document).ready(function(){

   $("#uname_response").keyup(function(){

      var username = $(this).val().trim();

      if(username != ''){

         $.ajax({
            url: "{{ url('/ajax-workspace') }}",
            type: 'post',
            data: {username: username,_token : '<?php echo csrf_token() ?>',},
            success: function(response){

                $('#uname_response1').html(response);

             }
         });
      }else{
         $("#uname_response1").html("");
      }

    });

 });
</script>
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#inputAddress").change(function(){
    readURL(this);
});
</script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <section class="pb-5">
            <div class="container pb-5">
                <header class="text-center mb-5">
                <h4 class="mb-1">Complete Your Business Profile</h4>

                </header>
                <div class="col-sm=6">
                    <form action="{{route('completeProfile')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Business Title</label>
                            <input type="text" name="business_name" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Workspace</label>
                            <input type="text" name="slug" class="form-control" id="uname_response" placeholder="Password">
                            <div id="uname_response1"></div>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Logo</label>
                            <input type="file" name="logo" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group col-md-6">
                            <img src="{{ asset('assets/img/icon.png') }}" class="img-thumbnail blah" width="200">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" name="address[line1]" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address 2</label>
                            <input type="text" name="address[line2]" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" name="address[city]" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <input type="text" name="address[state]" class="form-control" id="inputState">
                            </div>
                            <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text"  name="address[zip_code]" class="form-control" id="inputZip">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="inputZip">Country</label>
                            <input type="text"  name="address[country]" class="form-control" id="inputZip">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
                <div class="col-sm-4">

                </div>
            </div>
            </section>
        </div>
    </div>
</div>
@endsection
