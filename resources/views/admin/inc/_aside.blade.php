<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar">
    {{-- <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="{{ auth()->user()->image_path }}" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
            <p class="app-sidebar__user-designation">{{ auth()->user()->roles->first()->name }}</p>
        </div>
    </div> --}}

    <ul class="app-menu">

        <li><a class="app-menu__item" href="{{ route('home') }}"><i class="app-menu__icon fa fa-home"></i> <span class="app-menu__label">Home</span></a></li>
        <li><a class="app-menu__item" href="{{ route('album.index') }}"><i class="app-menu__icon fa fa-home"></i> <span class="app-menu__label">Album</span></a></li>




    </ul>
</aside>
