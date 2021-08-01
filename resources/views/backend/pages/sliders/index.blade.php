@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage Sliders
        </div>
        <div class="card-body">
            @include('backend.partials.messages')

            <a href="#addSliderModal" data-toggle="modal" class="btn btn-info float-right mb-2">
              <i class="fa fa-plus"></i> Add New Slider
            </a>
            <div class="clearfix"></div>
            
            <!-- Add Modal -->
            <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form action="{!! route('admin.slider.store') !!}"  method="post" enctype="multipart/form-data">

                      @csrf

                      <div class="form-group">
                        <label for="favicon">Fav Icon<small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="favicon" id="favicon" placeholder="Fav Icon" required>
                      </div>

                      <div class="form-group">
                        <label for="logo">Company logo <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="logo" id="logo" placeholder="Company logo" required>
                      </div>

                      <div class="form-group">
                        <label for="bgPicture">Company bgPicture <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="bgPicture" id="bgPicture" placeholder="Company bgPicture" required>
                      </div>

                      <div class="form-group">
                        <label for="title">Main Title <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Main Title" required>
                      </div>

                      <div class="form-group">
                        <label for="subtitle">Subtitle <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Subtitle" required>
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
              <th>Favicon</th>
              <th>Logo</th>
              <th>Background Image</th>
              <th>Title</th>
              <th>Sub Title</th>
              <th>Action</th>
            </tr>

            @foreach ($sliders as $slider)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>
                  <img src="{{ asset('assets/img/'.$slider->favicon) }}" width="40">
                </td>
                <td>
                  <img src="{{ asset('assets/img/'.$slider->logo) }}" width="40">
                </td>
                <td>
                  <img src="{{ asset('assets/img/'.$slider->bgPicture) }}" width="40">
                </td>
                <td>{{ str_limit($slider->title , $limit = 10) }}</td>
                <td>{{ str_limit($slider->subtitle, $limit= 10) }}</td>
                <td>
                  <a href="#editModal{{ $slider->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{ $slider->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.slider.delete', $slider->id) !!}"  method="post">
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
                  <div class="modal fade" id="editModal{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.slider.update', $slider->id) !!}"  method="post" enctype="multipart/form-data">

                          @csrf 

                          <div class="form-group">
                            <label for="favicon">Previous favicon                            
                              <small class="text-danger">(required)</small></label>
                            <input type="file" class="form-control" name="favicon" id="favicon" placeholder="Slider favicon">
                          </div>

                          <div class="form-group">
                            <label for="logo">logo 
                              <a href="{{ asset('assets/img/'.$slider->logo) }}" target="_blank">
                                Previous logo
                              </a>
                              <small class="text-danger">(required)</small></label>
                            <input type="file" class="form-control" name="logo" id="logo" placeholder="Company Logo">
                          </div>

                          <div class="form-group">
                            <label for="bgPicture">bgPicture 
                              <a href="{{ asset('assets/img/'.$slider->bgPicture) }}" target="_blank">
                                Previous bgPicture
                              </a>
                              <small class="text-danger">(required)</small></label>
                            <input type="file" class="form-control" name="bgPicture" id="bgPicture" placeholder="bgPicture">
                          </div>

                      <div class="form-group">
                        <label for="title">Slider title <small class="text-info">(required)</small></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Slider title"; value="{{$slider->title}}" required>
                      </div>

                      <div class="form-group">
                        <label for="subtitle">Slider subtitle <small class="text-info">(required)</small></label>
                        <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Slider subtitle"; value="{{$slider->subtitle}}" required>
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
