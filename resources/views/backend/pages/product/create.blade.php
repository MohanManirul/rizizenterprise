@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Add Product
        </div>
        <div class="card-body">
          <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            @include('backend.partials.messages')

            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title"  placeholder="Enter title">
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" rows="8" cols="80" class="ckeditor form-control"></textarea>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Select Category</label>
              <select class="form-control" name="category_id">
                <option value="">Please select a category for the product</option>
                @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
                  <option value="{{ $parent->id }}">{{ $parent->name }}</option>

                  @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
                    <option value="{{ $child->id }}"> ------> {{ $child->name }}</option>

                  @endforeach

                @endforeach
              </select>
            </div>
            
            <div class="form-group">
                <label for="image">Product Image <small class="text-danger">(required)</small></label>
                <input type="file" class="form-control" name="image" id="image" placeholder="Product Image" required>
            </div>

            <button type="submit" class="btn btn-primary">Ad Product</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->

@endsection
