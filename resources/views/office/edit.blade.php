@extends('layouts.master')
@section('title', 'Office Edit')

@section('content')
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
              <div class="card-header">
              <div class="row">
                <div class="col-md-10">
                  <h3 class="card-title">Office Edit</h3>
                </div>
                <div class="col-md-2 float-right">
                  <a href="{{ route('offices.index') }}" type="button" class="btn btn-info btn-block btn-round">
                    <i class="fa fa-list"></i> List
                  </a>
                </div>
              </div> 
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="{{ route('offices.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="name" name="name" value="{{ $office->name }}" class="form-control" id="name" placeholder="Enter office name">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                      <i class="fa fa-check"></i> Update
                    </button>
                    <a class="btn btn-warning mr-1" role="button" href="{{ route('offices.index') }}">
                        <i class="fa fa-times"></i> Cancel
                    </a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('page-js')
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      name: {
        required: true,
        name: true,
      }
    },
    messages: {
      name: {
        required: "Please enter a office name",
        name: "Please enter a vaild office name"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
@endpush