@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
        Edit Product <a href="{{ route('admin.products') }}"><button class="btn btn-success float-right">View Product</button></a>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('backend.partials.messages')
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" value="{{ $product->title }}" >
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" rows="8" cols="80" class="ckeditor form-control">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Select Category</label>
              <select class="form-control" name="category_id">
                <option value="">Please select a category for the product</option>
                @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
                  <option value="{{ $parent->id }}" {{ $parent->id == $product->category->id ? 'selected': '' }}>{{ $parent->name }}</option>

                  @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
                    <option value="{{ $child->id }}"  {{ $child->id == $product->category->id ? 'selected': '' }}> ------> {{ $child->name }}</option>

                  @endforeach

                @endforeach
              </select>
            </div>
            <td>
                </td>

            <div class="form-group">
              <label for="image">Product Image</label>

              <div class="row">
                <div class="col-md-4">
                  <input type="file" class="form-control" name="image" id="image" multiple>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
