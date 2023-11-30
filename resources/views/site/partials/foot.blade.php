        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
            integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Fancybox.bind("[data-fancybox]", {});
        </script>
        <script src="{{ asset('front-assets/js/swiper.js') }}"></script>
        <script src="{{ asset('front-assets/js/script.js') }}"></script>
        @if (Session::has('message-success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: "Uğurla göndərildi",
                })
            </script>
        @endif
        @if (Session::has('vacancy-submit'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: "Qeydiyyat tamamlandı",
                })
            </script>
        @endif
    </body>

</html>
