<?php
// source: C:\Users\Vitalij Motrja\Desktop\Web\kct-hlinsko\app/templates/Painters/painters.latte

class Template181063c410262ca20a454547fbe0646a extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('b6b34b64d2', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb18e68a3459_content')) { function _lb18e68a3459_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<div class="title-image painters-words"></div>
	<div class="grid-for-painters">
		<div class="col-1-3">
			<div id="sponsor-1">
				
			</div>
			<p class="adress">
				Městský úřad Hlinsko<br> 
				Poděbradovo náměstí 1 <br>
				Hlinsko 539 01 <br>
				tel: 469 315 300</p>
			<p class"www">hlinsko.cz</p>
		</div>
		<div class="col-1-3">
			<div id="sponsor-2">
			</div>
			<p class="adress">
				Tylovo náměstí 272<br> 
				539 01 Hlinsko <br> 
				tel: 469 326 212 <br> 
				fax: 469 311 666
			</p>
			<p class"www">jednotahlinsko.cz</p>
		</div>
		<div class="col-1-3">
			<div id="sponsor-3">
			</div>
			<p class="adress">
			Resslova 260 <br> 
			539 01 Hlinsko v Čechách <br> 
			tel: 469 311 609 <br> 
			fax: 469 311 383</p>
			<p class"www">rychtar.cz</p>
		</div>
	</div>
	<div class="sponsor-links">
		<ul>
			<li><a href="">Minibazar</a></li>
			<li><a href="">Mlékárna Hlinsko</a></li>
			<li><a href="">Gymnázium Hlinsko</a></li>
			<li><a href="">Klempířské a pokrývačské práce pan Vosmik tel: 606 533 410</a></li>
			<li><a href="">Jiří Štika, malíř a natěrač tel: 603 581 605</a></li>
		</ul>
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