
<!DOCTYPE html>
<html lang="pt-br">
<title>Sistema Tutelar</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

input:optional {
  border-bottom: 1px solid Lightgrey;
}

input:invalid {
  background: url("img/excl.jpg") no-repeat 99% 10%;
  background-size: 13px;
}

input:required:valid {
  border-bottom: 1px solid Lightgrey;
}
select:invalid {
  background: url("img/excl.jpg") no-repeat 97% 10%;
  background-size: 13px;
}
select:required:valid {
  border-bottom: 1px solid Lightgrey;
}
select:optional {
  border-bottom: 1px solid Lightgrey;
}

</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-blue w3-large" style="z-index:4">
  <a class="w3-bar-item w3-button w3-right w3-hover-none w3-hover-text-light-grey" href="{{url('/logout')}}"><i class="fa fa-times"></i>&nbsp; Sair</a>
  <span class="w3-bar-item w3-left">SISTU</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white " style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row w3-cell">
    <div class="w3-col s4">
      <img src="{!! asset('img/avatar2.png') !!}" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar w3-cell-middle">
      <span>Bem Vindo, <strong><?php
        $perfil_id = Auth::user()->perfil_id;

      if($perfil_id == 3){
        echo 'Admnistrador';
      }if($perfil_id == 2){
        echo 'Conselheiro';
      }if($perfil_id == 1){
        echo 'Atendente';
      } ?></strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Menu</h5>
  </div>
  <div class="w3-bar-block">
    <?php
     $perfil_id = Auth::user()->perfil_id;
      if($perfil_id == 2){ ?> 
        <a href="{{url('/estatistica')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home"></i>&nbsp; Página Inicial</a>
        <a href="{{url('/input')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-address-card"></i>&nbsp; Cadastro</a>
        <a href="{{url('/listagem')}}" class="w3-bar-item w3-button w3-padding" ><i class="fa fa-search fa-fw"></i>&nbsp; Busca</a>
        <a href="{{url('/conselheiro')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>&nbsp; Conselheiros</a>
        <a href="{{url('/novos')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bars fa-fw"></i>&nbsp; Novos Processos</a>
        <a href="{{url('/meusProcessos')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw"></i>&nbsp; Meus Processos</a>
        <a href="{{url('/gerarRelatorio')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-file fa-fw"></i>&nbsp; Relatório</a>
      <?php } ?>

    <?php
      $perfil_id = Auth::user()->perfil_id;
      if($perfil_id == 1){ ?> 
        <a href="{{url('/estatistica_atendente')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home"></i>&nbsp; Página Inicial</a>
        <a href="{{url('/input_atendente')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-address-card"></i>&nbsp; Cadastro</a>
        <a href="{{url('/listagem_atendente')}}" class="w3-bar-item w3-button w3-padding" ><i class="fa fa-search fa-fw"></i>&nbsp; Busca</a>
        <a href="{{url('/triagem')}}" class="w3-bar-item w3-button w3-padding" ><i class="fa fa-undo"></i>&nbsp; Nova Triagem</a>
      <?php } ?>

      <?php
      $perfil_id = Auth::user()->perfil_id;
      if($perfil_id == 3){ ?> 
        <a href="{{url('/conselheiros')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home"></i>&nbsp; Página Inicial</a>
        <a href="{{url('/input_adm')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-address-card"></i>&nbsp; Cadastro</a>
      <?php } ?>
      
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close(mySidebar)" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-white" style="margin-left:300px;margin-top:43px;">

  @yield('content')

</div> 

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  }else{
    mySidebar.style.display = 'block';
  }
     
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}

function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show w3-animation-left";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
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

</body>
</html>