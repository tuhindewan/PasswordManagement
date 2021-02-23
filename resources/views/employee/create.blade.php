@extends('layouts.master')
@section('title', 'Create New Employee')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md-10">
                <h3 class="card-title">Create New Employee</h3>
              </div>
              <div class="col-md-2 float-right">
                <a href="{{ route('employees.index') }}" type="button" class="btn btn-info btn-sm btn-block btn-round">
                  <i class="fa fa-list"></i> List
                </a>
              </div>
            </div> 
          </div>
          <form id="quickForm" action="{{ route('software-infos.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="name" name="name" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="name" name="designation" class="form-control" placeholder="Enter Designation">
                        </div>
                        <div class="form-group">
                            <label for="emp_id">Employee ID</label>
                            <input type="name" name="emp_id" class="form-control" placeholder="Enter Employee ID">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="name" name="phone" class="form-control" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="name" name="mobile" class="form-control" placeholder="Enter Mobile Number">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="name" name="email" class="form-control" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Office</label>
                            <select class="selectpicker required form-control"  data-live-search="true" name="office_id">
                                <option style="display: none"></option>
                            @foreach($offices as $office)
                                <option value="{{$office->id}}">{{$office->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Sub-office</label>
                            <select class="selectpicker required form-control" id="cat"  data-live-search="true" name="sub_office_id">
                                <option></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Software</label>
                            <select class="selectpicker required form-control" id="software"  data-live-search="true" name="software_id">
                                <option></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">
                  <i class="fa fa-check"></i> Save
              </button>
              <a class="btn btn-warning mr-1" role="button" href="{{ route('employees.index') }}">
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
jQuery(document).ready(function ()
    {
        jQuery('select[name="office_id"]').on('change',function(){
            var office_id = jQuery(this).val();
            if(office_id)
            {
              jQuery.ajax({
                  url : 'get-sub-offices/' +office_id,
                  type : "GET",
                  dataType : "json",
                  success:function(data)
                  {
                    jQuery('select[name="sub_office_id"]').empty();
                    jQuery.each(data, function(key,value){
                        $('select[name="sub_office_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                    $('select[name="sub_office_id"]').selectpicker('refresh');
                  }
                  
              });
            }
            else
            {
              $('select[name="sub_office_id"]').empty();
            }
        });
    });
</script>
@endpush