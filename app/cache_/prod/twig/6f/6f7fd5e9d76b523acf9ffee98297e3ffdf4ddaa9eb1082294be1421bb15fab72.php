<?php

/* BaseBundle:Photo:getPhotos.html.twig */
class __TwigTemplate_6772a465ef1e82abed0cd77ca1a001fbfff116a4c3ec91cc0270cc2ac20a1e75 extends Twig_Template
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
        if ((isset($context["photos"]) ? $context["photos"] : null)) {
            // line 2
            echo "

\t<div class=\"row\">
\t
\t\t<div class=\"col-sm-12\">
\t\t\t<h3>Фотоальбом </h3>
\t\t\t<hr>
\t\t</div>
\t
\t\t";
            // line 11
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["photos"]) ? $context["photos"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["photo"]) {
                // line 12
                echo "\t\t\t<div class=\"col-sm-3 col-lg-2\">
\t\t\t\t<a href=\"";
                // line 13
                echo twig_escape_filter($this->env, $this->getAttribute($context["photo"], "url", array()), "html", null, true);
                echo "\" rel=\"group\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["photo"], "title", array()), "html", null, true);
                echo "\" class=\"photo\">
\t\t\t\t\t<img src=\"";
                // line 14
                echo twig_escape_filter($this->env, $this->getAttribute($context["photo"], "preview", array()), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["photo"], "title", array()), "html", null, true);
                echo "\" class=\"img-responsive\" style=\"margin:0 auto 10px;\">
\t\t\t\t</a>\t\t
\t\t\t</div>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['photo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo "\t
\t</div>

";
        }
    }

    public function getTemplateName()
    {
        return "BaseBundle:Photo:getPhotos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 17,  45 => 14,  39 => 13,  36 => 12,  32 => 11,  21 => 2,  19 => 1,);
    }
}
/* {% if photos %}*/
/* */
/* */
/* 	<div class="row">*/
/* 	*/
/* 		<div class="col-sm-12">*/
/* 			<h3>Фотоальбом </h3>*/
/* 			<hr>*/
/* 		</div>*/
/* 	*/
/* 		{% for photo in photos %}*/
/* 			<div class="col-sm-3 col-lg-2">*/
/* 				<a href="{{photo.url}}" rel="group" title="{{photo.title}}" class="photo">*/
/* 					<img src="{{photo.preview}}" alt="{{photo.title}}" class="img-responsive" style="margin:0 auto 10px;">*/
/* 				</a>		*/
/* 			</div>*/
/* 		{% endfor %}	*/
/* 	</div>*/
/* */
/* {% endif %}*/
