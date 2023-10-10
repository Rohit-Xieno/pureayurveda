// blog page shop product owl carousel js
$('#owl-shop').owlCarousel({
  loop: true,
  items: 3,
  nav: true,
  dots: false,
  margin: 40,
  autoplay:true,
  autoplayTimeout:3500,
  autoplaySpeed: 1500,
  autoplayHoverPause:true,
  responsiveClass: true,
  responsive: {
    0: {
      items: 2
    },
    600: {
      items: 3
    },
    1000: {
      items: 3
    }
  }
});

$('#latestProducts').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  items: 1,
  autoplay:true,
  autoplayTimeout:3500,
  autoplayHoverPause:true,
  autoplaySpeed: 1500,
});

// testimonial carousel
jQuery('#testimonial-carousel').owlCarousel({
  loop: true,
  margin: 40,
  autoplay:true,
  autoplayTimeout:3500,
  autoplaySpeed: 1500,
  autoplayHoverPause:true,
  responsiveClass: true,
  responsive: {
    0: {
      items: 1,
      nav: true
    },
    600: {
      items: 1,
      nav: false
    },
    1000: {
      items: 2,
      nav: true
    }
  }
});

// product slider
jQuery('#owl-product').owlCarousel({
  loop: true,
  items: 1,
  nav: true,
  margin: 2,
  autoplay:true,
  autoplayTimeout:3500,
  autoplaySpeed: 1500,
  autoplayHoverPause:true,
  responsiveClass: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 1
    },
    1000: {
      items: 1
    }
  }
});

// banner section carousel
jQuery('#owl-home-banner').owlCarousel({
  loop: true,
  items: 1,
  nav: false,
  dots: true,
  margin: 0,
  autoplay:true,
  autoplayTimeout:3500,
  autoplaySpeed: 1500,
  autoplayHoverPause:true,
  responsiveClass: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 1
    },
    1000: {
      items: 1
    }
  }
});

// header mini cart
var miniProductIcon = document.getElementById('miniCartIcon');
var miniCart = document.getElementById('miniCartBox');
var bodyMiniCart = document.querySelector('body');
var miniCartOverlay = document.getElementById('miniOverlay');

// open mini-cart
var showMiniCart = function showMiniCart() {
  miniCart.classList.add('mini-active');
  miniCartOverlay.classList.add('mini-cart-active');
};
miniProductIcon.addEventListener('click', showMiniCart);

// close mini-cart
var miniCartClose = document.querySelector('.minicart-close');
var hideMiniCart = function hideMiniCart() {
  miniCart.classList.remove('mini-active');
  miniCartOverlay.classList.remove('mini-cart-active');
};
miniCartClose.addEventListener('click', hideMiniCart);

// mini cart hide when click on body
var hideMiniCartBody = function hideMiniCartBody() {
  miniCart.classList.remove('mini-active');
  miniCartOverlay.classList.remove('mini-cart-active');
};
miniCartOverlay.addEventListener('click', hideMiniCartBody);

// grid and column view on shop page
const columnTwo = document.getElementById('columnT');
const columnFour = document.getElementById('columnF');
const shopProducts = document.querySelector('.products');

if (columnTwo) {
  columnTwo.addEventListener('click', function(){
    shopProducts.style.gridTemplateColumns = '1fr 1fr';
    columnTwo.classList.add('view-button-active')
    columnFour.classList.remove('view-button-active')
  });  
}
if (columnFour) {
columnFour.addEventListener('click', function(){
  shopProducts.style.gridTemplateColumns = '1fr 1fr 1fr 1fr';
  columnFour.classList.add('view-button-active')
  columnTwo.classList.remove('view-button-active')
});
}

// if (is_shop()) {
//   document.querySelector('[value="menu_order"]').innerHTML = "Sort";
// }


function check() {
  var userEmail = document.querySelector('.wpcf7-email').value;
  // var usrPw = document.getElementById('userPw').value;

  let stored_users = JSON.parse(localStorage.getItem('users'))
  if(stored_users) {
      for (let u = 0; u < stored_users.length; u++){
          if (userEmail == stored_users[u].name) {
              alert('You are logged in ' + userEmail);
              return location.replace("./index.html");

           }
      }
  } else {
      localStorage.setItem('users', '[]');
  }

  return alert('Access denied. Valid username and password is required.');
}



// load more blog
$(function () {
  $(".blog-page-col").slice(0, 7).show();
  $("body").on('click touchstart', '.load-more', function (e) {
    e.preventDefault();
    $(".blog-page-col:hidden").slice(0, 7).slideDown();
    if ($(".blog-page-col:hidden").length == 0) {
      $(".load-more-wrapper").css('visibility', 'hidden');
    }
    $('html,body').animate({
      scrollTop: offset().top
    }, 1000);
  });
});


// all product category show
let allProductCategory = document.getElementById('allCategory');
let categoryWrap = document.querySelector('.all-category-wrapper');
let bodyTag = document.querySelector('body');

allProductCategory.addEventListener('click', function(){
  categoryWrap.classList.toggle('category-show');
  // miniCartOverlay.classList.add('mini-cart-active')
});

// bodyTag.addEventListener('click', function(){
//   miniCartOverlay.classList.add('mini-cart-active');
// })


// mobile menu
let mobileMenuIcon = document.getElementById('mobileMenuIcon');
let mobileMenu = document.getElementById('mobile-menu');
let menuClose = document.getElementById('menu-close');

mobileMenuIcon.addEventListener('click', function(){
  mobileMenu.classList.toggle('show-menu');
})
// menuClose.addEventListener('click', function(){
//   mobileMenu.classList.add('hide-menu');
// })


// mobile search bar
let mobileSearchProductIcon = document.querySelector('.mobile-search-icon');
let mobileSearchProductBar = document.querySelector('.mobile-product-search');

mobileSearchProductIcon.addEventListener('click', function(){
  mobileSearchProductBar.classList.toggle('search-show');
})