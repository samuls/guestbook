@extends('layout.mainlayout')

@section('template_title')
    User
@endsection

@section('content')
    <section class="content-header">
        <h1>
            {{ __('User') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header">
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm pull-right">
                            {{ __('Create New') }}
                        </a>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="example2">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Pathology Name</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
