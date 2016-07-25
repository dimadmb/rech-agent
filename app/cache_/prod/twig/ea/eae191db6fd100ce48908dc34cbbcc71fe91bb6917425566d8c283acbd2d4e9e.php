<?php

/* BaseBundle:DocumentCategory:documents.html.twig */
class __TwigTemplate_e65f590b72e2d8861c1b63da0fe52c2685b3641025ca35a7b4bcf0fafa9fa9b3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "BaseBundle:DocumentCategory:documents.html.twig", 1);
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
        echo "
<h1>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "title", array()), "html", null, true);
        echo "</h1>

\t";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["documents"]) ? $context["documents"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["document"]) {
            // line 10
            echo "\t\t<a href=\"";
            echo $this->env->getExtension('routing')->getPath("homepage");
            echo twig_escape_filter($this->env, trim($this->getAttribute($context["document"], "url", array()), "/"), "html", null, true);
            echo ".html\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["document"], "contentTitle", array()), "html", null, true);
            echo "</a><br>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['document'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "
";
    }

    public function getTemplateName()
    {
        return "BaseBundle:DocumentCategory:documents.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 12,  50 => 10,  46 => 9,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block title %}{{category.title}}{% endblock %}*/
/* */
/* {% block body %}*/
/* */
/* <h1>{{category.title}}</h1>*/
/* */
/* 	{% for document in documents %}*/
/* 		<a href="{{path('homepage')}}{{document.url | trim('/')}}.html">{{ document.contentTitle }}</a><br>*/
/* 	{% endfor %}*/
/* */
/* {% endblock %}*/
