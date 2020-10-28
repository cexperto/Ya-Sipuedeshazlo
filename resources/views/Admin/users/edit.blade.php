@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Usuarios                     
                    <div class="float-right">Fecha de creacion: 
                    {{ $user->updated_at }}
                    </div>
                    
                </div>
                <div class="form-control float-right">Ultima modificacion: 
                    {{ $user->updated_at }}
                    </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">id: {{$user->id}}</label><br>                            
                        </div>
                        <div class="form-group">                            
                            @if($user->codUserRol==2)
                                <label for="title">Estudiante</label>
                            @endif
                            @if($user->codUserRol==3)
                                <label for="title">Empleador</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="title">nombre *</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="title">apellido *</label>
                            <input type="text" name="lastName" id="lastName" class="form-control" value="{{ old('lastName', $user->lastName) }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Numero de telefono *</label>
                            <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" value="{{ old('phoneNumber', $user->phoneNumber) }}">
                        </div>                        
                        <div class="form-group">
                            <label for="title">Numero de documento  *</label>
                            <input type="text" name="documentNumber" id="documentNumber" class="form-control" value="{{ old('documentNumber', $user->documentNumber) }}">
                        </div>
                        <div class="form-group">
                            <label for="title">direccion  *</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $user->address) }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Estado  *</label>
                            <select name="state" id="state" class="form-control">
                                <option value="Activo">{{ old('state', $user->state) }}</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </div>                                                                        
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <input type="submit" value="Actualizar" class="btn-sm btn-primary">
                            <a href="{{ route('users.index') }}"class="btn-sm btn-primary float-right">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection