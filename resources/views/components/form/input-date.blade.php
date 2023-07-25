
<div class="edit-consult-group {{ $col }}">
    @if($showLabele)
     <label class="required form-label" for="{{$id()}}">{{ $label }}</label>
    @endif
    <input

        type="text"
        id="{{ $id() }}"
        name="{{ $name }}"
        value='{{ $value }}'
        {{ $required ? 'required'  : '' }}
        {{ $readonly ? 'readonly'  : '' }}
        {{$attributes->merge(['class' => 'form-control '])}}
    />
        <x-helpers.error  name="{{ $name }}"/>

</div>


@push('scripts')
    <script>
        @php
            $format = match ($pickerType){
                \App\View\Components\Form\InputDate::DATETIME => 'Y-m-d H:i:s',
                \App\View\Components\Form\InputDate::TIME => 'H:i:s',
                default => 'Y-m-d'
            }
        @endphp
        $("#{{  $id() }}").flatpickr({
            enableTime: @if($pickerType == \App\View\Components\Form\InputDate::TIME || $pickerType == \App\View\Components\Form\InputDate::DATETIME ) true @else false @endif,
            noCalendar: @if($pickerType == \App\View\Components\Form\InputDate::TIME) true @else false @endif,
            dateFormat: "{{ $format }}",
            altInput: true,

        });
    </script>
@endpush
