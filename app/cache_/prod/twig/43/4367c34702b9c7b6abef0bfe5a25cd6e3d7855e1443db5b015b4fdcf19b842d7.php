<?php

/* FMElfinderBundle:Elfinder/helper:_tinymce4.html.twig */
class __TwigTemplate_4161046c7e2a5ea087353b2b525aa064f26b0b66825b92a1ac6a75072489ca30 extends Twig_Template
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
    function elFinderBrowser (field_name, url, type, win) {
        tinymce.activeEditor.windowManager.open({
            file:\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("elfinder", array("instance" => (isset($context["instance"]) ? $context["instance"] : null))), "html", null, true);
        echo "\",
            title: \"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "\",
            width: ";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : null), "html", null, true);
        echo ",
            height: ";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["height"]) ? $context["height"] : null), "html", null, true);
        echo ",
            resizable: 'yes'
        }, {
            setUrl: function (url) {
                win.document.getElementById(field_name).value = url;
            }
        });
        return false;
    }
</script>
";
    }

    public function getTemplateName()
    {
        return "FMElfinderBundle:Elfinder/helper:_tinymce4.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 7,  32 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }
}
/* <script type="text/javascript">*/
/*     function elFinderBrowser (field_name, url, type, win) {*/
/*         tinymce.activeEditor.windowManager.open({*/
/*             file:"{{ url('elfinder', {'instance': instance}) }}",*/
/*             title: "{{ title }}",*/
/*             width: {{ width }},*/
/*             height: {{ height }},*/
/*             resizable: 'yes'*/
/*         }, {*/
/*             setUrl: function (url) {*/
/*                 win.document.getElementById(field_name).value = url;*/
/*             }*/
/*         });*/
/*         return false;*/
/*     }*/
/* </script>*/
/* */
