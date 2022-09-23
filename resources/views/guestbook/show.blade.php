@extends('layouts.app')

@section('template_title')
    {{ $guestbook->name ?? 'Show Guestbook' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('guestbooks.index') }}">Guestbooks</a></li>
                <li class="breadcrumb-item active" aria-current="page">Show</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Guestbook</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('guestbooks.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $guestbook->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $guestbook->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $guestbook->description }}
                        </div>
                        <div class="form-group">
                            <strong>Document:</strong>
                            {{ $guestbook->document }}
                        </div>
                        <div class="form-group">
                            <strong>Is Approved:</strong>
                            {{ $guestbook->is_approved }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
