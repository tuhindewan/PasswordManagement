@extends('layouts.master')
@section('title', 'Software List')

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
                    <h3 class="card-title">Software List</h3>
                  </div>
                  <div class="col-md-2 float-right">
                    <a href="{{ route('software-infos.create') }}" type="button" class="btn btn-info btn-sm btn-block btn-round">
                      <i class="fa fa-plus"></i> New Software
                    </a>
                  </div>
                </div> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Sub-Office</th>
                    <th>Office</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($softwareInfos as $softwareInfo)
                        <tr>
                            <td>{{ $softwareInfo->name }}</td>
                            <td>{{ $softwareInfo->subOffice->name }}</td>
                            <td>{{ $softwareInfo->subOffice->office->name }}</td>
                            <td>
                              <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                 <span class="sr-only">Toggle Dropdown</span>
                                 <i class="fas fa-cogs"></i>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                  <a class="dropdown-item" href="{{ route('software-infos.edit', $softwareInfo) }}">
                                    <i class="fas fa-edit"></i> Edit
                                  </a>
                                  <a class="dropdown-item" href="{{ route('software-infos.show', $softwareInfo) }}">
                                    <i class="fas fa-eye"></i> Details
                                  </a>
                                  <form class='delete' method="post" action="{{route('software-infos.destroy', $softwareInfo)}}">
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