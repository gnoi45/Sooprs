@extends('admin.layout.layout')







@push('style')



@endpush











@section('content')



<div class="body flex-grow-1 px-3">

    <div class="container-lg">

      <div class="row">

        <div class="col-sm-12 col-lg-12">

            <table id="example" class="table table-striped" style="width:100%">

                <thead>

                    <tr>

                        <th>Name</th>

                        <th>Email</th>

                        <th>Mobile</th>

                        <th>Wallet</th>

                        <th>Date</th>    
                                            
                        <th></th>


                    </tr>

                </thead>

                <tbody>

                    @foreach($all as $single)

                    <tr>

                        <td>{{ $single->name }}</td>

                        <td>{{ $single->email }}</td>

                        <td>{{ $single->mobile }}</td> 
                        
                        <td>{{ $single->wallet }}</td> 

                        <td>{{ $single->created_at->formatLocalized('%A, %B %d, %Y, %H:%M:%S') }}</td>                        

                        <td class="d-flex flex-column">
                            {{-- <a href="{{ route('getViewProfessional',$single->id) }}"><i class="fa-solid fa-eye text-success" title="View"></i></a> --}}
                            <a href="{{ route('geteditCustomer',$single->id) }}"><i class="fa-solid fa-pen-to-square" title="Edit"></i></a>
                            {{-- <a href="{{ route('deleteProfessional',$single->id) }}"><i class="fa-solid fa-trash text-danger" title="Delete" onclick="return confirm('Are you sure you want to delete it?')"></i></a> --}}
                        </td>

                    </tr>   

                    @endforeach

                </tbody>

                <tfoot>

                    <tr>

                        <th>Name</th>

                        <th>Email</th>

                        <th>Mobile</th>

                        <th>Wallet</th>

                        <th>Date</th>

                        <th></th>                        

                        

                    </tr>

                </tfoot>

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



<script>

$(document).ready(function () {

    $('#example').DataTable();

});





// $(document).ready(function () {

//     $('#examplequery').DataTable();

// });





</script>

@endpush





{{-- $(document).on('show.bs.modal', function(){

    

    let idOfModal = document.querySelector(".modal.show");

    let attrval = idOfModal.getAttribute('data-id');

    console.log(attrval);

        

    



}) --}}