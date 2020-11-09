@extends('layouts.app')

@section('content')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPk_OYKeT5aN1cuglTcy3B1bdywKfe8JA"></script>
<script src="{{ asset('js/myMap.js') }}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
                    <a href="{{ route('offer') }}" class="btn-sm btn-secondary">atras</a>
                    <label for="address_address">Si no es tu ubicacion puedes alejar, acercar y arrastrar el marcador en el mapa</label>
                        <div id="map-canvas"></div>
                        <div class="main"></div>
                         
                    </div><!-- fin de primera columna -->
                    
					<div class="col-sm-6"><!-- segunda columna -->
					<form 
                        action="{{ route('createOffer') }}" 
                        method="POST" 
                        enctype="multipart/form-data">
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
                                <label for="names">Nombre de la oferta</label>
                                <input type="text" name="names" pattern="[A-Za-z ]" id="names" class="form-control" value="{{ old('names') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Descripcion de la oferta*</label>
                                <textarea name="description" id="description" rows="2" class="form-control" required>{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="disponibility">Disponibilidad de tiempo necesaria*</label>
                                <select name="disponibility" id="disponibility" class="custom-select">
									<option value="{{ old('disponibility') }}">{{ old('disponibility') }}</option>
									<option value="convenir">A convenir</option>									
									<option value="horas">Horas</option>									
									<option value="servicios">por servicio</option>									
									<option value="weekend">Fines de semana</option>									
									<option value="nocturnos">Nocturnos</option>									
								</select>
                            </div>
                            <div class="form-group" name="hours" id="hours" style="display:none">
                                <label for="hours">Numero de horas aproximadas *</label>
                                <select name="hours" id="hours" class="custom-select">
									<option value=""></option>
									<option value="1">1 hora</option>
									<option value="2">2 horas</option>
									<option value="3">3 horas</option>
									<option value="4">4 horas</option>
									<option value="5">5 horas</option>
									<option value="6">6 horas</option>
									<option value="7">7 horas</option>
									<option value="8">8 horas</option>									
								</select>
                            </div>
                            <div class="form-group" name="days" id="days" style="display:none">
                                <label for="days">Dias disponibles *</label>
                                <select name="days" id="days" class="custom-select">
									<option value=""></option>
									<option value="Sabado">Sabado</option>
									<option value="Domingo">Domingo</option>
									<option value="Fin de semana">Fin de semana</option>									
									<option value="Dias festivos">Dias festivos</option>									
								</select>
                            </div>
                            
							<div class="form-group">
                                <label for="cost" id=la-cost>Pago aproximado</label>
                                <input type="text" name="cost" id="cost" class="form-control" value="{{ old('cost') }}">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check">
                                <label class="form-check-label" for="check">pago a convenir</label>
                                <label id="label-costo" style="display:none">El promedio salarial por hora es de $ 3750 pesos</label>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="latbox" name="latbox">
                                <input type="hidden" id="longbox" name="longbox">
                            </div>
                            <div class="form-group">
                                @csrf
                                <input id="aceptar" type="submit" value="Crear" class="btn-sm btn-primary float-right">
                            </div>
			            </form>                        
                    
                    </div>
                </div>
                <script>                
                //cambios en select disponibilidad
                $("#disponibility").change(function(){
                    if($("#disponibility").val() == 'horas'){
                        document.getElementById("hours").style.display = "block";                        
                    }else{
                        document.getElementById("hours").style.display = "none";
                        document.getElementById("hours").value = "";
                    }
                    //weekend
                    if($("#disponibility").val() == 'weekend'){
                        document.getElementById("days").style.display = "block";                        
                    }else{
                        document.getElementById("days").style.display = "none";
                        document.getElementById("days").value = "";
                    }
                });                
                $( '#check' ).on( 'click', function() {
                    if( $(this).is(':checked') ){
                        document.getElementById("label-costo").style.display = "block";                        
                        document.getElementById("cost").style.display = "none";                        
                        document.getElementById("cost").value = "3750";                        
                        //alert("no e cuanto cobrar");
                    } else {
                        // Hacer algo si el checkbox ha sido deseleccionado
                        document.getElementById("label-costo").style.display = "none";
                        document.getElementById("la-cost").style.display = "block";                        
                        document.getElementById("cost").style.display = "block";
                        document.getElementById("cost").value = "";
                    }
                });        

                function _keyValidation() {
                    var text = document.getElementById("names");
                    text.addEventListener("keypress", _check);
                    function _check(e) {
                    var textV = "which" in e ? e.which : e.keyCode,
                        char = String.fromCharCode(textV),
                        regex = /[a-z ]/ig;
                        if(!regex.test(char)) e.preventDefault(); return false;
                    }
                }

window.addEventListener("load", _keyValidation);
                </script>                
        </div>
    </div>
</div>
@endsection
