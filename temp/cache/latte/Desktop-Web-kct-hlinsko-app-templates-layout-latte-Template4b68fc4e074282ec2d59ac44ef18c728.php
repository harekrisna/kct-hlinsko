<?php
// source: C:\Users\Vitalij Motrja\Desktop\Web\kct-hlinsko\app/templates/@layout.latte

class Template4b68fc4e074282ec2d59ac44ef18c728 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('4e9149d8e0', 'html')
;
// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-type">
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/style.css">
		<title>Example page</title>
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
		<link href='https://fonts.googleapis.com/css?family=Lobster|PT+Sans|Josefin+Sans|Open+Sans:400,700,300,600' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/photoswipe.css">
		<link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/default-skin.css"> 
	</head>
<body>
	<a href="#" class="back-to-top">Back to Top</a>
	<a href="#" class="back-to-history">Back to Top</a>
	<header id="header" class="header"> 
		<div id="header_panel">
			<img class="head" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/layout/logo.png" alt="logo_hlinsko">
		</div>
		<nav id="menu_list">
			<ul class="main-menu">
				<li class="wrapper">
					<a class="active first after" title="" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:default"), ENT_COMPAT) ?>
">domů</a>
				</li>
				<li class="wrapper">
					<a class="first after" title="" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("ActivitiesPlans:default"), ENT_COMPAT) ?>
">plán akcí</a>
				</li>
				<li class="wrapper">
					<a class="first after" title="" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Photogallery:default"), ENT_COMPAT) ?>
">fotogalerie</a>
				</li>
				<li class="wrapper">
					<a class="first after" title="" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Painters:default"), ENT_COMPAT) ?>
">krajem malířů <span class="vysocina">vysočiny</span></a>
				</li>
				<li class="wrapper">
					<a class="first after" title="" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Documents:default"), ENT_COMPAT) ?>
">dokumenty</a>
				</li>
				<li class="wrapper">
					<a class="first after" title="" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Links:default"), ENT_COMPAT) ?>
">odkazy</a>
				</li>
			</ul>
		</nav>
		<div id="dashboard_panel">
			<div class="box_add_menu">
				<div class="addMenuList">
					<ul class="dropMenuList">
						<li class="wrapper-white"><a href="" class="first after">Navigace</a>
							<ul>
								<li><a href="">Termíny</a></li>
				    			<li><a href="">Události</a></li>
				    			<li><a href="">Připomínky</a></li>
				    			<li><a href="">Kontakt</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<p>
				<a class="actual-dashboard" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Dashboard:default"), ENT_COMPAT) ?>
">Nástěnka:</a> 
				<a href="" class="direct-link-dashboard">lemon drops sugar plum tiramisu jelly</a>
			</p>
		</div>
	</header>
	<main>
<?php Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'content', $template->getParameters()) ?>
	</main>
	<footer>
		<div id="footer_items">
			<div class="city-logo"></div>
			<div class="soc-sites">
				<div class="social-top">
					<p>
						sdílet
					</p>
				    <ul>
				    	<li class="facebook"><a href="#self">f</a></li>
				        <li class="twitter"><a href="#self">t</a></li>
				        <li class="google"><a href="#self">g</a></li>
				    </ul>
				</div>
			</div>
			<div class="kct-adress">
				<p>
					KČT HLINSKO, Jelly beans soufflé <br> 
					dragée topping pastry tootsie  <br>
					macaroon marzipan. Apple pie .
				</p>
			</div>
			<div class="site-creators">
				<p>
					&copy 1975 - 2016 KČT Hlinsko,<br>
					design &copy 2016, rasika.sks <br>
					created by <a href="">Break / design</a>
				</p>
			</div>
			<div class="kct-logo"></div>
		</div>
		<div id="created_by"> <p> created by <a href="">break / design</a>  </p> </div>
	</footer>
	<script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/script.js"></script>
	
	<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/photoswipe.min.js"></script>  <!-- Core JS file -->
	<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/photoswipe-ui-default.min.js"></script>  <!-- UI JS file -->
	<script type="text/javascript">

		$('.myMenu ul li').hover(function() {
			$(this).children('ul').stop(true, false, true).fadeToggle(300);
		});

		$('.addMenuList ul li').hover(function() {
			$(this).children('ul').stop(true, false, true).fadeToggle(300);
		});

	</script>
</body>
</html><?php
}}