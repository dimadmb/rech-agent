<?php

/* AdminBundle:LoadVodohod:shipPage.html.twig */
class __TwigTemplate_b234fa9f129d948466a9df2569798f5a37bb1bf95b483aa065d9cde47218b8e6 extends Twig_Template
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
        echo "<div class=\"row\">
\t<div class=\"col-sm-3\">
\t\t<a href=\"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["img_main"]) ? $context["img_main"] : null), "html", null, true);
        echo "\" class=\"photo\">
\t\t\t<img class=\"img-responsive\" alt=\"\" src=\"";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["img_main"]) ? $context["img_main"] : null), "html", null, true);
        echo "\"  />
\t\t</a>
\t\t<br>
\t\t<a href=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["img_deck"]) ? $context["img_deck"] : null), "html", null, true);
        echo "\" class=\"photo\">
\t\t\t<img     style=\"border: 2px solid #ccc;    border-radius: 10px;    padding: 10px;\" class=\"img-responsive\" alt=\"\" src=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["img_deck"]) ? $context["img_deck"] : null), "html", null, true);
        echo "\" />
\t\t</a>\t\t
\t\t
\t</div>
\t<div class=\"col-sm-9\">
\t\t";
        // line 13
        echo (isset($context["ship_description"]) ? $context["ship_description"] : null);
        echo "
\t</div>
</div><!--.row-->
";
    }

    public function getTemplateName()
    {
        return "AdminBundle:LoadVodohod:shipPage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 13,  37 => 8,  33 => 7,  27 => 4,  23 => 3,  19 => 1,);
    }
}
/* <div class="row">*/
/* 	<div class="col-sm-3">*/
/* 		<a href="{{img_main}}" class="photo">*/
/* 			<img class="img-responsive" alt="" src="{{img_main}}"  />*/
/* 		</a>*/
/* 		<br>*/
/* 		<a href="{{img_deck}}" class="photo">*/
/* 			<img     style="border: 2px solid #ccc;    border-radius: 10px;    padding: 10px;" class="img-responsive" alt="" src="{{img_deck}}" />*/
/* 		</a>		*/
/* 		*/
/* 	</div>*/
/* 	<div class="col-sm-9">*/
/* 		{{ship_description| raw}}*/
/* 	</div>*/
/* </div><!--.row-->*/
/* */
