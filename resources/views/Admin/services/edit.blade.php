@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Usuarios                     
                    <div class="float-right">Fecha de creacion: 
                    {{ $service->updated_at }}
                    </div>
                    
                </div>
                <div class="form-control float-right">Ultima modificacion: 
                    {{ $service->updated_at }}
                    </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">id *</label>
                            <input type="text" name="id" id="id" class="form-control" value="{{ old('id', $service->id) }}">
                        </div>
                        <div class="form-group">                            
                            @if($service->codserviceRol==2)
                                <label for="title">Estudiante</label>
                            @endif
                            @if($service->codserviceRol==3)
                                <label for="title">Empleador</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="title">nombre *</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $service->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="title">apellido *</label>
                            <input type="text" name="lastName" id="lastName" class="form-control" value="{{ old('lastName', $service->lastName) }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Numero de telefono *</label>
                            <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" value="{{ old('phoneNumber', $service->phoneNumber) }}">
                        </div>                        
                        <div class="form-group">
                            <label for="title">Numero de documento  *</label>
                            <input type="text" name="numberDocument" id="numberDocument" class="form-control" value="{{ old('numberDocument', $service->numberDocument) }}">
                        </div>
                        <div class="form-group">
                            <label for="title">direccion  *</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $service->address) }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Estado  *</label>
                            <select name="state" id="state" class="form-control">
                                <option value="Activo">{{ old('state', $service->state) }}</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </div>                                                                        
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <input type="submit" value="Actualizar" class="btn-sm btn-primary">
                            <a href="{{ route('adminService.index') }}"class="btn-sm btn-primary float-right">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection