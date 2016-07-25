<?php

/* BaseBundle:Admin:index.html.twig */
class __TwigTemplate_57a482e943c4b9186f65c92644eca358f68c1b4c01c9806ec2bb1277e2c5d65e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("BaseBundle::baseadmin.html.twig", "BaseBundle:Admin:index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BaseBundle::baseadmin.html.twig";
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
        echo $this->env->getExtension('routing')->getPath("admin");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_excel"]) ? $context["form_excel"] : null), 'enctype');
        echo " >
\t";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form_excel"]) ? $context["form_excel"] : null), 'rest');
        echo "
\t</form>
\t";
    }

    public function getTemplateName()
    {
        return "BaseBundle:Admin:index.html.twig";
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
/* {% extends 'BaseBundle::baseadmin.html.twig' %}*/
/* */
/* {% block body %}*/
/* 	<form action="{{ path('admin') }}" method="post" {{ form_enctype(form_excel) }} >*/
/* 	{{ form_rest(form_excel) }}*/
/* 	</form>*/
/* 	{#{dump(form)}#}*/
/* {% endblock %}*/
