@extends('layouts.app')

@section('template_title')
    Update Guestbook
@endsection

@section('content')
    <section class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('guestbooks.index') }}">Guestbooks</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Guestbook</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('guestbooks.update', $guestbook->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('guestbook.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
