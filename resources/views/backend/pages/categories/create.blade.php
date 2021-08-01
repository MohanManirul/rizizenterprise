@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
        View Menu <a href="{{ route('admin.categories') }}"><button class="btn btn-success float-right">View Menu</button></a>
         
        </div>
        <div class="card-body">
         <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('backend.partials.messages')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Category Name">
            </div>

            <div class="form-group">
              <label for="priority">Priority, Please write a unique priority except</label>
              @foreach (App\Models\Category::orderBy('priority', 'asc')->get() as $category)
                <a>,{{$category->priority}} </a>
              @endforeach
              <input type="number" class="form-control" name="priority" id="priority" aria-describedby="emailHelp" placeholder="Enter Menu Priority">
              <font style="color: red">{{($errors->has('priority')?($errors->first('priority')): '')}}</font>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Parent Category (optional)</label>
              <select class="form-control" name="parent_id">
                <option value="">Please select a Parent category</option>
                @foreach ($main_categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>

            </div>


            <button type="submit" class="btn btn-primary">Add Category</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
