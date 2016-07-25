<?php

/* AdminBundle:LoadVodohod:index.html.twig */
class __TwigTemplate_b4a1b3b70a808c9b084c5cf74d40f4d72a8b4c9af9e4d7453a485d09ab9ec314 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AdminBundle::baseadmin.html.twig", "AdminBundle:LoadVodohod:index.html.twig", 1);
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

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "


\t
";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["ship"]) ? $context["ship"] : null), "html", null, true);
        echo "
\t
";
    }

    public function getTemplateName()
    {
        return "AdminBundle:LoadVodohod:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 9,  31 => 5,  28 => 4,  11 => 1,);
    }
}
/* {% extends 'AdminBundle::baseadmin.html.twig' %}*/
/* */
/* */
/* {% block body %}*/
/* */
/* */
/* */
/* 	*/
/* {{ship}}*/
/* 	*/
/* {% endblock %}*/
