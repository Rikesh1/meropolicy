@extends('admin.layouts.app')
@section('title', __('blog::messages.edit_blog'))

@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{__('blog::messages.blogs') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('blog::messages.home') }}</a></li>
            <li><a href="{{ route('blog.index') }}"> {{ __('blog::messages.blogs') }}</a></li>
            <li class="active">{{ __('blog::messages.edit_blog') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ __('blog::messages.edit_blog') }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
		            <form role="form" action="{{ route('blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
		            	@csrf
		            	@method('PATCH')
		              	<div class="box-body">
		                	<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
		                  		<label for="title">{{ __('blog::messages.blog_title') }} *</label>
		                  		<input type="text" name="title" class="form-control" id="title" placeholder="{{ __('blog::messages.enter_title') }}" value="{{ isset($blog) && $blog->title ? $blog->title : old('title') }}">
		                  		@if($errors->has('title'))
		                  			<span class="help-block">{{ $errors->first('title') }}</span>
		                  		@endif
		                	</div>
		                	<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
		                  		<label for="slug">{{ __('blog::messages.blog_slug') }} *</label>
		                  		<input type="text" name="slug" class="form-control" id="slug" placeholder="{{ __('blog::messages.enter_slug') }}" value="{{ isset($blog) && $blog->slug ? $blog->slug : old('slug') }}">
		                  		@if($errors->has('slug'))
		                  			<span class="help-block">{{ $errors->first('slug') }}</span>
		                  		@endif
		                	</div>
		                	<div class="form-group {{ $errors->has('tab_title') ? 'has-error' : '' }}">
		                  		<label for="tab_title">{{ __('blog::messages.blog_tab_title') }}</label>
		                  		<input type="text" name="tab_title" class="form-control" id="tab_title" placeholder="{{ __('blog::messages.enter_tab_title') }}" value="{{ isset($blog) && $blog->tab_title ? $blog->tab_title : old('tab_title') }}">
		                  		@if($errors->has('tab_title'))
		                  			<span class="help-block">{{ $errors->first('tab_title') }}</span>
		                  		@endif
		                	</div>
		                	<div class="form-group {{ $errors->has('author') ? 'has-error' : '' }}">
		                  		<label for="author">{{ __('blog::messages.blog_author') }}</label>
		                  		<input type="text" name="author" class="form-control" id="author" placeholder="{{ __('blog::messages.enter_author') }}" value="{{ isset($blog) && $blog->author ? $blog->author : old('author') }}">
		                  		@if($errors->has('author'))
		                  			<span class="help-block">{{ $errors->first('author') }}</span>
		                  		@endif
		                	</div>
		                	<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
		                  		<label for="image">{{ __('blog::messages.blog_image') }} *</label>
		                  		<input type="file" name="image" id="image" class="form-control">
		                  		@if($errors->has('image'))
		                  			<span class="help-block">{{ $errors->first('image') }}</span>
		                  		@endif
		                  		@if(isset($blog) && $blog->image != null)
		                  			<img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="{{ $blog->title }}" width="30%">
		                  		@endif
		                	</div>
		                	<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
		                  		<label for="description">{{ __('blog::messages.blog_description') }} *</label>
		                  		<textarea name="description" id="description" class="form-control" placeholder="{{ __('blog::messages.enter_description') }}" rows="5">{{ isset($blog) && $blog->description ? $blog->description : old('description') }}</textarea>
		                  		@if($errors->has('description'))
		                  			<span class="help-block">{{ $errors->first('description') }}</span>
		                  		@endif
		                	</div>
		                	<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
		                  		<label for="status">{{ __('blog::messages.blog_status') }} *</label>
		                  		<select name="status" id="status" class="form-control">
		                  			<option value="Active" {{ (isset($blog) && $blog->status == 'Active') || (old('status') == 'Active') ? 'selected' : '' }}>Active</option>
		                  			<option value="Inactive" {{ (isset($blog) && $blog->status == 'Inactive') || (old('status') == 'Inactive') ? 'selected' : '' }}>Inactive</option>
		                  		</select>
		                  		@if($errors->has('status'))
		                  			<span class="help-block">{{ $errors->first('status') }}</span>
		                  		@endif
		                	</div>
		                	<div class="form-group {{ $errors->has('meta_keywords') ? 'has-error' : '' }}">
		                  		<label for="meta_keywords">{{ __('blog::messages.meta_keywords') }}</label>
		                  		<input type="text" name="meta_keywords" class="form-control" id="meta_keywords" placeholder="{{ __('blog::messages.enter_meta_keywords') }}" value="{{ isset($blog) && $blog->meta_keywords ? $blog->meta_keywords : old('meta_keywords') }}">
		                  		@if($errors->has('meta_keywords'))
		                  			<span class="help-block">{{ $errors->first('meta_keywords') }}</span>
		                  		@endif
		                	</div>
		                	<div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
		                  		<label for="meta_description">{{ __('blog::messages.meta_description') }}</label>
		                  		<textarea name="meta_description" id="meta_description" class="form-control" placeholder="{{ __('blog::messages.enter_meta_description') }}" rows="3">{{ isset($blog) && $blog->meta_description ? $blog->meta_description : old('meta_description') }}</textarea>
		                  		@if($errors->has('meta_description'))
		                  			<span class="help-block">{{ $errors->first('meta_description') }}</span>
		                  		@endif
		                	</div>
			            </div>
		              	<!-- /.box-body -->

		              	<div class="box-footer">
		                	<button type="submit" class="btn btn-primary btn-xs pull-right">{{ __('blog::messages.update') }}</button>
		              	</div>
		            </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@push('extra_scripts')
<script>
    CKEDITOR.replace('description');
</script>
@endpush
