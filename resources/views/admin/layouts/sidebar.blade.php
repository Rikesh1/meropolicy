@php $route = Route::currentRouteName(); @endphp
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>{{__('backend.dashboard')}}</span>

          </a>
        </li>
        <li class="{{ $route == 'admin.insurance.update-types' ? 'active' : '' }} treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>{{__('backend.insurances')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route == 'admin.insurance.update-types' ? 'active' : '' }}"><a href="{{route('admin.insurance.update-types')}}"><i class="fa fa-circle-o"></i>{{ __('backend.insurance_type') }}</a></li>
          </ul>
        </li>
        <li class="{{ $route == 'admin.insurance.update-types' ? 'active' : '' }} treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>{{__('backend.policies')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route == 'admin.insurance.update-types' ? 'active' : '' }}"><a href="{{route('admin.insurance.update-types')}}"><i class="fa fa-circle-o"></i>{{ __('backend.termlife') }}</a></li>
          </ul>
        </li>

        <li class="{{ $route == 'blog.index' || $route == 'blog.create' || $route == 'blog.edit' ? 'active' : '' }} treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>{{__('backend.blogs')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $route == 'blog.index' || $route == 'blog.edit' ? 'active' : '' }}"><a href="{{route('blog.index')}}"><i class="fa fa-circle-o"></i>{{ __('backend.all_blogs') }}</a></li>
            <li class="{{ $route == 'blog.create' ? 'active' : '' }}"><a href="{{route('blog.create')}}"><i class="fa fa-circle-o"></i>{{ __('backend.add_blog') }}</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>