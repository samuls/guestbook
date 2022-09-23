@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
 
                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
										<th>Title</th>
										<th>Description</th>
										<th>Document</th>
										<th>Is Approved</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($guestbooks as $key => $guestbook)
                                        <tr>
                                            <td>{{ ++$key }}</td>
											<td>{{ $guestbook->title }}</td>
											<td>{{ $guestbook->description }}</td>
											<td>@if ('' != $guestbook->document) <a target="_blank" href="{{ asset('images/' . $guestbook->document ) }}">View Document</a> @else - @endif</td>
											<td>{{ $guestbook->is_approved ? 'Approved' : 'Pending' }}</td>
                                            <td>
                                                <form action="{{ route('guestbooks.destroy',$guestbook->id) }}" method="POST">
                                                    @if($guestbook->is_approved)  
                                                    <a class="btn btn-sm btn-primary" href="javascript:void(0);">Approved</a>
                                                    @else
                                                    <a class="btn btn-sm btn-success" href="{{ route('guestbooks.adminApprove',$guestbook->id) }}"><i class="fa fa-check-square-o" aria-hidden="true"></i> Approve</a>
                                                    @endif

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
</div>
@endsection