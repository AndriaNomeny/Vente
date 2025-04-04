@php
    $label ??= ucfirst($name);
    $type ??= 'select';
    $class ??= 'form-control';
    $name ??= '';
    $value ??= '';
    $placeholder ??= '';
    $options ??= []; // Liste des options pour le select
    // dd($categories);
@endphp
<div class="mb-3">
    <label for="categorie_id" class="form-label">Catégorie</label>
    <select name="categorie_id" id="categorie_id" class="form-control form-control-lg shadow-sm">
        <option value="" disabled selected>Sélectionner une catégorie</option>
        @foreach($categories as $id => $nomCategorie)
            <option value="{{ $id }}" {{ old('categorie_id', $produit->categorie_id ?? '') == $id ? 'selected' : '' }}>
                {{ $nomCategorie }}
            </option>
        @endforeach
    </select>
    @error('categorie_id')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>

