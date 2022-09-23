@extends('layout.mainlayout')

@section('template_title')
Edit Guest Book
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
    <section class="content container-fluid">
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
