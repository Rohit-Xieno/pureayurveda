// console.log("Hi Sandeep Shrama");

// $(function() {
//   // Owl Carousel
//   let owl = $("#latestProducts");
//   owl.owlCarousel({
//     autoplay: true,
//     smartSpeed: 1500,
//     items: 1,
//     margin: 0,
//     loop: true,
    
  
//   });
// });

// blog page shop product owl carousel js
$('#owl-shop').owlCarousel({
    loop:true,
    items:1,
    nav:false,
    dots: true,
    margin:40,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
            
        },
        600:{
            items:2,
            
        },
        1000:{
            items:2,
        }
    }
  });


$('#latestProducts').owlCarousel({
  loop:true,
  margin:10,
  nav:true,
  items:1
});

// testimonial carousel
jQuery('#testimonial-carousel').owlCarousel({
  loop:true,
  margin:40,
  responsiveClass:true,
  responsive:{
      0:{
          items:1,
          nav:true
      },
      600:{
          items:2,
          nav:false
      },
      1000:{
          items:2,
          nav:true,
      }
  }
});


// product slider
jQuery('#owl-product').owlCarousel({
  loop:true,
  items:1,
  nav:true,
  margin:2,
  responsiveClass:true,
  responsive:{
      0:{
          items:1,
          
      },
      600:{
          items:1,
          
      },
      1000:{
          items:1,
      }
  }
});



// banner section carousel
jQuery('#owl-demo').owlCarousel({
  loop:true,
  items:1,
  nav:false,
  dots: true,
  margin:0,
  responsiveClass:true,
  responsive:{
      0:{
          items:1,
          
      },
      600:{
          items:1,
          
      },
      1000:{
          items:1,
      }
  }
});




// header mini cart
const miniProductIcon = document.getElementById('miniCartIcon');
const miniCart = document.getElementById('miniCartBox');
const bodyMiniCart = document.querySelector('body');
const miniCartOverlay = document.getElementById('miniOverlay');

// open mini-cart
const showMiniCart = () => {
    miniCart.classList.add('mini-active');
    miniCartOverlay.classList.add('mini-cart-active');
}
miniProductIcon.addEventListener('click', showMiniCart);

// close mini-cart
const miniCartClose = document.querySelector('.minicart-close');
const hideMiniCart = () => {
    miniCart.classList.remove('mini-active');
    miniCartOverlay.classList.remove('mini-cart-active');
}
miniCartClose.addEventListener('click', hideMiniCart);

// mini cart hide when click on body
const hideMiniCartBody = () => {
    miniCart.classList.remove('mini-active');
    miniCartOverlay.classList.remove('mini-cart-active');
}
miniCartOverlay.addEventListener('click', hideMiniCartBody);


// grid and column view on shop page
const columnTwo = document.getElementById('columnT');
const columnFour = document.getElementById('columnF');
const shopProducts = document.querySelector('.products');


forms.addEventListener('onkeydown', validation);


