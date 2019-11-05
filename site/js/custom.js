/* JS */

/* Flex image slider */

function minCart(id){
    $.post( SITE+'cart/min', { itemId:id }, function( data ) {
        var obj = jQuery.parseJSON( data );
        console.log(obj);
        if(obj.item.quantity == undefined){
            $('table #cartItem'+obj.item.itemId).remove();
        }else{
            $('table #cartItem'+obj.item.itemId+' .cartQty').html(obj.item.quantity);
            $('table #cartItem'+obj.item.itemId+' .cartTpr').html(obj.item.totalprice);
            $('table #cartItem'+obj.item.itemId+' .cartTwg').html(obj.item.totalweight);
        }
                    
        $('table #Qty').html(obj.total.quantity);
        $('table #Tpr').html(obj.total.price);
        $('table #Twg').html(obj.total.weight);
            
        getCartTop();
    });
}

function addCart(id){
    
    if($('#quantity').val() == undefined || $('#quantity').val() == '')
    quantity = 1;
    else
    quantity = $('#quantity').val();
    
    $.post( SITE+"cart/add", { itemId: id, quantity: quantity })
    .done(function( data ) {        
        getCartTop();
        getCartTable();
    });
    
    
    event.preventDefault();
}

function getCartTable(){
    $.post( SITE+"cart/get/table", {  })
    .done(function( data ) {
        $('#cartTable').html(data);
    });
}

function getCartTop(){
    $.post( SITE+"cart/get/quantity", {  })
    .done(function( data ) {
        $('#topCartQuantity').html(data);
    });
    $.post( SITE+"cart/get/price", {  })
    .done(function( data ) {
        $('#topCartPrice').html('$ '+data);
    });
}

$('.flex-image').flexslider({
  direction: "vertical",
  controlNav: false,
  directionNav: true,
  pauseOnHover: true,
  slideshowSpeed: 10000      
});


/* Flexslider for product images */


$('.product-image-slider').flexslider({
  direction: "vertical",
  controlNav: false,
  directionNav: true,
  pauseOnHover: true,
  slideshowSpeed: 10000      
});

/* Carousel */

$(document).ready(function() {
			
	 var recent = $("#owl-recent");
	 
	recent.owlCarousel({
		autoPlay: 3000, //Set AutoPlay to 3 seconds
		items : 4,
		mouseDrag : false,
		pagination : false
	});
	
	$(".next").click(function(){
			recent.trigger('owl.next');
	  })
	  
	  $(".prev").click(function(){
			recent.trigger('owl.prev');
	  })
});


/* Support */

$("#slist a").click(function(e){
   e.preventDefault();
   $(this).next('p').toggle(200);
});



/* Scroll to Top */

$(document).ready(function(){
  $(".totop").hide();

  $(function(){
    $(window).scroll(function(){
      if ($(this).scrollTop()>600)
      {
        $('.totop').fadeIn();
      } 
      else
      {
        $('.totop').fadeOut();
      }
    });

    $('.totop a').click(function (e) {
      e.preventDefault();
      $('body,html').animate({scrollTop: 0}, 500);
    });

  });
});
