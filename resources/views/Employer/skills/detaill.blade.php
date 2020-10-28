@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header"><center>{{ __('Contactar') }}</div>
        <div class="card-body">

        @if(Auth::User()->id)
            @foreach($users as $user)
            <div class="row">
                    <div class="col-md-10 mx-auto">
                            <div class="form-group row">
                            <div class="col-sm-6"><!-- primera columna -->
                            @foreach($skills as $skill)
                            <div class="form-group">
                                    {{ $skill->name }}                                        
                                </div>                                       
                                <div class="form-group">
                                    Descripcion: <br>
                                    {{ $skill->description }} 
                                </div>                                
                                <div class="form-group">
                                    Dominio: <br>
                                    {{ $skill->domain }}                                        
                                </div>
                                <div class="form-group">
                                    experiencia<br>
                                    {{ $skill->expirience }}                                        
                                </div>
                                @endforeach         
                                
                            </div><!-- fin promera columna -->
                        
                            <div class="col-sm-6"><!-- segunda columna -->
                            <div class="form-group">
                                    {{ $user->name }} {{ $user->lastName }}                                            
                                </div>                                       
                                <div class="form-group">
                                    Numero de telefono<br>
                                    {{ $user->phoneNumber }} 
                                </div>
                                
                                <div class="form-group">
                                    Correo: 
                                    {{ $user->email }}                                        
                                </div>                                                                
                            <div class="form-group">
                                Puedes dejar un mensaje<br>                                                                   
                        <form action="{{ route('createMessage')}}" method="POST">
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" id="subject" rows="2" class="form-control" placeholder="Asunto">
                            </div>
                            <div class="form-group">
                            <textarea name="message" id="message" rows="2" class="form-control" placeholder="Mensaje"></textarea>
                            <input type="hidden" name="codUser" id="codUser" value="{{ $user->id }}">
                            </div>

                            <div class="form-group">
                            <a href="{{ route('viewFindSkills') }}" class="btn-secundary btn-sm float-left">Cancelar</a>
                                        @csrf
                                        @method('POST')
                                        <input 
                                        type="submit" 
                                        value="Contactar" 
                                        class="btn-sm btn-primary float-right"
                                        onclick="return confirm('¿Desea contactar?')">
                                    </form>                                        
                            </div>
                                </div><!-- fin 2 da -->
                            </div>
                    </div>
                </div>
                <hr>
            @endforeach
        @endif
        </div>
        </div>
    </div>
</div>
@endsection
