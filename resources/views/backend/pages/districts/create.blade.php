@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Add Thana
        </div>
        <div class="card-body">
          <form action="{{ route('admin.district.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('backend.partials.messages')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter District Name">
            </div>

            <div class="form-group">
              <label for="division_id">Select a division for this Thana</label>
              <select class="form-control" name="division_id">
                <option value="">Please select a district for the Thana</option>
                @foreach ($divisions as $division)
                  <option value="{{ $division->id }}">{{ $division->name }}</option>
                @endforeach
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Thana</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
