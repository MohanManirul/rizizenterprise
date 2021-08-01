@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Edit Short News
        </div>
        <div class="card-body">
          <form action="{{ route('admin.shortnews.update', $shortnews->id) }}" method="post">
            @csrf
            @include('backend.partials.messages')
            
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $shortnews->name }}">
            </div>

            <button type="submit" class="btn btn-success">Update News</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
