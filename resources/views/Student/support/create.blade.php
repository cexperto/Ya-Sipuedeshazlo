@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear ticket</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <form 
                        action="{{ route('supportStudent.store') }}" 
                        method="POST"
                        enctype="multipart/form-data">                        
                        <div class="form-group">
                            <label for="message">Descripcion *</label>
                            <textarea name="message" id="message"  rows="5" class="form-control" required></textarea>                            
                        </div>                        
                        <div class=""form-control>
                            @csrf
                           <input type="submit" value="Enviar" class="btn-sm btn-primary">
                           <a href="{{ route('supportStudent.index') }}" class="btn-sm btn-primary float-right">Cancelar</a>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
