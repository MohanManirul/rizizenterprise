@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Edit Communications
        </div>
        <div class="card-body">
          <form action="{{ route('admin.communications.update', $communications->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('backend.partials.messages')
            
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $communications->name }}">
            </div>

            <button type="submit" class="btn btn-success">Update Communications</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
