@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Edit District
        </div>
        <div class="card-body">
          <form action="{{ route('admin.division.update', $division->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $division->name }}">
              <font style="color: red">{{($errors->has('name')?($errors->first('name')): '')}}</font>
            </div>
            <div class="form-group">
              <label for="priority">Priority</label>
              <input type="text" class="form-control" name="priority" id="priority" aria-describedby="emailHelp" value="{{ $division->priority }}">
              <font style="color: red">{{($errors->has('priority')?($errors->first('priority')): '')}}</font>
            </div>


            <button type="submit" class="btn btn-success">Update District</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
