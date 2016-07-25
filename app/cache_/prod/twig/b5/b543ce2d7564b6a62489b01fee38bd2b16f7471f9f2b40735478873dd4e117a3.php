<?php

/* FMElfinderBundle:Elfinder/helper:assets_js.html.twig */
class __TwigTemplate_61883c1b2c0759c5b007ea7ccb7c6d0b812d62e25c94457902ac13a08a051cba extends Twig_Template
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
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl(((isset($context["prefix"]) ? $context["prefix"] : null) . "/jquery/jquery.js")), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl(((isset($context["prefix"]) ? $context["prefix"] : null) . "/jquery-ui/jquery-ui.min.js")), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl(((isset($context["prefix"]) ? $context["prefix"] : null) . "/elfinder/dist/js/elfinder.min.js")), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl(((((isset($context["prefix"]) ? $context["prefix"] : null) . "/elfinder/dist/js/i18n/elfinder.") . (isset($context["locale"]) ? $context["locale"] : null)) . ".js")), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "FMElfinderBundle:Elfinder/helper:assets_js.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 4,  28 => 3,  24 => 2,  19 => 1,);
    }
}
/* <script src="{{ asset("#{prefix}/jquery/jquery.js") }}"></script>*/
/* <script src="{{ asset("#{prefix}/jquery-ui/jquery-ui.min.js") }}"></script>*/
/* <script src="{{ asset("#{prefix}/elfinder/dist/js/elfinder.min.js") }}"></script>*/
/* <script src="{{ asset("#{prefix}/elfinder/dist/js/i18n/elfinder.#{locale}.js") }}"></script>*/
/* */
