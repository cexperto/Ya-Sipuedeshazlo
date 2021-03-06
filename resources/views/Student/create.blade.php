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
        <div class="card-header">
                <a href="{{ route('skills.index') }}" class="btn-sm btn-primary float-right">añadir</a>
        <label for="skills" class="float-right">Puedes añadir habilidades</label>
            <center>
                Publicar servicios
            </center>
        </div>
        
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
									<option value="{{ old('names') }}">{{ old('names') }}</option>                                    
                                    <option value="Abogado">Abogado</option>   
                                    <option value="Abogado Junior">Abogado Junior</option>
                                    <option value="Abogado Senior">Abogado Senior</option>
                                    <option value="Actor/ Actriz">Actor/ Actriz</option>
                                    <option value="Actuario">Actuario</option>
                                    <option value="Administrador de Base de Datos">Administrador de Base de Datos</option>
                                    <option value="Administrador de Campo">Administrador de Campo</option>
                                    <option value="Administrador de Redes/ Servidores">Administrador de Redes/ Servidores</option>
                                    <option value="Administrativo Área Stock">Administrativo Área Stock</option>
                                    <option value="Administrativo Área Técnica">Administrativo Área Técnica</option>
                                    <option value="Administrativo Área Ventas">Administrativo Área Ventas</option>
                                    <option value="Administrativo de Obras Civiles">Administrativo de Obras Civiles</option>
                                    <option value="Administrativo Estaciones de Servicio">Administrativo Estaciones de Servicio</option>
                                    <option value="Administrativo Inmobiliario">Administrativo Inmobiliario</option>
                                    <option value="Administrativo/ Técnico de Aeropuertos">Administrativo/ Técnico de Aeropuertos</option>
                                    <option value="Agente de Seguridad">Agente de Seguridad</option>
                                    <option value="Agente de Seguros">Agente de Seguros</option>
                                    <option value="Agente de Servicios Post Venta">Agente de Servicios Post Venta</option>
                                    <option value="Agente de Viajes">Agente de Viajes</option>
                                    <option value="Agente Inmobiliario">Agente Inmobiliario</option>
                                    <option value="Analista de Contratos">Analista de Contratos</option>
                                    <option value="Analista de Control de Gestión">Analista de Control de Gestión</option>
                                    <option value="Analista de Costos">Analista de Costos</option>
                                    <option value="Analista de Créditos y Riesgos">Analista de Créditos y Riesgos</option>
                                    <option value="Analista de Créditos y Riesgos Junior">Analista de Créditos y Riesgos Junior</option>
                                    <option value="Analista de Finanzas">Analista de Finanzas</option>
                                    <option value="Analista de Finanzas Junior">Analista de Finanzas Junior</option>
                                    <option value="Analista de Impuestos">Analista de Impuestos</option>
                                    <option value="Analista de Marketing">Analista de Marketing</option>
                                    <option value="Analista de Marketing Junior">Analista de Marketing Junior</option>
                                    <option value="Analista de Microbiología">Analista de Microbiología</option>
                                    <option value="Analista de Organización y Métodos">Analista de Organización y Métodos</option>
                                    <option value="Analista de Organización y Métodos Junior">Analista de Organización y Métodos Junior</option>
                                    <option value="Analista de Procesos Industriales">Analista de Procesos Industriales</option>
                                    <option value="Analista de Riesgos/ Sinestros">Analista de Riesgos/ Sinestros</option>
                                    <option value="Analista de Seguridad Laboral">Analista de Seguridad Laboral</option>
                                    <option value="Analista de Sistemas Informáticos">Analista de Sistemas Informáticos</option>
                                    <option value="Analista de Sistemas Informáticos Junior">Analista de Sistemas Informáticos Junior</option>
                                    <option value="Analista de Trade Marketing">Analista de Trade Marketing</option>
                                    <option value="Analista de Ventas">Analista de Ventas</option>
                                    <option value="Analista Gestión Educativa">Analista Gestión Educativa</option>
                                    <option value="Analista Programador">Analista Programador</option>
                                    <option value="Analista Químico">Analista Químico</option>
                                    <option value="Anfitrión de Restaurante">Anfitrión de Restaurante</option>
                                    <option value="Arquitecto">Arquitecto</option>
                                    <option value="Arquitecto de Sistemas Informáticos">Arquitecto de Sistemas Informáticos</option>
                                    <option value="Arquitecto Junior">Arquitecto Junior</option>
                                    <option value="Artesano*">Artesano*</option>
                                    <option value="Asesor de Salud">Asesor de Salud</option>
                                    <option value="Asesor de Servicios Taller Mecánico">Asesor de Servicios Taller Mecánico</option>
                                    <option value="Asesor Nutricional">Asesor Nutricional</option>
                                    <option value="Asistente Agropecuario">Asistente Agropecuario</option>
                                    <option value="Asistente Ambiental/ Forestal">Asistente Ambiental/ Forestal</option>
                                    <option value="Asistente de Aeronáutica/ Meteorología">Asistente de Aeronáutica/ Meteorología</option>
                                    <option value="Asistente de Archivo">Asistente de Archivo</option>
                                    <option value="Asistente de Comunicación Audiovisual">Asistente de Comunicación Audiovisual</option>
                                    <option value="Asistente de Control de Calidad Industrial">Asistente de Control de Calidad Industrial</option>
                                    <option value="Asistente de Eventos">Asistente de Eventos</option>
                                    <option value="Asistente de Fotografía/ Videos">Asistente de Fotografía/ Videos</option>
                                    <option value="Asistente de Impuestos">Asistente de Impuestos</option>
                                    <option value="Asistente de Investigación y Desarrollo Industrial">Asistente de Investigación y Desarrollo Industrial</option>
                                    <option value="Asistente de Marketing">Asistente de Marketing</option>
                                    <option value="Asistente de Planta Industrial">Asistente de Planta Industrial</option>
                                    <option value="Asistente de Procesos Industriales">Asistente de Procesos Industriales</option>
                                    <option value="Asistente de Proyectos (General)">Asistente de Proyectos (General)</option>
                                    <option value="Asistente de Proyectos Area Recursos Humanos">Asistente de Proyectos Area Recursos Humanos</option>
                                    <option value="Asistente de Proyectos de Construcción Civil">Asistente de Proyectos de Construcción Civil</option>
                                    <option value="Asistente de Proyectos de Economía">Asistente de Proyectos de Economía</option>
                                    <option value="Asistente de Proyectos de Telecomunicaciones">Asistente de Proyectos de Telecomunicaciones</option>
                                    <option value="Asistente de Proyectos Informáticos">Asistente de Proyectos Informáticos</option>
                                    <option value="Asistente de Proyectos Sociales">Asistente de Proyectos Sociales</option>
                                    <option value="Asistente de Publicidad">Asistente de Publicidad</option>
                                    <option value="Asistente de Relaciones Públicas">Asistente de Relaciones Públicas</option>
                                    <option value="Asistente de Salud (Enfermería y otros)">Asistente de Salud (Enfermería y otros)</option>
                                    <option value="Asistente de Secretaría">Asistente de Secretaría</option>
                                    <option value="Asistente de Servicios Generales">Asistente de Servicios Generales</option>
                                    <option value="Asistente de Turismo">Asistente de Turismo</option>
                                    <option value="Asistente de Ventas">Asistente de Ventas</option>
                                    <option value="Asistente Dental">Asistente Dental</option>
                                    <option value="Asistente Despachante de Aduanas">Asistente Despachante de Aduanas</option>
                                    <option value="Asistente en Construcción Civil">Asistente en Construcción Civil</option>
                                    <option value="Asistente en Economía">Asistente en Economía</option>
                                    <option value="Asistente en Electricidad del Automóvil">Asistente en Electricidad del Automóvil</option>
                                    <option value="Asistente en Ingeniería Civil">Asistente en Ingeniería Civil</option>
                                    <option value="Asistente Entrenador Deportivo">Asistente Entrenador Deportivo</option>
                                    <option value="Asistente Informático">Asistente Informático</option>
                                    <option value="Asistente Legal">Asistente Legal</option>
                                    <option value="Asistente Mecánico de Automotores">Asistente Mecánico de Automotores</option>
                                    <option value="Asistente Técnico Área Mecánica Industrial">Asistente Técnico Área Mecánica Industrial</option>
                                    <option value="Asistente Técnico en Electricidad">Asistente Técnico en Electricidad</option>
                                    <option value="Asistente Técnico en Electrónica">Asistente Técnico en Electrónica</option>
                                    <option value="Asistente/ Pasante de Arquitectura">Asistente/ Pasante de Arquitectura</option>
                                    <option value="Atención al Cliente/ Recepcionista">Atención al Cliente/ Recepcionista</option>
                                    <option value="Auditor">Auditor</option>
                                    <option value="Auditor Informático">Auditor Informático</option>
                                    <option value="Auditor Junior">Auditor Junior</option>
                                    <option value="Auditor Senior">Auditor Senior</option>
                                    <option value="Auxiliar Administrativo">Auxiliar Administrativo</option>
                                    <option value="Auxiliar Contable">Auxiliar Contable</option>
                                    <option value="Auxiliar de Cátedra">Auxiliar de Cátedra</option>
                                    <option value="Auxiliar de Cobranzas">Auxiliar de Cobranzas</option>
                                    <option value="Auxiliar de Comercio Exterior">Auxiliar de Comercio Exterior</option>
                                    <option value="Auxiliar de Compras">Auxiliar de Compras</option>
                                    <option value="Auxiliar de Créditos">Auxiliar de Créditos</option>
                                    <option value="Auxiliar de Depósito">Auxiliar de Depósito</option>
                                    <option value="Auxiliar de Diseño de Moda">Auxiliar de Diseño de Moda</option>
                                    <option value="Auxiliar de Facturación y/o Cuentas Corrientes">Auxiliar de Facturación y/o Cuentas Corrientes</option>
                                    <option value="Auxiliar de Licitaciones">Auxiliar de Licitaciones</option>
                                    <option value="Auxiliar de Logística">Auxiliar de Logística</option>
                                    <option value="Auxiliar de Máquinas (Navegación)">Auxiliar de Máquinas (Navegación)</option>
                                    <option value="Auxiliar de Mostrador Casa de Cambios">Auxiliar de Mostrador Casa de Cambios</option>
                                    <option value="Auxiliar de obra">Auxiliar de obra</option>
                                    <option value="Auxiliar de Ornamentacion">Auxiliar de Mostrador Casa de Cambios</option>
                                    <option value="Auxiliar de Recursos Humanos">Auxiliar de Recursos Humanos</option>
                                    <option value="Auxiliar de Siniestros">Auxiliar de Siniestros</option>
                                    <option value="Auxiliar de Tesorería">Auxiliar de Tesorería</option>
                                    <option value="Ayudante de Cocina">Ayudante de Cocina</option>
                                    <option value="Ayudante de Nutrición">Ayudante de Nutrición</option>
                                    <option value="Ayudante de Psicología">Ayudante de Psicología</option>
                                    <option value="Barrendero *">Barrendero *</option>
                                    <option value="Bartender">Bartender</option>
                                    <option value="Bibliotecario">Bibliotecario</option>
                                    <option value="Biólogo">Biólogo</option>
                                    <option value="Biomédico">Biomédico</option>
                                    <option value="Bioquímico">Bioquímico</option>
                                    <option value="Bombero">Bombero</option>
                                    <option value="Botánico">Botánico</option>
                                    <option value="Botones">Botones</option>
                                    <option value="Brand Manager">Brand Manager</option>
                                    <option value="Cadete u Ordenanza">Cadete u Ordenanza</option>
                                    <option value="Cajero">Cajero</option>
                                    <option value="Calculista de Costos de Construcción">Calculista de Costos de Construcción</option>
                                    <option value="Calculista Estructural">Calculista Estructural</option>
                                    <option value="Camarógrafo">Camarógrafo</option>
                                    <option value="Censista">Censista</option>
                                    <option value="Centro de Salud / Odontológico - Gerente">Centro de Salud / Odontológico - Gerente</option>
                                    <option value="Chef">Chef</option>
                                    <option value="Chofer">Chofer</option>
                                    <option value="Chofer-Cobrador">Chofer-Cobrador</option>
                                    <option value="Climatólogo">Climatólogo</option>
                                    <option value="Cobrador">Cobrador</option>
                                    <option value="Cocinero">Cocinero</option>
                                    <option value="Comercial Unidad de Negocios">Comercial Unidad de Negocios</option>
                                    <option value="Community Manager">Community Manager</option>
                                    <option value="Conductor de Programas Televisivos y Radiales">Conductor de Programas Televisivos y Radiales</option>
                                    <option value="Confitero">Confitero</option>
                                    <option value="Consejero Educacional">Consejero Educacional</option>
                                    <option value="Consejero Familiar">Consejero Familiar</option>
                                    <option value="Consejero Psicólogo Clínico">Consejero Psicólogo Clínico</option>
                                    <option value="Consultor Analista de Planificación">Consultor Analista de Planificación</option>
                                    <option value="Consultor Asistente de Planificación">Consultor Asistente de Planificación</option>
                                    <option value="Consultor Contable Financiero">Consultor Contable Financiero</option>
                                    <option value="Consultor Contable Financiero Junior">Consultor Contable Financiero Junior</option>
                                    <option value="Consultor Contable Financiero Senior">Consultor Contable Financiero Senior</option>
                                    <option value="Consultor de Comunicación Audiovisual">Consultor de Comunicación Audiovisual</option>
                                    <option value="Consultor de Logística/ Transporte/ Depósito">Consultor de Logística/ Transporte/ Depósito</option>
                                    <option value="Consultor de Procesos Industriales">Consultor de Procesos Industriales</option>
                                    <option value="Consultor de Recursos Humanos">Consultor de Recursos Humanos</option>
                                    <option value="Consultor en Administración de Empresas">Consultor en Administración de Empresas</option>
                                    <option value="Consultor en Administración de Empresas Junior">Consultor en Administración de Empresas Junior</option>
                                    <option value="Consultor en Administración de Empresas Senior">Consultor en Administración de Empresas Senior</option>
                                    <option value="Consultor en Ingeniería Industrial">Consultor en Ingeniería Industrial</option>
                                    <option value="Consultor Gerente/ Jefe de Planificación">Consultor Gerente/ Jefe de Planificación</option>
                                    <option value="Consultor Informático">Consultor Informático</option>
                                    <option value="Consultor Junior de Recursos Humanos">Consultor Junior de Recursos Humanos</option>
                                    <option value="Consultor Senior de Recursos Humanos">Consultor Senior de Recursos Humanos</option>
                                    <option value="Contador General">Contador General</option>
                                    <option value="Coordinador Académico/ Evaluador">Coordinador Académico/ Evaluador</option>
                                    <option value="Coordinador de Captación de Recursos">Coordinador de Captación de Recursos</option>
                                    <option value="Coordinador de Eventos">Coordinador de Eventos</option>
                                    <option value="Coordinador de Proyectos Ambientales">Coordinador de Proyectos Ambientales</option>
                                    <option value="Coreógrafo">Coreógrafo</option>
                                    <option value="Crew - Funcionario Restaurant Comida Rápida">Crew - Funcionario Restaurant Comida Rápida</option>
                                    <option value="Custodio">Custodio</option>
                                    <option value="Desarrollador de Negocios">Desarrollador de Negocios</option>
                                    <option value="Desarrollador Web">Desarrollador Web</option>
                                    <option value="Desarrollador Web Junior">Desarrollador Web Junior</option>
                                    <option value="Despachante de Aduanas">Despachante de Aduanas</option>
                                    <option value="Diagramador">Diagramador</option>
                                    <option value="Dibujante Técnico Arquitectura">Dibujante Técnico Arquitectura</option>
                                    <option value="Dibujante Técnico Ing Civil">Dibujante Técnico Ing Civil</option>
                                    <option value="Dibujante Técnico Ing Electromecánica">Dibujante Técnico Ing Electromecánica</option>
                                    <option value="Digitador/ Operador de Computadoras">Digitador/ Operador de Computadoras</option>
                                    <option value="Digitalizador">Digitalizador</option>
                                    <option value="Director de Cine">Director de Cine</option>
                                    <option value="Director de Fotografía">Director de Fotografía</option>
                                    <option value="Director de Obra Teatral">Director de Obra Teatral</option>
                                    <option value="Director Técnico de Obras Civiles">Director Técnico de Obras Civiles</option>
                                    <option value="Diseñador de Interiores">Diseñador de Interiores</option>
                                    <option value="Diseñador de Moda">Diseñador de Moda</option>
                                    <option value="Diseñador de Proyectos - Proyectista">Diseñador de Proyectos - Proyectista</option>
                                    <option value="Diseñador Gráfico">Diseñador Gráfico</option>
                                    <option value="Diseñador Gráfico Junior">Diseñador Gráfico Junior</option>
                                    <option value="Economista">Economista</option>
                                    <option value="Economista Junior">Economista Junior</option>
                                    <option value="Editor de Comunicación">Editor de Comunicación</option>
                                    <option value="Ejecutivo de Marketing">Ejecutivo de Marketing</option>
                                    <option value="Ejecutivo de Ventas/ Cuentas">Ejecutivo de Ventas/ Cuentas</option>
                                    <option value="Ejecutivo de Ventas/ Cuentas Junior">Ejecutivo de Ventas/ Cuentas Junior</option>
                                    <option value="Emisor de Pólizas">Emisor de Pólizas</option>
                                    <option value="Encargado Comercio Exterior">Encargado Comercio Exterior</option>
                                    <option value="Encargado de Administración de Personal">Encargado de Administración de Personal</option>
                                    <option value="Encargado de Archivo">Encargado de Archivo</option>
                                    <option value="Encargado de Compras">Encargado de Compras</option>
                                    <option value="Encargado de Compras/ Stock Alimentos y Bebidas">Encargado de Compras/ Stock Alimentos y Bebidas</option>
                                    <option value="Encargado de Créditos">Encargado de Créditos</option>
                                    <option value="Encargado de Cuentas a Pagar">Encargado de Cuentas a Pagar</option>
                                    <option value="Encargado de Desarrollo Organizacional">Encargado de Desarrollo Organizacional</option>
                                    <option value="Encargado de Facturación y/o Cuentas Corrientes">Encargado de Facturación y/o Cuentas Corrientes</option>
                                    <option value="Encargado de Informática">Encargado de Informática</option>
                                    <option value="Encargado de Local Comercial">Encargado de Local Comercial</option>
                                    <option value="Encargado de Reclutamiento y/o Selección">Encargado de Reclutamiento y/o Selección</option>
                                    <option value="Encargado de Recursos Humanos">Encargado de Recursos Humanos</option>
                                    <option value="Encargado de Reservas de Hotel">Encargado de Reservas de Hotel</option>
                                    <option value="Encargado de Stock Comercio Minorista - Merchandiser">Encargado de Stock Comercio Minorista - Merchandiser</option>
                                    <option value="Encargado en Infraestructura Tecnológica">Encargado en Infraestructura Tecnológica</option>
                                    <option value="Encargado o Asistente de Codificación">Encargado o Asistente de Codificación</option>
                                    <option value="Encargado(a) de Limpieza *">Encargado(a) de Limpieza *</option>
                                    <option value="Encargado/ Agente de Cobranzas">Encargado/ Agente de Cobranzas</option>
                                    <option value="Encargado/ Asistente de Escrituraciones">Encargado/ Asistente de Escrituraciones</option>
                                    <option value="Encargado/ Auxiliar de Patrimonio">Encargado/ Auxiliar de Patrimonio</option>
                                    <option value="Encuestador Área Marketing">Encuestador Área Marketing</option>
                                    <option value="Encuestador Área Social">Encuestador Área Social</option>
                                    <option value="Enfermero">Enfermero</option>
                                    <option value="Entrenador Deportivo">Entrenador Deportivo</option>
                                    <option value="Escenógrafo">Escenógrafo</option>
                                    <option value="Estadígrafo">Estadígrafo</option>
                                    <option value="Esteticista de mascota (Área Veterinaria)">Esteticista de mascota (Área Veterinaria)</option>
                                    <option value="Fiscalizador de Campo o de Vacunación">Fiscalizador de Campo o de Vacunación</option>
                                    <option value="Fiscalizador de Obras Civiles">Fiscalizador de Obras Civiles</option>
                                    <option value="Fiscalizador de Obras Ing Electromecánica">Fiscalizador de Obras Ing Electromecánica</option>
                                    <option value="Fonoaudiólogo">Fonoaudiólogo</option>
                                    <option value="Fotógrafo/ Técnico en Videos">Fotógrafo/ Técnico en Videos</option>
                                    <option value="Genetista">Genetista</option>
                                    <option value="Geologo">Geologo</option>
                                    <option value="Gerente Administrativo y Financiero">Gerente Administrativo y Financiero</option>
                                    <option value="Gerente Administrativo/ Operacional">Gerente Administrativo/ Operacional</option>
                                    <option value="Gerente Área Informática">Gerente Área Informática</option>
                                    <option value="Gerente Comercial">Gerente Comercial</option>
                                    <option value="Gerente de Análisis de Sistemas">Gerente de Análisis de Sistemas</option>
                                    <option value="Gerente de Canal">Gerente de Canal</option>
                                    <option value="Gerente de Compras">Gerente de Compras</option>
                                    <option value="Gerente de Control de Calidad Industrial">Gerente de Control de Calidad Industrial</option>
                                    <option value="Gerente de Desarrollo de Sistemas">Gerente de Desarrollo de Sistemas</option>
                                    <option value="Gerente de Infraestructura Tecnológica">Gerente de Infraestructura Tecnológica</option>
                                    <option value="Gerente de Investigación y Desarrollo Industrial">Gerente de Investigación y Desarrollo Industrial</option>
                                    <option value="Gerente de Marketing">Gerente de Marketing</option>
                                    <option value="Gerente de Planta Industrial">Gerente de Planta Industrial</option>
                                    <option value="Gerente de Producción Industrial">Gerente de Producción Industrial</option>
                                    <option value="Gerente de Producto (Marketing)">Gerente de Producto (Marketing)</option>
                                    <option value="Gerente de Proyectos (General)">Gerente de Proyectos (General)</option>
                                    <option value="Gerente de Proyectos Agrícolas">Gerente de Proyectos Agrícolas</option>
                                    <option value="Gerente de Proyectos Área Recursos Humanos">Gerente de Proyectos Área Recursos Humanos</option>
                                    <option value="Gerente de Proyectos de Construcción Civil">Gerente de Proyectos de Construcción Civil</option>
                                    <option value="Gerente de Proyectos de Economía">Gerente de Proyectos de Economía</option>
                                    <option value="Gerente de Proyectos de Telecomunicaciones">Gerente de Proyectos de Telecomunicaciones</option>
                                    <option value="Gerente de Proyectos Informáticos">Gerente de Proyectos Informáticos</option>
                                    <option value="Gerente de Proyectos Sociales">Gerente de Proyectos Sociales</option>
                                    <option value="Gerente de Recursos Humanos">Gerente de Recursos Humanos</option>
                                    <option value="Gerente de Relaciones Públicas">Gerente de Relaciones Públicas</option>
                                    <option value="Gerente de Servicios Generales">Gerente de Servicios Generales</option>
                                    <option value="Gerente de Sucursal/ Unidad de Negocios">Gerente de Sucursal/ Unidad de Negocios</option>
                                    <option value="Gerente de Ventas">Gerente de Ventas</option>
                                    <option value="Gerente Departamental/ Sucursal">Gerente Departamental/ Sucursal</option>
                                    <option value="Gerente Financiero">Gerente Financiero</option>
                                    <option value="Gerente Financiero y Administrativo">Gerente Financiero y Administrativo</option>
                                    <option value="Gerente General">Gerente General</option>
                                    <option value="Gerente Propietario">Gerente Propietario</option>
                                    <option value="Gestor">Gestor</option>
                                    <option value="Gobernanta/ Mucama de Hotel">Gobernanta/ Mucama de Hotel</option>
                                    <option value="Guía Turístico">Guía Turístico</option>
                                    <option value="Ingeniero Agrónomo">Ingeniero Agrónomo</option>
                                    <option value="Ingeniero Ambiental">Ingeniero Ambiental</option>
                                    <option value="Ingeniero Civil">Ingeniero Civil</option>
                                    <option value="Ingeniero Civil Junior">Ingeniero Civil Junior</option>
                                    <option value="Ingeniero de Caminos">Ingeniero de Caminos</option>
                                    <option value="Ingeniero de Producción Industrial">Ingeniero de Producción Industrial</option>
                                    <option value="Ingeniero de Producción Industrial Junior">Ingeniero de Producción Industrial Junior</option>
                                    <option value="Ingeniero de Producción Industrial Senior">Ingeniero de Producción Industrial Senior</option>
                                    <option value="Ingeniero Eléctrico/ Electrotécnico">Ingeniero Eléctrico/ Electrotécnico</option>
                                    <option value="Ingeniero Eléctrico/ Electrotécnico Junior">Ingeniero Eléctrico/ Electrotécnico Junior</option>
                                    <option value="Ingeniero Electrónico">Ingeniero Electrónico</option>
                                    <option value="Ingeniero Electrónico Junior">Ingeniero Electrónico Junior</option>
                                    <option value="Ingeniero en Ecología Humana">Ingeniero en Ecología Humana</option>
                                    <option value="Ingeniero en Telecomunicaciones">Ingeniero en Telecomunicaciones</option>
                                    <option value="Ingeniero en Telecomunicaciones Junior">Ingeniero en Telecomunicaciones Junior</option>
                                    <option value="Ingeniero Forestal">Ingeniero Forestal</option>
                                    <option value="Ingeniero Industrial">Ingeniero Industrial</option>
                                    <option value="Ingeniero Industrial Junior">Ingeniero Industrial Junior</option>
                                    <option value="Ingeniero Mecánico">Ingeniero Mecánico</option>
                                    <option value="Ingeniero Mecánico Junior/ Pasante">Ingeniero Mecánico Junior/ Pasante</option>
                                    <option value="Ingeniero Metalúrgico">Ingeniero Metalúrgico</option>
                                    <option value="Ingeniero Metalúrgico Junior/ Pasante">Ingeniero Metalúrgico Junior/ Pasante</option>
                                    <option value="Ingeniero Químico">Ingeniero Químico</option>
                                    <option value="Ingeniero Químico Junior">Ingeniero Químico Junior</option>
                                    <option value="Instalador">Instalador</option>
                                    <option value="Instructor - Servicio Social">Instructor - Servicio Social</option>
                                    <option value="Instructor (General)">Instructor (General)</option>
                                    <option value="Instructor Agropecuario">Instructor Agropecuario</option>
                                    <option value="Instructor de Informática">Instructor de Informática</option>
                                    <option value="Instrumentador Quirúrgico">Instrumentador Quirúrgico</option>
                                    <option value="Inversiones - Analista/ Proyectista">Inversiones - Analista/ Proyectista</option>
                                    <option value="Investigador de Mercado">Investigador de Mercado</option>
                                    <option value="Jefe Comercio Exteror">Jefe Comercio Exteror</option>
                                    <option value="Jefe de Depósito">Jefe de Depósito</option>
                                    <option value="Jefe de Laboratorio Industrial">Jefe de Laboratorio Industrial</option>
                                    <option value="Jefe de Logística">Jefe de Logística</option>
                                    <option value="Jefe de Mantenimiento Industrial">Jefe de Mantenimiento Industrial</option>
                                    <option value="Jefe de Máquinas (Navegación)">Jefe de Máquinas (Navegación)</option>
                                    <option value="Jefe de Muelle">Jefe de Muelle</option>
                                    <option value="Jefe de Organización y Métodos">Jefe de Organización y Métodos</option>
                                    <option value="Jefe de Planificación de la Producción Industrial">Jefe de Planificación de la Producción Industrial</option>
                                    <option value="Jefe de Procesamiento de Datos">Jefe de Procesamiento de Datos</option>
                                    <option value="Jefe de Recepción de Hotel">Jefe de Recepción de Hotel</option>
                                    <option value="Jefe de Seguridad">Jefe de Seguridad</option>
                                    <option value="Jefe de Seguridad Informática">Jefe de Seguridad Informática</option>
                                    <option value="Jefe de Soporte a Usuarios de Informática">Jefe de Soporte a Usuarios de Informática</option>
                                    <option value="Jefe de Suministros">Jefe de Suministros</option>
                                    <option value="Jefe de Taller de Mecánica del Automóvil">Jefe de Taller de Mecánica del Automóvil</option>
                                    <option value="Jefe de Taller Electricidad del Automóvil">Jefe de Taller Electricidad del Automóvil</option>
                                    <option value="Jefe de Turno (Producción Industrial)">Jefe de Turno (Producción Industrial)</option>
                                    <option value="Jefe Desarrollo Web">Jefe Desarrollo Web</option>
                                    <option value="Jefe Laboratorio Clínico">Jefe Laboratorio Clínico</option>
                                    <option value="Jefe Técnico Electricidad/ Electromecánica">Jefe Técnico Electricidad/ Electromecánica</option>
                                    <option value="Jefe Técnico en Electrónica">Jefe Técnico en Electrónica</option>
                                    <option value="Jefe/ Encargado de Publicidad">Jefe/ Encargado de Publicidad</option>
                                    <option value="Juez">Juez</option>
                                    <option value="Kinesiólogo Fisioterapeuta">Kinesiólogo Fisioterapeuta</option>
                                    <option value="Kinesiólogo Fisioterapeuta Junior">Kinesiólogo Fisioterapeuta Junior</option>
                                    <option value="Liquidador de Sueldos y Jornales">Liquidador de Sueldos y Jornales</option>
                                    <option value="Locutor de Radio/ Conductor de Televisión">Locutor de Radio/ Conductor de Televisión</option>
                                    <option value="Manicura *">Manicura *</option>
                                    <option value="Mantenimiento de Inmuebles *">Mantenimiento de Inmuebles *</option>
                                    <option value="Maquilladora *">Maquilladora *</option>
                                    <option value="Maquinista (Grúa)">Maquinista (Grúa)</option>
                                    <option value="Marinero">Marinero</option>
                                    <option value="Masajista *">Masajista *</option>
                                    <option value="Matemático">Matemático</option>
                                    <option value="Mayordomo de Campo">Mayordomo de Campo</option>
                                    <option value="Médico">Médico</option>
                                    <option value="Mesero">Mesero</option>
                                    <option value="Meteorólogo">Meteorólogo</option>
                                    <option value="Miembro de las Fuerzas Armadas">Miembro de las Fuerzas Armadas</option>
                                    <option value="Mozo">Mozo</option>
                                    <option value="Músico">Músico</option>
                                    <option value="Neuropsicólogo">Neuropsicólogo</option>
                                    <option value="Nutricionista">Nutricionista</option>
                                    <option value="Obstetra">Obstetra</option>
                                    <option value="Odontólogo">Odontólogo</option>
                                    <option value="Odontopediatra">Odontopediatra</option>
                                    <option value="Oficial/ Operador de Siniestros">Oficial/ Operador de Siniestros</option>
                                    <option value="Operador">Operador</option>
                                    <option value="Operador de Activaciones">Operador de Activaciones</option>
                                    <option value="Operador de Call Center">Operador de Call Center</option>
                                    <option value="Operador de Garantías Post Venta">Operador de Garantías Post Venta</option>
                                    <option value="Operador de Máquinas/ Equipamiento Industriales *">Operador de Máquinas/ Equipamiento Industriales *</option>
                                    <option value="Operador de Mesa de Cambios">Operador de Mesa de Cambios</option>
                                    <option value="Operador de Monitoreo">Operador de Monitoreo</option>
                                    <option value="Operador de Montacargas">Operador de Montacargas</option>
                                    <option value="Operador de Radio/ Sonidista">Operador de Radio/ Sonidista</option>
                                    <option value="Operario Área Ambiental/ Forestal">Operario Área Ambiental/ Forestal</option>
                                    <option value="Operario de Curtiembre *">Operario de Curtiembre *</option>
                                    <option value="Operario de Frigoríficos y Carnicerías *">Operario de Frigoríficos y Carnicerías *</option>
                                    <option value="Operario de Imprenta *">Operario de Imprenta *</option>
                                    <option value="Operario de Industria (general) *">Operario de Industria (general) *</option>
                                    <option value="Operario de Industria Química *">Operario de Industria Química *</option>
                                    <option value="Operario de Industria Textil/ Confección *">Operario de Industria Textil/ Confección *</option>
                                    <option value="Operario de Limpieza *">Operario de Limpieza *</option>
                                    <option value="Operario de Logistica *">Operario de Logistica *</option>
                                    <option value="Operario de Publicidad *">Operario de Publicidad *</option>
                                    <option value="Operario del Área Agropecuaria *">Operario del Área Agropecuaria *</option>
                                    <option value="Panadero *">Panadero *</option>
                                    <option value="Paramédico">Paramédico</option>
                                    <option value="Pastelero/ Repostero *">Pastelero/ Repostero *</option>
                                    <option value="Peluquero *">Peluquero *</option>
                                    <option value="Periodista/ Reportero">Periodista/ Reportero</option>
                                    <option value="Perito Psicólogo Forense">Perito Psicólogo Forense</option>
                                    <option value="Personal Trainer">Personal Trainer</option>
                                    <option value="Piloto de Aviación">Piloto de Aviación</option>
                                    <option value="Portavalor">Portavalor</option>
                                    <option value="Preventista">Preventista</option>
                                    <option value="Procurador">Procurador</option>
                                    <option value="Productor Audiovisual">Productor Audiovisual</option>
                                    <option value="Profesor de Colegio">Profesor de Colegio</option>
                                    <option value="Profesor de Danza y Teatro">Profesor de Danza y Teatro</option>
                                    <option value="Profesor de Educación Física">Profesor de Educación Física</option>
                                    <option value="Profesor de Idiomas">Profesor de Idiomas</option>
                                    <option value="Profesor de Música/ Artes Plásticas">Profesor de Música/ Artes Plásticas</option>
                                    <option value="Profesor Guía">Profesor Guía</option>
                                    <option value="Profesor Nivel Parvulario">Profesor Nivel Parvulario</option>
                                    <option value="Profesor Nivel Primario">Profesor Nivel Primario</option>
                                    <option value="Profesor Universitario">Profesor Universitario</option>
                                    <option value="Programador">Programador</option>
                                    <option value="Programador Junior">Programador Junior</option>
                                    <option value="Programador Senior">Programador Senior</option>
                                    <option value="Promotor">Promotor</option>
                                    <option value="Protetista Dental">Protetista Dental</option>
                                    <option value="Proyectista / Diseñador Industrial - Asistente">Proyectista / Diseñador Industrial - Asistente</option>
                                    <option value="Proyectista/ Diseñador Industrial">Proyectista/ Diseñador Industrial</option>
                                    <option value="Psicólogo Clínico - Analista de drogodependencias">Psicólogo Clínico - Analista de drogodependencias</option>
                                    <option value="Psicólogo Comunitario">Psicólogo Comunitario</option>
                                    <option value="Psicólogo Cristiano">Psicólogo Cristiano</option>
                                    <option value="Psicomotricista">Psicomotricista</option>
                                    <option value="Publicista">Publicista</option>
                                    <option value="Químico">Químico</option>
                                    <option value="Recepcionista de hotel">Recepcionista de hotel</option>
                                    <option value="Recontador de billetes">Recontador de billetes</option>
                                    <option value="Redactor/ Corrector de Textos">Redactor/ Corrector de Textos</option>
                                    <option value="Redes/ Telecomunicaciones - Técnico">Redes/ Telecomunicaciones - Técnico</option>
                                    <option value="Regente de Farmacia">Regente de Farmacia</option>
                                    <option value="Repositor">Repositor</option>
                                    <option value="Salud - Puestos varios">Salud - Puestos varios</option>
                                    <option value="Secretaria(o) de Gerencia/ Directorio">Secretaria(o) de Gerencia/ Directorio</option>
                                    <option value="Secretario Académico entidad educativa">Secretario Académico entidad educativa</option>
                                    <option value="Secretario(a)">Secretario(a)</option>
                                    <option value="Secretario(a) General - Secretario(a) Ejecutivo - Office Manager">Secretario(a) General - Secretario(a) Ejecutivo - Office Manager</option>
                                    <option value="Servicio Doméstico *">Servicio Doméstico *</option>
                                    <option value="Servicios generales *">Servicio Doméstico *</option>
                                    <option value="Soporte a Usuarios - Telecomunicaciones">Soporte a Usuarios - Telecomunicaciones</option>
                                    <option value="Soporte a Usuarios de Informática- Help Desk">Soporte a Usuarios de Informática- Help Desk</option>
                                    <option value="Sous-Chef">Sous-Chef</option>
                                    <option value="Subgerente de Ventas">Subgerente de Ventas</option>
                                    <option value="Superintentente de Obras Civiles">Superintentente de Obras Civiles</option>
                                    <option value="Supervisor Administrativo/ Operaciones">Supervisor Administrativo/ Operaciones</option>
                                    <option value="Supervisor de Cajas">Supervisor de Cajas</option>
                                    <option value="Supervisor de Call Center">Supervisor de Call Center</option>
                                    <option value="Supervisor de Cobranzas">Supervisor de Cobranzas</option>
                                    <option value="Supervisor de Compras">Supervisor de Compras</option>
                                    <option value="Supervisor de Contabilidad">Supervisor de Contabilidad</option>
                                    <option value="Supervisor de Finanzas">Supervisor de Finanzas</option>
                                    <option value="Supervisor de Licitaciones">Supervisor de Licitaciones</option>
                                    <option value="Supervisor de Marketing">Supervisor de Marketing</option>
                                    <option value="Supervisor de Obras Civiles">Supervisor de Obras Civiles</option>
                                    <option value="Supervisor de Planta Industrial">Supervisor de Planta Industrial</option>
                                    <option value="Supervisor de Producción Industrial">Supervisor de Producción Industrial</option>
                                    <option value="Supervisor de Telecobranzas">Supervisor de Telecobranzas</option>
                                    <option value="Supervisor de Telemarketing">Supervisor de Telemarketing</option>
                                    <option value="Supervisor de Ventas">Supervisor de Ventas</option>
                                    <option value="Tasador">Tasador</option>
                                    <option value="Técnico Agropecuario">Técnico Agropecuario</option>
                                    <option value="Técnico Ambiental">Técnico Ambiental</option>
                                    <option value="Técnico Cartógrafo">Técnico Cartógrafo</option>
                                    <option value="Técnico en Construcciones Civiles">Técnico en Construcciones Civiles</option>
                                    <option value="Técnico en Control de Calidad Industrial">Técnico en Control de Calidad Industrial</option>
                                    <option value="Técnico en Electricidad">Técnico en Electricidad</option>
                                    <option value="Técnico en Electricidad del Automóvil">Técnico en Electricidad del Automóvil</option>
                                    <option value="Técnico en Electromecánica">Técnico en Electromecánica</option>
                                    <option value="Técnico en Electromedicina">Técnico en Electromedicina</option>
                                    <option value="Técnico en Electrónica">Técnico en Electrónica</option>
                                    <option value="Técnico en Farmacia">Técnico en Farmacia</option>
                                    <option value="Técnico en Implementación de Sistemas Informáticos">Técnico en Implementación de Sistemas Informáticos</option>
                                    <option value="Técnico en Investigación Económica">Técnico en Investigación Económica</option>
                                    <option value="Técnico en Investigación y Desarrollo en Informática">Técnico en Investigación y Desarrollo en Informática</option>
                                    <option value="Técnico en Laboratorio Industrial">Técnico en Laboratorio Industrial</option>
                                    <option value="Técnico en Mantenimiento Aeronaves">Técnico en Mantenimiento Aeronaves</option>
                                    <option value="Técnico en Mantenimiento de Automotores*">Técnico en Mantenimiento de Automotores*</option>
                                    <option value="Técnico en Mantenimiento Industrial">Técnico en Mantenimiento Industrial</option>
                                    <option value="Técnico en Psicofarmacología">Técnico en Psicofarmacología</option>
                                    <option value="Técnico en Psicometría">Técnico en Psicometría</option>
                                    <option value="Técnico en Radiología">Técnico en Radiología</option>
                                    <option value="Técnico en Redes de Área Local">Técnico en Redes de Área Local</option>
                                    <option value="Técnico en Redes y Servidores">Técnico en Redes y Servidores</option>
                                    <option value="Técnico en Refrigeración/ Aire Acondicionado">Técnico en Refrigeración/ Aire Acondicionado</option>
                                    <option value="Técnico en Reparación de Celulares">Técnico en Reparación de Celulares</option>
                                    <option value="Técnico en Reparación de Computadoras">Técnico en Reparación de Computadoras</option>
                                    <option value="Técnico en Seguridad e Higiene Industrial">Técnico en Seguridad e Higiene Industrial</option>
                                    <option value="Técnico Forestal">Técnico Forestal</option>
                                    <option value="Técnico Laboratorio Clínico">Técnico Laboratorio Clínico</option>
                                    <option value="Técnico Mecánico de Automotores *">Técnico Mecánico de Automotores *</option>
                                    <option value="Técnico Mecánico de Motos *">Técnico Mecánico de Motos *</option>
                                    <option value="Técnico Mecánico Industrial">Técnico Mecánico Industrial</option>
                                    <option value="Técnico Metalúrgico">Técnico Metalúrgico</option>
                                    <option value="Técnico Reparación Equipos Electrónicos">Técnico Reparación Equipos Electrónicos</option>
                                    <option value="Telecobrador/a Junior">Telecobrador/a Junior</option>
                                    <option value="Telecobrador/a Senior (Agente)">Telecobrador/a Senior (Agente)</option>
                                    <option value="Telefonista">Telefonista</option>
                                    <option value="Telemarketero">Telemarketero</option>
                                    <option value="Tesorero">Tesorero</option>
                                    <option value="Tester de Control de Calidad de Software">Tester de Control de Calidad de Software</option>
                                    <option value="Topógrafo / Ayudante de Topógrafo">Topógrafo / Ayudante de Topógrafo</option>
                                    <option value="Trabajador de la Construcción *">Trabajador de la Construcción *</option>
                                    <option value="Trabajador Independiente *">Trabajador Independiente *</option>
                                    <option value="Trabajador Social">Trabajador Social</option>
                                    <option value="Trabajador Social Junior">Trabajador Social Junior</option>
                                    <option value="Traductor de Idiomas">Traductor de Idiomas</option>
                                    <option value="Tripulante de Cabina">Tripulante de Cabina</option>
                                    <option value="Vendedor">Vendedor</option>
                                    <option value="Vendedor de Salón Comercial">Vendedor de Salón Comercial</option>
                                    <option value="Vestuarista">Vestuarista</option>
                                    <option value="Veterinario">Veterinario</option>
                                    <option value="Vigilante">Vigilante</option>
                                    <option value="Visitador Médico">Visitador Médico</option>
                                    <option value="Webmaster">Webmaster</option>
                                    <option value="Zootecnista">Zootecnista</option>
									<option value="otro">otro</option>
								</select>
                            </div>
                                <label id="label-otros" style="display:none">Escribe el nombre del oficio</label>
                                <input type="text" name="otro" id="otro" rows="2" class="form-control" placeholder="escribe aca el nombre de tu oficio" style="display:none">
                            <div class="form-group">
                                <label for="description">Escribe una descripcion corta de tus servicios *</label>
                                <textarea name="description" id="description" rows="2" class="form-control">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="disponibility">Disponibilidad aproximada de tiempo *</label>
                                <select name="disponibility" id="disponibility" class="custom-select">
									<option value="{{ old('disponibility') }}">{{ old('disponibility') }}</option>
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
                                <label for="cost" id=la-cost>Cual es el costo aproximado de tu servicio</label>
                                <input type="text" name="cost" id="cost" class="form-control" value="{{ old('cost') }}">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check">
                                <label class="form-check-label" for="check">No se cuanto puedo cobrar</label>
                                <label id="label-costo" style="display:none">El promedio salarial por hora es de $ 3750 pesos</label>
                            </div>
                            <div class="form-group">
                                <label>Añade una imagen descriptiva de tu oficio (opcional)</label>
                                <input accept="image/jpeg,image/png,image/jpg,image/gif" type="file" name="file">
                            </div>
                            <div class="form-group">
                                <label for="iframe">Añade un video, pon el enlace para compartir(contenido embebido)(Opcional)</label>
                                <textarea name="iframe" id="iframe" class="form-control">{{ old('iframe') }}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="latbox" name="latbox">
                                <input type="hidden" id="longbox" name="longbox">
                            </div>
                            <div class="form-group">
                                @csrf
                                <input id="aceptar" type="submit" value="Aceptar" class="btn-sm btn-primary float-right">
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
