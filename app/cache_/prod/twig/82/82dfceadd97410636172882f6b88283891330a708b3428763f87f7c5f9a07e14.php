<?php

/* BaseBundle:Cruise:schedule.html.twig */
class __TwigTemplate_e4777fea02018eb19c1fb73e9737840e6825fff68eb4d8c4ac831c6927e1981b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "BaseBundle:Cruise:schedule.html.twig", 1);
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
        echo "Расписание по месяцам";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "<h1>Расписание по месяцам</h1>
";
        // line 7
        if (array_key_exists("count", $context)) {
            // line 8
            echo "<p>Найдено ";
            echo twig_escape_filter($this->env, (isset($context["count"]) ? $context["count"] : null), "html", null, true);
            echo " круизов </p>

";
        }
        // line 12
        echo "<br>

";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cruises_months"]) ? $context["cruises_months"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["cruises_month"]) {
            // line 15
            echo "\t
\t<div class=\"row\">
\t\t<div class=\"col-xs-6\"><h3>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["cruises_month"], "name", array()), "html", null, true);
            echo "</h3></div>
\t\t<div class=\"col-xs-6\"></div>
\t</div>
\t
\t

\t

";
            // line 25
            $this->loadTemplate("BaseBundle:Cruise:table_cruises.html.twig", "BaseBundle:Cruise:schedule.html.twig", 25)->display(array_merge($context, array("cruises" => $this->getAttribute($context["cruises_month"], "row", array()))));
            // line 26
            echo "\t
\t
";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cruises_month'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "


";
    }

    public function getTemplateName()
    {
        return "BaseBundle:Cruise:schedule.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 29,  88 => 26,  86 => 25,  75 => 17,  71 => 15,  54 => 14,  50 => 12,  43 => 8,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block title %}Расписание по месяцам{% endblock %}*/
/* */
/* {% block body %}*/
/* <h1>Расписание по месяцам</h1>*/
/* {% if count is defined %}*/
/* <p>Найдено {{count}} круизов </p>*/
/* */
/* {% endif %}*/
/* {#{dump(dump)}#}*/
/* <br>*/
/* */
/* {% for cruises_month in cruises_months %}*/
/* 	*/
/* 	<div class="row">*/
/* 		<div class="col-xs-6"><h3>{{cruises_month.name}}</h3></div>*/
/* 		<div class="col-xs-6"></div>*/
/* 	</div>*/
/* 	*/
/* 	*/
/* */
/* 	*/
/* */
/* {% include 'BaseBundle:Cruise:table_cruises.html.twig'  with {'cruises':cruises_month.row} %}*/
/* 	*/
/* 	*/
/* {% endfor %}*/
/* */
/* */
/* */
/* {% endblock %}*/
