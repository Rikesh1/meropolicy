@extends('admin.layouts.app')
@section('title', __('blog::messages.all_blogs'))

@section('content')

	<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ __('blog::messages.blogs') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('blog::messages.home') }}</a></li>
            <li><a href="{{ route('blog.index') }}">{{ __('blog::messages.blogs') }}</a></li>
            <li class="active">{{ __('blog::messages.all_blogs') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ __('blog::messages.all_blogs') }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="blogTable" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                            	<th>{{ __('blog::messages.sn') }}</th>
                            	<th>{{ __('blog::messages.image') }}</th>
                                <th>{{ __('blog::messages.title') }}</th>
                                <th>{{ __('blog::messages.author') }}</th>
                                <th>{{ __('blog::messages.status') }}</th>
                                <th>{{ __('blog::messages.date') }}</th>
                                <th>{{ __('blog::messages.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                	<td>{{ $loop->iteration }}</td>
                                	<td>
                                		<img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="{{ $blog->title }}" width="50px">
                                	</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->author }}</td>
                                    <td>
                                    	@if($blog->status=='Active')
                                            <button class="btn btn-xs btn btn-success">{{ $blog->status }}
                                            </button>
                                        @else
                                            <button class="btn btn-xs btn btn-danger">{{ $blog->status }}
                                            </button>
                                        @endif
                                    </td>
                                    <td>{{ $blog->created_at->format('dS M, Y') }}</td>
                                    <td>
                                        <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-success btn-xs" title="{{ __('blog::messages.edit') }}"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('blog.destroy', $blog->id) }}" method="post" style="display: inline;">
                                        	@csrf
                                        	@method('DELETE')
                                        	<button type="submit" class="btn btn-danger btn-xs" title="{{ __('blog::messages.delete') }}" onclick="return confirm('Are you sure you want to delete this blog?');"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ __('blog::messages.sn') }}</th>
                            	<th>{{ __('blog::messages.image') }}</th>
                                <th>{{ __('blog::messages.title') }}</th>
                                <th>{{ __('blog::messages.author') }}</th>
                                <th>{{ __('blog::messages.status') }}</th>
                                <th>{{ __('blog::messages.date') }}</th>
                                <th>{{ __('blog::messages.action') }}</th>
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
@endsection

@push('extra_scripts')
	<script>
		$(document).ready( function () {
		    $('#blogTable').DataTable();
		} );
	</script>
@endpush