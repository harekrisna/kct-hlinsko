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
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
	</head>
<body>
	<header id="header" class="header"> 
		<div id="header_panel">
			<img class="head" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/layout/logo.png" alt="logo_hlinsko">
		</div>
		<nav id="menu_list">
			<ul class="main-menu">
				<li>
					<a class="active" title="" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:default"), ENT_COMPAT) ?>
">domů</a>
				</li>
				<li>
					<a title="" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("ActivitiesPlans:default"), ENT_COMPAT) ?>
">plán akcí</a>
				</li>
				<li>
					<a title="" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Photogallery:default"), ENT_COMPAT) ?>
">fotogalerie</a>
				</li>
				<li class="large">
					<a title="" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Painters:default"), ENT_COMPAT) ?>
">krajem malířů <span class="vysocina">vysočiny</span></a>
				</li>
				<li>
					<a title="" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Documents:default"), ENT_COMPAT) ?>
">dokumenty</a>
				</li>
				<li>
					<a title="" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Links:default"), ENT_COMPAT) ?>
">odkazy</a>
				</li>
			</ul>
		</nav>
		<div id="actuality_panel">
			<p>
				<span class="actual">Aktuality:</span> lemon drops sugar plum tiramisu jelly
			</p>
		</div>
	</header>
	<main>
<?php Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'content', $template->getParameters()) ?>
		<!--<article>
			<div id="welcome_text">
				<div class="welcome-font"></div>
				<div class="welcome-img">
					<div class="house"></div>
				</div>
				<p>
					Jelly beans gingerbread soufflé dragée topping pastry tootsie roll macaroon marzipan. Apple pie gingerbread toffee. Cake lemon drops sugar plum tiramisu jelly. Toffee carrot cake liquorice marzipan bear claw biscuit. Topping liquorice marshmallow fruitcake cookie. Danish fruitcake oat cake cotton candy jujubes. Oat cake tiramisu danish soufflé caramels. Jujubes pie chupa chups gingerbread powder lollipop cake dragée. Candy canes gummi bears sugar plum sweet cake bonbon. Cupcake wafer sweet. Gummies apple pie liquorice powder lemon drops jelly beans cheesecake tiramisu jujubes. Muffin jelly-o donut cake gingerbread marzipan oat cake jelly. Chocolate bar fruitcake brownie jujubes.
				</p>
			</div>
		</article>-->
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
					created by VityMo & Freezy
				</p>
			</div>
			<div class="kct-logo"></div>
		</div>
		<div id="created_by"> <p> created by 108.design  </p> </div>
	</footer>
</body>
</html><?php
}}