


@extends('admin.layout.layout')
@push('style')
<style>

</style>
@endpush
@section('content')
<div class="container">


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            {{-- <h2> Show User</h2> --}}
        </div>
        <div class="pull-right text-end">
            <a class="btn btn-sm btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
  <div class="col-md-12 col-lg-12 margin-tb mt-2" style="display: flex;justify-content: space-between;">
      <div class="pull-left">
          <h3>Users Management</h3>
      </div>
      <div class="pull-right">
          <a class="btn btn-sm btn-success" href="{{ route('users.create') }}"> Create New User</a>
      </div>
  </div>
</div>

  @if ($message = Session::get('success'))
  <div class="alert alert-success">
  <p>{{ $message }}</p>
  </div>
  @endif

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title">All Teams</p>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              

              <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Roles</th>
                      <th width="280px">Action</th> 
                                        
                    </tr>
                </thead>
                <tbody>
                  @foreach ($data as $key => $user)
                  <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                      @if(!empty($user->getRoleNames()))
                          @foreach($user->getRoleNames() as $v)
                          <label class="badge badge-success" style="color: black;">{{ $v }}</label>
                          @endforeach
                      @endif
                      </td>
                      <td>
                      {{-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a> --}}
                      <a class="btn btn-sm btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                              {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                          {!! Form::close() !!}
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
</div>

</div>



@endsection





@push('script')
<script>
    $(document).ready( function () {
         $('#myTable').DataTable();
     } );
   </script>
@endpush