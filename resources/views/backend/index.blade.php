@extends('layouts.backendApp')
@section('title', 'Dashboard')
@section('contact')
<div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
        <div class="flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
            <h1 class="m-0">Dashboard</h1>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header bg-white d-flex align-items-center justify-content-between">
        <h4 class="card-header__title mb-0">Latest Blog Posts</h4>
        <div class="dropdown">
            <a class="dropdown-toggle text-muted"
               data-caret="false"
               href="#"
               data-toggle="dropdown"
               aria-haspopup="true"
               aria-expanded="false"><i class="material-icons icon-16pt">settings</i></a>

            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item d-flex align-items-center"
                   href="#">
                    <i class="material-icons icon-16pt mr-2">settings</i>
                    <span>Blog settings</span>
                </a>
                <a class="dropdown-item d-flex align-items-center"
                   href="#">
                    <i class="material-icons icon-16pt mr-2">list</i>
                    <span>List view</span>
                </a>
                <a class="dropdown-item d-flex align-items-center"
                   href="#">
                    <i class="material-icons icon-16pt mr-2">grid_on</i>
                    <span>Grid view</span>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body py-2">
        <div class="row">

            <div class="col-lg-6 py-2">
                <div class="d-flex flex-column flex-xl-row align-items-center text-center text-xl-left align-items-xl-start">
                    <a href=""><img class="img-fluid img-lg-150 img-xl-200 rounded mr-xl-3 mb-3 mb-xl-0" src="assets/images/posts/fabian-irsara-92113.jpg" alt="Blog post image"></a>
                    <div class="flex">
                        <h5 class="card-title mb-1"><a href="" class="headings-color">Mobile UI</a></h5>
                        <p class="text-muted mb-2">
                            <small class="mr-1"><a href="" class="text-muted">Steven Doe</a></small>
                            <small>3 hrs ago</small>
                        </p>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 py-2">
                <div class="d-flex flex-column flex-xl-row align-items-center text-center text-xl-left align-items-xl-start">
                    <a href=""><img class="img-fluid img-lg-150 img-xl-200 rounded mr-xl-3 mb-3 mb-xl-0" src="assets/images/posts/luke-chesser-2347.jpg" alt="Blog post image"></a>
                    <div class="flex">
                        <h5 class="card-title mb-1"><a href="" class="headings-color">DevOps Basics</a></h5>
                        <p class="text-muted mb-2">
                            <small class="mr-1"><a href="" class="text-muted">Kevin Short</a></small>
                            <small>15 hrs ago</small>
                        </p>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 py-2">
                <div class="d-flex flex-column flex-xl-row align-items-center text-center text-xl-left align-items-xl-start">
                    <a href=""><img class="img-fluid img-lg-150 img-xl-200 rounded mr-xl-3 mb-3 mb-xl-0" src="assets/images/posts/thought-catalog-214785.jpg" alt="Blog post image"></a>
                    <div class="flex">
                        <h5 class="card-title mb-1"><a href="" class="headings-color">New VueJS Launch</a></h5>
                        <p class="text-muted mb-2">
                            <small class="mr-1"><a href="" class="text-muted">Andrew Robles</a></small>
                            <small>22 hrs ago</small>
                        </p>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 py-2">
                <div class="d-flex flex-column flex-xl-row align-items-center text-center text-xl-left align-items-xl-start">
                    <a href=""><img class="img-fluid img-lg-150 img-xl-200 rounded mr-xl-3 mb-3 mb-xl-0" src="assets/images/posts/linkedin-sales-navigator-402873.jpg" alt="Blog post image"></a>
                    <div class="flex">
                        <h5 class="card-title mb-1"><a href="" class="headings-color">E-Commerce Analytics</a></h5>
                        <p class="text-muted mb-2">
                            <small class="mr-1"><a href="" class="text-muted">Tara Smith</a></small>
                            <small>1 day ago</small>
                        </p>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection