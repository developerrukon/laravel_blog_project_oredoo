@extends('layouts.backendMaster')
@section('title', 'Post')
@section('contact')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Message') }}</li>
                    </ol>
                </nav>
                <h3 class="m-0">{{ __('Message Details') }}</h3>
            </div>
        </div>
    </div>
@can('message_show')
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
                                <tbody>
                                    <tr>
                                        <td>{{ __('Name') }}</td>
                                        <td>{{ $message->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Email') }}</td>
                                        <td>{{ $message->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Subject') }}</td>
                                        <td>{{ $message->subject }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Description') }}</td>
                                        <td>{{ $message->description }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Send Date') }}</td>
                                        <td>{{ $message->created_at->diffForHumans() }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Action') }}</td>
                                        <td>

                                            <div class="btn-group">
                                                <button class="btn btn-info btn-lg dropdown-toggle" type="button"
                                                    data-toggle="dropdown">

                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="{{ route('backend.contact.index') }}"
                                                        class="btn btn-outline-primary">{{ __('Back') }}</a>
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
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endcan

@endsection
