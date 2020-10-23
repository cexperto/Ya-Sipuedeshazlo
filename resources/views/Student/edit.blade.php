@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Servicio</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('services.update', $service) }}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                            @if(!empty($errors->all()))                            
                                    <div class="notificationDanger">                                        
                                        <div class="notificationDanger--item">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>
                                                    {{ $error }}
                                                </li>
                                            @endforeach                            
                                        </ul>
                                        </div>                                           
                                    </div>
                            @endif                                    
                            </div>
                        <div class="form-group">                            
                            <label for="name">Selecciona un oficio *</label>
                                <select name="names" id="names" class="custom-select" required>
									<option value="{{ old('name', $service->names) }}">{{ old('names', $service->names) }}</option>
									<option value="Tecnic@ de computadores">Tecnico de computadores</option>
									<option value="Tecnic@ de lavadoras">Tecnico de lavadoras</option>
									<option value="Electricidad">Electricista</option>
									<option value="Cociner@">Cociner@</option>
									<option value="Aseador@">Aseador@</option>
									<option value="Jardiner@">Jardiner@</option>
									<option value="Mecanic@ de bicis">Mecanico de bicis</option>
									<option value="Mecanic@ de motos">Mecanico de motos</option>
									<option value="Mecanic@ de autos">Mecanico de autos</option>
									<option value="Auxiliar de ornamentacion">Auxiliar de ornamentacion</option>
									<option value="Auxiliar de cocina">Auxiliar de cocina</option>
									<option value="ornamentacion">Ornamentador</option>
									<option value="Volanter@">Volantero</option>
									<option value="Meser@">Meser@</option>
									<option value="Mensajer@">Mensajer@</option>
								</select>
                            </div>
                            <div class="form-group">
                                <label>Añade una imagen descriptiva de tu oficio (opcional)</label>
                                <input accept="image/jpeg,image/png" type="file" name="file">
                            </div>
                            <div class="form-group">
                                <label for="description">Escribe una breve descripcion de tus servicios *</label>
                                
                                <textarea name="description" id="description" rows="2" class="form-control">{{ old('description', $service->description) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="iframe">Añade un video, pon el enlace para compartir(Opcional)</label>
                                <textarea name="iframe" id="iframe" class="form-control">{{ old('iframe', $service->iframe) }}</textarea>
                            </div>
							<div class="form-group">
                                <label for="cost">Dinos cual es el costo aproximado de tu servicio</label>
                                <input type="text" name="cost" id="cost" class="form-control" value="{{ old('cost', $service->cost) }}">
                            </div>
                            <div class="form-group">
                            <label for="cost">Puedes cancelar</label>
                                <select name="status" id="status" class="custom-select" required>
                                <option value="{{ old('state', $service->state) }}">{{ old('state', $service->state) }}</option>
                                <option value="cancelado">Cancelar</option>
                                </select>
                            </div>
                            <input id="latbox" name="latbox" value="{{ old('latbox', $service->latbox) }}">
                            <input id="longbox" name="longbox" value="{{ old('longbox', $service->longbox) }}">
                            <a class="btn-sm btn-primary float-right" href="{{ route('services.create') }}">Cancelar</a>
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <input type="submit" value="Actualizar" class="btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection