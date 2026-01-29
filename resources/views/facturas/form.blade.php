<div class="form-group">
    <label for="numero">Número</label>
    <input class="form-control" type="text" name="numero" id="numero" maxlength="10"
        value="{{ isset($factura->numero) ? $factura->numero : old('numero') }}" @if (isset($readonly)) {{ $readonly }} @endif>
</div>
<div class="form-group">
    <label for="fecha">Fecha</label>
    <input type="date" name="fecha" id="fecha" maxlength="64" class="form-control"
        value="{{ isset($factura->fecha) ? $factura->fecha : old('fecha') }}" @if (isset($readonly)) {{ $readonly }} @endif>
</div>
<div class="form-group">
    <label for="cliente">Cliente</label>
    <select name="cliente_id" id="cliente_id" class="form-control">
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}"
                @selected(old('cliente_id', $factura->cliente_id ?? null) == $cliente->id)
                {{-- @if (isset($factura->cliente_id) && ($cliente->id == $factura->cliente_id))
                    selected="selected"
                @endif --}}
            >{{ $cliente->nombre }}</option>
        @endforeach;
    </select>
</div>
<div class="form-group">
    <label for="base">Base</label>
    <input type="number" name="base" id="base" maxlength="100" class="form-control"
        value="{{ isset($factura->base) ? $factura->base : old('base') }}" @if (isset($readonly)) {{ $readonly }} @endif>
</div>
<br>
<label for="importeiva">Importe I.V.A.</label>
<input type="number" name="importeiva" id="importeiva" maxlength="11" class="form-control"
    value="{{ isset($factura->importe) ? $factura->importe : old('importe') }}" @if (isset($readonly)) {{ $readonly }} @endif>
<br>
<label for="importe">Importe</label>
<input type="number" name="importe" id="importe" maxlength="11" class="form-control"
    value="{{ isset($factura->importe) ? $factura->importe : old('importe') }}" @if (isset($readonly)) {{ $readonly }} @endif>
<br>
@if (isset($submit))
<input type="submit" class="btn btn-primary" value="{{ $submit }}">
@else
<br>
@endif
<a href="{{ url('/facturas/') }}">
    <input type="button" class="btn btn-danger" value="{{ $cancel }}">
</a>