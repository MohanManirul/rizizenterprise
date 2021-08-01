@extends('backend.layouts.master')
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css" rel="stylesheet"> -->



@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage service
        </div>
        <div class="card-body">
            @include('backend.partials.messages')

            <a href="#addSliderModal" data-toggle="modal" class="btn btn-info float-right mb-2">
              <i class="fa fa-plus"></i>+ Add New service
            </a>
            <div class="clearfix"></div>
            
            <!-- Add Modal -->
            <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form action="{!! route('admin.service.store') !!}"  method="post" enctype="multipart/form-data">

                      @csrf

                      <div class="form-group">
                        <label for="title">Title<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                      </div>

                      <div class="form-group">
                        <label for="mAbout">Description<small class="text-danger">(required)</small></label>
                        <textarea name="descriptions" id="descriptions" placeholder="Description"  class="ckeditor form-control" rows="5" required></textarea>
                      </div>
                      
                      <div class="form-group">
                        <label for="image">Image<small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Image">
                      </div>

                      <button type="submit" class="btn btn-success">Add New</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                    </form>

                  </div>
                </div>
              </div>
            </div>


          <table id="example"  class="table table-hover table-striped">
            <tr>
              <th>Sl</th>
              <th>Title</th>
              <th>Description</th>
              <th>Image</th>
              <th>Action</th>
            </tr>

            @foreach ($service as $service)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ str_limit($service->title, $limit = 10) }}</td>                
                <td>{{ str_limit(strip_tags($service->descriptions), $limit = 10) }}</td>
                <td><img src="{{ asset('assets/img/'.$service->image) }}" width="40"></td>
                <td>
                  <a href="#editModal{{ $service->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{ $service->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.service.delete', $service->id) !!}"  method="post">
                            @csrf 
                            <button type="submit" class="btn btn-danger">Permanent Delete</button>
                          </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Edit Modal -->
                  <div class="modal fade" id="editModal{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.service.update', $service->id) !!}"  method="post" enctype="multipart/form-data">

                          @csrf 

                      <div class="form-group">
                        <label for="title">Title<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="title" id="title" value="{{$service->title}}">
                      </div>

                      <div class="form-group">
                        <label for="mAbout">Description<small class="text-danger">(required)</small></label>
                        <textarea name="descriptions" id="descriptions"  class="ckeditor form-control" rows="5" required>{{$service->descriptions}}</textarea>
                      </div>

                      <div class="form-group">
                        <label for="image">Image<small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Enter Title">
                      </div>

                          <button type="submit" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                        </form>
                        </div>
                      </div>
                    </div>
                  </div>


                </td>
              </tr>
            @endforeach

          </table>
        </div>
      </div>

    </div>
  </div>
  <script></script>
  


  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });

    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
  <!-- main-panel ends -->
@endsection
