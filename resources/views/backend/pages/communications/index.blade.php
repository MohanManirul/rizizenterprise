@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage Communications
        </div>
        <div class="card-body">
            @include('backend.partials.messages')

            <a href="#addCommunicationsModal" data-toggle="modal" class="btn btn-info float-right mb-2">
              <i class="fa fa-plus"></i> Add New Communications
            </a>
            <div class="clearfix"></div>
            
            <!-- Add Modal -->
            <div class="modal fade" id="addCommunicationsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new communications</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form action="{!! route('admin.communications.store') !!}"  method="post" enctype="multipart/form-data">

                      @csrf                    

                      <div class="form-group">
                        <label for="title">Title : <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title :" required>
                      </div>

                      <div class="form-group">
                        <label for="descriptions">Descriptions <small class="text-danger">(required)</small></label>
                        <textarea name="descriptions" id="descriptions" placeholder="Descriptions" required class="form-control" rows="5" id="comment"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="image">Communications Image <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="Communications Image" required>
                      </div>

                      <button type="submit" class="btn btn-success">Add New</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                    </form>

                  </div>
                </div>
              </div>
            </div>


            <table class="table table-hover table-striped"  id="dataTable">
            <tr>
              <th>Sl</th>
              <th>Title</th>
              <th>Descriptions</th>
              <th>Image</th>
              <th>Action</th>
            </tr>

            @foreach ($communications as $communications)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{str_limit($communications->title, $limit = 20, $end = '...')}}</td>
                <td>{{str_limit($communications->descriptions, $limit = 50, $end = '...')}}</td>
                <td>
                  <img src="{{ asset('backend/assets/images/communications/'.$communications->image) }}" width="40">
                </td>               

                <td>
                  <a href="#editModal{{ $communications->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{ $communications->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $communications->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.communications.delete', $communications->id) !!}"  method="post">
                            {{ csrf_field() }}
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
                  <div class="modal fade" id="editModal{{ $communications->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.communications.update', $communications->id) !!}"  method="post" enctype="multipart/form-data">

                          {{ csrf_field() }}                          
                          
                            <div class="form-group">
                              <label for="title">Title <small class="text-info">(required)</small></label>
                              <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ $communications->title }}" required>
                            </div>

                            <div class="form-group">
                              <label for="descriptions">Descriptions <small class="text-danger">(required)</small></label>
                              <textarea name="descriptions" id="descriptions" required class="form-control" rows="5" id="comment">{{ $communications->descriptions }}</textarea>
                          </div>

                            <div class="form-group">
                                  <label for="image">Communications Image 
                                    <a href="{{ asset('images/communications/'.$communications->image) }}" target="_blank">
                                      Previous Image
                                    </a>
                                    <small class="text-danger">(required)</small></label>
                                  <input type="file" class="form-control" name="image" id="image" placeholder="Communications Image">
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
  <!-- main-panel ends -->
@endsection
