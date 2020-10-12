@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
                <div class="form-group row">
                    <div class="col-sm-6"><!-- primera columna -->
					    <h3>Informacion Personal</h3>
                        
                    @if (Auth::user()->image)
                        <img src="{{ $user->get_image }}" class="img-thumbnail">
                        @else
                        <img src="https://i.imgur.com/qjCayCS.jpg" class="img-thumbnail" alt="avatar">
                    @endif    
                        <!-- <input type="file" class="form-control"> -->
                        




                    </div><!-- fin de primera columna -->
                    
					<div class="col-sm-6"><!-- segunda columna -->
             <hr>
          <div class="form-group">
            <label class="col-md-5 control-label">Nombre</label>
            {{ Auth::user()->name }} 
            {{ Auth::user()->lastName }} 
          </div>
            <hr>
          <div class="form-group">
            <label class="col-md-5 control-label">Numero de telefono</label>
            {{ Auth::user()->phoneNumber }} 
          </div>
            <hr>
            <div class="form-group">
            <label class="col-md-5 control-label">Direccion</label>
            {{ Auth::user()->address }} 
          </div>
            <hr>
            <div class="form-group">
            <label class="col-md-5 control-label">Correo electronico</label>
            {{ Auth::user()->email }} 
          </div>
            <hr>
            <div class="form-group">
                <label class="col-md-5 control-label">Direccion</label>
                {{ Auth::user()->address }} 
            </div>
            <hr>
            <div class="col-md-8">
             <a class="btn btn-primary" href="">Editar</a>
              <span></span>
              <a class="btn btn-primary" href="{{ route('studentCreate') }}">Aceptar</a>
            </div>
           
          </div>
          
                    
                    </div>
                    
                </div>
                
                
        </div>
        
    </div>
</div>

@endsection
