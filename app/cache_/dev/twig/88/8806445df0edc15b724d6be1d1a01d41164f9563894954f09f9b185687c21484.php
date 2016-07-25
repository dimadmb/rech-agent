<?php

/* BaseBundle:Cruise:ship.html.twig */
class __TwigTemplate_c41e05b5fc8eed64bcec5b6eed61d3bc55fa982516e07af04f2eb111a28569c4 extends Twig_Template
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
        $__internal_870ef531d86bf26b427a29a30d5e346fbff22ef4dc1e4df9bcc69ec8316342f7 = $this->env->getExtension("native_profiler");
        $__internal_870ef531d86bf26b427a29a30d5e346fbff22ef4dc1e4df9bcc69ec8316342f7->enter($__internal_870ef531d86bf26b427a29a30d5e346fbff22ef4dc1e4df9bcc69ec8316342f7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "BaseBundle:Cruise:ship.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_870ef531d86bf26b427a29a30d5e346fbff22ef4dc1e4df9bcc69ec8316342f7->leave($__internal_870ef531d86bf26b427a29a30d5e346fbff22ef4dc1e4df9bcc69ec8316342f7_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_0f86a03c127f9ca003c456c59f458fab7ddb7ea29f4efdf2054dc04b3ad1f4c3 = $this->env->getExtension("native_profiler");
        $__internal_0f86a03c127f9ca003c456c59f458fab7ddb7ea29f4efdf2054dc04b3ad1f4c3->enter($__internal_0f86a03c127f9ca003c456c59f458fab7ddb7ea29f4efdf2054dc04b3ad1f4c3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["document"]) ? $context["document"] : $this->getContext($context, "document")), "title", array()), "html", null, true);
        
        $__internal_0f86a03c127f9ca003c456c59f458fab7ddb7ea29f4efdf2054dc04b3ad1f4c3->leave($__internal_0f86a03c127f9ca003c456c59f458fab7ddb7ea29f4efdf2054dc04b3ad1f4c3_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_45ae85ca796477b61718c78954de916e4c0d963c9e381285a64d8138903a6d9d = $this->env->getExtension("native_profiler");
        $__internal_45ae85ca796477b61718c78954de916e4c0d963c9e381285a64d8138903a6d9d->enter($__internal_45ae85ca796477b61718c78954de916e4c0d963c9e381285a64d8138903a6d9d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo " 
 
<h1>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["document"]) ? $context["document"] : $this->getContext($context, "document")), "contentTitle", array()), "html", null, true);
        echo "</h1> 

\t";
        // line 10
        echo $this->getAttribute((isset($context["document"]) ? $context["document"] : $this->getContext($context, "document")), "body", array());
        echo "

\t";
        // line 12
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("BaseBundle:Photo:getPhotos", array("doc_id" => $this->getAttribute((isset($context["document"]) ? $context["document"] : $this->getContext($context, "document")), "id", array()), "path" => $this->getAttribute((isset($context["document"]) ? $context["document"] : $this->getContext($context, "document")), "url", array()))));
        echo "\t
\t
\t";
        // line 14
        if ((isset($context["cruises_months"]) ? $context["cruises_months"] : $this->getContext($context, "cruises_months"))) {
            // line 15
            echo "\t<br>
\t<h3>Расписание круизов теплохода «";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ship"]) ? $context["ship"] : $this->getContext($context, "ship")), "title", array()), "html", null, true);
            echo "»</h3>
\t<hr>
\t\t";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["cruises_months"]) ? $context["cruises_months"] : $this->getContext($context, "cruises_months")));
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
        
        $__internal_45ae85ca796477b61718c78954de916e4c0d963c9e381285a64d8138903a6d9d->leave($__internal_45ae85ca796477b61718c78954de916e4c0d963c9e381285a64d8138903a6d9d_prof);

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
        return array (  123 => 23,  120 => 22,  106 => 21,  104 => 20,  99 => 19,  82 => 18,  77 => 16,  74 => 15,  72 => 14,  67 => 12,  62 => 10,  57 => 8,  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
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
