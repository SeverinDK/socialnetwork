@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">

                        {!! Form::open(['url' => 'createProfile', 'method' => 'post', 'files' => true]) !!}

                        {{ Form::text('name',  '', ['class' => 'form-control', 'placeholder' => 'Name', 'title' => 'Name']) }}<br>
                        {{ Form::text('nickname',  '', ['class' => 'form-control', 'placeholder' => 'Nickname', 'title' => 'Nickname']) }}<br>

                        {{ Form::text('dateOfBirth', '', ['id' => 'datepicker', 'class' => 'form-control', 'placeholder' => 'Date of birth', 'title' => 'Date of birth']) }}<br><br>

                        {{ Form::file('avatar') }}<br>

                        {{ Form::file('coverphoto') }}<br>

                        <button type='submit'  class='btn btn-primary'>Create</button>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
