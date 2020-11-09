@extends('layouts.app')

@section('content')
<div class="container">
<section class="contact">
      <section class="contact__container">
      @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        <h2>Contactanos</h2>
        <form class="contact__container--form" action="{{ route('contact') }}" method="POST">
        @csrf
        @method('POST')
          <input class="input__contact" type="text" name="subject" placeholder="Asunto" required>          
          <textarea class="input__contact" rows="5" name="message" cols="50" placeholder="Mensaje"></textarea>
          <center>
          <button class="button">Enviar</button>
          </center>
        </form>        
  </section>

</div>
@endsection

    
</body>
</html>
