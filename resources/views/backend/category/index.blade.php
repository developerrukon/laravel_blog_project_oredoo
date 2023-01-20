@extends('layouts.backendApp')
@section('title', 'Category')
@section('contact')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                    </ol>
                </nav>
                <h1 class="m-0">Category</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <!--all category -->
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs mb-2" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#active"
                                type="button">Active</button>
                            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#deactive"
                                type="button">Deactive</button>
                            <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#trash"
                                type="button">Trash</button>
                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                        <!--active category start-->
                        <div class="tab-pane  show active" id="active">
                            <table class="table table-bordered  table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Description</th>
                                        <th>Count</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    @foreach ($categories as $categorie)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>
                                                @if ($categorie->image)
                                                <img width="60" src="{{ asset('storage/category/' . $categorie->image) }}" alt="{{ $categorie->name }}">
                                                @else
                                                <img src="{{ Avatar::create($categorie->name)->setDimension(50)->setFontSize(18)->toBase64() }}" alt="{{ $categorie->name }}">
                                               @endif
                                            </td>
                                            <td>
                                                {{ Str::limit($categorie->slug, 30, '...') }}
                                            </td>
                                            <td>{{ Str::limit($categorie->slug, 30, '...') }}</td>
                                            <td>{{ Str::limit($categorie->description, 20, '...') }}</td>
                                            <td>{{ $categorie->posts_count }}</td>
                                            <td>
                                                <a href="{{ route('backend.category.show', $categorie->id) }}" class="btn btn-outline-primary">View</a>
                                                <a href="{{ route('backend.category.edit', $categorie->id) }}" class="btn btn-outline-success my-1 mx-1">Edit</a>
                                                <form class="d-inline" action="{{ route('backend.category.destroy', $categorie->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="'submit" class="my-1 mx-1 btn btn-outline-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!--sub Category start-->
                                        @foreach ($categorie->subCatagories as $subCategory)
                                        <tr>
                                            <td>
                                                --
                                            </td>
                                            <td>
                                                @if ($subCategory->image)
                                                <img width="60" src="{{ asset('storage/category/' . $subCategory->image) }}" alt="{{ $subCategory->name }}">
                                                @else
                                                <img src="{{ Avatar::create($subCategory->name)->setDimension(50)->setFontSize(18)->toBase64() }}" alt="{{ $categorie->name }}">
                                               @endif
                                            </td>
                                            <td>
                                                {{ $subCategory->name }}
                                            </td>
                                            <td>{{ $subCategory->slug }}</td>
                                            <td>{{ Str::limit($subCategory->description, 20, '...') }}</td>
                                            <td>{{ $subCategory->posts_count }}</td>
                                            <td>
                                                <a href="{{ route('backend.category.show', $subCategory->id) }}" class="btn btn-outline-primary">View</a>
                                                <a href="{{ route('backend.category.edit', $subCategory->id) }}" class="btn btn-outline-success my-1 mx-1">Edit</a>
                                                <form class="d-inline"
                                                    action="{{ route('backend.category.destroy', $subCategory->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="'submit" class="my-1 mx-1 btn btn-outline-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <!--sub Category end-->
                                        <?php $no++ ?>
                                    @endforeach

                                </tbody>

                            </table>
                            <div class="pagination justify-content-center">
                                {{ $categories->links() }}
                            </div>
                        </div>
                        <!--active category end-->
                        <!--deactive category start-->
                        <div class="tab-pane " id="deactive">
                            Deactive
                        </div>
                        <!--deactive category end-->
                        <!--trash category start-->
                        <div class="tab-pane " id="trash">
                            <table class="table table-bordered  table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Description</th>
                                        <th>Count</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($trashCategories as $trashCategorie)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>
                                                @if ($trashCategorie->image)
                                                <img width="60" src="{{ asset('storage/category/'.$trashCategorie->image) }}" alt="{{ $trashCategorie->name }}">
                                                @else
                                                <img src="{{ Avatar::create($categorie->name)->setDimension(50)->setFontSize(18)->toBase64() }}" alt="{{ $categorie->name }}">
                                                @endif
                                            </td>
                                            <td>{{ $trashCategorie->name }}</td>
                                            <td>{{ $trashCategorie->slug }}</td>
                                            <td>{{ Str::limit($trashCategorie->description, 20, '...') }}</td>
                                            <td>0</td>
                                            <td>
                                                <a href="{{ route('backend.category.restore', $trashCategorie->id) }}" class="my-1 mx-1 btn btn-outline-success">Restore</a>
                                                <form class="d-inline" method="POST" action="{{ route('backend.category.permanent.delete', $trashCategorie->id ) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="my-1 mx-1 btn btn-outline-danger permanent_delete">Permanent Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php $no++ ?>
                                    @endforeach

                                </tbody>

                            </table>
                            <div class="pagination justify-content-center">
                                {{ $trashCategories->links() }}
                            </div>
                        </div>
                        <!--trash category end-->
                    </div>

                </div>
            </div>
        </div>
        <!--category create form start-->
        <div class="col-sm-4">
            <div class="card">
                <div class="py-3 mx-1">
                    <div class="card-hader text-center">
                        <h3>Create Category</h3>
                    </div>
                    <div class="card-body">
                        <!--Form start-->
                        <form method='POST' action="{{ route('backend.category.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!--name input-->
                            <div class="form-group mb-1">
                                <label class="form-label">Catagory Name:<span class="text-danger">*</span></label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="category name"
                                    value="{{ old('name') }}" />
                            </div>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">please.! name max 100 character</small>
                            <!--Choose select-->
                            <div class="form-group mt-2">
                                <label class="form-label">Parent Category:</label>
                                <select name='parent' class="form-control search" value="{{ old('parent') }}">
                                    <option selected disabled>Choose</option>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}"> {{ $categorie->name }}</option>
                                    @endforeach


                                </select>
                                <small class="form-text text-muted">choose you prent category.!</small>
                            </div>
                            <!--description input-->
                            <div class="form-group">
                                <label class="form-label">Description:</label>
                                <textarea name="description" class="form-control" rows="5" placeholder="Description">{{ old('description') }}</textarea>
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
                                <button type="submit" class="btn btn-primary"> Create<i
                                        class="material-icons">add</i></button>
                            </div>
                        </form>
                        <!--Form end-->
                    </div>
                </div>
            </div>
        </div>
        <!--category create section end-->

    </div>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('backend/css/select2.min.css') }} "/>

    @endsection
@section('js')
    <script src="{{ asset('backend/js/select2.min.js') }}"></script>
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
