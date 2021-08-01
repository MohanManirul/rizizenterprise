@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage Actions
        </div>
        <div class="card-body">
            @include('backend.partials.messages')

            <a href="#addActionModal" data-toggle="modal" class="btn btn-info float-right mb-2">
              <i class="fa fa-plus"></i> Add New Achivement
            </a>
            <div class="clearfix"></div>
            
            <!-- Add Modal -->
            <div class="modal fade" id="addActionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">+ Add Achivement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form action="{!! route('admin.action.store') !!}"  method="post" enctype="multipart/form-data">

                      @csrf

                      <div class="form-group">
                        <label for="callDescriptions">Call To Action Descriptions<small class="text-danger">(required)</small></label>
                        <textarea name="callDescriptions" id="callDescriptions" placeholder="Enter Call Descriptions"  class="ckeditor form-control" rows="5" required></textarea>
                      </div>

                      <div class="form-group">
                        <label for="actionImage">Call To Action Background Image <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="actionImage" id="actionImage" placeholder="Call To Action Background Image " required>
                      </div>

                      <div class="form-group">
                        <label for="achiveTitle">Achive Title<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="achiveTitle" id="achiveTitle" placeholder="Achive Title" required>
                      </div>

                      <div class="form-group">
                        <label for="achiveImage">Achive Image <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="achiveImage" id="achiveImage" placeholder="Achive Image" required>
                      </div>

                      <div class="form-group">
                        <label for="clients">Total Clients<small class="text-danger">(required)</small></label>
                        <input type="number" class="form-control" name="clients" id="clients" placeholder="Total Clients" required>
                      </div>

                      <div class="form-group">
                        <label for="projects">Total Projects<small class="text-danger">(required)</small></label>
                        <input type="number" class="form-control" name="projects" id="projects" placeholder="Total Projects" required>
                      </div>

                      <div class="form-group">
                        <label for="hSupports">Support Hours<small class="text-danger">(required)</small></label>
                        <input type="number" class="form-control" name="hSupports" id="hSupports" placeholder="Support Hours" required>
                      </div>

                      <div class="form-group">
                        <label for="workers">Support Workers<small class="text-danger">(required)</small></label>
                        <input type="number" class="form-control" name="workers" id="workers" placeholder="Support Workers" required>
                      </div>

                      <div class="form-group">
                        <label for="contact">Contact<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="contact" id="contact" placeholder="Main Title" required>
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
              <th>CallDesc</th>
              <th>CallImg</th>
              <th>aTitle</th>
              <th>AImg</th>
              <th>clts</th>
              <th>prjts</th>
              <th>hS</th>
              <th>wrks</th>
              <th>contact</th>
              <th>Action</th>
            </tr>

            @foreach ($actions as $action)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ str_limit(strip_tags($action->callDescriptions), $limit = 10) }}</td>
                <td>
                  <img src="{{ asset('assets/img/'.$action->actionImage) }}" width="40">
                </td>
                <td>{{ str_limit($action->achiveTitle, $limit = 10) }}</td>
                <td>
                  <img src="{{ asset('assets/img/'.$action->achiveImage) }}" width="40">
                </td>
                                
                
                <td>{{ $action->clients }}</td>
                <td>{{ $action->projects }}</td>
                <td>{{ $action->hSupports }}</td>
                <td>{{ $action->workers }}</td>
                <td>{{ str_limit($action->contact, $limit = 10 )}}</td>
                <td>
                  <a href="#editModal{{ $action->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{ $action->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $action->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.action.delete', $action->id) !!}"  method="post">
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
                  <div class="modal fade" id="editModal{{ $action->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.action.update', $action->id) !!}"  method="post" enctype="multipart/form-data">

                          @csrf 

                          <div class="form-group">
                        <label for="callDescriptions">Call To Action Descriptions<small class="text-danger">(required)</small></label>
                        <textarea name="callDescriptions" id="callDescriptions" placeholder="Enter Call Descriptions"  class="ckeditor form-control" rows="5" required>{{$action->callDescriptions}}</textarea>
                      </div>

                      <div class="form-group">
                        <label for="actionImage">Call To Action Background Image <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="actionImage" id="actionImage" placeholder="Call To Action Background Image ">
                      </div>

                      <div class="form-group">
                        <label for="achiveTitle">Achive Title<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="achiveTitle" id="achiveTitle" placeholder="Achive Title" required value="{{$action->achiveTitle}}">
                      </div>

                      <div class="form-group">
                        <label for="achiveImage">Achive Image <small class="text-danger">(required)</small></label>
                        <input type="file" class="form-control" name="achiveImage" id="achiveImage" placeholder="Achive Image">
                      </div>

                      <div class="form-group">
                        <label for="clients">Total Clients<small class="text-danger">(required)</small></label>
                        <input type="number" class="form-control" name="clients" id="clients" placeholder="Total Clients" required value="{{$action->clients}}">
                      </div>

                      <div class="form-group">
                        <label for="projects">Total Projects<small class="text-danger">(required)</small></label>
                        <input type="number" class="form-control" name="projects" id="projects" placeholder="Total Projects" required value="{{$action->projects}}">
                      </div>

                      <div class="form-group">
                        <label for="hSupports">Support Hours<small class="text-danger">(required)</small></label>
                        <input type="number" class="form-control" name="hSupports" id="hSupports" placeholder="Support Hours" required value="{{$action->hSupports}}">
                      </div>

                      <div class="form-group">
                        <label for="workers">Support Workers<small class="text-danger">(required)</small></label>
                        <input type="number" class="form-control" name="workers" id="workers" placeholder="Support Workers" required value="{{$action->workers}}">
                      </div>

                      <div class="form-group">
                        <label for="contact">Contact<small class="text-danger">(required)</small></label>
                        <input type="text" class="form-control" name="contact" id="contact" placeholder="Main Title" required value="{{$action->contact}}">
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
