<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/lang.js') }}"></script>
@php
    $url = match(app()->getLocale()){
      'ar' => config('configs.dt_lang_ar') ,
      'fr' => config('configs.dt_lang_fr') ,
      'en' => config('configs.dt_lang_en') ,
    };
@endphp
<script>
    localStorage.setItem('dt_language_url', "{{ $url  }}");
    window.csrf = function () {
        return "{{ csrf_token() }}";
    }
</script>
<script src="{{ asset('assets/js/init.js') }}"></script>
@if(session()->has('alert'))
    <script>
        Swal.fire({
            text: "{{ session()->get('alert')['text'] ?? '' }}",
            title: "{{ session()->get('alert')['title'] ?? '' }}",
            icon: "{{ session()->get('alert')['icon'] }}",
            buttonsStyling: false,
            confirmButtonText: "{{ trans('words.close') }}",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
    </script>
@endif

<script src="{{ asset('assets/js/global.js') }}"></script>

@stack('scripts')
