{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>


@hasrole('admin')
   <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-question"></i> Users</a></li>
   <li class="nav-item"><a class="nav-link" href="{{ backpack_url('visibility') }}"><i class="nav-icon la la-question"></i> Visibilities</a></li>
   <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
@endhasrole
 
@hasanyrole('admin|editor')
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('post') }}"><i class="nav-icon la la-question"></i> Posts</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('place') }}"><i class="nav-icon la la-question"></i> Places</a></li>
@endhasanyrole

@hasrole('editor')
<li class="nav-item nav-dropdown">
  <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-globe"></i> Translations</a>
  <ul class="nav-dropdown-items">
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('language') }}"><i class="nav-icon la la-flag-checkered"></i> Languages</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('language/texts') }}"><i class="nav-icon la la-language"></i> Site texts</a></li>
  </ul>
</li>
@endhasrole
