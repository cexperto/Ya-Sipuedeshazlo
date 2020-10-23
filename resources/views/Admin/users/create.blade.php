@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear usuario</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <form 
                        action="{{ route('users.store') }}" 
                        method="POST"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nombre *</label>
                            <input type="name" name="name" id="name" class="form-control" required>
                        </div>                        
                        <div class="form-group">
                            <label for="lastName">Apellido *</label>
                            <input type="name" name="lastName" id="lastName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="documentType">Tipo de documento</label>
                            <select name="documentType" id="documentType" class="custom-select">
                                <option value="Cedula">Cedula</option>
                                <option value="ti">Tarjeta de identidad</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="documentNumber">Numero de documento *</label>
                            <input type="name" name="documentNumber" id="documentNumber" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Numero de telefono *</label>
                            <input type="name" name="phoneNumber" id="phoneNumber" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Direccion *</label>
                            <input type="name" name="address" id="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electronico *</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Contraseña *</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Rol *</label>
                            <select name="rol" id="rol" class="custom-select">
                                <option value="1">Administrador</option>
                                <option value="2">Estudiante</option>
                                <option value="3">Empleador</option>
                            </select>                            
                        </div>
                        
                        <div class=""form-control>
                            @csrf
                           <input type="submit" value="Enviar" class="btn-sm btn-primary">
                           <a href="{{ route('users.index') }}" class="btn-sm btn-primary float-right">Cancelar</a>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
