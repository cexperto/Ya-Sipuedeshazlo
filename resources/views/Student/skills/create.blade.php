@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Añadir nueva habilidad</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" skill="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <form 
                        action="{{ route('skills.store') }}" 
                        method="POST"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nombre *</label>
                            <input type="name" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion *</label>
                            <input type="text" name="description" id="description" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="domain">Dominio *</label>                            
                            <label for="domain">Que tanto dominas esta habilidad?</label>                            
                            <select name="domain" id="domain" class="custom-select">
									<option value=""></option>
									<option value="Principiante">Principiante </option>
									<option value="Basico">Basico </option>
									<option value="Intermedio">Intermedio </option>
									<option value="Avanzado">Avanzado</option>
									<option value="Experto">Experto</option>									
							</select>
                            <div class="form-group">
                                <label for="expirience">Escribe algo sobre tu experiencia (Opcional)</label>
                                <textarea name="expirience" id="expirience" rows="2" class="form-control"></textarea>
                            </div>                      
                            <div class="form-group">
                        
                        <div class=""form-control>
                            @csrf
                           <input type="submit" value="Crear" class="btn-sm btn-primary">
                           <a href="{{ route('skills.index') }}" class="btn-sm btn-primary float-right">Aceptar</a>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
