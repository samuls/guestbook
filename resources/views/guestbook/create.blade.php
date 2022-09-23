@extends('layouts.app')

@section('template_title')
    Create Guestbook
@endsection

@section('content')
    <section class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('guestbooks.index') }}">Guestbooks</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Guestbook</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('guestbooks.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('guestbook.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
