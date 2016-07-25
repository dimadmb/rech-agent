<?php

/* BaseBundle:Ship:classlist.html.twig */
class __TwigTemplate_8877264aa5fa0dc968f979eea813ba8d0d2a896540cc9904149cf10d45a8e5d3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "BaseBundle:Ship:classlist.html.twig", 1);
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

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Теплоходы по комфортабельности";
    }

    // line 6
    public function block_body($context, array $blocks = array())
    {
        // line 7
        echo "<h1>Теплоходы по комфортабельности</h1>


\t\t\t";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["classes"]) ? $context["classes"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
            // line 11
            echo "\t\t\t\t<div class=\"clearfix\">
\t\t\t\t<h3>";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($context["class"], "title", array()), "html", null, true);
            echo "</h3>
\t\t\t\t<hr style=\"border-top: 1px solid #483381;\">

\t\t\t\t";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["class"], "ships", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["ship"]) {
                echo "\t\t\t\t
\t\t\t\t\t";
                // line 16
                $this->loadTemplate("BaseBundle:Ship:tableShip.html.twig", "BaseBundle:Ship:classlist.html.twig", 16)->display($context);
                // line 17
                echo "\t\t\t\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ship'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo "\t\t\t</div>
\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "\t\t\t




";
    }

    public function getTemplateName()
    {
        return "BaseBundle:Ship:classlist.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 19,  104 => 18,  90 => 17,  88 => 16,  69 => 15,  63 => 12,  60 => 11,  43 => 10,  38 => 7,  35 => 6,  29 => 4,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* */
/* {% block title %}Теплоходы по комфортабельности{% endblock %}*/
/* */
/* {% block body %}*/
/* <h1>Теплоходы по комфортабельности</h1>*/
/* */
/* */
/* 			{% for class in classes %}*/
/* 				<div class="clearfix">*/
/* 				<h3>{{class.title}}</h3>*/
/* 				<hr style="border-top: 1px solid #483381;">*/
/* */
/* 				{% for ship in class.ships %}				*/
/* 					{% include 'BaseBundle:Ship:tableShip.html.twig' %}*/
/* 				{% endfor %}*/
/* 			</div>*/
/* 			{% endfor %}			*/
/* */
/* */
/* */
/* */
/* {% endblock %}*/
