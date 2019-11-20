@extends('admin.layouts.app')
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
                                    <td></td>
                                    <td> 4</td>
                                    <td>
                                        <button  type="submit" data-id="{{$insurance->id}}" class="edit_button btn btn-success btn btn-xs"><i
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
    </div>

@endsection
@push('extra_scripts')

    <script>
        var $modal = $('#exampleModalCenter');
        $(document).ready(function () {
            $('.edit_button').click(function (e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                var tempEditUrl = "{{route('admin.insurance.update-types-modal',':id')}}";
                tempEditUrl = tempEditUrl.replace(':id', id);
                $modal.load(tempEditUrl, function (response) {
                    $modal.modal({show: true});
                });
            });


        });
    </script>
@endpush