@extends('layouts.master')

@section('title')
Admin Panel || Asif Mohammed
@endsection

@section('content')

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New About Us</h4>
        <button type="button" class="close" data-dismiss="modal">x</button>  
        </div>
      <form action="/save-aboutus" method="POST">
        {{ csrf_field() }}

        <div class="modal-body">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Title:</label>
                <input type="text" name="title" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Title:</label>
                <input type="text" name="subtitle" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Description:</label>
                <textarea name="description" id="message-text" cols="30" rows="10" class="form-control"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">SAVE</button>
      </div>
    </div>
    </form>
  </div>
</div>
<!-- Delete Model -->


<div class="modal fade" role="dialog" id="deletemodalpop">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="delete_modal_form" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
      <div class="modal-body">
        <input type="hidden" id="delete_aboutus_id">
        <h5>Are you sure.? You want to delete this Data</h5>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondry" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-danger">Yes,Delete It</button>
      </div>
      </form>
    </div>

  </div>
</div>
<!-- Delete Model End -->
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Abouts Us  
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" >ADD NEW</button>
                </h4>
                <br>
            </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="datatable">
                        <thead class=" text-primary">
                        <th class="w-10p">ID</th>
                        <th class="w-10p">Title</th>
                        <th class="w-10p">Sub-Title</th>
                        <th class="w-10p">Description</th>
                        <th class="w-10p">EDIT</th>
                        <th class="w-10p">DELETE</th>
                    </thead>
                    <tbody>
                        @foreach ($aboutus as $data)
                      <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->subtitle }}</td>
                            <td>{{ $data->description }}</td>
                            <td>
                                <a href="{{ url('about-us/'.$data->id) }}" class="btn btn-success">EDIT</a>
                            </td>
                            <td>
                              <a href="javascript:void(0)" class="btn btn-danger deletebtn">DELETE</a>
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
@endsection

@section('scripts')
  <script>
      $(document).ready( function () {
        $('#datatable').DataTable();

      $('#datatable').on('click','.deletebtn',function(){

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();
           
          // console.log(data);

          $('#delete_aboutus_id').val(data[0]);

          $('#delete_modal_form').attr('action','/about-us-delete/'+data[0]);

          $('#deletemodalpop').modal('show');
        });

      });
  </script>
@endsection
