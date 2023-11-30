        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if (Session::has('store_message'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: "{{Session('store_message')}}",
                })
            </script>
        @endif
        @if (Session::has('update_message'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: "{{Session('update_message')}}",
                })
            </script>
        @endif
        @if (Session::has('delete_message'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: "{{Session('delete_message')}}",
                })
            </script>
        @endif
        @if (Session::has('error_message'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "{{Session('error_message')}}",
                })
            </script>
        @endif
    </body>
</html>