@csrf

<div class="row mb-3">
    <label for="empleado_num" class="col-md-4 col-form-label text-md-end">{{ __('Empleado') }}</label>

    <div class="col-md-6">
        <select class="form-control select-partida custom-select" name="empleado_num" readonly>
            <option value="">Selecciona</option>
            @foreach ($empleados as $empleado)
                <option value="{{ $empleado->empleado_num }}" class="form-control"
                    @if ($empleado->empleado_num == $empleado->empleado_num) selected @endif>
                    {{ $empleado->nombre }} {{ $empleado->apellido_paterno }}
                </option>
            @endforeach
        </select>
        @error('empleado_num')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="id_rol" class="col-md-4 col-form-label text-md-end">{{ __('Rol') }}</label>

    <div class="col-md-6">
        <select id="id_rol" class="custom-select form-control @error('id_rol') is-invalid @enderror" name="id_rol" required autocomplete="id_rol" autofocus>
            <option value="" disabled selected>Seleccionar Rol</option>
            @foreach ($roles as $rol)
                <option value="{{ $rol->id_rol }}" class="form-control"
                    @if ($rol->id_rol == $rol->id_rol) selected @endif>
                    {{ $rol->nombre_rol}}
                </option>
            @endforeach
        </select>

        @error('id_rol')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="custom-input form-control @error('email') is-invalid @enderror" name="email"
            value="{{ isset($User) ? $User->email : old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="custom-input form-control @error('password') is-invalid @enderror"
            name="password" required autocomplete="new-password" value="{{ isset($User) ? $User->password : old('password') }}">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="custom-input form-control" name="password_confirmation" required
            autocomplete="new-password" >
    </div>
</div>
