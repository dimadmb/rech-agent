<?php

/* BaseBundle:Cruise:scheduleSpecial.html.twig */
class __TwigTemplate_e43eaecef4200fcf60e45c48710166463587b21ba9cbf195f6478a8f5bfafb21 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "BaseBundle:Cruise:scheduleSpecial.html.twig", 1);
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
<br>

";
        // line 9
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
            // line 10
            echo "\t
\t<div class=\"row\">
\t\t<div class=\"col-xs-6\"><h3>";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($context["cruises_month"], "name", array()), "html", null, true);
            echo "</h3></div>
\t\t<div class=\"col-xs-6\"><h3 style=\"color:red;\">Цены указаны без учета скидки ";
            // line 13
            if (((isset($context["offer"]) ? $context["offer"] : null) == "burningcruise")) {
                echo " 20% ";
            } elseif (((isset($context["offer"]) ? $context["offer"] : null) == "specialoffer")) {
                echo " 10% ";
            }
            echo "</h3></div>
\t</div>
\t
\t

\t

";
            // line 20
            $this->loadTemplate("BaseBundle:Cruise:table_cruises.html.twig", "BaseBundle:Cruise:scheduleSpecial.html.twig", 20)->display(array_merge($context, array("cruises" => $this->getAttribute($context["cruises_month"], "row", array()))));
            // line 21
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
        // line 24
        echo "


";
    }

    public function getTemplateName()
    {
        return "BaseBundle:Cruise:scheduleSpecial.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 24,  84 => 21,  82 => 20,  68 => 13,  64 => 12,  60 => 10,  43 => 9,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block title %}Расписание по месяцам{% endblock %}*/
/* */
/* {% block body %}*/
/* <h1>Расписание по месяцам</h1>*/
/* <br>*/
/* */
/* {% for cruises_month in cruises_months %}*/
/* 	*/
/* 	<div class="row">*/
/* 		<div class="col-xs-6"><h3>{{cruises_month.name}}</h3></div>*/
/* 		<div class="col-xs-6"><h3 style="color:red;">Цены указаны без учета скидки {% if (offer == "burningcruise") %} 20% {% elseif (offer == "specialoffer") %} 10% {% endif %}</h3></div>*/
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
