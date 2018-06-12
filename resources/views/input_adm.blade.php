@extends('layouts.app')
@section('content')
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

<body>


  <div class="w3-container w3-white w3-animate-top">
    <h2>Cadastro de Conselheiro</h2>
    
    <hr> 
    <div class="w3-card-4 ">
      <div class="w3-container w3-grey">
        <h2>Identificação</h2>
      </div>

      <form class="w3-container w3-row-padding w3-white" id="form" action="verify_adm" method="post">
        <p>
            <div class="w3-col s12">
              <select class="w3-select" name="perfil">
                <option value="" disabled selected> Qual o Perfil? </option>
                <option value="1"> Atendente</option>
                <option value="2"> Conselheiro </option>
              </select></p></br>
            </div>
        <p>
          <div class="w3-col s10">
            <input class="w3-input" type="text" name="nome" id="nome" placeholder="Nome Completo"></p>
          </div>
        <p>
          <div class="w3-col s2">  
            <input class="w3-input" maxlength="10" type="text" placeholder="Data" name="data_nascimento" onkeypress="formatar('##/##/####', this)" name="dtn"></p>
          </div>
        <p>
          <div class="w3-col s6">
            <input class="w3-input" name="rgConselheiro" type="text" placeholder="RG"></p>
          </div>
        <p>
          <div class="w3-col s6">
            <input class="w3-input" name="cpfConselheiro" type="text" placeholder="CPF"></p>
          </div>
        <p>
          <div class="w3-col s12">
            <input class="w3-input" name="enderecoConselheiro" type="text" placeholder="Endereço"></p>
          </div>
        <p>
          <div class="w3-col s12">
            <input class="w3-input" type="text" placeholder="Complemento" name="Complemento"></p>
          </div>
    </div>
    <hr>
    <div class="w3-card-2">

      <div class="w3-container w3-grey">
        <h2>Área de Atuação</h2>
      </div>
    
        <div class="w3-panel">
          <p>
            <div class="w3-col s12">
              <select class="w3-select" name="ori_Denuncia">
                <option value="" disabled selected> Qual Conselho irá atuar?</option>
                <option value="1"> 1º Conselho Tutelar</option>
                <option value="2"> 2º Conselho Tutelar</option>
                <option value="3"> 3º Conselho Tutelar</option>
              </select></p></br>
            </div>
        </div>
    </div>
  </form>
  <hr>
  <input class="w3-button w3-green" type="submit" onclick="document.getElementById('form').submit()" value="Enviar" ></p>
</div>
@endsection