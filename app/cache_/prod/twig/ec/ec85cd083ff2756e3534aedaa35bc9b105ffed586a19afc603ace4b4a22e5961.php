<?php

/* BaseBundle:Order:index.html.twig */
class __TwigTemplate_cadfbf4a01067bfa53c68cb6d9820ca5911f9442055e137469e5b4bd62d84ff6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "BaseBundle:Order:index.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Бронирование и оплата речного круиза, внесение депозита";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "<h1>Бронирование и оплата речного круиза, внесение депозита</h1>
<br>

";
        // line 9
        echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "body", array());
        echo "


";
        // line 12
        if (((isset($context["cruise"]) ? $context["cruise"] : null) != null)) {
            // line 13
            echo "<br>\tтеплоход <b>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "ship", array()), "html", null, true);
            echo "</b>   маршрут <b>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "route", array()), "html", null, true);
            echo "</b> с <b>";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "startdate", array()), "d.m.Y"), "html", null, true);
            echo "</b> по <b>";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "enddate", array()), "d.m.Y"), "html", null, true);
            echo "</b><br><br>
";
        }
        // line 15
        echo "
<div class=\"row\">
\t<div class=\"col-sm-6\">
\t\t\t<form action=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("cruiseorder");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo " >

\t\t\t";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "

\t\t\t</form>\t
\t</div>
</div>



";
    }

    public function getTemplateName()
    {
        return "BaseBundle:Order:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 20,  68 => 18,  63 => 15,  51 => 13,  49 => 12,  43 => 9,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block title %}Бронирование и оплата речного круиза, внесение депозита{% endblock %}*/
/* */
/* {% block body %}*/
/* <h1>Бронирование и оплата речного круиза, внесение депозита</h1>*/
/* <br>*/
/* */
/* {{page.body| raw}}*/
/* */
/* */
/* {% if (cruise != null) %}*/
/* <br>	теплоход <b>{{ cruise.ship }}</b>   маршрут <b>{{cruise.route}}</b> с <b>{{cruise.startdate | date("d.m.Y")}}</b> по <b>{{cruise.enddate | date("d.m.Y")}}</b><br><br>*/
/* {% endif %}*/
/* */
/* <div class="row">*/
/* 	<div class="col-sm-6">*/
/* 			<form action="{{ path('cruiseorder') }}" method="post" {{ form_enctype(form) }} >*/
/* */
/* 			{{ form_rest(form) }}*/
/* */
/* 			</form>	*/
/* 	</div>*/
/* </div>*/
/* */
/* */
/* */
/* {% endblock %}	*/
