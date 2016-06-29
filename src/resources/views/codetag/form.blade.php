@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>{{ $title }}</h3></div>

                    <div class="panel-body">
                        {{ Form::open(array('method' => 'post', 'route' => array('admin.tags.store'))) }}

                        {!! Form::hidden('id', $tag->id) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', $tag->name, array('class' => 'form-control'))!!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('active', 'Active') !!}
                            {!! Form::checkbox('active', $tag->active, array('class' => 'form-control'))!!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Save Category', array('id' => 'btn_submit', 'class' => 'btn btn-primary')) !!}
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection