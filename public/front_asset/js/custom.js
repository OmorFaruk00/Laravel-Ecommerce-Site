/** 
  * Template Name: Daily Shop
  * Version: 1.0  
  * Template Scripts
  * Author: MarkUps
  * Author URI: http://www.markups.io/

  Custom JS
  

  1. CARTBOX
  2. TOOLTIP
  3. PRODUCT VIEW SLIDER 
  4. POPULAR PRODUCT SLIDER (SLICK SLIDER) 
  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  6. LATEST PRODUCT SLIDER (SLICK SLIDER) 
  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  9. PRICE SLIDER  (noUiSlider SLIDER)
  10. SCROLL TOP BUTTON
  11. PRELOADER
  12. GRID AND LIST LAYOUT CHANGER 
  13. RELATED ITEM SLIDER (SLICK SLIDER)

  
  **/

  jQuery(function($){


    /* ----------------------------------------------------------- */
  /*  1. CARTBOX 
  /* ----------------------------------------------------------- */

  jQuery(".aa-cartbox").hover(function(){
    jQuery(this).find(".aa-cartbox-summary").fadeIn(500);
  }
  ,function(){
    jQuery(this).find(".aa-cartbox-summary").fadeOut(500);
  }
  );   
  
  /* ----------------------------------------------------------- */
  /*  2. TOOLTIP
  /* ----------------------------------------------------------- */    
  jQuery('[data-toggle="tooltip"]').tooltip();
  jQuery('[data-toggle2="tooltip"]').tooltip();

  /* ----------------------------------------------------------- */
  /*  3. PRODUCT VIEW SLIDER 
  /* ----------------------------------------------------------- */    

  jQuery('#demo-1 .simpleLens-thumbnails-container img').simpleGallery({
    loading_image: 'demo/images/loading.gif'
  });

  jQuery('#demo-1 .simpleLens-big-image').simpleLens({
    loading_image: 'demo/images/loading.gif'
  });

  /* ----------------------------------------------------------- */
  /*  4. POPULAR PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

  jQuery('.aa-popular-slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
        ]
      }); 

  
  /* ----------------------------------------------------------- */
  /*  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

  jQuery('.aa-featured-slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
          ]
        });

  /* ----------------------------------------------------------- */
  /*  6. LATEST PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      
  jQuery('.aa-latest-slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
          ]
        });

  /* ----------------------------------------------------------- */
  /*  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */     

  jQuery('.aa-testimonial-slider').slick({
    dots: true,
    infinite: true,
    arrows: false,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true
  });

  /* ----------------------------------------------------------- */
  /*  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */  

  jQuery('.aa-client-brand-slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
          ]
        });

  /* ----------------------------------------------------------- */
  /*  9. PRICE SLIDER  (noUiSlider SLIDER)
  /* ----------------------------------------------------------- */        

  jQuery(function(){
    if($('body').is('.productPage')){
     var skipSlider = document.getElementById('skipstep');
     noUiSlider.create(skipSlider, {
      range: {
        'min': 0,
        '10%': 10,
        '20%': 20,
        '30%': 30,
        '40%': 40,
        '50%': 50,
        '60%': 60,
        '70%': 70,
        '80%': 80,
        '90%': 90,
        'max': 100
      },
      snap: true,
      connect: true,
      start: [20, 70]
    });
        // for value print
        var skipValues = [
        document.getElementById('skip-value-lower'),
        document.getElementById('skip-value-upper')
        ];

        skipSlider.noUiSlider.on('update', function( values, handle ) {
          skipValues[handle].innerHTML = values[handle];
        });
      }
    });



  /* ----------------------------------------------------------- */
  /*  10. SCROLL TOP BUTTON
  /* ----------------------------------------------------------- */

  //Check to see if the window is top if not then display button

  jQuery(window).scroll(function(){
    if ($(this).scrollTop() > 300) {
      $('.scrollToTop').fadeIn();
    } else {
      $('.scrollToTop').fadeOut();
    }
  });

    //Click event to scroll to top

    jQuery('.scrollToTop').click(function(){
      $('html, body').animate({scrollTop : 0},800);
      return false;
    });

    /* ----------------------------------------------------------- */
  /*  11. PRELOADER
  /* ----------------------------------------------------------- */

    jQuery(window).load(function() { // makes sure the whole site is loaded      
      jQuery('#wpf-loader-two').delay(200).fadeOut('slow'); // will fade out      
    })

    /* ----------------------------------------------------------- */
  /*  12. GRID AND LIST LAYOUT CHANGER 
  /* ----------------------------------------------------------- */

  jQuery("#list-catg").click(function(e){
    e.preventDefault(e);
    jQuery(".aa-product-catg").addClass("list");
  });
  jQuery("#grid-catg").click(function(e){
    e.preventDefault(e);
    jQuery(".aa-product-catg").removeClass("list");
  });


  /* ----------------------------------------------------------- */
  /*  13. RELATED ITEM SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

  jQuery('.aa-related-item-slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
        ]
      }); 


});
// Start add to cart
function showcolor(size){
  $("#size_id").val(size);
  $(".product_color").hide();
  $(".size_"+size).show();
  $(".size_link").css('border','1px solid #ddd');
  $("#size_"+size).css('border','1px solid black');
}
function color_change(color){
  $("#color_id").val(color);
}
function add_to_cart(id,size,color){ 
 var size = $("#size_id").val();
 var color = $("#color_id").val();
 if(size =='' && color ==''){
  size ="no";
  color="no";
}
if(size == '' && size!= 'no'){  
  $('#cart_msg').html('please select size');
}
else if(color == '' && color != 'no'){
 $('#cart_msg').html('please select color');
}
else{
  $("#product_id").val(id);
  $("#pqty").val($("#qty").val()); 
  $.ajax({
    url:'/add_to_cart',
    type:'post',
    data:$("#cart_form").serialize(),
    success:function(data){
      var total_price = 0; 
      swal({title: 'Cart '+data.msg, text: 'Done...', icon: 'success', timer: 2000, buttons: false, });
    // alert('product '+data.msg);
    if(data.total_cart == 0){
      $(".aa-cart-notify").html(0);
      $(".aa-cartbox-summary").remove();
    }else{
      $(".aa-cart-notify").html(data.total_cart);
      var html='';
      html+='<ul>';
      $.each(data.result, function(key,val){
       total_price = parseInt(total_price)+(parseInt(val.qty) * parseInt(val.price));
       html +='<li><a class="aa-cartbox-img" href="#"><img src="'+PRODUCT_IMAGE+'/'+val.image+'" alt="img"></a><div class="aa-cartbox-info"><h4><a href="#">'+val.title+'</a></h4><p>'+val.qty+' x TK '+val.price+'</p></div><a class="aa-remove-product" href="javascript:void(0)"></span></a></li>';
     });     

    }
    html+='<li><span class="aa-cartbox-total-title">Total</span><span class="aa-cartbox-total-price">'+total_price+'</span></li>';
    html+='<a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">Checkout</a>'
    html+='</ul>';  
    $(".aa-cartbox-summary").html(html);


  }
});
}
}
function home_add_to_cart(id,size,color){
  $('#size_id').val(size);
  $('#color_id').val(color);
  add_to_cart(id,size,color);
}
function qty_update(pid,attr_id,color,size,price){
 $("#size_id").val(size);
 $("#color_id").val(color);
 var qty = $("#qty_"+attr_id).val();
 $("#qty").val(qty);
 add_to_cart(pid,color,size);
 $("#total_price_"+pid).html('TK'+qty*price);
}
function cart_item_remove(pid,attr_id,color,size){ 
 $("#size_id").val(size);
 $("#color_id").val(color); 
 $("#qty").val(0);
 $("#cart_box_"+attr_id).remove();
 add_to_cart(pid,color,size); 
 
}
// End add to cart
// product Search 
function product_dsearch(){
 var searchstr = $("#search_str").val();
 if(searchstr !=''){
  window.location.href = '/search/'+searchstr;
}
}
// product Search 
// user Register
$("#register_sign_up").submit(function(e){
  e.preventDefault();
  $('.field_error').html('');
  $('reg_msg').html('');
  $.ajax({
    url:'user_registration',
    type:'post',
    data:$("#register_sign_up").serialize(),
    success:function(data){
      if(data.status == "error"){
        $.each(data.error, function(key,val){
          $('#'+key+'_error').html(val);
        });
      }
      if(data.status == "success"){
        $("#register_sign_up")[0].reset();
        $('#reg_msg').html(data.msg);
      }
    }
  });
});
// user Register
$("#from_login").submit(function(e){
  e.preventDefault(); 
  $("#login_msg").html(""); 
  $.ajax({
    url:'user_login',
    type:'post',
    data:$("#from_login").serialize(),
    success:function(data){
      if(data.status == "error"){
        $("#login_msg").html(data.msg);

      }
      if(data.status == "success"){
        window.location.href = '/';
        $("#login_msg").html(data.msg);

      }
    }
  });
});