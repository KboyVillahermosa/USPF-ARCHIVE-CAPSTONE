{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('user')" />
<x-backpack::menu-item title="Research repositories" icon="la la-question" :link="backpack_url('research-repository')" />
<x-backpack::menu-item title="Dissertations" icon="la la-question" :link="backpack_url('dissertation')" />
<x-backpack::menu-item title="Theses" icon="la la-question" :link="backpack_url('thesis')" />
<x-backpack::menu-item title="Faculties" icon="la la-question" :link="backpack_url('faculty')" />