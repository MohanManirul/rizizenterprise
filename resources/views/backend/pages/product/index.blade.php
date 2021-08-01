@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
      Manage Products <a href="{{ route('admin.product.create') }}"><button class="btn btn-success float-right">+ Add Product</button></a>
      </div>
      <div class="card-body">
        @include('backend.partials.messages')
        <table class="table table-hover table-striped"  id="dataTable">
          <thead>
            <tr>
              <th>Sl.</th>
              <th>Product Title</th>
              <th>Description</th>
              <th>Menu</th>
              <th>Featured Image</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($products as $product)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{str_limit($product->title, $limit = 10, $end = '...')}}</td>
              <td>{{strip_tags(str_limit($product->description, $limit = 30))}}</td>
              <td>{{($product->category->name)}}</td>
              <td>
                  <img src="{{ asset('backend/assets/images/products/'.$product->image) }}" width="40">
                </td>
              <td>
                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-success">Edit</a>
                <a href="#deleteModal{{ $product->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{!! route('admin.product.delete', $product->id) !!}"  method="post">
                          {{ csrf_field() }}
                          <button type="submit" class="btn btn-danger">Permanent Delete</button>
                        </form>

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
          </tbody>

          <tfoot>
            <tr>
              <th>Sl.</th>
              <th>Product Title</th>
              <th>Product Description</th>
              <th>Menu</th>
              <th>Featured Image</th>
              <th>Action</th>
            </tr>
          </tfoot>

        </table>
      </div>
    </div>

  </div>
</div>
<!-- main-panel ends -->

@endsection