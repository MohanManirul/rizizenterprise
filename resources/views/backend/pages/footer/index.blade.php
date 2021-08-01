@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage Footer
        </div>
        <div class="card-body">
            @include('backend.partials.messages')

            <a href="#addFooterModal" data-toggle="modal" class="btn btn-info float-right mb-2">
              <i class="fa fa-plus"></i> 
                Add New Footer</a>
            <div class="clearfix"></div>
            
            <!-- Add Modal -->
            <div class="modal fade " id="addFooterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Footer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form action="{!! route('admin.footer.store') !!}"  method="post" enctype="multipart/form-data">

                     @csrf 

                      <div class="form-group">
                        <label for="weare">WE ARE <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="weare" aria-describedby="emailHelp" placeholder="Enter weare">
                      </div>

                      <div class="form-group">
                        <label for="address">Address<small class="text-danger">(required)</small></label>                        
                        <input type="text" class="form-control" name="address" aria-describedby="emailHelp" placeholder="Enter address">
                      </div>

                      <div class="form-group">
                        <label for="mobile">Mobile<small class="text-danger">(required)</small></label>                        
                        <input type="number" class="form-control" name="mobile" aria-describedby="emailHelp" placeholder="Enter mobile">
                      </div>   

                      <div class="form-group">
                        <label for="email">Email<small class="text-danger">(required)</small></label>                        
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                      </div>  

                      <div class="form-group">
                        <label for="website">Website<small class="text-danger">(required)</small></label>                        
                        <input type="text" class="form-control" name="website" aria-describedby="emailHelp" placeholder="Enter website">
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
              <th>We Are</th>
              <th>Address</th>
              <th>Mobile</th>
              <th>Email</th>
              <th>Website</th>
              <th>Action</th>
            </tr>

            @foreach ($footer as $footer)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{str_limit($footer->weare, $limit = 10, $end = '...')}}</td>
                <td>{{str_limit($footer->address, $limit = 10, $end = '...')}}</td>
                <td>{{$footer->mobile}}</td>            
                <td>{{$footer->email}}</td>            
                <td>{{$footer->website}}</td>            

                <td>
                  <a href="#editModal{{ $footer->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{ $footer->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $footer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.footer.delete', $footer->id) !!}"  method="post">
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
                  <div class="modal fade modal-lg" id="editModal{{ $footer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.footer.update', $footer->id) !!}"  method="post" enctype="multipart/form-data">

                          @csrf

                          <div class="form-group">
                        <label for="weare">WE ARE <small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="weare" aria-describedby="emailHelp" value="{{$footer->weare}}">
                      </div>

                      <div class="form-group">
                        <label for="address">Address<small class="text-danger">(required)</small></label>                        
                        <input type="text" class="form-control" name="address" aria-describedby="emailHelp"  value="{{$footer->address}}">
                      </div>

                      <div class="form-group">
                        <label for="mobile">Mobile<small class="text-danger">(required)</small></label>                        
                        <input type="number" class="form-control" name="mobile" aria-describedby="emailHelp"  value="{{$footer->mobile}}">
                      </div>   

                      <div class="form-group">
                        <label for="email">Email<small class="text-danger">(required)</small></label>                        
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp"  value="{{$footer->email}}">
                      </div>  

                      <div class="form-group">
                        <label for="website">Website<small class="text-danger">(required)</small></label>                        
                        <input type="text" class="form-control" name="website" aria-describedby="emailHelp" value="{{$footer->website}}">
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
