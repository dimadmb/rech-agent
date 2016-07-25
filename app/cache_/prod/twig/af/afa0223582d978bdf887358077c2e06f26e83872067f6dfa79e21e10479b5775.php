<?php

/* BaseBundle:Ship:tableShip.html.twig */
class __TwigTemplate_deadceb6a07cb5e452306d62e075d78911d737e80f4e2f7e8ca4feac644cae1f extends Twig_Template
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
        echo "<div class=\"col-sm-6 clearfix\" style=\"margin-bottom:10px;\">
\t<p style=\"font-size:16px; text-align:center;\" >
\t\t<a   href=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page", array("first" => "cruise", "second" => "ship", "name" => $this->getAttribute((isset($context["ship"]) ? $context["ship"] : null), "code", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ship"]) ? $context["ship"] : null), "title", array()), "html", null, true);
        echo "</a><br>
\t</p>
\t
\t<div style=\"float:left; padding-right:10px;     width: 100%; \">

\t\t\t<a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page", array("first" => "cruise", "second" => "ship", "name" => $this->getAttribute((isset($context["ship"]) ? $context["ship"] : null), "code", array()))), "html", null, true);
        echo "\">
\t\t\t\t<img src=\"/images/ship/";
        // line 9
        echo twig_escape_filter($this->env, ((($this->getAttribute((isset($context["ship"]) ? $context["ship"] : null), "code", array()) . "/") . $this->getAttribute((isset($context["ship"]) ? $context["ship"] : null), "code", array())) . "-main.jpg"), "html", null, true);
        echo "\" class=\"img-responsive\"  alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ship"]) ? $context["ship"] : null), "title", array()), "html", null, true);
        echo "\" style=\" margin:0 auto 15px;\" >
\t\t\t</a>

\t</div>
\t<div style=\"float:left; padding-left:0px; padding-top:0px;\">\t
\t";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["ship"]) ? $context["ship"] : null), "properties", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["property"]) {
            // line 15
            echo "\t\t<p>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "n", array()), "html", null, true);
            echo " : ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "v", array()), "html", null, true);
            echo "</p>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['property'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "BaseBundle:Ship:tableShip.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 17,  51 => 15,  47 => 14,  37 => 9,  33 => 8,  23 => 3,  19 => 1,);
    }
}
/* <div class="col-sm-6 clearfix" style="margin-bottom:10px;">*/
/* 	<p style="font-size:16px; text-align:center;" >*/
/* 		<a   href="{{path('page',{'first':'cruise','second':'ship','name':ship.code})}}">{{ship.title}}</a><br>*/
/* 	</p>*/
/* 	*/
/* 	<div style="float:left; padding-right:10px;     width: 100%; ">*/
/* */
/* 			<a href="{{path('page',{'first':'cruise','second':'ship','name':ship.code})}}">*/
/* 				<img src="/images/ship/{{ship.code~'/'~ship.code~'-main.jpg'}}" class="img-responsive"  alt="{{ship.title}}" style=" margin:0 auto 15px;" >*/
/* 			</a>*/
/* */
/* 	</div>*/
/* 	<div style="float:left; padding-left:0px; padding-top:0px;">	*/
/* 	{% for property in ship.properties %}*/
/* 		<p>{{property.n}} : {{property.v}}</p>*/
/* 	{% endfor %}*/
/* 	</div>*/
/* </div>*/
