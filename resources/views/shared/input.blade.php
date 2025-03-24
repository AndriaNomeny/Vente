@php
    $label ??= ucfirst($name);
    $type ??= 'text';
    $class ??= 'form-control';
    $name ??= '';
    $value ??= '';
    $placeholder ??= '';
@endphp

<div class="form-group col-md-6 mb-3">
    <label for="{{$name}}">{{$label}}</label>
    
    @if($type === 'textarea')
        <textarea class="{{$class}} mt-1" id="{{$name}}" name="{{$name}}" placeholder="{{$placeholder}}">{{ old($name, $value) }}</textarea>
    @else
        <input type="{{$type}}" class="{{$class}} mt-1" id="{{$name}}" name="{{$name}}" placeholder="{{$placeholder}}" value="{{ old($name, $value) }}">
    @endif
</div>
