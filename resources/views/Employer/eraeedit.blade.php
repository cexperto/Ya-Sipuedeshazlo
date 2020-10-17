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

                    <form action="{{ route('employerServices.update', $service) }}" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <label for="description">Descripcion del servicio</label>
                                {{ old('description', $service->description) }}
                            <input type="text" name="title" id="title" class="form-control" required value="{{ old('name', $service->name) }}">

                            </div>
                            
							<div class="form-group">
                                <label for="cost">costo aproximado de tu servicio</label>
                                {{ old('cost', $service->cost) }}
                            </div>
                            <input id="latbox" name="latbox" value="{{ old('latbox', $service->latbox) }}">
                            <input id="longbox" name="longbox" value="{{ old('longbox', $service->longbox) }}">
                            <a class="btn-sm btn-primary float-right" href="">Aceptar</a>
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <input type="submit" value="Adquirir" class="btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection