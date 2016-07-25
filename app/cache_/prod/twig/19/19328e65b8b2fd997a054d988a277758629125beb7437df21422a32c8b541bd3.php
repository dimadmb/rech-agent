<?php

/* BaseBundle:Cruise:searchForm.html.twig */
class __TwigTemplate_7fe52678ba45150d17dc44e432c52cb0a8c3edb7a8f964997e57ce77643d3876 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<h3>Поиск круиза</h3>
<form action=\"";
        // line 3
        echo $this->env->getExtension('routing')->getPath("search");
        echo "\" method=\"get\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_search"]) ? $context["form_search"] : null), 'enctype');
        echo " >

<div class=\"row\">
\t<div class=\"col-sm-3\">
\t\t";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_search"]) ? $context["form_search"] : null), "startDate", array()), 'label', array("label" => "Дата отправления от"));
        echo "
\t\t";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_search"]) ? $context["form_search"] : null), "startDate", array()), 'errors');
        echo "
\t\t";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_search"]) ? $context["form_search"] : null), "startDate", array()), 'widget');
        echo "
\t</div>\t\t
\t<div class=\"col-sm-3\">
\t\t";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_search"]) ? $context["form_search"] : null), "endDate", array()), 'label', array("label" => "Дата прибытия по"));
        echo "
\t\t";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_search"]) ? $context["form_search"] : null), "endDate", array()), 'errors');
        echo "
\t\t";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_search"]) ? $context["form_search"] : null), "endDate", array()), 'widget');
        echo "
\t</div>\t\t\t
\t<div class=\"col-sm-3\">
\t\t";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_search"]) ? $context["form_search"] : null), "ship", array()), 'label', array("label" => "Теплоход"));
        echo "
\t\t";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_search"]) ? $context["form_search"] : null), "ship", array()), 'errors');
        echo "
\t\t";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_search"]) ? $context["form_search"] : null), "ship", array()), 'widget');
        echo "
\t</div>\t\t\t\t
\t<div class=\"col-sm-3\">
\t\t

\t\t
\t</div>
</div>
<div class=\"row\">

\t<div class=\"col-sm-9\">
\t\t<div class=\"row\">
\t\t\t
\t\t\t<div class=\"col-sm-4\">
\t\t\t\t";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_search"]) ? $context["form_search"] : null), "burningCruise", array()), 'widget');
        echo "\t\t\t\t\t
\t\t\t\t";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_search"]) ? $context["form_search"] : null), "specialoffer", array()), 'widget');
        echo "\t
\t\t\t\t<br>
\t\t\t</div>\t\t
\t
\t\t\t<div class=\"col-sm-4\" style=\"padding:20px 15px 0 15px\">
\t\t\t
\t\t\t\t";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_search"]) ? $context["form_search"] : null), "days", array()), 'label', array("label" => "Продолжительность"));
        echo "
\t\t\t\t";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_search"]) ? $context["form_search"] : null), "days", array()), 'errors');
        echo "
\t\t\t\t";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_search"]) ? $context["form_search"] : null), "days", array()), 'widget');
        echo "\t\t 
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"col-sm-4\" style=\"padding:20px 15px 0 15px\">
\t\t\t
\t\t\t<a href=\"#spoiler-1\" class=\"btn btn-default spoiler collapsed\" data-toggle=\"collapse\" aria-expanded=\"false\">Города на маршруте</a>\t
\t\t\t</div>\t\t\t
\t\t\t
\t\t\t
\t\t\t<div class=\"col-sm-12\">
\t\t\t\t<div class=\"collapse\" id=\"spoiler-1\" aria-expanded=\"false\" style=\"height: 0px;\">
\t\t\t\t\t<div class=\"well\">
\t\t\t\t\t\t";
        // line 55
        echo "\t\t\t\t\t\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_search"]) ? $context["form_search"] : null), "places", array()), 'errors');
        echo "
\t\t\t\t\t\t";
        // line 56
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_search"]) ? $context["form_search"] : null), "places", array()), 'widget');
        echo "\t\t\t
