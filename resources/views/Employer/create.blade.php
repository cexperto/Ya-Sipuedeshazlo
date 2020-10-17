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
                        <label for="address_address">Empleador Escribe tu direccion o seleccionala en el mapa</label>
                        <input type="text" id="address-input" name="address_address" class="form-control map-input" placeholder="Direccion">
                        <div id="map-canvas"></div>
                        <div class="main"></div>
                        
                        
                         
                    </div><!-- fin de primera columna -->
                    
					<div class="col-sm-6"><!-- segunda columna -->
					<form 
                        action="/findServices" 
                        method="POST" 
                        enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nameJob">Encuentra el servicio que buscas *</label>
                                <label for="nameJob">Selecciona uno *</label>
                                <select name="name" id="name" class="custom-select">
									<option value=""></option>
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
                            <label>selecciona la distancia *</label>
                                <select name="distance" id="distance" class="custom-select">
                                    <option value=""></option>
                                    <option value=".5">500 metros</option>
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
