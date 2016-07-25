<?php

/* AdminBundle:LoadShip:loadshipDo.html.twig */
class __TwigTemplate_09a90f303a30a8b62e812fa44ce3e99887246a91bc0be16ae105512f92470f0b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AdminBundle::baseadmin.html.twig", "AdminBundle:LoadShip:loadshipDo.html.twig", 1);
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
        echo "
\t<p style=\"color: green; font-weight:900;\" >";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["success"]) ? $context["success"] : null), "html", null, true);
        echo "</p> 
\t
\t";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["messages"]) ? $context["messages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 8
            echo "\t\t<p style=\"background:#fee;\">";
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "</p>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "

\t
\t
";
    }

    public function getTemplateName()
    {
        return "AdminBundle:LoadShip:loadshipDo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 10,  43 => 8,  39 => 7,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'AdminBundle::baseadmin.html.twig' %}*/
/* */
/* {% block body %}*/
/* */
/* 	<p style="color: green; font-weight:900;" >{{success}}</p> */
/* 	*/
/* 	{% for message in messages %}*/
/* 		<p style="background:#fee;">{{message}}</p>*/
/* 	{% endfor %}*/
/* */
/* */
/* 	*/
/* 	*/
/* {% endblock %}*/
