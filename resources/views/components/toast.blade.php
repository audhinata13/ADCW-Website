@if (session('success'))
    <script>
        iziToast.success({
            title: 'Success!',
            message: '{{ session('success') }}',
            position: 'topRight'
        });
    </script>
@elseif (session('error'))
    <script>
        iziToast.error({
            title: 'Error!',
            message: '{{ session('error') }}',
            position: 'topRight'
        });
    </script>
@elseif (session('warning'))
    <script>
        iziToast.warning({
            title: 'Warning!',
            message: '{{ session('warning') }}',
            position: 'topRight'
        });
    </script>
@endif
