@extends('layouts.app')

@section('template_title')
    Guestbook
@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Guestbook') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('guestbooks.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

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
                                    @foreach ($guestbooks as $guestbook)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $guestbook->title }}</td>
											<td>{{ $guestbook->description }}</td>
											<td><a target="_blank" href="{{ asset('images/' . $guestbook->document ) }}">View Document</a></td>
											<td>{{ $guestbook->is_approved ? 'Approved' : 'Pending' }}</td>
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
                {!! $guestbooks->links() !!}
            </div>
        </div>
    </div>
@endsection
