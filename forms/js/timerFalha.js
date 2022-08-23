(function(){
   $(document).ready(function() {
      var time = 0,
       span = $('#mensagem');
   
     var timer = setInterval(function(){
        
        time++  
          
        if(time <= 2) {
            span.text('Validando os dados de usuário');
        }    
        if(time > 2 && time < 5) {
            span.text('Não foi possivel validar o acesso!!!');
        }    
        if(time > 5 && time < 7) {
            document.getElementById("loadIMG").style.display = "none";
            document.getElementById("mensagem").style.display = "none";
            err_resposta.innerHTML = err_resposta.innerHTML + "<H2>Nome de usuário ou senha incorretos!<br>Dica: Verificque se não esqueceu algum caractere ou se a função CAPSLOOK esta ativada.</H2><br>";
            err_resposta.innerHTML = err_resposta.innerHTML + "<a href='javascript:window.location=\"../../index.php\";'><input type='button' value='Voltar a tela de login'></a>";
            clearInterval(timer);
        }

     }, 1000);
   }); 
 })()