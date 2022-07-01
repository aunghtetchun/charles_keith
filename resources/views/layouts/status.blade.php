@if(session('status'))
    <script>
        showToast("{{ session('status') }}")
    </script>
@endif
