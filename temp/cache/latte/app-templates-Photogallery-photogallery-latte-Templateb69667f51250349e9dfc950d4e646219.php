<?php
// source: C:\Users\Vitalij Motrja\Desktop\Web\kct-hlinsko\app/templates/Photogallery/photogallery.latte

class Templateb69667f51250349e9dfc950d4e646219 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('3ccdfcbbeb', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbac1784d363_content')) { function _lbac1784d363_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<div class="title-image">Archiv fotografií</div>
	<div class="grid">
		<a class="col-1-6" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("detailYear"), ENT_COMPAT) ?>
">2015</a>
		<a href="" class="col-1-6">2014</a>
		<a href="" class="col-1-6">2013</a>
		<a href="" class="col-1-6">2012</a>
		<a href="" class="col-1-6">2011</a>
		<a href="" class="col-1-6">2010</a>
		<div class="col-1-4">
			<div class="myMenu">
			<ul class="dropDownMenu">
				<li><a href="">2009 - 2005</a>
					<ul>
						<li><a href="">2009</a></li>
		    			<li><a href="">2008</a></li>
		    			<li><a href="">2007</a></li>
		    			<li><a href="">2006</a></li>
		    			<li><a href="">2005</a></li>
					</ul>
				</li>
			</ul>
			</div>
		</div>
		<div class="col-1-4">
		  	<div class="myMenu">
				<ul class="dropDownMenu">
					<li><a href="">2004 - 2000</a>
						<ul>
							<li><a href="">2004</a></li>
			    			<li><a href="">2003</a></li>
			    			<li><a href="">2002</a></li>
			    			<li><a href="">2001</a></li>
			    			<li><a href="">2000</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-1-4">
		  	<div class="myMenu">
				<ul class="dropDownMenu">
					<li><a href="">1999 - 1995</a>
						<ul>
							<li><a href="">1999</a></li>
			    			<li><a href="">1998</a></li>
			    			<li><a href="">1997</a></li>
			    			<li><a href="">1996</a></li>
			    			<li><a href="">1995</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-1-4">
		  	<div class="myMenu">
				<ul class="dropDownMenu">
					<li><a href="">1994 - 1990</a>
						<ul>
							<li><a href="">1994</a></li>
			    			<li><a href="">1993</a></li>
			    			<li><a href="">1992</a></li>
			    			<li><a href="">1991</a></li>
			    			<li><a href="">1990</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-1-4">
		  	<div class="myMenu">
				<ul class="dropDownMenu">
					<li><a href="">1989 - 1985</a>
						<ul>
							<li><a href="">1989</a></li>
			    			<li><a href="">1988</a></li>
			    			<li><a href="">1987</a></li>
			    			<li><a href="">1986</a></li>
			    			<li><a href="">1985</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-1-4">
		  	<div class="myMenu">
				<ul class="dropDownMenu">
					<li><a href="">1984 - 1980</a>
						<ul>
							<li><a href="">1984</a></li>
			    			<li><a href="">1983</a></li>
			    			<li><a href="">1982</a></li>
			    			<li><a href="">1981</a></li>
			    			<li><a href="">1980</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-1-4">
		  	<div class="myMenu">
				<ul class="dropDownMenu">
					<li><a href="">1979 - 1975</a>
						<ul>
							<li><a href="">1979</a></li>
			    			<li><a href="">1978</a></li>
			    			<li><a href="">1977</a></li>
			    			<li><a href="">1976</a></li>
			    			<li><a href="">1975</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start(function () {});}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}