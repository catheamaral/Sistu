@extends('layouts.app')
@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

<style type="text/css">
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif};
.tabela {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 10px;
}
textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    font-size: 16px;
    resize: none;
}

</style>
<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
</script>
  <div class="w3-container w3-white w3-animate-top">
    <h2>Gerar Relatório</h2>
    
    <hr> 
    <div class="w3-card-4 ">
      <div class="w3-container w3-light-grey">
        <h2>Data</h2>
      </div>
      <form class="w3-container w3-row-padding w3-white" id="form" action="#" method="post">
        <p>
          <div class="w3-col w3-half">
            Primeira data: 
            <input class="w3-input" type="date" name="parte1">
        </p></br>
      </div>
      <p>
          <div class="w3-col w3-half">
            Segunda data: 
            <input class="w3-input" type="date" name="parte2">
        </p></br>
      </div>
      </form>
    </div>
    <hr>
    <p><input onclick="document.getElementById('id10').style.display='block'" class="w3-button w3-light-grey" type="submit" value="Gerar Relatório" ></p>
    <hr>
  </div>

  <div id="id10" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:1000px; max-height:1000px">
      <div class="w3-container">
        <h3>Relatório</h3><p></p>
        <div class="w3-col s12">
          
        </div>
      </div>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button type="button" class="w3-button w3-green">Imprimir</button>
        <button onclick="document.getElementById('id10').style.display='none'" type="button" class="w3-button w3-red w3-right">X</button>
      </div>
    </div><br>
  </div>
</div>
@endsection