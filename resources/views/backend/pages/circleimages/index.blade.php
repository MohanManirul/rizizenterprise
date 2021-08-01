@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage Logos
        </div>
        <div class="card-body">
            @include('backend.partials.messages')

            <a href="#addLogoModal" data-toggle="modal" class="btn btn-info float-right mb-2">
              <i class="fa fa-plus"></i> Add New Logo
            </a>
            <div class="clearfix"></div>
            
            <!-- Add Modal -->
            <div class="modal fade" id="addLogoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new images</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form action="{!! route('admin.circleimages.store') !!}"  method="post" enctype="multipart/form-data">

                      @csrf

                      <div class="form-group">
                        <label for="slogan">Company Slogan <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="slogan"  placeholder="Company slogan" required>
                      </div>

                      <div class="form-group">
                        <label for="imageOne">Company image One <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="imageOne"  placeholder="Company image One" required>
                      </div>

                      <div class="form-group">
                        <label for="imageTwo">Company image Two <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="imageTwo"  placeholder="Company image Two" required>
                      </div>

                      <div class="form-group">
                        <label for="imageThree">Company image Three <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="imageThree"  placeholder="Company image Three" required>
                      </div>

                      <div class="form-group">
                        <label for="imageFour">Company image Four <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="imageFour"  placeholder="Company image Four" required>
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
              <th>Slogan</th>
              <th>Image One</th>
              <th>Image Two</th>
              <th>Image Three</th>
              <th>Image Four</th>
              <th>Action</th>
            </tr>

            @foreach ($circleimages as $circleimage)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $circleimage->slogan }}</td>
                <td>
                  <img src="{{ asset('frontend/images/'.$circleimage->imageOne) }}" style="width:60px; height:60px">
                </td>

                <td>
                  <img src="{{ asset('frontend/images/'.$circleimage->imageTwo) }}" style="width:60px; height:60px">
                </td>

                <td>
                  <img src="{{ asset('frontend/images/'.$circleimage->imageThree) }}" style="width:60px; height:60px">
                </td>

                <td>
                  <img src="{{ asset('frontend/images/'.$circleimage->imageFour) }}" style="width:60px; height:60px">
                </td>
                <td>
                  <a href="#editModal{{ $circleimage->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{ $circleimage->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $circleimage->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.circleimages.delete', $circleimage->id) !!}"  method="post">
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
                  <div class="modal fade" id="editModal{{ $circleimage->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.circleimages.update', $circleimage->id) !!}"  method="post" enctype="multipart/form-data">

                          @csrf 

                      <div class="form-group">
                        <label for="slogan">Company Slogan <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="slogan"  value="{{$circleimage->slogan}}" >
                      </div>

                      <div class="form-group">
                        <label for="imageOne">Company image One <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="imageOne"  value="{{$circleimage->imageOne}}" >
                      </div>

                      <div class="form-group">
                        <label for="imageTwo">Company image Two <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="imageTwo"  value="{{$circleimage->imageTwo}}" >
                      </div>

                      <div class="form-group">
                        <label for="imageThree">Company image Three <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="imageThree"  value="{{$circleimage->imageThree}}" >
                      </div>

                      <div class="form-group">
                        <label for="imageFour">Company image Four <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="imageFour"  value="{{$circleimage->imageFour}}" >
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
