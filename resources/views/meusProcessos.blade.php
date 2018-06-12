@extends('layouts.app')
@section('content')
<div class="w3-container w3-row-padding w3-white w3-animate-left">
  <h2>Meus Processos</h2>
  <p></p>
  <hr>
  <div class="w3-col s12">
    <table class="w3-card-4 w3-table-all w3-margin-top" id="myTable">
      <tr class="w3-black">
        <th style="width:40%;">Nome</th>
        <th style="width:30%;">Status</th>
        <th style="width:30%;">Opções</th>
      </tr>
      @foreach ($info as $data)
      <tr>
        <td>{{$data->nome}}</td>
        <td>Providência </td>
        <td><a href="np/{{$data->id}}"x class="w3-button" title="Atualizar Status Processo" style="width:40%;"><i class="fa fa-check-square-o" ></i> Editar</a></td>
      </tr>
      @endforeach
    </table>
    <hr>
  </div>
</div>
<script>

</script>
@endsection
