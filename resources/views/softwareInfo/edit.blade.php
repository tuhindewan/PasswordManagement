@extends('layouts.master')
@section('title', 'Software Edit')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md-10">
                <h3 class="card-title">Software Edit</h3>
              </div>
              <div class="col-md-2 float-right">
                <a href="{{ route('software-infos.index') }}" type="button" class="btn btn-info btn-sm btn-block btn-round">
                  <i class="fa fa-list"></i> List
                </a>
              </div>
            </div> 
          </div>
          <form id="quickForm" action="{{ route('software-infos.store') }}" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="name">Office</label>
                <select class="selectpicker required form-control"  data-live-search="true" name="office_id">
                  <option style="display: none"></option>
                  @foreach($offices as $office)
                    <option value="{{$office->id}}" {{ $office->id == $softwareInfo->subOffice->office->id ? 'selected' : ''}}>{{$office->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="name">Sub-office</label>
                <select class="selectpicker required form-control" id="cat"  data-live-search="true" name="sub_office_id">
                  <option>{{ $softwareInfo->subOffice->name }}</option>
                </select>
              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="name" name="name" value="{{ $softwareInfo->name }}" class="form-control" id="name" placeholder="Enter software name">
              </div>
              <div class="form-group">
                <label for="url">URL</label>
                <input type="url" name="url" value="{{ $softwareInfo->url }}" class="form-control" id="url" placeholder="Enter URL">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="name" name="username" value="{{ $softwareInfo->username }}" class="form-control" id="username" placeholder="Enter username">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="name" name="password" value="{{ $softwareInfo->password }}" class="form-control" id="password" placeholder="Enter password">
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">
                  <i class="fa fa-check"></i> Save
              </button>
              <a class="btn btn-warning mr-1" role="button" href="{{ route('software-infos.index') }}">
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