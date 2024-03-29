

<div class="edit-consult-group {{ $col }}">
    @if($showLabele)
    <label class=" @if($required || $attributes->has('required')) required @endif form-label" for="{{ $id() }}">
        {{ $label }}
    </label>
    @endif
    <textarea

        @if($required || $attributes->has('required')) required @endif
        @if($readonly || $attributes->has('$readonly')) readonly @endif
        name="{{ $name }}"
        class="form-control" placeholder="{{ $placeholder }}" id="{{ $id() }}">{{ $value }}</textarea>
    <span class="invalid-feedback d-block">

           @error($name)
        {{ $message }}
        @enderror
        </span>
</div>
