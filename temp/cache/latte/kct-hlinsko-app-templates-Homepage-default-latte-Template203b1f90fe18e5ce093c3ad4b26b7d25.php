<?php
// source: C:\Users\Vitalij Motrja\Desktop\Web\kct-hlinsko\app/templates/Homepage/default.latte

class Template203b1f90fe18e5ce093c3ad4b26b7d25 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('087061bb57', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbc245d67f1c_content')) { function _lbc245d67f1c_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><article>
	<div id="welcome_text">
		<div class="welcome-font"></div>
		<div class="welcome-img">
			<div class="house"></div>
		</div>
		<p>
			Jelly beans gingerbread soufflé dragée topping pastry tootsie roll macaroon marzipan. Apple pie gingerbread toffee. Cake lemon drops sugar plum tiramisu jelly. Toffee carrot cake liquorice marzipan bear claw biscuit. Topping liquorice marshmallow fruitcake cookie. Danish fruitcake oat cake cotton candy jujubes. Oat cake tiramisu danish soufflé caramels. Jujubes pie chupa chups gingerbread powder lollipop cake dragée. Candy canes gummi bears sugar plum sweet cake bonbon. Cupcake wafer sweet. Gummies apple pie liquorice powder lemon drops jelly beans cheesecake tiramisu jujubes. Muffin jelly-o donut cake gingerbread marzipan oat cake jelly. Chocolate bar fruitcake brownie jujubes.
		</p>
	</div>
</article>
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