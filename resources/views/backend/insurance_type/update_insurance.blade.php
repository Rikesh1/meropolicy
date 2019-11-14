@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{__('backend.dashboard')}}
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
                    <form id="insurance_type_save" method="post" action="{{route('update-types')}}" class="form-group">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-sidebar-subheading">
                                        {{__('backend.insurance_type')}}
                                        <input name="insurance_type_name" type="text"
                                               class="form-control">
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control select2" style="width: 100%;">
                                        <option value="1" selected="selected">Published</option>
                                        <option value="0" selected="selected">Not Published</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-sidebar-subheading">
                                        Page Title
                                        <input name="page_title" type="text" class="form-control">
                                    </label>

                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-sidebar-subheading">
                                        Slug
                                        <input type="text" name="slug" class="form-control">
                                    </label>

                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Insurance Type Image
                                <input name="image" type="file" class="form-control">
                            </label>

                        </div>
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Insurance Type Icon
                                <input name="icon" type="file" class="form-control">
                            </label>

                        </div>
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Insurance Type Description
                            </label>
                            <textarea name="description" id="type_description"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Meta Keywords
                            </label>
                            <textarea name="keywords" rows="2" cols="90" id=""></textarea>
                            <small>Seperated by commas</small>
                        </div>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Meta Description
                            </label>
                            <textarea name="meta_description" rows="2" cols="90" id=""></textarea>
                        </div>


                        <!-- /.form-group -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="save" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('extra_scripts')
    <script>
        $(document).ready(function () {
            $('#save').click(function (e) {
                e.preventDefault();

                let myForm = document.getElementById('insurance_type_save');
                let formData = new FormData(myForm);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{route('update-types')}}",
                    contentType: false,
                    cache: false,
                    processData:false,
                    data: formData,
                    success: function (response) {
console.log(response);
                    }
                });
            });
        });
    </script>
@endpush