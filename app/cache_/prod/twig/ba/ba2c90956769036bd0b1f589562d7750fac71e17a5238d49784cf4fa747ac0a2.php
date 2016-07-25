<?php

/* BaseBundle:Document:routes.html.twig */
class __TwigTemplate_90d8f1edc7426b0449b2aceac4cc611da436c7bf691239ecab4bc6a30395b912 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "BaseBundle:Document:routes.html.twig", 1);
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
        echo "Маршруты речных круизов";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "<h1>Маршруты речных круизов</h1> 
<br>
<br>
\t";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 10
            echo "\t\t<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("categoryroutes", array("category" => $this->getAttribute($context["category"], "code", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "title", array()), "html", null, true);
            echo "</a>
\t\t<p>";
            // line 11
            echo $this->getAttribute($context["category"], "description", array());
            echo "</p>
\t\t<br>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "


";
    }

    public function getTemplateName()
    {
        return "BaseBundle:Document:routes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 14,  54 => 11,  47 => 10,  43 => 9,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block title %}Маршруты речных круизов{% endblock %}*/
/* */
/* {% block body %}*/
/* <h1>Маршруты речных круизов</h1> */
/* <br>*/
/* <br>*/
/* 	{% for category in categories %}*/
/* 		<a href="{{path('categoryroutes',{'category':category.code})}}">{{category.title}}</a>*/
/* 		<p>{{category.description | raw}}</p>*/
/* 		<br>*/
/* 	{% endfor %}*/
/* */
/* */
/* */
/* {% endblock %}*/
