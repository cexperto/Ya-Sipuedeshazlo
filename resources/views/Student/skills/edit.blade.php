@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar skills            
                    <div class="float-right">Fecha de creacion: 
                    
                    {{ $skill->updated_at }}
                    </div>
                    
                </div>
                <div class="form-control float-right">Ultima modificacion: 
                    {{ $skill->updated_at }}
                    </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" skillse="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('skills.update', $skill) }}" method="POST" enctype="multipart/form-data">                        
                        <div class="form-group">
                            <label for="title">Nombre </label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $skill->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Descripcion *</label>
                            <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $skill->description) }}">
                        </div>                      
                        <div class="form-group">
                            <label for="domain">Dominio *</label>                            
                            <select name="domain" id="domain" class="custom-select">
									<option value="{{ old('domain', $skill->domain) }}">{{ old('domain', $skill->domain) }}</option>
									<option value="Principiante">Principiante </option>
									<option value="basico">basico </option>
									<option value="intermedio">intermedio </option>
									<option value="avanzado">avanzado</option>
									<option value="experto">experto</option>									
							</select>
                        </div>  
                        
                        <div class="form-group">
                            <label for="expirience">Escribe algo sobre tu experiencia (Opcional)</label>
                            <textarea name="expirience" id="expirience" rows="2" class="form-control">{{ old('expirience', $skill->expirience) }}</textarea>
                        </div>                      
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <input type="submit" value="Actualizar" class="btn-sm btn-primary">
                            <a href="{{ route('skills.index') }}"class="btn-sm btn-primary float-right">Aceptar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection