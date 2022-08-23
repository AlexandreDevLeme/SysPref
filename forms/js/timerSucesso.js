(function(){
   $(document).ready(function() {
      var time = 0,
       span = $('#mensagem');
   
     var timer = setInterval(function(){
        
        time++  
          
        if(time <= 2) {
            span.text('Validando os dados de usuário');
        }    
        if(time == 2 && time < 4) {
            span.text('Usuário autenticado com sucesso!!!');
        }    
        if(time == 4 && time < 6) {
            span.text('Bem Vindo(a)!!!');
        }    
        if (time == 6) {
            clearInterval(timer);
            window.location.href = "../cadgeral.php";
        }

     }, 1000);
   }); 
 })()