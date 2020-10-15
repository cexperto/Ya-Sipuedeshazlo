@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
              <div class="form-group row">
              <div class="col-sm-6"><!-- primera columna -->
        

                @foreach($users as $user)
                                  
					              <h3>Informacion Personal</h3>
                        
                            @if ($user->image)
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
                            {{ $user->name }}
                            {{ $user->lastname }}
                          </div>
                            <hr>
                          <div class="form-group">
                            <label class="col-md-5 control-label">Numero de telefono</label>
                            {{ $user->phoneNumber }} 
                          </div>
                            <hr>
                            <div class="form-group">
                            <label class="col-md-5 control-label">Direccion</label>
                            {{ $user->address }} 
                          </div>
                            <hr>
                            <div class="form-group">
                            <label class="col-md-5 control-label">Correo electronico</label>
                            {{ $user->email }} 
                          </div>
                            <hr>
                            
                            <hr>
                            <div class="col-md-8">
                            <!-- <a href="" class="btn-secondary btn-sm active float-right" role="button">Editar</a> -->
                            <form action="{{ route('profile.edit', $user)}}">
                            <input id="aceptar" type="submit" value="Editar" class=" btn-sm btn-primary float-right">
                            @csrf
                            </form>
                              <span></span>
                              <a class="btn-sm btn-active float-left" href="{{ route('services.create') }}">Aceptar</a>
                            </div>
                          
                      </div><!-- fin 2da columna -->                      
              </div>    
        </div>                                
    </div>        
</div>
@endforeach()


@endsection
