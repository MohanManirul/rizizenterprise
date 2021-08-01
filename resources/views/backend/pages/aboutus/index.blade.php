@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage AboutUs
        </div>
        <div class="card-body">
            @include('backend.partials.messages')

            <a href="#addSliderModal" data-toggle="modal" class="btn btn-info float-right mb-2">
              <i class="fa fa-plus"></i>+ Add New AboutUs
            </a>
            <div class="clearfix"></div>
            
            <!-- Add Modal -->
            <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new AboutUs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form action="{!! route('admin.about.store') !!}"  method="post" enctype="multipart/form-data">

                      @csrf

                      <div class="form-group">
                        <label for="aboutUs">About Us<small class="text-danger">(required)</small></label>
                        <textarea name="aboutUs" id="aboutUs" placeholder="About Us"  class="ckeditor form-control" rows="5" required></textarea>
                      </div>

                      <div class="form-group">
                        <label for="sAbout">Short About<small class="text-danger">(required)</small></label>
                        <textarea name="sAbout" id="sAbout" placeholder="Short About"  class="ckeditor form-control" rows="5" required></textarea>
                      </div>

                      <div class="form-group">
                        <label for="qOne">Quality One<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="qOne" id="qOne" placeholder="Quality One" required>
                      </div>

                      <div class="form-group">
                        <label for="qTwo">Quality Two<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="qTwo" id="qTwo" placeholder="Quality Two" required>
                      </div>

                      <div class="form-group">
                        <label for="qThree">Quality Three<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="qThree" id="qThree" placeholder="Quality Three" required>
                      </div>

                      <div class="form-group">
                        <label for="mAbout">More About<small class="text-danger">(required)</small></label>
                        <textarea name="mAbout" id="mAbout" placeholder="More About"  class="ckeditor form-control" rows="5" required></textarea>
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
              <th>About Us</th>
              <th>Short About</th>
              <th>Quality One</th>
              <th>Quality Two</th>
              <th>Quality Three</th>
              <th>More About</th>
              <th>Action</th>
            </tr>

            @foreach ($about as $about)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ strip_tags(str_limit($about->aboutUs , $limit = 10)) }}</td>
                <td>{{ strip_tags(str_limit($about->sAbout , $limit = 10)) }}</td>
                <td>{{ str_limit($about->qOne, $limit= 10) }}</td>
                <td>{{ str_limit($about->qTwo, $limit= 10) }}</td>
                <td>{{ str_limit($about->qThree, $limit= 10) }}</td>
                <td>{{ strip_tags(str_limit($about->mAbout, $limit= 10)) }}</td>
                <td>
                  <a href="#editModal{{ $about->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{ $about->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $about->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.about.delete', $about->id) !!}"  method="post">
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
                  <div class="modal fade" id="editModal{{ $about->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.about.update', $about->id) !!}"  method="post" enctype="multipart/form-data">

                          @csrf 

                      <div class="form-group">
                        <label for="aboutUs">About Us<small class="text-danger">(required)</small></label>
                        <textarea name="aboutUs" id="aboutUs" placeholder="About Us"  class="ckeditor form-control" rows="5" required>{{$about->aboutUs}}</textarea>
                      </div>

                      <div class="form-group">
                        <label for="sAbout">Short About<small class="text-danger">(required)</small></label>
                        <textarea name="sAbout" id="sAbout" placeholder="Short About"  class="ckeditor form-control" rows="5" required>{{$about->sAbout}}</textarea>
                      </div>

                      <div class="form-group">
                        <label for="qOne">Quality One<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="qOne" id="qOne" placeholder="Quality One" required value="{{$about->qOne}}">
                      </div>

                      <div class="form-group">
                        <label for="qTwo">Quality Two<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="qTwo" id="qTwo" placeholder="Quality Two" required value="{{$about->qTwo}}">
                      </div>

                      <div class="form-group">
                        <label for="qThree">Quality Three<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="qThree" id="qThree" placeholder="Quality Three" required value="{{$about->qThree}}">
                      </div>

                      <div class="form-group">
                        <label for="mAbout">More About<small class="text-danger">(required)</small></label>
                        <textarea name="mAbout" id="mAbout" placeholder="More About"  class="ckeditor form-control" rows="5" required>{{$about->mAbout}}</textarea>
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
  <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
  <!-- main-panel ends -->
@endsection
