    <!-- jQuery -->
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <!-- Perfect Scrollbar -->
    <script src="{{ asset('backend/js/perfect-scrollbar.min.js') }}"></script>
    <!-- DOM Factory -->
    <script src="{{ asset('backend/js/dom-factory.js') }}"></script>
    <!-- MDK -->
    <script src="{{ asset('backend/js/material-design-kit.js') }}"></script>
    <!-- App -->
    <script src="{{ asset('backend/js/toggle-check-all.js') }}"></script>
    <script src="{{ asset('backend/js/check-selected-row.js') }}"></script>
    <script src="{{ asset('backend/js/dropdown.js') }}"></script>
    <script src="{{ asset('backend/js/sidebar-mini.js') }}"></script>
    <script src="{{ asset('backend/js/app.js') }}"></script>
    <!-- App Settings (safe to remove) -->
    <script src="{{ asset('backend/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('backend/js/app-settings.js') }}"></script>
    @yield('js')
    @include('flashmessage')
