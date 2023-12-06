@extends('layouts.core')
@section('contenido')
    <div>
        <h1>Setting</h1>
    </div>
    <div class="tile row align-items-start d-flex">
        <form class="bg-white p-5 rounded text-secondary shadow col m-2 " style="width: 15rem" action="{{ route('login') }}"
            method="POST">
            @csrf @method('PUT')
            <div class="row">
                <!-- Name input -->
                <div class="col-md-6 mb-4">
                    <label for="exampleInputPassword1" class="form-label"><strong>Nombre</strong></label>
                    <input autofocus="autofocus" type="text" name="nombre" class="form-control"
                    value="{{ old('nombre', $usuario->nombre)}}">
                    @error('nombre')
                        <div class="text-danger font-bold">
                            <strong class="font-weight">{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <!-- Email input -->
                <div class="col-md-6 mb-4">
                    <label for="exampleInputPassword1" class="form-label"><strong>Email</strong></label>
                    <input type="email" name="email" class="form-control readonly-input" value="{{ old('email', $usuario->email)}}" readonly>
                    @error('email')
                        <div class="text-danger font-bold">
                            <strong class="font-weight">{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <!-- Documento input -->
                <div class="col-md-6 mb-4">
                    <label for="exampleInputPassword1" class="form-label"><strong>Documento</strong></label>
                    <input type="text" name="documento" class="form-control" value="{{ old('documento', $usuario->documento)}}">
                    @error('documento')
                        <div class="text-danger font-bold">
                            <strong class="font-weight">{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <!-- Password input -->
                <div class="col-md-6 mb-4">
                    <label for="exampleInputPassword1" class="form-label"><strong>Contraseña</strong></label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                        <div class="text-danger font-bold">
                            <strong class="font-weight">{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <!-- Telefono input -->
                <div class="col-md-6 mb-4">
                    <label for="exampleInputPassword1" class="form-label"><strong>Telefono</strong></label>
                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $usuario->telefono)}}">
                    @error('telefono')
                        <div class="text-danger font-bold">
                            <strong class="font-weight">{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <!-- Confirm Password input -->
                <div class="col-md-6 mb-4">
                    <label for="exampleInputPassword1" class="form-label"><strong>Confirmar Contraseña</strong></label>
                    <input type="password" name="password_confirm" class="form-control"
                        value="{{ old('password_confirm') }}">
                    @error('password_confirm')
                        <div class="text-danger font-bold">
                            <strong class="font-weight">{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <!-- Direccion input -->
                <div class="col-md-6 mb-4">
                    <label for="exampleInputPassword1" class="form-label"><strong>Direccion</strong></label>
                    <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $usuario->direccion)}}">
                    @error('direccion')
                        <div class="text-danger font-bold">
                            <strong class="font-weight">{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>

            @isset($success)
                <div class="alert alert-success">
                    {{ $success }}
                </div>
            @endisset
            @error('error')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </form>
    </div>
@endsection
