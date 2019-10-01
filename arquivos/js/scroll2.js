
(function(){
	var $target = $('.anime'),offset = $(window).height() * 2/5;
	function animeScroll(){
	    var documentTop = $(document).scrollTop();
	    //pegar cada um dos item, um por um (each())
	    $target.each(function(){
	    	var itemTop = $(this).offset().top;
	    	if (documentTop > (itemTop - offset)) {
	    		$(this).addClass('anime-start');
	    	}else{
	    		$(this).removeClass('anime-start');
	    	}
	    })
	}
	animeScroll();
	 $(document).scroll(debounce(function(){
 	 	animeScroll();
	 }, 150));
})();