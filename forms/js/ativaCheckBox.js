$('input[type="checkbox"]').on("click", DoSomething);
/*MARCA UM E DESMARCA OUTRO, MAS NÃO PERMITE DESMARCAR AMBOS*/
function marcaDesmarca(caller) {
  var checks = document.querySelectorAll('input[type="checkbox"]');   
  for(let i = 0; i < checks.length; i++) {
    checks[i].checked = checks[i] == caller;
  }

  if (checks[0].checked){
    document.getElementById('text').value = 'num_doc';
  }else if (checks[1].checked){
    document.getElementById('text').value = 'data_lanc';
  }else if (checks[2].checked){
    document.getElementById('text').value = 'documento';
  }else if (checks[3].checked){
    document.getElementById('text').value = 'nome';
  }else if (checks[4].checked){
    document.getElementById('text').value = 'cpf';
  }else if (checks[5].checked){
    document.getElementById('text').value = 'n_cad';
  }
  
  document.getElementById('capture').submit();
}