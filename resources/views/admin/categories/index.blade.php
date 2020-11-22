@extends('layouts.admin')
@section('style')
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid">
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-start mb-3">
        <a href="{{ route('admin.categories.create')}}" class="btn btn-success btn-sm ">Create New Category</a>
    </div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>

    <div class="card-body">
        @if ($categories->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>Name</th>
                    <th>Products Count</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->products->count() ?? 0 }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.categories.edit', $category->id)}}" class="btn btn-success btn-sm mr-2">Edit</a>
                                    <button id="showModalBtn" class="btn btn-danger btn-sm">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
                <div class="modal" tabindex="-1" role="dialog" id="deleteModal">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">Delete Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <p>Are You Sure To Delete This Category?</p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('admin.categories.delete', $category->id )}}" id="deleteForm.{{$category->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button id="deleteBtn" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        @else
            <h3 style="color:red;text-align:center">No Categories Created Yet!</h3>
        @endif
    </div>
  </div>

</div>
  @section('scripts')
  

  <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
  <script src="{{asset('js/scripts/deleteModal.js')}}"></script>
  <script>
      let showModalBtns = document.querySelectorAll('#showModalBtn')
      showModalBtns.forEach((btn) => {
          let formId = btn.parentElement.getAttribute('id');
          btn.addEventListener('click', event => {
              event.preventDefault();
              deleteModal()
          })
      })
  </script>

  <script>
      const alert_success_div = document.querySelector('.alert-success');
      if (alert_success_div) {
        setTimeout(() => {
            document.querySelector('.alert-success').remove()
        }, 3000)
      }

      
  </script>
  @endsection
@endsection