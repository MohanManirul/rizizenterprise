@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Add District
        </div>
        <div class="card-body">
          <form action="{{ route('admin.division.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Division Name">
            </div>

            <div class="form-group">
              <label for="priority">priority</label>
              <input type="number" class="form-control" name="priority" id="priority" aria-describedby="emailHelp" placeholder="Enter Division priority">
              <font style="color: red">{{($errors->has('priority')?($errors->first('priority')): '')}}</font>
            </div>

            <button type="submit" class="btn btn-primary">Add District</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
