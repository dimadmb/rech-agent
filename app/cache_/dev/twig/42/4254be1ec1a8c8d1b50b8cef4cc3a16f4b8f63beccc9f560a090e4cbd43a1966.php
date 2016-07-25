<?php

/* BaseBundle:Cruise:monthMenu.html.twig */
class __TwigTemplate_f25eed98e098acd9359ecaf231f62d8148b2973a3275f439b059e8e7556650b0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_0c4a9b387ff772722cb845d2cbf0fbe3f9d191de6ea589b7e3f16c61f0c160c0 = $this->env->getExtension("native_profiler");
        $__internal_0c4a9b387ff772722cb845d2cbf0fbe3f9d191de6ea589b7e3f16c61f0c160c0->enter($__internal_0c4a9b387ff772722cb845d2cbf0fbe3f9d191de6ea589b7e3f16c61f0c160c0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "BaseBundle:Cruise:monthMenu.html.twig"));

        // line 1
        echo "<ul class=\"dropdown-menu\">
";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["monthMenu"]) ? $context["monthMenu"] : $this->getContext($context, "monthMenu")));
        foreach ($context['_seq'] as $context["_key"] => $context["month"]) {
            // line 3
            echo "<li><a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["month"], "url", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["month"], "title", array()), "html", null, true);
            echo "</a></li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['month'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 5
        echo "</ul>";
        
        $__internal_0c4a9b387ff772722cb845d2cbf0fbe3f9d191de6ea589b7e3f16c61f0c160c0->leave($__internal_0c4a9b387ff772722cb845d2cbf0fbe3f9d191de6ea589b7e3f16c61f0c160c0_prof);

    }

    public function getTemplateName()
    {
        return "BaseBundle:Cruise:monthMenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 5,  29 => 3,  25 => 2,  22 => 1,);
    }
}
/* <ul class="dropdown-menu">*/
/* {% for month in monthMenu %}*/
/* <li><a href="{{month.url}}">{{month.title}}</a></li>*/
/* {% endfor %}*/
/* </ul>*/
