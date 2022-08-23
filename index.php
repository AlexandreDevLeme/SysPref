<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>SysPref - Núcleo de Cadastro Imobiliario</title>

    <!--Estilos BootStrap Offline-->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <link rel='stylesheet' type='text/css' href='./forms/css/sysprefindex.css'>
</head>
<body>
<?php

  require "./forms/sqlCon/checkCon.php";

    $abrir = "";
    $ativar = "";
    if(isset($_SESSION['Saida_err'])){
      $abrir = "readonly placeholder='Servidor OffLine'";
      $ativar = "disabled";
    }    
echo"
<section class='vh-100 container-fluid' style='background-color: #9A616D;'>
    <div class='position-absolute'>
      <a href='./forms/ajuda/limpaTemp.php' class='btn btn-primary' onclick=\"return confirm('Certifique-se de que ninguém esta utilizando o sistema. \u000ATrabalhos em andamento serão perdidos. \u000ADeseja continuar?')\">
        <img
          src='./forms/img/clear.png' class='rounded mx-auto d-block limpeza' width='50px' heigth='75px' alt='logo' style='border-radius: 1rem 0 0 1rem;'
        />
        <span data-tooltip='Limpar dados temporarios do sistema'></span>
      </a>
    </div>
    <div class='row d-flex justify-content-center align-items-center h-100'> 
        <div class='card' style='border-radius: 1rem;'>
                <div id='d-flex' class='d-flex align-items-center mb-3 pb-1'>
                   <span id='titulo' class='h3 fw-bold mb-0'>Secretaria de Finanças - Núcleo de Cadastro Imobiliário</span>
                </div>
          <div class='row g-0'>
            <div id='clonuna-A' class='col-md-6 col-lg-5 d-none d-md-block'>
              <img
                src='./forms/img/PADRAO_BRASAO.png' class='rounded mx-auto d-block brasao' width='250px' heigth='275px' alt='logo' style='border-radius: 1rem 0 0 1rem;'
              />
              <span id='local-use' class='h5 fw-bold mb-0'>Prefeitura do Município de Leme</span>
            </div>
            <div class='col-md-6 col-lg-7 d-flex align-items-center'>
              <div class='card-body p-4 p-lg-5 text-black'>
                <form method='post' action='forms/act/actLogin.php'>

                  <h5 class='fw-normal mb-3 pb-3' style='letter-spacing: 1px;'>Entre com seu perfil</h5>

                  <div class='form-outline mb-4'>
                    <input type='text' id='form2Example17' name='user' class='form-control form-control-lg' $abrir />
                    <label class='form-label' for='form2Example17'>Nome de usuário</label>
                  </div>

                  <div class='form-outline mb-4'>
                    <input type='password' id='form2Example27' name='pass' class='form-control form-control-lg' $abrir />
                    <label class='form-label' for='form2Example27'>Senha</label>
                  </div>

                  <div class='pt-1 mb-4'>
                    <button class='btn btn-dark btn-lg btn-block' type='submit' $ativar>Entrar</button>
                  </div>

                  <a class='small text-muted' href='#!' $ativar>Esqueci minh senha?</a>
                  <p class='mb-5 pb-lg-2' style='color: #393f81;'>Não é cadastrado? <a href='' style='color: #393f81;' onclick='window.open(\"./forms/act/cad_usuarios.php\", 500, 800,);' $ativar>Cadastre-se aqui</a></p>
                </form>";                
echo"          </div>
            </div>
            <div id='createStatus' class='row'>";
                if(isset($_SESSION['Saida_ok'])){
                  echo"
                  <label class='st-server'>Status do Servidor: <label id='statusBD' style='background-color: green;'>OnLine</label></label>
                  ";
                }elseif(isset($_SESSION['Saida_err'])){
                  $msg = $_SESSION['sv_err'];
                  echo"
                  <label class='st-server'>Status do Servidor: <label id='statusBD' style='background-color: red;'>OffLine</label></label>
                  ";
                  $abrir = "readonly placeholder='Servidor OffLine'";
                  $ativar = "disabled";
                }
echo "        </div>
          </div>
        </div>
    </div>
</section>
";
?>
</body>
</html>
<?php
  session_destroy();
?>
