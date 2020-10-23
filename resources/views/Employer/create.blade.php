@extends('layouts.app')

@section('content')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPk_OYKeT5aN1cuglTcy3B1bdywKfe8JA"></script>
<script src="{{ asset('js/myMap.js') }}"></script>
<div class="container py-5">
@if(session('status'))
    <div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
    <div class="row">
        <div class="col-md-10 mx-auto">
                <div class="form-group row">
                    <div class="col-sm-6"><!-- primera columna -->
                        <label for="address_address">Si no es tu ubicacion puedes alejar, acercar y arrastrar el marcador en el mapa</label>                        
                        <div id="map-canvas"></div>
                        <div class="main"></div>
                        
                        
                         
                    </div><!-- fin de primera columna -->
                    
					<div class="col-sm-6"><!-- segunda columna -->
					<form 
                        action="/findServices" 
                        method="POST" 
                        enctype="multipart/form-data">
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
                            <div class="form-group">
                                <label for="nameJob">Encuentra el servicio que buscas *</label>
                                <label for="nameJob">Selecciona uno *</label>
                                <select name="name" id="name" class="custom-select">
									<option value=""></option>
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
                            <label>selecciona la distancia *</label>
                                <select name="distance" id="distance" class="custom-select">
                                    <option value=""></option>
                                    <option value="0.5">500 metros</option>
                                    <option value="1">1 kilometro</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input id="latbox" name="latbox">
                                <input id="longbox" name="longbox">
                            </div>
                            <div class=""form-control>
                                @csrf                                
                            <input id="aceptar" type="submit" value="Aceptar" class="btn-sm btn-primary float-right">
                            </div>
			            </form>
                    
                    </div>
                </div>
                
        </div>
    </div>
</div>
@endsection
