<?php
// source: C:\Users\Vitalij Motrja\Desktop\Web\kct-hlinsko\app/templates/ActivitiesPlans/activities-plans.latte

class Template45a868aae203a9e7fed41ceaad134c8b extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('cd3a71b20b', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb4e0e677987_content')) { function _lb4e0e677987_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<div class="title-image action-archive"></div>
	<div class="grid">
		<a href="" class="col-1-6">2015</a>
		<a href="" class="col-1-6">2014</a>
		<a href="" class="col-1-6">2013</a>
		<a href="" class="col-1-6">2012</a>
		<a href="" class="col-1-6">2011</a>
		<a href="" class="col-1-6">2010</a>
		<a href="" class="col-1-6">2009</a>
		<a href="" class="col-1-6">2008</a>
		<a href="" class="col-1-6">2007</a>
		<a href="" class="col-1-6">2006</a>
		<a href="" class="col-1-6">2005</a>
		<a href="" class="col-1-6">2004</a>
		<a href="" class="col-1-6">2003</a>
		<a href="" class="col-1-6">2002</a>
		<a href="" class="col-1-6">2001</a>
		<a href="" class="col-1-6">2000</a>
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