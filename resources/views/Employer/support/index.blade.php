@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    crear tickets
                    <a href="{{ route('supportEmployer.create') }}" class="btn-sm btn-primary float-right" >Crear</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>mensaje</th>                            
                            <th colspan="2">&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->message }}</td>                                    
                                    
                                    <td>
                                        <form action="{{ route('supportEmployer.destroy', $contact) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $contact->id }}">
                                            <input 
                                            type="submit" 
                                            value="Eliminar" 
                                            class="btn-sm btn-danger"
                                            onclick="return confirm('¿Desea eliminar?')">
                                        </form>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
