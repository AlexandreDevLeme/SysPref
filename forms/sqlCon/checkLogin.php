<?php
if(isset($_SESSION['bdlogado']))
{
    $perfil = $_SESSION['bdlogado'];
    unset($_SESSION['nome']);
    unset($_SESSION['password']);
}else{
    echo "<script>alert('Nenhum usuário está logado. \u000AEntre com seu perfil para continuar.')</script>";
    echo "<script>window.location.replace(\"../index.php\")</script>";
}
?>