@extends('layout.mainlayout')

@section('template_title')
    Edit User
@endsection

@section('content')
<section class="content-header">
  <h1>
    Edit {{ __('User') }}
</h1>
<ol class="breadcrumb">
    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li href="{{route('users.index')}}">Users</li>
    <li class="active">Edit User</li>
</ol>
</section>
<section class="content">
    @includeif('partials.errors')
    
        <form method="POST" action="{{ route('users.update', $user->id) }}"  role="form" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf

            @include('user.form')

        </form>

    

</section>
@endsection
