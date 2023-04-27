 <div class="sidebar-wrapper sidebar-theme">
    <nav id="compactSidebar">

        <ul class="menu-categories">

        @role('ADMIN')
            <li class="active">
                <a href="{{url('categories')}}" class="menu-toggle" data-active="true">
                    <div class="base-menu">
                        <div class="base-icons">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                        </div>
                        <span>Recordatorio</span>
                    </div>
                </a>
            </li>
        @endcan


</ul>
</nav>
</div>
<div id="compact_submenuSidebar" class="submenu-sidebar" style="display: none!important">
</div>
