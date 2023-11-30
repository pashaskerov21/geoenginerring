        <!-- Vendor js -->
        <script src="{{ asset('admin-assets/js/vendor.min.js') }}"></script>
        <!-- Input Mask js -->
        <script src="{{ asset('admin-assets/vendor/jquery-mask-plugin/jquery.mask.min.js') }}"></script>
        <!-- Daterangepicker js -->
        <script src="{{ asset('admin-assets/vendor/daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('admin-assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Vector Map js -->
        <script src="{{ asset('admin-assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}">
        </script>
        <script src="{{ asset('admin-assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('admin-assets/js/app.min.js') }}"></script>
        <!-- Quill Editor js -->
        <script src="{{ asset('admin-assets/vendor/quill/quill.min.js') }}"></script>
        <script src="{{ asset('admin-assets/js/quill-editor.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
        @if (Session::has('store_message'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: "{{ Session('store_message') }}",
                })
            </script>
        @endif
        @if (Session::has('update_message'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: "{{ Session('update_message') }}",
                })
            </script>
        @endif
        @if (Session::has('delete_message'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: "{{ Session('delete_message') }}",
                })
            </script>
        @endif
        @if (Session::has('error_message'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "{{ Session('error_message') }}",
                })
            </script>
        @endif

        @stack('js')


        </body>

        </html>
