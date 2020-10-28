@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Buscar habilidades</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
							<div class="form-group">
                                <label for="cost">Escribe la habilidad que buscas</label>
                                <input type="text" name="texto" id="texto" class="form-control" >
                            </div> 
                            <div id="resultados" class="bg-light border"></div>                           
                    <script>
                    window.addEventListener('load',function(){
                            document.getElementById("texto").addEventListener("keyup", () => {
                                if((document.getElementById("texto").value.length)>=1)
                                    fetch(`/findSkills?texto=${document.getElementById("texto").value}`,{ method:'get' })
                                    .then(response  =>  response.text() )
                                    .then(html      =>  {   document.getElementById("resultados").innerHTML = html  })
                                else
                                    document.getElementById("resultados").innerHTML = ""
                            })
                        });    
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




















