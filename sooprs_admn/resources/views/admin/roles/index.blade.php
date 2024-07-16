@extends('admin.layout.layout')
@section('content')
    <div class="container">


        <div class="row">
            <div class="col-lg-12 margin-tb d-flex justify-content-between " style="align-items:center;">
                {{-- <div class="row"> --}}
                    {{-- <div class="col-md-6 col-sm-12"> --}}
                        <div class="">
                            <h3>Role Management</h3>
                        </div>
                    {{-- </div> --}}
                    {{-- <div class="col-md-6 col-sm-12"> --}}
                        
                            <div class="">
                                @can('role-create')
                                    <a class="btn btn-sm btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                                @endcan
                            </div>
                        
                    {{-- </div> --}}
                {{-- </div> --}}


            </div>
        </div>


        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif





        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            {{-- <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a> --}}
                            @can('role-edit')
                                <a class="btn btn-sm btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                            @endcan
                            @can('role-delete')
                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>

                </tr>
            </tfoot>
        </table>

        {!! $roles->render() !!}


        
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
