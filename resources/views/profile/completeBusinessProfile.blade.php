@extends('layouts.layout')
@section('css')
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice{
            background-color: green !important;
            color: white;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: white;
            border-right: 0px;
        }
        .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
            background-color:green;
            color: white;
        }
    </style>
@endsection
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
$(document).ready(function() {
    $('#businessCategory').select2({
        placeholder: "Select Business Category",
        allowClear: true
    });

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
                            <input type="text" name="business_name" class="form-control @error('business_name') is-invalid @enderror" value="{{ old('business_name') }}" id="inputEmail4" placeholder="Business Title">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Workspace</label>
                            <input type="text" value="{{strstr(Auth::user()->email, '@', true)}}" name="slug" class="form-control @error('slug') is-invalid @enderror" id="uname_response" placeholder="Workspace">
                            <div id="uname_response1">
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Business Email</label>
                            <input type="text" name="business_email" class="form-control @error('business_email') is-invalid @enderror" value="{{ old('business_email') }}" id="inputEmail4" placeholder="Business Email">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Business Category</label>
                            <select name="business_category[]" class="form-control" id="businessCategory" placeholder="" multiple>
                                <option value="1">Food</option>
                                <option value="2">Tour & travels</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Logo</label>
                            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" id="inputAddress" placeholder="Logo">
                               @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <img src="{{ asset('img/illustration-3.svg') }}" class="img-thumbnail blah" width="200">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Business Phone</label>
                            <input type="text" name="business_phone" class="form-control @error('business_phone') is-invalid @enderror" value="{{ old('business_phone') }}" id="inputEmail4" placeholder="Business Phone">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" name="address[line1]" class="form-control @error('address.line1') is-invalid @enderror" value="{{ old('address.line1') }}" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address 2</label>
                            <input type="text" name="address[line2]" class="form-control @error('address.line2') is-invalid @enderror" value="{{ old('address.line2') }}" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" name="address[city]" class="form-control @error('address.city') is-invalid @enderror" value="{{ old('address.city') }}" id="inputCity" placeholder="City">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <input type="text" name="address[state]" class="form-control @error('address.state') is-invalid @enderror" value="{{ old('address.state') }}" id="inputState" placeholder="State">
                            </div>
                            <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text"  name="address[zip_code]" class="form-control @error('address.zip_code') is-invalid @enderror" value="{{ old('address.zip_code') }}" id="inputZip" placeholder="Zip">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="inputZip">Country</label>
                            <input type="text"  name="address[country]" class="form-control @error('address.country') is-invalid @enderror" value="{{ old('address.country') }}" id="inputZip" placeholder="Country">
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
