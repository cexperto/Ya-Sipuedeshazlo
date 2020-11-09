@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('offer') }}" class="btn-sm btn-secondary float-left">
                        Atras
                    </a>
                    <center>
                        Editar servicio
                    </center>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($services as $service)

                    <form action="{{ route('updateOffer') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="names">Nombre de la oferta</label>
                            <input type="text" name="names" id="names" class="form-control" value="{{ old('names', $service->names) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion de la oferta*</label>
                            <textarea name="description" id="description" rows="2" class="form-control" required>{{ old('description', $service->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="cost">Costo de la oferta*</label>
                            <input type="text" name="cost" id="cost" class="form-control" value="{{ old('cost', $service->cost) }}" required>
                            <input type="hidden" name="id" id="id" class="form-control" value="{{ $service->id }}">
                        </div>                        
                        <div class="form-group">
                            @csrf
                            @method('POST')
                            <input type="submit" value="Actualizar" class="btn-sm btn-primary">
                            <a href="{{ route('offer') }}" class="btn-sm btn-secondary float-right">aceptar</a>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection