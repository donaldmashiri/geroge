@if($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <h6> <span class="font-medium">{{ $error }}!</span></h6>
        @endforeach
    </div>
@endif


<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if (session('status'))
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Status',
            text: '{{ session('status') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
            confirmButtonText: 'OK',
            //timer: 3000, // Auto close after 3 seconds
            //  showCloseButton: true, // Show close button
        });
    </script>
@endif

@if (session('delete'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Deleted',
            text: '{{ session('delete') }}',
            confirmButtonText: 'OK',
            timer: 3000, // Auto close after 3 seconds
            showCloseButton: true, // Show close button
        });
    </script>
@endif
