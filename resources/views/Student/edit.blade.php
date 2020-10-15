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
                            <label for="name">Selecciona un oficio *</label>
                                <select name="name" id="name" class="custom-select" required>
									<option value="{{ old('name', $service->name) }}">{{ old('name', $service->name) }}</option>
									<option value="computadores">Tecnico de computadores</option>
									<option value="lavadoras">Tecnico de lavadoras</option>
									<option value="electricidad">Electricista</option>
									<option value="cocina">Cociner@</option>
									<option value="aseo">Aseador@</option>
									<option value="jardin">Jardiner@</option>
									<option value="mecania_b">Mecanico de bicis</option>
									<option value="mecania_m">Mecanico de motos</option>
									<option value="mecania_a">Mecanico de autos</option>
									<option value="aux_o">Auxiliar de ornamentacion</option>
									<option value="aux_c">Auxiliar de cocina</option>
									<option value="ornamentacion">Ornamentador</option>
									<option value="volantes">Volantero</option>
									<option value="meseeo">Meser@</option>
									<option value="repartidor">Repartidor@</option>
								</select>
                            </div>
                            <div class="form-group">
                                <label>Añade una imagen descriptiva de tu oficio (opcional)</label>
                                <input type="file" name="file">
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
                                <option value="{{ old('status', $service->status) }}">{{ old('status', $service->status) }}</option>
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