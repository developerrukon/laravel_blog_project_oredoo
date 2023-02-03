@extends('layouts.backendMaster')
@section('title', 'Post')
@section('contact')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Post') }}</li>
                    </ol>
                </nav>
                <h1 class="m-0">{{ __('Post') }}</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <!--all Post -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="nav-tabContent">
                        <!--active Post start-->
                        <div class="tab-pane  show active" id="active">

                            <div class="pagination justify-content-center">
                                <table class="table table-bordered  table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Sl') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Subject') }}</th>
                                            <th>{{ __('Description') }}</th>
                                            <th>{{ __('Send Date') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($messages as $sl => $message)
                                        <tr>
                                            <tr>
                                                <td>{{ $sl }}</td>
                                                <td>{{ $message->name }}</td>
                                                <td>{{ $message->email }}</td>
                                                <td>{{ $message->subject }}</td>
                                                <td>{{ Str::limit($message->description, 35, '...') }}</td>
                                                {{--  post status  --}}
                                                <td>{{ $message->created_at->diffForHumans() }}</td>
                                                {{--  post action  --}}
                                                <td>

                                                    <div class="btn-group">
                                                        <button class="btn btn-info btn-lg dropdown-toggle" type="button"
                                                            data-toggle="dropdown">

                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a href="{{ route('backend.contact.show', $message->id) }}"
                                                                class="btn btn-outline-primary">{{ __('View') }}</a>
                                                            <form class="d-inline"
                                                                action="{{ route('backend.contact.destroy', $message->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="'submit"
                                                                    class="my-1 mx-1 btn btn-outline-danger">{{ __('Delete') }}</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>

                                        </tr>
                                        @empty
                                        <div class="">
                                            {{ __('Data Not Found!') }}
                                        </div>
                                        @endforelse
                                    </tbody>

                                </table>
                            </div>
                            <div class="pagination justify-content-center">
                                {{ $messages->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
