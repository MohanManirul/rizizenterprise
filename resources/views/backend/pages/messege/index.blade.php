@extends('backend.layouts.master')
<style>
  .modal-lg {
    max-width: 80% !important;
}
</style>
@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Manage Messeges
        </div>
        <div class="card-body">
            @include('backend.partials.messages')

            <div class="clearfix"></div>

          <table class="table table-hover table-striped">
            <tr>
              <th>Sl</th>
              <th>Name</th>
              <th>Subject</th>
              <th>Email</th>
              <th>Messege</th>
              <th>Action</th>
            </tr>

            @foreach ($msgs as $msg)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ strip_tags(str_limit($msg->name , $limit = 10)) }}</td>
                <td>{{ strip_tags(str_limit($msg->subject , $limit = 10)) }}</td>
                <td>{{ strip_tags(str_limit($msg->email, $limit = 10)) }}</td>
                <td>{{ str_limit($msg->message, $limit= 10) }}</td>
                <td>
                  <a href="#viewModal{{ $msg->id }}" data-toggle="modal" class="btn btn-danger">View</a>
                  <a href="#deleteModal{{ $msg->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $msg->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.messege.delete', $msg->id) !!}"  method="post">
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


                  <!-- View Modal -->
                  <div class="modal fade" id="viewModal{{ $msg->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Message Details</h5>
                          
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                          <div class="icon-box">

                            <h4>Name: {{$msg->name}} </h4>
                            <h4>Subject: {{$msg->subject}}</h4>
                            <h4>Email: {{$msg->email}}</h4>
                            <h4>Messege: {{$msg->message}}</h4>
                            
                          </div>
                      </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
