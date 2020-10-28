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
                    <label for="address_address">Si no es tu ubicacion puedes alejar, acercar y arrastrar el marcador en el mapa</label>                        
                        <div id="map-canvas"></div>
                        <div class="main"></div>
                        
                        
                         
                    </div><!-- fin de primera columna -->
                    
					<div class="col-sm-6"><!-- segunda columna -->
					<form 
                        action="{{ route('services.store') }}" 
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
                                <label for="nameJob">Selecciona un oficio *</label>
                                <select name="names" id="names" class="custom-select">
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
									<option value="otro">otro</option>
								</select>
                            </div>
                                <label id="label-otros" style="display:none">Escribe el nombre del oficio</label>
                                <input type="text" name="otro" id="otro" rows="2" class="form-control" placeholder="escribe aca el nombre de tu oficio" style="display:none">
                            <div class="form-group">
                                <label for="description">Escribe una descripcion corta de tus servicios *</label>
                                <textarea name="description" id="description" rows="2" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="disponibility">Dinos tu disponibilidad aproximada de tiempo *</label>
                                <select name="disponibility" id="disponibility" class="custom-select">
									<option value=""></option>
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
                                <label for="cost" id=la-cost>Dinos cual es el costo aproximado de tu servicio</label>
                                <input type="text" name="cost" id="cost" class="form-control">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check">
                                <label class="form-check-label" for="check">No se cuanto puedo cobrar</label>
                                <label id="label-costo" style="display:none">El promedio salarial por hora es de $ 3750 pesos</label>
                            </div>
                            <div class="form-group">
                                <label>Añade una imagen descriptiva de tu oficio (opcional)</label>
                                <input accept="image/jpeg,image/png" type="file" name="file[]">
                            </div>
                            <div class="form-group">
                                <label for="content">Añade un video, pon el enlace para compartir(contenido embebido)(Opcional)</label>
                                <textarea name="iframe" id="content" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="latbox" name="latbox">
                                <input type="hidden" id="longbox" name="longbox">
                            </div>
                            <div class="form-group">
                                @csrf
                                <input id="aceptar" type="submit" value="Aceptar" class="btn btn-sm btn-primary">
                            </div>
			            </form>                        
                    
                    </div>
                </div>
                <script>
                //cambios en select oficios
                $("#names").change(function(){
                    if($("#names").val() == 'otro'){
                        document.getElementById("label-otros").style.display = "block";
                        document.getElementById("otro").style.display = "block";
                    }else{
                        document.getElementById("label-otros").style.display = "none";
                        document.getElementById("otro").style.display = "none";
                    }
                });
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
                </script>                
        </div>
    </div>
</div>
@endsection
