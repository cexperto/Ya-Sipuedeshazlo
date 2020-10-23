@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($services as $service)
            <div class="card mb-4">
                
                <div class="card-body">
                @if ($service->image)
                    <img src="{{ $service->get_image }}" class="card-img-top" width="100%" height="300">
                @elseif($service->iframe)
                    <div class="embed-responsive embed-responsive-16by9">
                        {!! $service->iframe !!}
                    </div>
                @endif
                   <h5 class="card-title">{{ $service->title}}</h5>
                   <p class="card-text">
                   {{ $service->get_excerpt }}
                    <a href="{{ route('service', $service)}}">Leer mas</a>
                   </p>
                   <p class="text-muted mb-0">
                    <em>
                        &ndash;{{ $service->user->name}}
                    </em>
                    {{ $service->created_at->format('d M Y') }}
                   </p>
                </div>
            </div>
            @endforeach()
            {{ $services->links() }}
        </div>
        <script>
            $(document).ready(function(){
                //Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
                setTimeout(refrescar, 2000);
            });
            function refrescar(){
                //Actualiza la página
                //alert("Hola mundo");
                location.reload();
            }
        </script>
    </div>
</div>
@endsection
