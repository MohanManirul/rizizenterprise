@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage CompanyNews
        </div>
        <div class="card-body">
            @include('backend.partials.messages')

            <a href="#addCompanyNewsModal" data-toggle="modal" class="btn btn-info float-right mb-2">
              <i class="fa fa-plus"></i> Add New CompanyNews
            </a>
            <div class="clearfix"></div>
            
            <!-- Add Modal -->
            <div class="modal fade" id="addCompanyNewsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new companynews</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form action="{!! route('admin.companynews.store') !!}"  method="post" enctype="multipart/form-data">

                      {{ csrf_field() }}                     

                      <div class="form-group">
                        <label for="title">Title : <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title :" required>
                      </div>

                      <div class="form-group">
                        <label for="descriptions">Descriptions <small class="text-danger">(required)</small></label>
                        <textarea name="descriptions" id="descriptions" placeholder="Descriptions" required class="form-control" rows="5" id="comment"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="image">CompanyNews Image <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="CompanyNews Image" required>
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

            @foreach ($companynews as $companynews)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{str_limit($companynews->title, $limit = 20, $end = '...')}}</td>
                <td>{{str_limit($companynews->descriptions, $limit = 50, $end = '...')}}</td>
                <td>
                  <img src="{{ asset('backend/assets/images/companynews/'.$companynews->image) }}" width="40">
                </td>               

                <td>
                  <a href="#editModal{{ $companynews->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{ $companynews->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $companynews->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.companynews.delete', $companynews->id) !!}"  method="post">
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
                  <div class="modal fade" id="editModal{{ $companynews->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.companynews.update', $companynews->id) !!}"  method="post" enctype="multipart/form-data">

                          {{ csrf_field() }}                          
                          
                            <div class="form-group">
                              <label for="title">Title <small class="text-info">(required)</small></label>
                              <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ $companynews->title }}" required>
                            </div>

                            <div class="form-group">
                              <label for="descriptions">Descriptions <small class="text-danger">(required)</small></label>
                              <textarea name="descriptions" id="descriptions" required class="form-control" rows="5" id="comment">{{ $companynews->descriptions }}</textarea>
                          </div>

                            <div class="form-group">
                                  <label for="image">CompanyNews Image 
                                    <a href="{{ asset('images/companynews/'.$companynews->image) }}" target="_blank">
                                      Previous Image
                                    </a>
                                    <small class="text-danger">(required)</small></label>
                                  <input type="file" class="form-control" name="image" id="image" placeholder="CompanyNews Image">
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
