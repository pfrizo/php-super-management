<form method="post" action="{{ route('order-product.store', ['order' => $order])}}">
    @csrf
    <select name="product_id">
        <option>-- Selecione o Produto --</option>
        @foreach ($products as $product)
            <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
        @endforeach
    </select>
    {{ $errors->has('product_id') ? $errors->first('product_id') : '' }}

    <input type="number" name="quantity" value="{{ old('quantity') ?? ''}}" placeholder="Quantidade" class='black-border'>
    {{ $errors->has('quantity') ? $errors->first('quantity') : '' }}

    <button type="submit" class="black-border">Cadastrar</button>
</form>