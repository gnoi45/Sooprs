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

        <div class="col-lg-12 mb-3">
            <a href="{{ route('add.professional') }}" class="btn button-21">Add Professional</a>
        </div>
        
        <div class="col-sm-12 col-lg-12">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Services</th>

                        <th></th>
                      

                    </tr>
                </thead>
                <tbody>
                    @foreach($all as $index=>$single)
                    <tr>
                        <td>
                            {{ $index+=1 }}
                        </td>
                        <td>
                            <a href="{{ $single->image }}" class="fancybox" data-fancybox="gallery1"><img src="{{ $single->image }}" alt="" style="    max-width: 28px;"></a>
                        </td>
                        <td>{{ $single->name }}</td>
                        <td>{{ $single->email }}</td>
                        <td>{{ $single->mobile }}</td>  
                        <td>
                            @foreach($single->hisServices as $one)
                            <span class="ps-1 pe-1 rounded bg-info text-white d-inline-block" style="font-size: 0.8rem">{{ $one }}</span>
                            @endforeach
                        </td>   

                        <td class="d-flex flex-column">
                            <a href="{{ route('getViewProfessional',$single->id) }}"><i class="fa-solid fa-eye text-success" title="View"></i></a>
                            <a href="{{ route('geteditProfessional',$single->id) }}"><i class="fa-solid fa-pen-to-square" title="Edit"></i></a>
                            <a href="{{ route('deleteProfessional',$single->id) }}"><i class="fa-solid fa-trash text-danger" title="Delete" onclick="return confirm('Are you sure you want to delete it?')"></i></a>
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


// $(document).ready(function () {
//     $('#examplequery').DataTable();
// });


</script>

<script type="text/javascript">
    $(function () {
  
      var table = $('.yajra-datatable').DataTable({
          processing: true,
          serverSide: true,
      
          ajax: "{{ route('ajax.join.professionals') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'mobile', name: 'mobile'},
              {data: 'organisation', name: 'organisation'},
              {data: 'service', name: 'service'},
            //   {
            //       data: 'action', 
            //       name: 'action', 
            //       orderable: true, 
            //       searchable: true
            //   },
          ]
      });
  
    });
  </script>
@endpush


{{-- $(document).on('show.bs.modal', function(){
    
    let idOfModal = document.querySelector(".modal.show");
    let attrval = idOfModal.getAttribute('data-id');
    console.log(attrval);
        
    

}) --}}