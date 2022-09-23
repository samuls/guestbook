@extends('layout.mainlayout')

@section('template_title')
User
@endsection

@section('content')
<section class="content-header">
    <h1>
        GuestBook
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">GuestBook</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{ route('guestbooks.create') }}" class="btn btn-primary btn-sm pull-right">
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

                                    <th>Title</th>
                                    <th>File Name</th>
                                    <th>Description</th>
                                    <th>Is Approved</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guestbooks as $key => $guestbook)
                                <tr>
                                    <td>{{ ++$key }}</td>

                                    <td>{{ $guestbook->title }}</td>
                                    <td><a target="_blank" href="{{ asset('images/' . $guestbook->file_name ) }}">Donwload File</a></td>
                                    <td>{{ $guestbook->description }}</td>
                                    <td>{{ $guestbook->is_approved==1 ? 'Aprroved' : 'Pending' }}</td>

                                    <td>
                                        <form action="{{ route('guestbooks.destroy',$guestbook->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('guestbooks.show',$guestbook->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('guestbooks.edit',$guestbook->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection