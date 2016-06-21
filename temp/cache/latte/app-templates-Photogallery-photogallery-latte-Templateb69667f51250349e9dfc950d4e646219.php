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
?>	<div class="grid">
		<div class="photography-archive"></div>
		<a href="" class="col-1-6">2015</a>
		<a href="" class="col-1-6">2014</a>
		<a href="" class="col-1-6">2013</a>
		<a href="" class="col-1-6">2012</a>
		<a href="" class="col-1-6">2011</a>
		<a href="" class="col-1-6">2010</a>
		<div class="dropdown col-1-4">
  			<span>2009 - 2005</span>
  			<ul class="dropdown-content">
    			<li><a href="">2009</a></li>
    			<li><a href="">2008</a></li>
    			<li><a href="">2007</a></li>
    			<li><a href="">2006</a></li>
    			<li><a href="">2005</a></li>
  			</ul>
		</div>
		<div class="dropdown col-1-4">
  			<span>2004 - 2000</span>
  			<ul class="dropdown-content">
    			<li><a href="">2009</a></li>
    			<li><a href="">2008</a></li>
    			<li><a href="">2007</a></li>
    			<li><a href="">2006</a></li>
    			<li><a href="">2005</a></li>
  			</ul>
		</div>
		<div class="dropdown col-1-4">
  			<span>1999 - 1995</span>
  			<ul class="dropdown-content">
    			<li><a href="">2009</a></li>
    			<li><a href="">2008</a></li>
    			<li><a href="">2007</a></li>
    			<li><a href="">2006</a></li>
    			<li><a href="">2005</a></li>
  			</ul>
		</div>
		<div class="dropdown col-1-4">
  			<span>1994 - 1990</span>
  			<ul class="dropdown-content">
    			<li><a href="">2009</a></li>
    			<li><a href="">2008</a></li>
    			<li><a href="">2007</a></li>
    			<li><a href="">2006</a></li>
    			<li><a href="">2005</a></li>
  			</ul>
		</div>
		<div class="dropdown col-1-4">
  			<span>1989 - 1985</span>
  			<ul class="dropdown-content">
    			<li><a href="">2009</a></li>
    			<li><a href="">2008</a></li>
    			<li><a href="">2007</a></li>
    			<li><a href="">2006</a></li>
    			<li><a href="">2005</a></li>
  			</ul>
		</div>
		<div class="dropdown col-1-4">
  			<span>1984 - 1980</span>
  			<ul class="dropdown-content">
    			<li><a href="">2009</a></li>
    			<li><a href="">2008</a></li>
    			<li><a href="">2007</a></li>
    			<li><a href="">2006</a></li>
    			<li><a href="">2005</a></li>
  			</ul>
		</div>
		<div class="dropdown col-1-4">
  			<span>1979 - 1975</span>
  			<ul class="dropdown-content">
    			<li><a href="">2009</a></li>
    			<li><a href="">2008</a></li>
    			<li><a href="">2007</a></li>
    			<li><a href="">2006</a></li>
    			<li><a href="">2005</a></li>
  			</ul>
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