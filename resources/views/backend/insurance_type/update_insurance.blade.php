@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Hover Data Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{__('backend.insurance_type')}}</th>
                                <th>Status</th>
                                <th>Icon</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($insurance_types as $insurance)
                                <tr>
                                    <td>{{$insurance->insurance_type_name}}</td>
                                    <td>@if($insurance->status==1)
                                            <button class="btn btn-sm btn btn-success"><i class="fa fa-check"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-sm btn btn-danger"><i class="fa fa-times"></i>
                                            </button>


                                        @endif</td>
                                    <td>Win 95+</td>
                                    <td> 4</td>
                                    <td>
                                        <button type="submit" class="btn btn-success btn btn-sm" data-toggle="modal"
                                                data-target="#exampleModalCenter"><i
                                                    class="fa fa-edit"></i></button>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Insurance Type</th>
                                <th>Status</th>
                                <th>Icon</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Update Insurace Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Insurance Type Name
                                <input type="text" class="form-control">
                            </label>

                        </div>
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Insurance Type Name
                                <input type="text" class="form-control">
                            </label>

                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option value="1" selected="selected">Published</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Insurance Type Name
                                <input type="file" class="form-control">
                            </label>

                        </div>
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Insurance Type Description
                            </label>
                            <textarea id="type_description"></textarea>


                        </div>

                        <!-- /.form-group -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('extra_scripts')
    <script>
        $(document).ready(function () {
        });
    </script>
@endpush