{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Customers" icon="la la-question" :link="backpack_url('customer')" />
<x-backpack::menu-item title="Teachers" icon="la la-question" :link="backpack_url('teacher')" />
<x-backpack::menu-item title="Students" icon="la la-question" :link="backpack_url('student')" />
<x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('user')" />