@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <section class="pb-5">
            <div class="container pb-5">
                <header class="text-center mb-5">
                    <h4 class="mb-1">Explore your category</h4>
                </header>
                <div class="row">
                    <div class="col-lg-3 px-lg-2">
                        <div class="card border-0 shadow mb-4 rounded">
                            @include('store.partials.left-menu')

                        </div>
                    </div>
                    <div class="col-lg-9 px-lg-2">
                        
                        <div class="card border-0 shadow mb-4">
                            <div class="d-flex flex-row-reverse">
                                <a href="#" class="m-3 p-2 badge badge-success"><i class="fa fa-plus-circle"></i> Add New</a>
                            </div>
                        <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col"></th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            </tr>
                        </tbody>
                        </table>
                        </div>
                    </div>

                {{-- <div class="col-lg-12 text-center pt-4"><a class="btn btn-primary" href="#">Show more categories</a></div> --}}
                </div>
            </div>
            </section>
        </div>
    </div>
</div>
@endsection
