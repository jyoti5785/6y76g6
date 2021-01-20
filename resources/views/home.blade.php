@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <section class="pb-5">
            <div class="container pb-5">
                <header class="text-center mb-5">
                <h2 class="mb-1">Explore our categories</h2>
                <p class="text-muted text-small">Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</p>
                </header>
                <div class="row text-center">
                <div class="col-lg-3 px-lg-2">
                    <div class="categories-item card border-0 shadow mb-4 reset-anchor hover-transition">
                    <div class="card-body px-4 py-5">
                            <i class="fa fa-bars mb-3" aria-hidden="true"></i>
                        <h2 class="h5"> <a class="stretched-link reset-anchor-inherit" href="{{route('business-catalogue')}}">Catalogue</a></h2>
                        <p class="categories-item-number small mb-0">2 Items</p>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 px-lg-2">
                    <div class="categories-item card border-0 shadow mb-4 reset-anchor hover-transition">
                    <div class="card-body px-4 py-5">
                            <i class="fa fa-cart-arrow-down mb-3" aria-hidden="true"></i>
                        <h2 class="h5"> <a class="stretched-link reset-anchor-inherit" href="{{route('business-store')}}">Store</a></h2>
                        <p class="categories-item-number small mb-0">2 Items</p>
                    </div>
                    </div>
                </div>
                 <div class="col-lg-3 px-lg-2">
                    <div class="categories-item card border-0 shadow mb-4 reset-anchor hover-transition">
                    <div class="card-body px-4 py-5">
                            <i class="fa fa-users mb-3" aria-hidden="true"></i>
                        <h2 class="h5"> <a class="stretched-link reset-anchor-inherit" href="{{route('business-connection')}}">Connection</a></h2>
                        <p class="categories-item-number small mb-0">2 Items</p>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 px-lg-2">
                    <div class="categories-item card border-0 shadow mb-4 reset-anchor hover-transition">
                    <div class="card-body px-4 py-5">
                            <i class="fa fa-truck mb-3" aria-hidden="true"></i>
                        <h2 class="h5"> <a class="stretched-link reset-anchor-inherit" href="{{route('business-order')}}">Orders</a></h2>
                        <p class="categories-item-number small mb-0">2 Items</p>
                    </div>
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
