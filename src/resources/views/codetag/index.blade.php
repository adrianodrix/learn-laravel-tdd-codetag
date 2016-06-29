@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Tags!</h3>
                        <a href="{{ route('admin.tags.create') }}" class="btn btn-success">Create Tag</a>
                    </div>

                    <div class="panel-body">
                        @if (count($tags) > 0)
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                    <th scope="row">{{ $tag->id }}</th>
                                    <td>{{ $tag->name }}</td>
                                    <td><a href="{{ route('admin.tags.edit', array('id' => $tag->id)) }}" class="btn btn-sm btn-primary">Update</a>  <a href="{{ route('admin.tags.destroy', array('id' => $tag->id)) }}" class="btn btn-sm btn-danger">Delete</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div style="text-align:center;">
                                {!! $tags->render()!!}
                            </div>
                        @else
                            I don't have any records!
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection