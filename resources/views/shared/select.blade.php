@php
    $label ??= ucfirst($name);
    $type ??= 'select';
    $class ??= 'form-control';
    $name ??= '';
    $value ??= '';
    $placeholder ??= '';
    $options ??= []; // Liste des options pour le select
@endphp

<div class="form-group col-md-6 mb-3">
    <label for="{{$name}}">{{$label}}</label>
    
    <select class="{{$class}} mt-1" id="{{$name}}" name="{{$name}}">
        @foreach($options as $key => $option)
            <option value="{{ $key }}" {{ old($name, $value) == $key ? 'selected' : '' }}>{{ $option }}</option>
        @endforeach
    </select>
</div>
