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
    <h2>Relatórios</h2>
    <hr>
    <div class="w3-card-4">
          <header class="w3-container w3-bar w3-light-grey">
            <div class="w3-col s12">
              <h2 >Histórico</h2>
            </div> 
          </header>
          <div class="w3-container">
            <ul class="w3-ul">
              <li class="w3-bar">
                <div class="w3-bar-item">
                  <span class="w3-large">Relatório Gerado - 16/04/2018</span><br>
                  <span>por NomeDeQuemGerou</span><br>
                </div>
              </li>
              <li class="w3-bar">
                <div class="w3-bar-item">
                  <span class="w3-large">Relatório Gerado - 10/03/2018</span><br>
                  <span>por NomeDeQuemGerou</span><br>
                </div>
              </li>
              <li class="w3-bar">
                <div class="w3-bar-item">
                  <span class="w3-large">Relatório Gerado - 08/01/2018</span><br>
                  <span>por NomeDeQuemGerou</span><br>
                </div>
              </li>
            </ul><p>
          </div><p></p>
        </div></p>
      </div>
      <hr>
      <p><button onclick="javascript:location='{{url('/gerarRelatorio')}}'" class="w3-button w3-green w3-large w3-border">Gerar Novo Relatório</button></p><br><hr>
    </div>
</div>
@endsection