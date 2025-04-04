@php
    $label ??= ucfirst($name);
    $type ??= 'text';
    $class ??= 'form-control';
    $name ??= '';
    $value ??= '';
    $placeholder ??= '';
@endphp

<div class="form-group col-md-6 mb-4">
    <label for="{{$name}}" class="form-label font-weight-bold text-muted">{{ $label }}</label>
    
    @if($type === 'textarea')
        <textarea class="form-control mt-1 shadow-sm rounded-3 {{ $class }}" id="{{$name}}" name="{{$name}}" placeholder="{{$placeholder}}" rows="4">{{ old($name, $value) }}</textarea>
    @else
        <input type="{{$type}}" class="form-control mt-1 shadow-sm rounded-3 {{ $class }}" id="{{$name}}" name="{{$name}}" placeholder="{{$placeholder}}" value="{{ old($name, $value) }}">
    @endif
    
    @error($name)
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>
