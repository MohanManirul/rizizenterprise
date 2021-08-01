@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage News
        </div>
        <div class="card-body">
            @include('backend.partials.messages')

            <a href="#addNewsModal" data-toggle="modal" class="btn btn-info float-right mb-2">
              <i class="fa fa-plus"></i> Add New News
            </a>
            <div class="clearfix"></div>
            
            <!-- Add Modal -->
            <div class="modal fade" id="addNewsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New News</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form action="{!! route('admin.news.store') !!}"  method="post" enctype="multipart/form-data">

                      {{ csrf_field() }}                   

                      <div class="form-group">
                        <label for="title">Short News : <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="News Title" required>
                      </div>                      

                      <div class="form-group">
                        <label for="descriptions">Descriptions <small class="text-danger">(required)</small></label>
                        <textarea name="descriptions" id="descriptions" placeholder="Descriptions" required class="form-control" rows="5" id="comment"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="image">News Image <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="News Image" required>
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
              <th>News Title</th>
              <th>News Descriptions</th>
              <th>Image</th>
              <th>Action</th>
            </tr>

            @foreach ($news as $news)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->descriptions }}</td>
                <td>
                  <img src="{{ asset('backend/assets/images/news/'.$news->image) }}" width="40">
                </td>
                

                <td>
                  <a href="#editModal{{ $news->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{ $news->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $news->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.news.delete', $news->id) !!}"  method="post">
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
                  <div class="modal fade" id="editModal{{ $news->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.news.update', $news->id) !!}"  method="post" enctype="multipart/form-data">

                          {{ csrf_field() }}

                            <div class="form-group">
                              <label for="title">News Title <small class="text-info">(required)</small></label>
                              <input type="text" class="form-control" name="title" id="title" placeholder="News Title" value="{{ $news->title }}" required>
                            </div>

                            <div class="form-group">
                                  <label for="image">News Image 
                                    <a href="{{ asset('backend/assets/images/news/'.$news->image) }}" target="_blank">
                                      Previous Image
                                    </a>
                                    <small class="text-danger">(required)</small></label>
                                  <input type="file" class="form-control" name="image" id="image" placeholder="News Image">
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
