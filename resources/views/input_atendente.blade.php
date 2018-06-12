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
<body>


  <div class="w3-container w3-white w3-animate-top">
    <h2>Registro de Atendimento</h2>
    
    <hr> 
    <div class="w3-card-4 ">
      <div class="w3-container w3-green">
        <h2>Identificação</h2>
      </div>

      <form class="w3-container w3-row-padding w3-white" id="form" action="verify_atendente?cadastrado=1" method="POST">
        @csrf
        <p>
			<div  class="w3-col s12">
				<select class="w3-select" name="oriDenuncia">
				<option value="" disabled selected> Origem da Denuncia</option>
				<option value="local"> Local</option>
				<option value="tel"> Telefone</option>
				<option value="mp"> Ministério Público </option>
				<option value="je"> Justiça Estadual</option>
				</select></p></br>
			</div>
        <p>
          <div class="w3-col s8">
            <input class="w3-input" type="text" name="nome" id="nome" placeholder="Nome Completo"></p>
          </div>
        <p>
          <div class="w3-col s4">  
            <input class="w3-input" maxlength="10" type="date" placeholder="Data Nascimento" name="data_nascimento" name="data_nascimento"></p>
          </div>
        <p>
          <div class="w3-col s6">
            <input class="w3-input" type="text" placeholder="Genitor" name="genitor"></p>
          </div>
        <p>
          <div class="w3-col s2">
            <input class="w3-input"  name="contato_genitor" maxlength="13" type="text" placeholder="Contato"></p>
          </div>
        <p>
          <div class="w3-col s2">
            <input class="w3-input" maxlength="14" type="text" placeholder="RG" name="rg_genitor" ></p>
          </div>
         <p>
          <div class="w3-col s2">
            <input class="w3-input" maxlength="14" type="text" placeholder="CPF" name="cpf_genitor" ></p>
          </div>
        <p>
          <div class="w3-col s6">
            <input class="w3-input" type="text" placeholder="Genitora" name="genitora"></p>
          </div>
        <p>
          <div class="w3-col s2">
            <input class="w3-input" name="contato_genitora" maxlength="13" type="text" placeholder="Contato"></p>
          </div>
        <p>
          <div class="w3-col s2">
            <input class="w3-input" maxlength="14" type="text" placeholder="RG" name="rg_genitora"></p>
          </div>
        <p>
          <div class="w3-col s2">
            <input class="w3-input" maxlength="14" type="text" placeholder="CPF" name="cpf_genitora" ></p>
          </div>
        <p>
          <div class="w3-col s6">
            <input class="w3-input" type="text" placeholder="Responsável" name="responsavel"></p>
          </div>
        <p>
          <div class="w3-col s2">
            <input class="w3-input" name="contato_responsavel" maxlength="13" type="text" placeholder="Contato"></p>
          </div>
        <p>
          <div class="w3-col s2">
            <input class="w3-input" maxlength="14" type="text" placeholder="RG" name="rg_responsavel"></p>
          </div>
        <p>
          <div class="w3-col s2">
            <input class="w3-input" maxlength="14" type="text" placeholder="CPF" name="cpf_responsavel" ></p>
          </div>
         <p>
          <div class="w3-col s6">
            <input class="w3-input" type="text" placeholder="Denunciante" name="denunciante"></p>
          </div>
        <p>
          <div class="w3-col s2">
            <input class="w3-input" name="contato_denunciante" maxlength="13" type="text" placeholder="Contato"></p>
          </div>
        <p>
          <div class="w3-col s2">
            <input class="w3-input" maxlength="14" type="text" placeholder="RG" name="rg_denunciante"></p>
          </div>
        <p>
          <div class="w3-col s2">
            <input class="w3-input" maxlength="14" type="text" placeholder="CPF" name="cpf_denunciante"></p>
          </div>
        <p>
          <div class="w3-col s12">
            <input class="w3-input" name="LocalOcorrencia" type="text" placeholder="Local do Caso"></p>
          </div>
        <p>
          <div class="w3-col s12">
            <input class="w3-input" name="endereco" type="text" placeholder="Endereço"></p>
          </div>
        <p>
          <div class="w3-col s12">
            <input class="w3-input" type="text" placeholder="Complemento" name="complemento"></p>
          </div>
    </div>
    <hr>
    <div class="w3-card-4 ">
      <div class="w3-container w3-green">
        <h2>Triagem</h2>
      </div>
      <p>
      <div class="w3-container">
        <div class="w3-col s12">
            <select class="w3-select" name="Conse_envio">
            <option value="" disabled selected> Conselheiros Disponiveis</option>
            <option value="1"> Conselheiro 1</option>
            <option value="2"> Conselheiro 2</option>
            <option value="3"> Conselheiro 3</option>
            <option value="4"> Conselheiro 4</option>
            </select></p></br></p>
        </div>
      </div>
    </p>
  </div>
	<hr>
	</form>
        <input class="w3-button w3-green" type="submit" onclick="document.getElementById('form').submit()" value="Enviar" ></p>
    <hr>
  </div>
</body>
@endsection