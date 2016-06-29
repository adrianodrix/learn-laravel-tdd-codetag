@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Categories!</h3>
                        <a href="{{ route('admin.tags.create') }}" class="btn btn-success">Create Category</a>
                    </div>

                    <div class="panel-body">
                        @if (count($tags) > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Active</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                    <th scope="row">{{ $tag->id }}</th>
                                    <td>{{ $tag->name }}</td>
                                    <td>@if ($tag->active)<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>@else <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> @endif</td>
                                        <td><a href="{{ route('admin.tags.edit', array('id' => $tag->id)) }}" class="btn btn-sm btn-primary">Update</a>  <a href="{{ route('admin.tags.destroy', array('id' => $tag->id)) }}" class="btn btn-sm btn-danger">Delete</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            I don't have any records!
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection