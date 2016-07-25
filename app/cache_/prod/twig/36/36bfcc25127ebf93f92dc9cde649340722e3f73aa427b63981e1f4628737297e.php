<?php

/* BaseBundle:Cruise:categoryroutes.html.twig */
class __TwigTemplate_d51956b488eb5bcec6fdb2771b50bbf5747090acfa526421026b5d1a1940c1b2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "BaseBundle:Cruise:categoryroutes.html.twig", 1);
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "title", array()), "html", null, true);
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "<h1>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "title", array()), "html", null, true);
        echo "</h1>


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
            echo "\t<h3>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["cruises_month"], "name", array()), "html", null, true);
            echo "</h3>

\t

";
            // line 14
            $this->loadTemplate("BaseBundle:Cruise:table_cruises.html.twig", "BaseBundle:Cruise:categoryroutes.html.twig", 14)->display(array_merge($context, array("cruises" => $this->getAttribute($context["cruises_month"], "row", array()))));
            // line 15
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
        // line 18
        echo "\t
";
    }

    public function getTemplateName()
    {
        return "BaseBundle:Cruise:categoryroutes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 18,  72 => 15,  70 => 14,  62 => 10,  45 => 9,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block title %}{{category.title}}{% endblock %}*/
/* */
/* {% block body %}*/
/* <h1>{{category.title}}</h1>*/
/* */
/* */
/* {% for cruises_month in cruises_months %}*/
/* 	<h3>{{cruises_month.name}}</h3>*/
/* */
/* 	*/
/* */
/* {% include 'BaseBundle:Cruise:table_cruises.html.twig'  with {'cruises':cruises_month.row} %}*/
/* 	*/
/* 	*/
/* {% endfor %}*/
/* 	*/
/* {% endblock %}	*/
