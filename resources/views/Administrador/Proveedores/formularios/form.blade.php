@csrf
<div class="row d-grid gap-2 mx-auto">
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="">RFC del proveedor</label>
                <input type="text" class="form-control custom-input" name="rfc"
                    value="{{ isset($proveedor) ? $proveedor->rfc : old('rfc') }}" required>
            </div>
        </div>
        <div class="col-8">
            <div class="form-group">
                <label for="">Nombre del proveedor</label>
                <input type="text" class="form-control custom-input" name="nombre_proveedor"
                    value="{{ isset($proveedor) ? $proveedor->nombre_proveedor : old('nombre_proveedor') }}" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="">Pais</label>
                <input type="text" class="form-control custom-input" name="pais"
                    value="{{ isset($proveedor) ? $proveedor->pais : old('pais') }}" required>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="">Entidad Federativa</label>
                <input type="text" class="form-control custom-input" name="entidad_federativa"
                    value="{{ isset($proveedor) ? $proveedor->entidad_federativa : old('entidad_federativa') }}" required>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="">Estratificación</label>
                <input type="text" class="form-control custom-input" name="estratificacion"
                    value="{{ isset($proveedor) ? $proveedor->estratificacion : old('estratificacion') }}" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="">Tipo de proveedor</label>
                <input type="text" class="form-control custom-input" name="tipo_usuario"
                    value="{{ isset($proveedor) ? $proveedor->tipo_usuario : old('tipo_usuario') }}" required>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Sector del proveedor</label>
                <input type="text" class="form-control custom-input" name="sector"
                    value="{{ isset($proveedor) ? $proveedor->sector : old('sector') }}" required>
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <label for="">Cumplimiento</label>
                <input type="text" class="form-control custom-input" name="grado_cumplimiento"
                    value="{{ isset($proveedor) ? $proveedor->grado_cumplimiento : old('grado_cumplimiento') }}" required>
            </div>
        </div>
    </div>
    

</div>

