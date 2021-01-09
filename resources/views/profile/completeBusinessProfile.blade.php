@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <section class="pb-5">
            <div class="container pb-5">
                <header class="text-center mb-5">
                <h4 class="mb-1">Complete Your Business Profile</h4>

                </header>
                <div class="row">
                    <form action="{{route('completeProfile')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Business Title</label>
                            <input type="text" name="business_name" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Workspace</label>
                            <input type="text" name="slug" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Logo</label>
                            <input type="file" name="logo" class="form-control" id="inputAddress" placeholder="1234 Main St">
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

                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>

                </div>
            </div>
            </section>
        </div>
    </div>
</div>
@endsection
