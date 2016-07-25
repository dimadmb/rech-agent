<?php

/* FMElfinderBundle:Elfinder/helper:assets_css.html.twig */
class __TwigTemplate_27ae2700075af2bc534b2ab59384192027c2faf8fef5dc37c7a396c4e8d20d25 extends Twig_Template
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
        echo "<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl(((((isset($context["prefix"]) ? $context["prefix"] : null) . "/jquery-ui/themes/") . (isset($context["theme"]) ? $context["theme"] : null)) . "/jquery-ui.min.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
<link href=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl(((isset($context["prefix"]) ? $context["prefix"] : null) . "/elfinder/dist/css/elfinder.min.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
<link href=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl(((isset($context["prefix"]) ? $context["prefix"] : null) . "/elfinder/dist/css/theme.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">

";
    }

    public function getTemplateName()
    {
        return "FMElfinderBundle:Elfinder/helper:assets_css.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 3,  24 => 2,  19 => 1,);
    }
}
/* <link href="{{ asset("#{prefix}/jquery-ui/themes/#{theme}/jquery-ui.min.css") }}" rel="stylesheet" type="text/css">*/
/* <link href="{{ asset("#{prefix}/elfinder/dist/css/elfinder.min.css") }}" rel="stylesheet" type="text/css">*/
/* <link href="{{ asset("#{prefix}/elfinder/dist/css/theme.css") }}" rel="stylesheet" type="text/css">*/
/* */
/* */
