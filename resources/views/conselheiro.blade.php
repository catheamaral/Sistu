@extends('layouts.app')
@section('content')
<div class="w3-container w3-row-padding w3-white w3-animate-left">
  <h2>Conselheiros Tutelares de Rio Branco</h2>
  <p></p>
  <p><div class="w3-col s10">
    <input class="w3-input w3-border w3-padding" type="text" placeholder="Procure por nomes.." id="myInput" onkeyup="myFunction()"></p>
  </div>
  <div class="w3-col s12 w3-row-padding">
    <table class="w3-card-4 w3-table-all w3-margin-top" id="myTable">
      <tr class="w3-green">
        <th style="width:50%;">Nome</th>
        <th style="width:20%;">Area de Atuação</th>
        <th style="width:40%;">Opções</th>
      </tr>
      <tr>
        <td>Alfreds Futterkiste</td>
        <td>2º Conselho</td>
        <td>
          <div class="w3-col w3-half" >
            <button class="w3-button" onclick="document.getElementById('id01').style.display='block'" title="Identidade" ><i class="fa fa-info"></i> Identificação</button>
          </div>
          <div class="w3-col w3-half"> 
              <button class="w3-button" title="Ver Processo em Aberto" onclick="javascript:location='{{url('/third')}}'" ><i class="fa fa-folder-open"></i> Processos</button>
          </div> 
        </td>
      </tr>

    </table>
    <hr>
  </div>
  <div id="id01" class="w3-modal">
          <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
            <div class="w3-container">
              <h3>Identificação do Conselheiro</h3><p></p>
              <div class="w3-col s12">
                <ul class="w3-ul">
                    <div class="w3-container"><p></p>
                      <div class="w3-col s12">
                        <label >Nome: 
                          <li class="w3-hover-white"> NOME </li>
                        </label><p></p>
                      </div>
                      <div class="w3-col s8">
                        <label >Conselho Tutelar: 
                          <li class="w3-hover-white"> 2º Conselho Tutelar </li>
                        </label><p></p>
                      </div>
                      <div class="w3-col s4">
                        <label> Idade:
                          <li class="w3-hover">IDADE</li>
                        </label><p></p>
                      </div>
                      </div> 
                </ul>
              </div> 
            </div>
            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
              <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red w3-right">X</button>
            </div>
          </div>
        </div>
</div>

<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
@endsection