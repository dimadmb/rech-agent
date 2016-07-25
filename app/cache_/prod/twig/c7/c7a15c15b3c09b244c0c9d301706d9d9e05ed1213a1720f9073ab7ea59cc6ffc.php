<?php

/* BaseBundle:Cruise:monthMenu.html.twig */
class __TwigTemplate_c57deea5946c470f108553e8c7d7681814359d34be5a7ec2945c96dffc4e7739 extends Twig_Template
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
        // line 1
        echo "<ul class=\"dropdown-menu\">
";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["monthMenu"]) ? $context["monthMenu"] : null));
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
        return array (  37 => 5,  26 => 3,  22 => 2,  19 => 1,);
    }
}
/* <ul class="dropdown-menu">*/
/* {% for month in monthMenu %}*/
/* <li><a href="{{month.url}}">{{month.title}}</a></li>*/
/* {% endfor %}*/
/* </ul>*/
