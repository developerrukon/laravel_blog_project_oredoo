<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.backendCss')
<body class="layout-default">
    <div class="preloader"></div>
    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">
        <!-- Header -->
        @include('layouts.backendHeader')
        <!-- // END Header -->
        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">
            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page">

                    <!-- content section start-->

                    <div class="container-fluid page__container">
                        @yield('contact')
                    </div>

                    <!-- content section end-->

                </div>
                <!-- // END drawer-layout__content -->
               @include('layouts.backendSidebar')
            </div>
            <!-- // END drawer-layout -->
        </div>
        <!-- // END header-layout__content -->
    </div>
    <!-- // END header-layout -->
    <!-- App Settings FAB -->
    <div id="app-settings">
        <app-settings layout-active="default"
            :layout-location="{
                'default': 'index.html',
                'fixed': 'fixed-dashboard.html',
                'fluid': 'fluid-dashboard.html',
                'mini': 'mini-dashboard.html'
            }">
        </app-settings>
    </div>
    @include('layouts.backendScript')
</body>

</html>
