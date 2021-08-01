@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage SubSliders
        </div>
        <div class="card-body">
            @include('backend.partials.messages')

            <a href="#addSubSlidersModal" data-toggle="modal" class="btn btn-info float-right mb-2">
              <i class="fa fa-plus"></i> Add New SubSliders
            </a>
            <div class="clearfix"></div>
            
            <!-- Add Modal -->
            <div class="modal fade" id="addSubSlidersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new subsliders</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form action="{!! route('admin.subsliders.store') !!}"  method="post" enctype="multipart/form-data">

                      {{ csrf_field() }}                     

                      <div class="form-group">
                        <label for="product_model">Product Model : <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="product_model" id="product_model" placeholder="Product Model :" required>
                      </div>

                      <div class="form-group">
                        <label for="product_name">Product Name <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" required>
                      </div>

                      <div class="form-group">
                        <label for="image">SubSliders Image <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="image" id="image" placeholder="SubSliders Image" required>
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
              <th>Product Name</th>
              <th>Product Model</th>
              <th>Image</th>
              <th>Action</th>
            </tr>

            @foreach ($subsliders as $subsliders)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $subsliders->product_name }}</td>
                <td>{{ $subsliders->product_model }}</td>
                <td>
                  <img src="{{ asset('backend/assets/images/subsliders/'.$subsliders->image) }}" width="40">
                </td>
                

                <td>
                  <a href="#editModal{{ $subsliders->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{ $subsliders->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $subsliders->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.subsliders.delete', $subsliders->id) !!}"  method="post">
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
                  <div class="modal fade" id="editModal{{ $subsliders->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.subsliders.update', $subsliders->id) !!}"  method="post" enctype="multipart/form-data">

                          {{ csrf_field() }}

                          
                          
                            <div class="form-group">
                              <label for="product_name">Product Name <small class="text-info">(required)</small></label>
                              <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name; e.g: 10" value="{{ $subsliders->product_name }}" required>
                            </div>

                            <div class="form-group">
                              <label for="product_model">Product Name <small class="text-info">(required)</small></label>
                              <input type="text" class="form-control" name="product_model" id="product_model" placeholder="Product Model" value="{{ $subsliders->product_model }}" required>
                            </div>

                            <div class="form-group">
                                  <label for="image">SubSliders Image 
                                    <a href="{{ asset('images/subsliders/'.$subsliders->image) }}" target="_blank">
                                      Previous Image
                                    </a>
                                    <small class="text-danger">(required)</small></label>
                                  <input type="file" class="form-control" name="image" id="image" placeholder="SubSliders Image">
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
