@extends('admin.layout.layout')
@push('style')
    <style>
        .breadcrumb-div {
            margin: 10px;
            padding: 10px 10px 10px 0;
        }

        .breadcrumb-anchor {
            padding: 10px;
            background: gainsboro;
            border-radius: 25px;

        }
    </style>
@endpush

@section('content')

    <div class="container">


        <div class="main-panel">
            <div class="content-wrapper">
                {{-- <div class="breadcrumb-div">
                    <a class="breadcrumb-anchor" href="{{ url('') }}/users">Users</a>
                    <i class="mdi mdi-arrow-right"></i>
                    <span class="breadcrumb-anchor"> Edit user </span>
                </div> --}}


                <div class="row">
                    <div class="col-md-12 col-lg-12 margin-tb" style="display: flex;justify-content: space-between;">
                        <div class="pull-left">
                            <h3>Edit your details</h3>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-sm btn-success" href="{{ route('users.index') }}"> Back</a>
                        </div>
                    </div>
                </div>


                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
                <div class="row justify-content-center">
                    <div class="col-xs-12 col-sm-12 col-md-8 mt-3">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 mt-3">
                        <div class="form-group">
                            <strong>Email:</strong>
                            {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 mt-3">
                        <div class="form-group">
                            <strong>Password:</strong>
                            {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 mt-3">
                        <div class="form-group">
                            <strong>Confirm Password:</strong>
                            {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    {{-- @can('role-edit') --}}
                    <div class="col-xs-12 col-sm-12 col-md-8 mt-3">
                        <div class="form-group">
                            <strong>Role:</strong>
                            {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
                        </div>
                    </div>
                    {{-- @endcan --}}
                    <div class="col-xs-12 col-sm-12 col-md-8 mt-3 text-center">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>

        @endsection
