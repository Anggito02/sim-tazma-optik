@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">ROOM TYPE MANAGEMENT</h6>
                <a href="{{url('dashboard/admin/roomtype/create')}}" class="float-right btn btn-success btn-sm">Add New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if ($data)
                            @foreach ($data as $val)
                            <tr>
                                <td>{{$val->id}}</td>
                                <td>{{$val->title}}</td>
                                <td>
                                    <a href="{{url('dashboard/admin/roomtype/'.$val->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('dashboard/admin/roomtype/'.$val->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure?')" href="{{url('dashboard/admin/roomtype/'.$val->id.'/delete')}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection