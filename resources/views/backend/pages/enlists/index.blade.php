@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage Enlists
        </div>
        <div class="card-body">
            @include('backend.partials.messages')

            <a href="#addSliderModal" data-toggle="modal" class="btn btn-info float-right mb-2">
              <i class="fa fa-plus"></i>+ Add New Enlist
            </a>
            <div class="clearfix"></div>
            
            <!-- Add Modal -->
            <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Enlists</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form action="{!! route('admin.enlists.store') !!}"  method="post" enctype="multipart/form-data">

                      @csrf

                      <div class="form-group">
                        <label for="name">Enlist<small class="text-danger">(required)</small></label>
                        <input type="text" name="name" placeholder="Enter Enlist"  class="form-control" required></input>
                      </div>

                      <div class="form-group">
                        <label for="link">Link<small class="text-danger">(required)</small></label>
                        <input type="text" name="link" placeholder="Enter Link"  class="form-control" required></input>
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
              <th>Sl.</th>
              <th>Enlists</th>
              <th>Link</th>
              <th>Action</th>
            </tr>

            @foreach ($enlists as $enlist)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $enlist->name }}</td>
                <td>{{ $enlist->link }}</td>
                <td>
                  <a href="#editModal{{ $enlist->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{ $enlist->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $enlist->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.enlists.delete', $enlist->id) !!}"  method="post">
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
                  <div class="modal fade" id="editModal{{ $enlist->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.enlists.update', $enlist->id) !!}"  method="post" enctype="multipart/form-data">

                          @csrf 

                      <div class="form-group">
                        <label for="name">Enlist<small class="text-danger">(required)</small></label>
                        <input type="text" name="name" class="form-control" value="{{$enlist->name}}" required></input>
                      </div>

                      <div class="form-group">
                        <label for="link">Enlist<small class="text-danger">(required)</small></label>
                        <input type="text" name="link" class="form-control" value="{{$enlist->link}}" required></input>
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
