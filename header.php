<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Georama:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
	<header id="header" class="backdrop-blur-[20px] z-[999] left-0 right-0">
		<div class="pa-topbar bg-[#241822] py-[10px]">
			<div class="container">
				<ul class="grid grid-cols-3">
					<li><a href="tel:(+01)-2345-6789" class="text-[#E5E5E5] hover:text-[#AA90A4] flex items-center"><?php dynamic_sidebar('topbar-sidebar-phone'); ?></a></li>
					<li class="text-[#AA90A4] text-center"><?php dynamic_sidebar('topbar-text-sidebar'); ?></li>
					<li>
						<ul class="flex justify-end">
							<li class="pr-[10px]">
								<?php echo do_shortcode('[woocs sd=1]'); ?>
								<select class="form-select bg-transparent text-white" aria-label="Default select example">
									<!-- <option selected class="text-black">Open this select menu</option> -->
									<option value="1" class="text-black">USD - US Dollor</option>
									<option value="2" class="text-black">INR - Indian Rupees</option>
									<option value="3" class="text-black">Euro</option>
								</select>
							</li>
							<li class="pl-[10px] border-l border-[#FFFFFF]">
								<?php echo do_shortcode('[gtranslate]'); ?>
								<!-- <select class="form-select bg-transparent text-white" aria-label="Default select example">
									<option value="english" class="text-black">English</option>
									<option value="french" class="text-black">French</option>
									<option value="hindi" class="text-black">Hindi</option>
								</select> -->
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<div class="container">
			<div class="navbar grid grid-cols-3 py-[25px]">
				<ul class="flex items-center border-b border-[#241822]">
					<li class="flex items-center pr-[15px]"><img src="<?php echo get_template_directory_uri() . '/assets/images/menu-grid.png' ?>" alt=""><span class="ml-[10px]">All Categories</span></li>
					<li class="flex flex-1 items-center relative pl-[15px] before:absolute before:w-[1px] before:h-[15px] before:bg-[#AA90A4] before:left-[2px]">
						<!-- <form action="">
							<input type="text" placeholder="search your product here..." class="bg-transparent focus:outline-none"><img src="</?php echo get_template_directory_uri() . '/assets/images/search.png' ?>" alt="" class="ml-auto">
						</form> -->
						<div id="product-search-0" class="product-search floating w-[100%]">
							<div class="product-search-form w-[100%]">
								<form id="product-search-form-0" class="product-search-form show-submit-button flex" action="http://localhost/pureayurveda/" method="get">
									<input id="product-search-field-0" name="s" type="text" class="product-search-field bg-transparent focus:outline-none w-[100%]" placeholder="search your product here..." autocomplete="off">
									<input type="hidden" name="post_type" value="product">
									<input type="hidden" name="title" value="1">
									<input type="hidden" name="excerpt" value="1">
									<input type="hidden" name="content" value="1">
									<input type="hidden" name="categories" value="1">
									<input type="hidden" name="attributes" value="1">
									<input type="hidden" name="tags" value="1">
									<input type="hidden" name="sku" value="1">
									<input type="hidden" name="orderby" value="date-DESC">
									<input type="hidden" name="ixwps" value="1">
									<span title="Clear" class="product-search-field-clear" style="display:none"></span>
									<button type="submit" class="ml-auto"><img src="<?php echo get_template_directory_uri() . '/assets/images/search.png' ?>" alt="" class="ml-auto"></button>
								</form>
							</div>
							<div id="product-search-results-0" class="product-search-results">
								<div id="product-search-results-content-0" class="product-search-results-content" style="display: none;"></div>
							</div>
						</div>
					</li>
				</ul>
				<a href="<?php echo esc_url(home_url('/')); ?>" class="pa-header-logo"><img src="<?php echo get_template_directory_uri() . '/assets/images/logo-black-2.png' ?>" alt="" class="m-auto"></a>
				<div class="pa-mini-cart flex items-center justify-end">
					<ul class="flex gap-x-[25px]">
						<li>
							<div class="relative inline-block">
								<?php echo do_shortcode('[ti_wishlist_products_counter]'); ?>
							</div>
						</li>
						<li class="relative">
							<div class="relative inline-block" id="miniCartIcon">
								<img src="<?php echo get_template_directory_uri() . '/assets/images/bag.png' ?>" alt="">
								<span class="absolute top-[-7px] right-[-7px] w-[17px] h-[17px] rounded-full bg-[#96225D] text-[10px] text-white flex justify-center items-center"><?php echo count(WC()->cart->get_cart()) ?></span>
							</div>
						</li>
					</ul>
					 		
					<?php if ( is_user_logged_in() ) { ?>
							<a href="<?php echo wp_logout_url(); ?>" class="bg-[#96225D] text-white rounded-tl-[25px] rounded-0 py-[15px] px-[37px] text-[14px] ml-[25px] hover:rounded-br-[25px] hover:rounded-none transition-all">Logout</a>
					<?php } else { ?>
							<a href="/wp-login.php" title="Login or Register" rel="home" class="bg-[#96225D] text-white rounded-tl-[25px] rounded-0 py-[15px] px-[37px] text-[14px] ml-[25px] hover:rounded-br-[25px] hover:rounded-none transition-all">Login/Register</a>
					<?php } ?>
					<!-- <a href="#" class="bg-[#96225D] text-white rounded-tl-[25px] rounded-0 py-[15px] px-[37px] text-[14px] ml-[25px] hover:rounded-br-[25px] hover:rounded-none transition-all">Login/Register</a> -->
				</div>
			</div>
		</div>
		<nav class="menu-navbar">
			<div class="container">
				<?php
					wp_nav_menu(array(
						'menu' => 'Main Menu',
						'theme_location' => 'Primary Menu',
						'menu_class' => 'flex justify-center items-center gap-x-[80px] text-white text-[18px] relative',
					));
				?>
			</div>
		</nav>
		
	</header>
	<div class="mini-cart-overlay" id="miniOverlay"></div>
			<div class="mini-cart transition-[0.8s] bg-white max-w-[714px] w-[100%] fixed top-0 right-[-714px] left-auto p-[60px] z-[99999]" id="miniCartBox">
				<div class="mini-cart-heading mb-[40px] flex justify-between items-center">
					<h3 class="text-[38px] font-[300]">Cart (3)</h3>
					<button type="button" class="minicart-close"><span class="text-[20px] text-[#AA90A4]">X</span></button>
				</div>
				<p class="mb-[40px] border-y border-[#C8C8C8] py-[15px]">Your are eligible for free shipping!</p>
				<div class="product-list">
					<?php /* woocommerce_mini_cart(); */ ?>
					<?php echo do_shortcode('[quadlayers-mini-cart]'); ?>
				</div>
			<!-- </div> -->
		</div>