$('.btnabre').click(function(){
$('.menuOculto').toggleClass('exibir');
});
$('.btnfecha').click(function(){
    $('.menuOculto').toggleClass('exibir');
    });
const $menuOculto = $('.menuOculto');
$(document).mouseup(e =>{
    if(!$menuOculto.is(e.target)
    && $menuOculto.has(e.target).length === 0)
    {
        $menuOculto.removeClass('exibir');
    }
});