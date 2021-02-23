@extends('layouts.master')
@section('title', 'Employee Details')

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
                        <h3 class="card-title">Employee Details</h3>
                    </div>
                    <div class="col-md-2 float-right">
                        <a href="{{ route('employees.create') }}" type="button" class="btn btn-info btn-sm btn-block btn-round">
                        <i class="fa fa-plus"></i> New Employee
                        </a>
                    </div>
                </div> 
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                  <tbody>
                    <tr>
                      <td style="font-weight: bold">Employee ID</td>
                      <td>{{ $employee->emp_id }}</td>
                    </tr>
                    <tr>
                      <td style="font-weight: bold">Name</td>
                      <td>{{ $employee->name }}</td>
                    </tr>
                    <tr>
                      <td style="font-weight: bold">Designation</td>
                      <td>{{ $employee->designation }}</td>
                    </tr>
                    <tr>
                      <td style="font-weight: bold">Sub Office</td>
                      <td>{{ $employee->software->subOffice->name }}</td>
                    </tr>
                    <tr>
                      <td style="font-weight: bold">Office</td>
                      <td>{{ $employee->software->subOffice->office->name }}</td>
                    </tr>
                    <tr>
                      <td style="font-weight: bold">Phone</td>
                      <td>{{ $employee->phone }}</td>
                    </tr>
                    <tr>
                      <td style="font-weight: bold">Email</td>
                      <td>{{ $employee->email }}</td>
                    </tr>
                    <tr>
                      <td style="font-weight: bold">Mobile</td>
                      <td>{{ $employee->mobile }}</td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td>
                        <a class="btn btn-primary" href="{{ route('employees.edit', $employee) }}">
                          <i class="fas fa-edit"></i> Edit
                        </a>
                        <a class="btn btn-warning mr-1" role="button" href="{{ route('employees.index') }}">
                            <i class="fa fa-times"></i> Back
                        </a>
                        <a class="btn btn-warning mr-1" role="button" href="{{ route('employees.index') }}">
                            <i class="fa fa-times"></i> View Software Information
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