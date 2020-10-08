@extends('layouts.app')

@section('content')
<div class="container">
<section class="contact">
      <section class="contact__container">
        <h2>Contactanos</h2>
        <form class="contact__container--form">
          <input class="input__contact" type="tetx" placeholder="Nombre">
          <input class="input__contact" type="email" placeholder="Correo">
          <textarea class="input__contact" rows="5" cols="50" placeholder="su mensaje"></textarea>
          <button class="button">Enviar</button>
        </form>        
  </section>

</div>
@endsection

    
</body>
</html>
