@if (isset($product_detail->id))
    <form method="post" action="{{ route('product-detail.update', ['product_detail' => $product_detail->id])}}">
    @csrf
    @method('PUT')
@else
    <form method="post" action="{{ route('product-detail.store')}}">
    @csrf
@endif
    <input type="text" name="product_id" value="{{ $product_detail->product_id ?? old('product_id') }}" placeholder="ID do Produto" class="black-border">
    {{ $errors->has('product_id') ? $errors->first('product_id') : '' }}

    <input type="text" name="length" value="{{ $product_detail->length ?? old('length') }}" placeholder="Comprimento" class="black-border">
    {{ $errors->has('length') ? $errors->first('length') : '' }}
    
    <input type="text" name="width" value="{{ $product_detail->width ?? old('width') }}" placeholder="Largura" class="black-border">
    {{ $errors->has('width') ? $errors->first('width') : '' }}

    <input type="text" name="height" value="{{ $product_detail->height ?? old('height') }}" placeholder="Altura" class="black-border">
    {{ $errors->has('height') ? $errors->first('height') : '' }}

    <select name="unit_id">
        <option>-- Selecione a Unidade de Medida --</option>

        @foreach ($units as $unit)
            <option value="{{ $unit->id }}" {{ ($product_detail->unit_id ?? old('unit_id')) == $unit->id ? 'selected' : '' }}>{{ $unit->description }}</option>
        @endforeach
    </select>
    {{ $errors->has('unit_id') ? $errors->first('unit_id') : '' }}

    <button type="submit" class="black-border">Cadastrar</button>
</form>