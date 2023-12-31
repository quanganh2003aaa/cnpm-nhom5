<!-- Vendor JS Files -->
<script src="{{asset('assetsAdmin/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assetsAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assetsAdmin/vendor/chart.js/chart.umd.js')}}"></script>
<script src="{{asset('assetsAdmin/vendor/echarts/echarts.min.js')}}"></script>
<script src="{{asset('assetsAdmin/vendor/quill/quill.min.js')}}"></script>
<script src="{{asset('assetsAdmin/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assetsAdmin/vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('assetsAdmin/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('assetsAdmin/js/main.js')}}"></script>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $('#creNamePro').keyup(function() {
        var characterCount = $(this).val().length,
            current_count = $('#current_count'),
            maximum_count = $('#maximum_count'),
            count = $('#count');
        current_count.text(characterCount);
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if (session()->has('success'))
        toastr.success('{{ session()->get('success') }}')
    @elseif (session()->has('error'))
        toastr.error('{{ session()->get('error') }}')
    @endif
</script>
