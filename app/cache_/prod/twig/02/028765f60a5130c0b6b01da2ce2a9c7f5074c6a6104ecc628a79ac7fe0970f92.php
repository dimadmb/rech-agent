<?php

/* BaseBundle:Document:page.html.twig */
class __TwigTemplate_41fae4595e590c4d14986e894309050d4571675c011fa4baa4f0523be5c790fa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "BaseBundle:Document:page.html.twig", 1);
        $this->blocks = array(
            'description' => array($this, 'block_description'),
            'keywords' => array($this, 'block_keywords'),
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
    public function block_description($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["document"]) ? $context["document"] : null), "description", array()), "html", null, true);
    }

    // line 4
    public function block_keywords($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["document"]) ? $context["document"] : null), "keywords", array()), "html", null, true);
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["document"]) ? $context["document"] : null), "title", array()), "html", null, true);
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo " 
<h1>";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["document"]) ? $context["document"] : null), "contentTitle", array()), "html", null, true);
        echo "</h1> 

\t
\t";
        // line 12
        echo $this->getAttribute((isset($context["document"]) ? $context["document"] : null), "body", array());
        echo "
\t
\t";
        // line 14
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("BaseBundle:Photo:getPhotos", array("doc_id" => $this->getAttribute((isset($context["document"]) ? $context["document"] : null), "id", array()), "path" => $this->getAttribute((isset($context["document"]) ? $context["document"] : null), "url", array()))));
        echo "
\t
\t";
        // line 16
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 17
            echo "\t\t<a class=\"btn btn-success\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_edit", array("id" => $this->getAttribute((isset($context["document"]) ? $context["document"] : null), "id", array()))), "html", null, true);
            echo "\">Редактировать</a>
\t";
        }
        // line 18
        echo "\t
\t
";
    }

    public function getTemplateName()
    {
        return "BaseBundle:Document:page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 18,  73 => 17,  71 => 16,  66 => 14,  61 => 12,  55 => 9,  52 => 8,  49 => 7,  43 => 5,  37 => 4,  31 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block description %}{{document.description}}{% endblock %}*/
/* {% block keywords %}{{document.keywords}}{% endblock %}*/
/* {% block title %}{{document.title}}{% endblock %}*/
/* */
/* {% block body %}*/
/*  */
/* <h1>{{ document.contentTitle }}</h1> */
/* */
/* 	*/
/* 	{{ document.body| raw }}*/
/* 	*/
/* 	{{ render(controller('BaseBundle:Photo:getPhotos',{doc_id : document.id, path:document.url }))  }}*/
/* 	*/
/* 	{% if is_granted('ROLE_ADMIN') %}*/
/* 		<a class="btn btn-success" href="{{path('page_edit',{'id':document.id})}}">Редактировать</a>*/
/* 	{% endif %}	*/
/* 	*/
/* {% endblock %}*/
/* */
/* */
