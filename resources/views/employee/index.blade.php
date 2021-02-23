@extends('layouts.master')
@section('title', 'Employee List')

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-10">
                    <h3 class="card-title">Employee List</h3>
                  </div>
                  <div class="col-md-2 float-right">
                    <a href="{{ route('employees.create') }}" type="button" class="btn btn-info btn-sm btn-block btn-round">
                      <i class="fa fa-plus"></i> New Employee
                    </a>
                  </div>
                </div> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Software</th>
                    <th>Sub-Office</th>
                    <th>Office</th>
                    <th>Mobile</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($employees as $employee)
                        <tr>
                          <td>{{ $employee->emp_id }}</td>
                          <td>{{ $employee->name }}</td>
                          <td>{{ $employee->designation }}</td>
                          <td>{{ $employee->software->name }}</td>
                          <td>{{ $employee->software->subOffice->name }}</td>
                          <td>{{ $employee->software->subOffice->office->name }}</td>
                          <td>{{ $employee->mobile }}</td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                                <i class="fas fa-cogs"></i>
                              </button>
                              <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="">
                                  <i class="fas fa-edit"></i> Edit
                                </a>
                                <a class="dropdown-item" href="{{ route('employees.show', $employee) }}">
                                  <i class="fas fa-eye"></i> Details
                                </a>
                                <form class='delete' method="post" action="{{ route('employees.destroy', $employee) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="dropdown-item"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                              </div>
                            </div>
                          </td>
                        </tr>
                      @endforeach 
                  </tbody>
                  <tfoot>
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
@endsection

@push('page-js')
<script>
    $(".delete").on("submit", function(){
        return confirm("Are you sure?");
    });
</script>
@endpush