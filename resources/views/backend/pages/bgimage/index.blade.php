@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage Background Image
        </div>
        <div class="card-body">
            @include('backend.partials.messages')
            @if($bgimage->count() > 0)
            
              to insert new image please Edit or Delete the image

           @else
              <a href="#addLogoModal" data-toggle="modal" class="btn btn-info float-right mb-2">
                <i class="fa fa-plus"></i>+ Add New Background Image
              </a>
            
              
            @endif
            <div class="clearfix"></div>
            
            <!-- Add Modal -->
            <div class="modal fade" id="addLogoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Background Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form action="{!! route('admin.bgimages.store') !!}"  method="post" enctype="multipart/form-data">

                      @csrf

                      <div class="form-group">
                        <label for="image">Background Image <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="image"  placeholder="Background Image" required>
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
              <th>Background Image</th>
              <th>Action</th>
            </tr>

            @foreach ($bgimage as $bgimage)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>
                  <img src="{{ asset('frontend/images/'.$bgimage->image) }}" style= "width:100px";>
                </td>
                <td>
                  <a href="#editModal{{ $bgimage->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{ $bgimage->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $bgimage->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.bgimages.delete', $bgimage->id) !!}"  method="post">
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
                  <div class="modal fade" id="editModal{{ $bgimage->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Image</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.bgimages.update', $bgimage->id) !!}"  method="post" enctype="multipart/form-data">

                          @csrf 

                      <div class="form-group">
                        <label for="image">Background Image <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="image"  placeholder="Background Image" value="{{$bgimage->image}}">
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
