<?php

/* FMElfinderBundle:Elfinder/helper:_tinymce.html.twig */
class __TwigTemplate_38beda4fd3c2741d2f9e99cfc15191bb9f0471df824b2be351dbdabde4ca8f46 extends Twig_Template
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
        echo "<script type=\"text/javascript\">
    //<![CDATA[
    function elFinderBrowser (field_name, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file: \"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("elfinder", array("instance" => (isset($context["instance"]) ? $context["instance"] : null))), "html", null, true);
        echo "\",
            title: \"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "\",
            width: ";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : null), "html", null, true);
        echo ",
            height: ";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["height"]) ? $context["height"] : null), "html", null, true);
        echo ",
            resizable: 'yes',
            inline: 'yes',    // This parameter only has an effect if you use the inlinepopups plugin!
            popup_css: false, // Disable TinyMCE's default popup CSS
            close_previous: 'no'
        }, {
            window: win,
            input: field_name
        });
        return false;
    }
    //]]>
</script>
";
    }

    public function getTemplateName()
    {
        return "FMElfinderBundle:Elfinder/helper:_tinymce.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 8,  33 => 7,  29 => 6,  25 => 5,  19 => 1,);
    }
}
/* <script type="text/javascript">*/
/*     //<![CDATA[*/
/*     function elFinderBrowser (field_name, url, type, win) {*/
/*         tinyMCE.activeEditor.windowManager.open({*/
/*             file: "{{ url('elfinder', {'instance': instance}) }}",*/
/*             title: "{{ title }}",*/
/*             width: {{ width }},*/
/*             height: {{ height }},*/
/*             resizable: 'yes',*/
/*             inline: 'yes',    // This parameter only has an effect if you use the inlinepopups plugin!*/
/*             popup_css: false, // Disable TinyMCE's default popup CSS*/
/*             close_previous: 'no'*/
/*         }, {*/
/*             window: win,*/
/*             input: field_name*/
/*         });*/
/*         return false;*/
/*     }*/
/*     //]]>*/
/* </script>*/
/* */
