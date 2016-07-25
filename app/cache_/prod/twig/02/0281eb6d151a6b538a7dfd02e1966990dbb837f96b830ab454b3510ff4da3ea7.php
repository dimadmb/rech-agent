<?php

/* AdminBundle:LoadShip:loadship.html.twig */
class __TwigTemplate_da55968849335f817477720ff89a0b76bc7cb8aa7112a02d4478ab85ac4cfa90 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("AdminBundle::baseadmin.html.twig", "AdminBundle:LoadShip:loadship.html.twig", 1);
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
        echo "\t<form action=\"";
        echo $this->env->getExtension('routing')->getPath("loadshipdo");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_excel"]) ? $context["form_excel"] : null), 'enctype');
        echo " >
\t";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_excel"]) ? $context["form_excel"] : null), 'rest');
        echo "
\t</form>
\t
\t
\t
";
    }

    public function getTemplateName()
    {
        return "AdminBundle:LoadShip:loadship.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'AdminBundle::baseadmin.html.twig' %}*/
/* */
/* {% block body %}*/
/* 	<form action="{{ path('loadshipdo') }}" method="post" {{ form_enctype(form_excel) }} >*/
/* 	{{ form_rest(form_excel) }}*/
/* 	</form>*/
/* 	*/
/* 	*/
/* 	*/
/* {% endblock %}*/
