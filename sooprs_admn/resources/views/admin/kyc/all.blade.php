@extends('admin.layout.layout')



@push('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">

@endpush





@section('content')

<div class="body flex-grow-1 px-3">
    <div class="container-lg">
      <div class="row">
        @if (\Session::has('success')) 
            <div class="alert alert-success"> 
                <ul> 
                    <li>{!! \Session::get('success') !!} </li>
                </ul> 
            </div> 
        @endif
        @if (\Session::has('error')) 
            <div class="alert alert-error"> 
                <ul> 
                    <li>{!! \Session::get('error') !!} </li>
                </ul> 
            </div> 
        @endif

        {{-- <div class="col-lg-12 mb-3">
            <a href="{{ route('add.professional') }}" class="btn button-21">Add Professional</a>
        </div> --}}
        
        <div class="col-sm-12 col-lg-12">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>User's slug</th>
                        <th>ID Number</th>
                        <th>Document</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($all as $index=>$single)
                    <tr>
                        <td>
                            {{ $index+=1 }}
                        </td>                        
                        <td>{{ $single->name }}</td>
                        <td>{{ $single->user_id }}</td>
                        <td>{{ $single->id_number }}</td>  
                        <td>
                            <a href="{{ $single->front_image }}" class="fancybox" data-fancybox="gallery1"><img src="{{ $single->front_image }}" alt="" style="    max-width: 60px;"></a>
                            <a href="{{ $single->back_image }}" class="fancybox" data-fancybox="gallery1"><img src="{{ $single->back_image }}" alt="" style="    max-width: 60px;"></a>
                        </td>
                        <td>
                            
                               @if($single->is_kyc_verified == 0 )
                                    <span class="bg-danger text-light pt-1 pb-1 pe-2 ps-2">Not Verified</span>
                                @elseif($single->is_kyc_verified == 1)
                                <span class="bg-success text-light pt-1 pb-1 pe-2 ps-2">Verified</span>

                               @endif
                            
                        </td>
                        <td class="d-flex flex-column">
                            {{-- <a href="{{ route('getViewProfessional',$single->id) }}"><i class="fa-solid fa-eye text-success" title="View"></i></a> --}}
                            <a href="{{ route('getEditVerification',$single->id) }}"><i class="fa-solid fa-pen-to-square" title="Edit"></i></a>
                            {{-- <a href="{{ route('deleteProfessional',$single->id) }}"><i class="fa-solid fa-trash text-danger" title="Delete" onclick="return confirm('Are you sure you want to delete it?')"></i></a> --}}
                        </td>
                    </tr>   
                    @endforeach
                </tbody>
                
            </table>

            
        </div>
        
      </div>
      
    </div>
</div>


    
@stop

 <!-- Modal -->
 {{-- @foreach($all as $single)
 <div class="modal fade" data-id="{{ $single->id }}" id="exampleModal{{ $single->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Enquiries</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       
       <div class="modal-body">
            <table id="examplequery" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Answer</th> 
                    <th>id</th>                    
                </tr>
            </thead>
            <tbody>
                @foreach($single->itsQueries as $one)
                <tr>
                    <td>{{ $one->question }}</td>
                    <td>{{ $one->answer }}</td>
                    <td>{{ $one->id }}</td>
                </tr>   
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Answer</th>
                    <th>id</th>                  
                </tr>
            </tfoot>
        </table>
       </div>
     </div>
   </div>
 </div>
 @endforeach --}}



@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

<script>
$(document).ready(function () {
    new DataTable('#example', {
   
});
});


</script>

@endpush

