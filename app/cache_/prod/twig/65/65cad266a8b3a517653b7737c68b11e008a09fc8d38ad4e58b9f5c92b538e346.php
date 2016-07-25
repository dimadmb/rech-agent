<?php

/* AdminBundle:LoadVodohod:load.html.twig */
class __TwigTemplate_61edd068e0dc047ccacc7cc6b422fcea6bed62cca98830f095984697345a6736 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AdminBundle::baseadmin.html.twig", "AdminBundle:LoadVodohod:load.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AdminBundle::baseadmin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["ships"]) ? $context["ships"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["ship"]) {
            // line 5
            echo "\t\t<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("loadvodohod_ship", array("ship_id" => $this->getAttribute($context["ship"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["ship"], "name", array()), "html", null, true);
            echo "</a><br>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ship'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "AdminBundle:LoadVodohod:load.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'AdminBundle::baseadmin.html.twig' %}*/
/* */
/* {% block body %}*/
/* 	{% for ship in ships %}*/
/* 		<a href="{{ path('loadvodohod_ship',{'ship_id':ship.id}) }}">{{ship.name}}</a><br>*/
/* 	{% endfor %}*/
/* {% endblock %}*/
