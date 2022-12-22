<!--success message-->
@if (Session::has('success'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: "{{ Session::get('success') }}",
    showConfirmButton: false,
    timer: 1800,
    })
</script>
@endif
<!--error message-->
@if (Session::has('error'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'error',
    title: "{{ Session::get('error') }}",
    showConfirmButton: false,
    timer: 1800,
    })
</script>
@endif
<!--info message-->
@if (Session::has('warning'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'warning',
    title: "{{ Session::get('warning') }}",
    showConfirmButton: false,
    timer: 1800,
    })
</script>
@endif

<!--question message-->
@if (Session::has('question'))
<script>
    Swal.fire({
    position: 'top-center',
    icon: 'question',
    title: "{{ Session::get('question') }}",
    showConfirmButton: false,
    timer: 1800,
    })
</script>
@endif