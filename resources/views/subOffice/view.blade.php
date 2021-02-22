@extends('layouts.master')
@section('title', 'Sub Office Details')

@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="card-title">Sub Office Details</h3>
                    </div>
                    <div class="col-md-2 float-right">
                        <a href="{{ route('sub-offices.create') }}" type="button" class="btn btn-info btn-sm btn-block btn-round">
                        <i class="fa fa-plus"></i> New Sub Office
                        </a>
                    </div>
                </div> 
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                  <tbody>
                    <tr>
                      <td style="font-weight: bold">Name</td>
                      <td>{{ $subOffice->name }}</td>
                    </tr>
                    <tr>
                      <td style="font-weight: bold">Office</td>
                      <td>{{ $subOffice->office->name }}</td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td>
                        <a class="btn btn-primary" href="{{ route('sub-offices.edit', $subOffice) }}">
                          <i class="fas fa-edit"></i> Edit
                        </a>
                        <a class="btn btn-warning mr-1" role="button" href="{{ route('sub-offices.index') }}">
                            <i class="fa fa-times"></i> Back
                        </a>
                      </td>
                      <td></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection