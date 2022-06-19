$(document).ready(function() {



  $(".cpf_cnpj").mask("999.999.999-99").attr('placeholder', '000.000.000-00');
  
  $('.toggle').click(function() {
    $("#transaction_id").toggleClass('cpf_cnpj phone');
    $("#transaction_id").val('');
    $(".cpf_cnpj").mask("99.999.999/9999-99").attr('placeholder', '00.000.000/0000-00');
    $(".phone").mask("(999) 999-9999").attr('placeholder', '(999)999-9999');
  })



  $("#transaction_id").on("blur", function() {
    var last = $(this).val().substr($(this).val().indexOf("-") + 1);

    if (last.length == 3) {
      var move = $(this).val().substr($(this).val().indexOf("-") - 1, 1);
      var lastfour = move + last;

      var first = $(this).val().substr(0, 9);

      $(this).val(first + '-' + lastfour);
    }
  });
});
.toggle {
  display: inline-block;
  background: grey;
  border-radius: 5px;
  border: 1px solid #000;
  padding: 5px;
}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<div>
  <form role="search" class="navbar-form navbar-left" id="form2" name="form2">
    <div class="form-group">
      <label for="input">Clique para alternar</label>
      <div class="input-group">
        <span class="toggle">Alternar</span>
        
        <input type="text" name="transaction_id" id="transaction_id" class="form-control cpf_cnpj fone" placeholder="CPF, CNPJ ou Telefone" autofocus>
        

      </div>
    </div>
  </form>
</div>