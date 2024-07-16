@extends('admin.layout.layout')



@push('style')

@endpush





@section('content')
<div class="row">
    {{-- Update your details --}}
            @if(Session::has('success_message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">          
                <strong></strong> {{ Session::get('success_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            @if(Session::has('fail_message'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">          
                <strong></strong> {{ Session::get('fail_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
    <div class="col-md-6 col-sm-12 grid-margin stretch-card">
        <div class="card" style="height:100%">
            <div class="card-body">
              <h4 class="card-title">Update your details</h4>
              {{-- <p class="card-description">
                Basic form layout
              </p> --}}
              <form class="forms-sample" method="post" action="{{ route('name.email.update', Auth::user()->id) }}">
                @csrf
                <div class="form-group" style="    padding: 10px 0;">
                  <label for="exampleInputUsername1">Name</label>
                  <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name="name" value=" {{ Auth::user()->name }}">
                </div>
                <div class="form-group" style="    padding: 10px 0;">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value=" {{ Auth::user()->email }}">
                </div>
                
                
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                {{-- <button class="btn btn-light">Cancel</button> --}}
              </form>
            </div>
        </div>
    </div>
    {{-- Update your password --}}
    <div class="col-md-6 col-sm-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Update your password</h4>
              {{-- <p class="card-description">
                Basic form layout
              </p> --}}
              <form class="forms-sample" method="post" action="{{ route('update-password') }}">
                @csrf
                <div class="form-group" style="    padding: 10px 0;">
                    <label for="exampleInputPassword1">Old Password</label>
                    <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
                    @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                  </div>                        
                <div class="form-group" style="    padding: 10px 0;">
                  <label for="exampleInputPassword1"> New Password</label>
                  <input name="new_password" type="password" class="form-control  @error('new_password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
                  @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="form-group" style="    padding: 10px 0;">
                  <label for="exampleInputConfirmPassword1">Confirm New Password</label>
                  <input name="new_password_confirmation" type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                {{-- <button class="btn btn-light">Cancel</button> --}}
              </form>
            </div>
          </div>
    </div>
    
  </div>
@endsection





@push('script')

@endpush