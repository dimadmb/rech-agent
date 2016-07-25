<?php

/* BaseBundle:Cruise:index.html.twig */
class __TwigTemplate_bbeb8842e1103017e331292502f7d3a3db9fa11af68712ff31b25d2c6238eabf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "BaseBundle:Cruise:index.html.twig", 1);
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
        echo "Речные круизы";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "<h1>Речные круизы</h1>
<br>

\t\t\t\t";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["months"]) ? $context["months"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["month"]) {
            echo "\t

\t\t\t\t\t<a href=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($context["month"], "url", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["month"], "title", array()), "html", null, true);
            echo "</a><br>
\t\t\t\t\t
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['month'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "
";
    }

    public function getTemplateName()
    {
        return "BaseBundle:Cruise:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 14,  50 => 11,  43 => 9,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block title %}Речные круизы{% endblock %}*/
/* */
/* {% block body %}*/
/* <h1>Речные круизы</h1>*/
/* <br>*/
/* */
/* 				{% for month in months %}	*/
/* */
/* 					<a href="{{month.url}}">{{month.title}}</a><br>*/
/* 					*/
/* 				{% endfor %}*/
/* */
/* {% endblock %}				*/
