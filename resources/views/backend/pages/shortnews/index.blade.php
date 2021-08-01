@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage ShortNews
        </div>
        <div class="card-body">
            @include('backend.partials.messages')

            <a href="#addShortNewsModal" data-toggle="modal" class="btn btn-info float-right mb-2">
              <i class="fa fa-plus"></i> Add New ShortNews
            </a>
            <div class="clearfix"></div>
            
            <!-- Add Modal -->
            <div class="modal fade" id="addShortNewsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New ShortNews</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form action="{!! route('admin.shortnews.store') !!}"  method="post" enctype="multipart/form-data">

                      {{ csrf_field() }}   

                      <div class="form-group">
                        <label for="shortnews">ShortNews Title <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="shortnews" id="shortnews" placeholder="ShortNews Name" required>
                      </div>

                      <button type="submit" class="btn btn-success">Add New</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                    </form>

                  </div>
                </div>
              </div>
            </div>


          <table class="table table-hover table-striped">
            <tr>
              <th>Sl</th>
              <th>ShortNews</th>
              <th>Action</th>
            </tr>

            @foreach ($shortnews as $shortnews)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{str_limit($shortnews->shortnews, $limit = 50, $end = '...')}}</td>

                <td>
                  <a href="#editModal{{ $shortnews->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{ $shortnews->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $shortnews->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.shortnews.delete', $shortnews->id) !!}"  method="post">
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
                  <div class="modal fade" id="editModal{{ $shortnews->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.shortnews.update', $shortnews->id) !!}"  method="post" enctype="multipart/form-data">

                          {{ csrf_field() }}
                          
                            <div class="form-group">
                              <label for="shortnews">Short ShortNews <small class="text-info">(required)</small></label>
                              <input type="text" class="form-control" name="shortnews" id="shortnews" placeholder="Short tNews" value="{{ $shortnews->shortnews }}" required>
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
