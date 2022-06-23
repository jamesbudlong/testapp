<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div>
        <center><a href="{{ route('home') }}" class="brand-link">
                <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
            </a>
        </center>
    </div>


    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