\t\t\t\t\t</div>
\t\t\t\t</div>\t
\t\t\t</div>\t\t
\t\t\t
\t\t\t
\t\t</div>\t
\t</div>\t
\t
\t<div class=\"col-sm-3\" style=\"padding:0px 15px  0 30px;\">
\t\t";
        // line 66
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form_search"]) ? $context["form_search"] : null), "button", array()), 'widget');
        echo "\t
\t\t
\t\t";
        // line 68
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_search"]) ? $context["form_search"] : null), 'rest');
        echo "

\t</div>\t


\t

</div>




\t
</form>

";
    }

    public function getTemplateName()
    {
        return "BaseBundle:Cruise:searchForm.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 68,  139 => 66,  126 => 56,  121 => 55,  106 => 42,  102 => 41,  98 => 40,  89 => 34,  85 => 33,  68 => 19,  64 => 18,  60 => 17,  54 => 14,  50 => 13,  46 => 12,  40 => 9,  36 => 8,  32 => 7,  23 => 3,  19 => 1,);
    }
}
/* */
/* <h3>Поиск круиза</h3>*/
/* <form action="{{ path('search') }}" method="get" {{ form_enctype(form_search) }} >*/
/* */
/* <div class="row">*/
/* 	<div class="col-sm-3">*/
/* 		{{ form_label(form_search.startDate, 'Дата отправления от') }}*/
/* 		{{ form_errors(form_search.startDate) }}*/
/* 		{{ form_widget(form_search.startDate) }}*/
/* 	</div>		*/
/* 	<div class="col-sm-3">*/
/* 		{{ form_label(form_search.endDate, 'Дата прибытия по') }}*/
/* 		{{ form_errors(form_search.endDate) }}*/
/* 		{{ form_widget(form_search.endDate) }}*/
/* 	</div>			*/
/* 	<div class="col-sm-3">*/
/* 		{{ form_label(form_search.ship, 'Теплоход') }}*/
/* 		{{ form_errors(form_search.ship) }}*/
/* 		{{ form_widget(form_search.ship) }}*/
/* 	</div>				*/
/* 	<div class="col-sm-3">*/
/* 		*/
/* */
/* 		*/
/* 	</div>*/
/* </div>*/
/* <div class="row">*/
/* */
/* 	<div class="col-sm-9">*/
/* 		<div class="row">*/
/* 			*/
/* 			<div class="col-sm-4">*/
/* 				{{ form_widget(form_search.burningCruise) }}					*/
/* 				{{ form_widget(form_search.specialoffer) }}	*/
/* 				<br>*/
/* 			</div>		*/
/* 	*/
/* 			<div class="col-sm-4" style="padding:20px 15px 0 15px">*/
/* 			*/
/* 				{{ form_label(form_search.days, 'Продолжительность') }}*/
/* 				{{ form_errors(form_search.days) }}*/
/* 				{{ form_widget(form_search.days) }}		 */
/* 			</div>*/
/* 			*/
/* 			<div class="col-sm-4" style="padding:20px 15px 0 15px">*/
/* 			*/
/* 			<a href="#spoiler-1" class="btn btn-default spoiler collapsed" data-toggle="collapse" aria-expanded="false">Города на маршруте</a>	*/
/* 			</div>			*/
/* 			*/
/* 			*/
/* 			<div class="col-sm-12">*/
/* 				<div class="collapse" id="spoiler-1" aria-expanded="false" style="height: 0px;">*/
/* 					<div class="well">*/
/* 						{#{ form_label(form_search.places, '') }#}*/
/* 						{{ form_errors(form_search.places) }}*/
/* 						{{ form_widget(form_search.places) }}			*/
/* 					</div>*/
/* 				</div>	*/
/* 			</div>		*/
/* 			*/
/* 			*/
/* 		</div>	*/
/* 	</div>	*/
/* 	*/
/* 	<div class="col-sm-3" style="padding:0px 15px  0 30px;">*/
/* 		{{ form_widget(form_search.button) }}	*/
/* 		*/
/* 		{{ form_rest(form_search) }}*/
/* */
/* 	</div>	*/
/* */
/* */
/* 	*/
/* */
/* </div>*/
/* */
/* */
/* */
/* */
/* 	*/
/* </form>*/
/* */
/* */
