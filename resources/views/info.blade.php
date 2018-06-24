@extends('layouts.app')
@section('content')
<div class="w3-container w3-row-padding w3-white w3-animate-left">
	<hr>
    <div class="w3-card-4 w3-animate-zoom" style="max-width:900px">
      <div class="w3-container">
        <h3>Identificação do Conselheiro</h3><p></p>
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
                <button onclick="javascript:location='/conselheiro'" type="button" class="w3-button w3-red w3-right">X</button>
              </div> 
            </div>
          </div>
        </div>