@extends('layouts.backendApp')
@section('title', 'Category')
@section('contact')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                    </ol>
                </nav>
                <h1 class="m-0">{{ $category->name }}</h1>
            </div>
        </div>
    </div>

<!--category create form start-->
        <div class="col-sm-6">
            <div class="card">
                <div class="py-3 mx-1">
                    <div class="card-hader text-center">
                        <h3>Update Category</h3>
                    </div>
                    <div class="card-body">
                        <!--Form start-->
                        <form method='POST' action="{{ route('backend.category.update', $category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!--name input-->
                            <div class="form-group mb-1">
                                <label class="form-label">Catagory Name:<span class="text-danger">*</span></label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="enter name"
                                    value="{{ $category->name }}" />
                            </div>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">please.! name max 100 character</small>
                            <!--Choose select-->
                            <div class="form-group mt-2">
                                <label class="form-label">Parent Category:</label>
                                <select name='parent' class="form-control search">
                                        <option selected disabled>select parent</option>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}"> {{ $categorie->name }}</option>
                                    @endforeach


                                </select>
                                <small class="form-text text-muted">choose you prent category.!</small>
                            </div>
                            <!--description input-->
                            <div class="form-group">
                                <label class="form-label">Description:</label>
                                <textarea name="description" class="form-control" rows="5" placeholder="Description">{{ $category->description }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">please.! description max 500 character</small>
                            </div>
                            <!--image upload-->
                            <div class="form-group">
                                <label class="form-label">Catagory Image</label>
                                <input type="file" name="image" />
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">please.!upload 1mb image and iamge type jpg,jpeg or
                                    png.</small>

                            </div>
                            <!--submit button-->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"> Update<i class="material-icons">add</i></button>
                            </div>
                        </form>
                        <!--Form end-->
                    </div>
                </div>
            </div>
        </div>
        <!--category create section end-->
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.min.css" />
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            //secrch category
            $('.search').select2();
            //switch alert

        });
        //alert
        $('.permanent_delete').on('click', function(){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $(this).parent().submit();
            }
            })
            });

    </script>

@endsection
