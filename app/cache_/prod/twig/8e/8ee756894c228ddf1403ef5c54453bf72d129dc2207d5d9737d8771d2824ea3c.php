<?php

/* BaseBundle:Cruise:ship.html.twig */
class __TwigTemplate_f4a5142ff2f016e1448b6a11f48711682a5a24773c1749b7ea2c96d364265320 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "BaseBundle:Cruise:ship.html.twig", 1);
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["document"]) ? $context["document"] : null), "title", array()), "html", null, true);
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo " 
 
<h1>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["document"]) ? $context["document"] : null), "contentTitle", array()), "html", null, true);
        echo "</h1> 

\t";
        // line 10
        echo $this->getAttribute((isset($context["document"]) ? $context["document"] : null), "body", array());
        echo "

\t";
        // line 12
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("BaseBundle:Photo:getPhotos", array("doc_id" => $this->getAttribute((isset($context["document"]) ? $context["document"] : null), "id", array()), "path" => $this->getAttribute((isset($context["document"]) ? $context["document"] : null), "url", array()))));
        echo "\t
\t
\t";
        // line 14
        if ((isset($context["cruises_months"]) ? $context["cruises_months"] : null)) {
            // line 15
            echo "\t<br>
\t<h3>Расписание круизов теплохода «";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ship"]) ? $context["ship"] : null), "title", array()), "html", null, true);
            echo "»</h3>
\t<hr>
\t\t";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["cruises_months"]) ? $context["cruises_months"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["cruises_month"]) {
                // line 19
                echo "\t\t\t<h3>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["cruises_month"], "name", array()), "html", null, true);
                echo "</h3>
\t\t\t";
                // line 20
                $this->loadTemplate("BaseBundle:Cruise:table_cruises.html.twig", "BaseBundle:Cruise:ship.html.twig", 20)->display(array_merge($context, array("cruises" => $this->getAttribute($context["cruises_month"], "row", array()))));
                // line 21
                echo "\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cruises_month'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "\t";
        }
        // line 23
        echo "\t
\t\t
";
    }

    public function getTemplateName()
    {
        return "BaseBundle:Cruise:ship.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 23,  105 => 22,  91 => 21,  89 => 20,  84 => 19,  67 => 18,  62 => 16,  59 => 15,  57 => 14,  52 => 12,  47 => 10,  42 => 8,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block title %}{{document.title}}{% endblock %}*/
/* */
/* {% block body %}*/
/*  */
/*  */
/* <h1>{{ document.contentTitle }}</h1> */
/* */
/* 	{{ document.body| raw }}*/
/* */
/* 	{{ render(controller('BaseBundle:Photo:getPhotos',{doc_id : document.id, path:document.url }))  }}	*/
/* 	*/
/* 	{% if cruises_months %}*/
/* 	<br>*/
/* 	<h3>Расписание круизов теплохода «{{ ship.title }}»</h3>*/
/* 	<hr>*/
/* 		{% for cruises_month in cruises_months %}*/
/* 			<h3>{{cruises_month.name}}</h3>*/
/* 			{% include 'BaseBundle:Cruise:table_cruises.html.twig'  with {'cruises':cruises_month.row} %}*/
/* 		{% endfor %}*/
/* 	{% endif %}*/
/* 	*/
/* 		*/
/* {% endblock %}*/
