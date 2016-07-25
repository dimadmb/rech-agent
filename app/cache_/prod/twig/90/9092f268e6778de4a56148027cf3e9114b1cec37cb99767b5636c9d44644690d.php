<?php

/* BaseBundle:Cruise:month.html.twig */
class __TwigTemplate_eeca635b78d137316c9b7a2cea8d6cd3fced7e83bdf64da5e193cde08dc2fe9a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "BaseBundle:Cruise:month.html.twig", 1);
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
        echo "Расписание речных круизов на ";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "<h1>Расписание речных круизов на ";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</h1>
<br>

";
        // line 9
        $this->loadTemplate("BaseBundle:Cruise:table_cruises.html.twig", "BaseBundle:Cruise:month.html.twig", 9)->display($context);
        // line 10
        echo "
";
    }

    public function getTemplateName()
    {
        return "BaseBundle:Cruise:month.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 10,  46 => 9,  39 => 6,  36 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block title %}Расписание речных круизов на {{title}}{% endblock %}*/
/* */
/* {% block body %}*/
/* <h1>Расписание речных круизов на {{title}}</h1>*/
/* <br>*/
/* */
/* {% include 'BaseBundle:Cruise:table_cruises.html.twig'   %}*/
/* */
/* {% endblock %}				*/
