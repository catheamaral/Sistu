@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">





<header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-clipboard-list"></i> Estatísticas</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom w3-animate-left">
    <div class="w3-quarter">
      <div class="w3-container w3-green w3-padding-16">
        <div class="w3-left"><i class="fa fa-comments w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>52</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Atendimentos</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-book w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>99</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Casos em Aberto</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-file w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>4</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Relatórios Gerados</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>106</h3>
        </div>
        <div class="w3-clear"></div>
        <h4> Total de Casos </h4>
      </div>
    </div>
  </div>

<div class="w3-container w3-row-padding w3-white w3-animate-left">
  <h2>Processos em Espera</h2>
  <p></p>
  <hr>
  <div class="w3-col s12">
    <table class="w3-card-4 w3-table-all w3-margin-top" id="myTable">
      <tr class="w3-black">
        <th style="width:40%;">Nome</th>
        <th style="width:30%;">Status</th>
        <th style="width:30%;">Opções</th>
      </tr>
      <tr>
        <td>Alfreds Futterkiste</td>
        <td>Esperando Aceitação</td>
        <td><button onclick="document.getElementById('id01').style.display='block'" class="w3-button" title="Ver Processo" style="width:100%;"><i class="fa fa-eye"></i> Visualizar</button>
      </tr>
    </table>
    <hr>
  </div>
  <div id="id01" class="w3-modal">
          <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
            <div class="w3-container">
              <h3>Detalhes do Processo</h3><p></p>
              <div class="w3-col s12">
                <ul class="w3-ul">
                    <div class="w3-container"><p></p>
                      <div class="w3-col s12">
                        <label >Nome: 
                          <li class="w3-hover-white"> NOME </li>
                        </label><p></p>
                      <div class="w3-col s12">
                        <label >Data de Nascimento: 
                          <li class="w3-hover-white"> DATA </li>
                        </label><p></p>
                      <div class="w3-col s12">
                        <label >Nome da Mãe: 
                          <li class="w3-hover-white">NOME DA MÃE </li>
                        </label><p></p>
                      </div>
                      </div>
                      <div class="w3-col s8">
                        <label >Responsável: 
                          <li class="w3-hover-white">NOME DO RESPONSÁVEL </li>
                        </label><p></p>
                      </div>
                      <div class="w3-col s4">
                        <label> Documento:
                          <li class="w3-hover">CPF RESPONSAVEL</li>
                        </label><p></p>
                      </div>
                      </div> 
                </ul>
              </div> 
            </div>
            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
              <div class="w3-bar">
                <button onclick="javascript:location='{{url('/meusProcessos')}}'" type="button" class="w3-button w3-green w3-left">Aceitar</button>
                <button onclick="document.getElementById('id02').style.display='block'" type="button" class="w3-button w3-red">Não Aceitar</button>
                <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red w3-right">X</button>
              </div> 
            </div>
          </div>
        </div>
        <div id="id02" class="w3-modal">
          <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:800px">
            <div class="w3-container">
              <h3>Recusa do Processo</h3><p></p>
              <div class="w3-col s12">
                <textarea placeholder="Quais..." name="pro2"></textarea></p>
              </div> 
            </div>
            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
              <button onclick="javascript:location='home.php?pg=processo_recusa'" type="button" class="w3-button w3-green"> Salvar</button>
              <button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-red w3-right"> X</button>
            </div>
          </div>
        </div>
</div>
<script>

</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkUOdZ5y7hMm0yrcCQoCvLwzdM6M8s5qk&callback=initMap">
</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    </div>
  </div>
</div>
@endsection