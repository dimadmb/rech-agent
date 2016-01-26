<?php

/* BaseBundle:Default:index.html.twig */
class __TwigTemplate_41af4708afdf8b8eb5899a816741c619e5822190132069d47736d3df18baec4e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "BaseBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_51f1e6100bdc0a0259dbaa695203030a98d494e67e51d63c5d9e9d582b863427 = $this->env->getExtension("native_profiler");
        $__internal_51f1e6100bdc0a0259dbaa695203030a98d494e67e51d63c5d9e9d582b863427->enter($__internal_51f1e6100bdc0a0259dbaa695203030a98d494e67e51d63c5d9e9d582b863427_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "BaseBundle:Default:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_51f1e6100bdc0a0259dbaa695203030a98d494e67e51d63c5d9e9d582b863427->leave($__internal_51f1e6100bdc0a0259dbaa695203030a98d494e67e51d63c5d9e9d582b863427_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_a8aa2a6ff821dcc7179dbd641dbeeeee0eabbba14fc7159e0cd2171a4acc4efe = $this->env->getExtension("native_profiler");
        $__internal_a8aa2a6ff821dcc7179dbd641dbeeeee0eabbba14fc7159e0cd2171a4acc4efe->enter($__internal_a8aa2a6ff821dcc7179dbd641dbeeeee0eabbba14fc7159e0cd2171a4acc4efe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "\tHello ";
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "!
";
        
        $__internal_a8aa2a6ff821dcc7179dbd641dbeeeee0eabbba14fc7159e0cd2171a4acc4efe->leave($__internal_a8aa2a6ff821dcc7179dbd641dbeeeee0eabbba14fc7159e0cd2171a4acc4efe_prof);

    }

    public function getTemplateName()
    {
        return "BaseBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 3,  34 => 2,  11 => 1,);
    }
}
