<table class="table">
    <thead>        
        <th>Nombre</th>
        <th>Descripcion</th>                          
        
        <th colspan="2">&nbsp;</th>
    </thead>
    <tbody>
    @foreach($skills as $skill)
        @if($skill->id)
            <tr>
                <td>{{ $skill->name }}</td>
                <td>{{ $skill->description }}</td>                                     
                <td>                                    
                <form action="{{ route('detaillSkill', $skill) }}" method="POST">
                        @csrf
                        @method('GET')
                        <input type="hidden" value="{{ $skill->id }}" name="skill" id="skill">
                        <input type="hidden" value="{{ $skill->codUserSkills }}" name="id" id="id">
                        <input 
                        type="submit" 
                        value="Ver mas" 
                        class="btn-sm btn-primary"
                        >
                    </form>                
                </td>                
            </tr>
            @endif
        @endforeach
    </tbody>
</table>    

