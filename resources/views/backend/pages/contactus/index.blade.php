@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage Contact Us
        </div>
        <div class="card-body">
            @include('backend.partials.messages')

            <a href="#addActionModal" data-toggle="modal" class="btn btn-info float-right mb-2">
              <i class="fa fa-plus"></i>+ Add New Contact Us
            </a>
            <div class="clearfix"></div>
            
            <!-- Add Modal -->
            <div class="modal fade" id="addActionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Contact Us</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form action="{!! route('admin.contactus.store') !!}"  method="post" enctype="multipart/form-data">

                      @csrf

                      <div class="form-group">
                        <label for="location">Location<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="location" id="location" placeholder="Location" required>
                      </div>

                      <div class="form-group">
                        <label for="phone_no">Phone Number<small class="text-danger">(required)</small></label>
                        <input type="number" class="form-control" name="phone_no" id="phone_no" placeholder="Phone Number" required>
                      </div>

                      <div class="form-group">
                        <label for="email">Email <small class="text-danger">(required)</small></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                      </div>

                      <div class="form-group">
                        <label for="title">Title<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                      </div> 

                      <div class="form-group">
                        <label for="twitter">Twitter Link<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter Link" required>
                      </div>

                      <div class="form-group">
                        <label for="facebook">Facebook Link<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook Link" required>
                      </div>

                      <div class="form-group">
                        <label for="instagram">Instragram Link<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Instragram Link" required>
                      </div>

                      <div class="form-group">
                        <label for="skype">Skype Link<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="skype" id="skype" placeholder="Skype Link" required>
                      </div>

                      <div class="form-group">
                        <label for="linkedin">linkedIn Link<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="linkedIn Link" required>
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
              <th>Loc</th>
              <th>Phn</th>
              <th>email</th>
              <th>title</th>
              <th>Tw</th>
              <th>Fb</th>
              <th>Ins</th>
              <th>Sk</th>
              <th>In</th>
              <th>Action</th>
            </tr>

            @foreach ($contactuses as $contactus)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ str_limit($contactus->location, $limit = 5) }}</td>
                <td>{{ str_limit($contactus->phone_no, $limit=5) }}</td>
                <td>{{ str_limit($contactus->email, $limit=5) }}</td>
                <td>{{ str_limit($contactus->title, $limit=5) }}</td>
                <td>{{ str_limit($contactus->twitter, $limit=5) }}</td>
                <td>{{ str_limit($contactus->facebook, $limit = 5 )}}</td>
                <td>{{ str_limit($contactus->instagram, $limit = 5 )}}</td>
                <td>{{ str_limit($contactus->skype, $limit = 5 )}}</td>
                <td>{{ str_limit($contactus->linkedin, $limit = 5 )}}</td>
                <td>
                  <a href="#editModal{{ $contactus->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{ $contactus->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $contactus->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action ="{!! route('admin.contactus.delete', $contactus->id) !!}"  method="post">
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
                  <div class="modal fade" id="editModal{{ $contactus->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action ="{!! route('admin.contactus.update', $contactus->id) !!}"  method="post" enctype="multipart/form-data">

                          @csrf 
                          <div class="form-group">
                        <label for="location">Location<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="location" id="location" placeholder="Location" required value="{{$contactus->location}}">
                      </div>

                      <div class="form-group">
                        <label for="phone_no">Phone Number<small class="text-danger">(required)</small></label>
                        <input type="number" class="form-control" name="phone_no" id="phone_no" placeholder="Phone Number" required value="{{$contactus->phone_no}}">
                      </div>

                      <div class="form-group">
                        <label for="email">Email <small class="text-danger">(required)</small></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required value="{{$contactus->email}}">
                      </div>

                      <div class="form-group">
                        <label for="title">Title<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" required value="{{$contactus->title}}">
                      </div> 

                      <div class="form-group">
                        <label for="twitter">Twitter Link<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter Link" required value="{{$contactus->twitter}}">
                      </div>

                      <div class="form-group">
                        <label for="facebook">Facebook Link<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook Link" required value="{{$contactus->facebook}}">
                      </div>

                      <div class="form-group">
                        <label for="instagram">Instragram Link<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Instragram Link" required value="{{$contactus->instagram}}">
                      </div>

                      <div class="form-group">
                        <label for="skype">Skype Link<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="skype" id="skype" placeholder="Skype Link" required value="{{$contactus->skype}}">
                      </div>

                      <div class="form-group">
                        <label for="linkedin">linkedIn Link<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="linkedIn Link" required value="{{$contactus->linkedin}}">
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
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });

    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection
