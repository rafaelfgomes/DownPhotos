<div style="font-family: "Arial", Verdana, Sans-serif;">
  
</div>

<div>

  <h2>Caro(a) {{ $userName }},<h2>

</div>

<p>&nbsp;</p>

<div>

  <p style="text-align: justify; font-size: 17px;">

    Nós da moderação do site DownPhotos, viemos lhe informar que infelizmente a foto abaixo foi reprovada.

  </p>

  <p style="text-align: justify; font-size: 17px;"> Justificativa: {{ $motivo }}.


  </p>

  <p>&nbsp;</p>

  <div style="text-align: center;">

    <figure>
      
      <img src="{{ $message->embed($imagePath) }}" alt="Imagem" style="width: 300px; height: 300px;">

    </figure>

  </div>

  <p>&nbsp;</p>

  <div>

    <p style="font-size: 16px;">Atenciosamente,</p><br />
    <p style="font-weight: bold; font-size: 18px;">Equipe DownPhotos</p>

  </div>

</div>
