<?php

/* TwigBundle:Exception:error404.html.twig */
class __TwigTemplate_7890db8dac2cc7e0225f27e14c6bb6f2ada11bfac9533c2c9b78366fe06a98cd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "TwigBundle:Exception:error404.html.twig", 1);
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
        echo "Страница не найдена";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "
\t
<h1>404 Страница не найдена</h1>

<p>Попробуйте   <a href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\">перейти на главную</a></p>\t
\t
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error404.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 10,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block title %}Страница не найдена{% endblock %}*/
/* */
/* {% block body %}*/
/* */
/* 	*/
/* <h1>404 Страница не найдена</h1>*/
/* */
/* <p>Попробуйте   <a href="{{ path('homepage') }}">перейти на главную</a></p>	*/
/* 	*/
/* {% endblock %}*/
/* */
