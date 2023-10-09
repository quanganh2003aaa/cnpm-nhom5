<!-- all js here -->
<script src="{{asset('assets\js\vendor\jquery-1.12.0.min.js')}}"></script>
<script src="{{asset('assets\js\popper.js')}}"></script>
<script src="{{asset('assets\js\bootstrap.min.js')}}"></script>
<script src="{{asset('assets\js\ajax-mail.js')}}"></script>
<script src="{{asset('assets\js\plugins.js')}}"></script>
<script src="{{asset('assets\js\main.js')}}"></script>
<script src="{{asset('assets\js\vendor\modernizr-2.8.3.min.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if (session()->has('success'))
        toastr.success('{{ session()->get('success') }}')
    @elseif (session()->has('error'))
        toastr.error('{{ session()->get('error') }}')
    @endif
</script>
