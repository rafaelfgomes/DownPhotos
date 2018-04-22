<div>

  <h2>Caro(a) {{ $username }},<h2>

</div>

<p>&nbsp;</p>

<div>

  <p style="text-align: justify; font-size: 17px;">

    Informamos que a foto abaixo necessita de ajustes, caso contrário ela será excluída do nosso banco de imagens.

  </p>

  <p>&nbsp;</p>

  <div style="text-align: center;">

    <img src="{{ $message->embed($imagepath) }}" alt="Imagem" style="width: 300px; height: 300px;">

  </div>

  <p>&nbsp;</p>

  <div>

    <p style="font-size: 16px;">Atenciosamente,</p><br />
    <p style="font-weight: bold; font-size: 18px;">Equipe DownPhotos</p>

  </div>

</div>
