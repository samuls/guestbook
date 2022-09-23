@extends('layout.mainlayout')

@section('template_title')
    New User
@endsection

@section('content')
<section class="content-header">
  <h1>
    New {{ __('User') }}
</h1>
<ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li href="{{route('users.index')}}"></li>
    <li class="active">New User</li>
</ol>
</section>
<section class="content">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
