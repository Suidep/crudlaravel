<div class="form-group">
    <label for="id_factura">Factura</label>
    <select name="id_factura" id="id_factura" class="form-control">
        @foreach ($facturas as $factura)
            <option value="{{ $factura->id }}" @selected(old('id_factura', $facturalinea->id_factura ?? null) == $factura->id)>
                {{ 'Factura con fecha ' . $factura->fecha }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="codigo">Código</label>
    <input type="number" name="codigo" id="codigo" class="form-control"
        value="{{ isset($facturalinea->codigo) ? $facturalinea->codigo : old('codigo') }}" @if (isset($readonly)) {{ $readonly }} @endif>
</div>
<div class="form-group">
    <label for="cantidad">Cantidad</label>
    <input type="number" name="cantidad" id="cantidad" class="form-control" 
        value="{{ isset($facturalinea->cantidad) ? $facturalinea->cantidad : old('cantidad') }}" @if (isset($readonly)) {{ $readonly }} @endif>
</div>
<div class="form-group">
    <label for="descripcion">Descripcion</label>
    <input type="text" name="descripcion" id="descripcion" maxlength="50" class="form-control"
        value="{{ isset($facturalinea->descripcion) ? $facturalinea->descripcion : old('descripcion') }}" @if (isset($readonly)) {{ $readonly }} @endif>
</div>
<br>
<label for="precio">Precio</label>
<input type="number" step="any" name="precio" id="precio" class="form-control"
    value="{{ isset($facturalinea->precio) ? $facturalinea->precio : old('precio') }}" @if (isset($readonly)) {{ $readonly }} @endif>
<br>
<label for="base">Base</label>
<input type="number" step="any" name="base" id="base" class="form-control"
    value="{{ isset($facturalinea->base) ? $facturalinea->base : old('base') }}" readonly>
<br>
<label for="iva">IVA</label>
<input type="number" step="any" name="iva" id="iva" class="form-control"
    value="{{ isset($facturalinea->iva) ? $facturalinea->iva : old('iva') }}" @if (isset($readonly)) {{ $readonly }} @endif>
<br>
<label for="importeiva">Importe IVA</label>
<input type="number" step="any" name="importeiva" id="importeiva" class="form-control"
    value="{{ isset($facturalinea->importeiva) ? $facturalinea->importeiva : old('importeiva') }}" readonly>
<br>
<label for="importe">Importe</label>
<input type="number" step="any" name="importe" id="importe" class="form-control"
    value="{{ isset($facturalinea->importe) ? $facturalinea->importe : old('importe') }}" readonly>
<br>
@if (isset($submit))
<input type="submit" class="btn btn-primary" value="{{ $submit }}">
@else
<br>
@endif
<a href="{{ url('/facturalineas/') }}">
    <input type="button" class="btn btn-danger" value="{{ $cancel }}">
</a>