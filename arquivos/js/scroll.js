//identificar o click 
$('.navbar a[href^="#"]').on('click', function(e){
    //Evita a função padrao da ancora interna
    e.preventDefault();
    //pegar o item que o usuario clicou (attr -> pega o atributo)
    var id = $(this).attr('href'),
    // pega a distancia entre o elemento e o topo (targetOffset). offset(função do JQuery) -> retorna o top e o left do elemento
    targetOffset = $(id).offset().top;
    
    //pega o tamnho do menu (innerHeight() -> é uma função do JQuery)
    menuHight  = $('.navbar').innerHeight();

    // animação (animate -> funçao do JQuery)
    $('html, body').animate({
        //anima o scroll do top e dimninui do tamanho do menu
        scrollTop: targetOffset - menuHight

        //500 é o tempo de transiçção em milisegundos
    }, 500);
});



