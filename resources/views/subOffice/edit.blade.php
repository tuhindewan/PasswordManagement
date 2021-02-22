@extends('layouts.master')
@section('title', 'Sub Office Edit')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md-10">
                <h3 class="card-title">Sub Office Edit</h3>
              </div>
              <div class="col-md-2 float-right">
                <a href="{{ route('sub-offices.index') }}" type="button" class="btn btn-info btn-sm btn-block btn-round">
                  <i class="fa fa-list"></i> List
                </a>
              </div>
            </div>
          </div>
          <form id="quickForm" action="{{ route('sub-offices.update', $subOffice) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="name">Name</label>
                  <input type="name" name="name" value="{{ $subOffice->name }}" class="form-control" id="name" placeholder="Enter office name">
              </div>
              <div class="form-group">
                <label for="name">Office</label>
                  <select class="selectpicker required form-control"  data-live-search="true" name="office_id">
                    <option style="display: none"></option>
                    @foreach($offices as $office)
                    <option value="{{$office->id}}" {{ $office->id == $subOffice->office_id ? 'selected' : ''}}>{{$office->name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i> Update
                </button>
                <a class="btn btn-warning mr-1" role="button" href="{{ route('sub-offices.index') }}">
                    <i class="fa fa-times"></i> Cancel
                </a>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-6">

      </div>
    </div>
  </div>
</section>
@endsection


@push('page-js')

<script>
$(function () {

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

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