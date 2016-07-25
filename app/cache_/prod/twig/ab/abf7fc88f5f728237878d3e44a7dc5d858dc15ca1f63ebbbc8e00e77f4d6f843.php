<?php

/* FMElfinderBundle:Elfinder:simple.html.twig */
class __TwigTemplate_1c7ff973963d5b6b5bf20f8d361cc8de3e268af76729845bd4f6986add7962c9 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
<head>
    ";
        // line 4
        if ((isset($context["includeAssets"]) ? $context["includeAssets"] : null)) {
            // line 5
            echo "        ";
            echo twig_include($this->env, $context, "FMElfinderBundle:Elfinder:helper/assets_css.html.twig");
            echo "
    ";
        }
        // line 7
        echo "</head>
<body>
";
        // line 9
        if ((isset($context["includeAssets"]) ? $context["includeAssets"] : null)) {
            // line 10
            echo "    ";
            echo twig_include($this->env, $context, "FMElfinderBundle:Elfinder:helper/assets_js.html.twig");
            echo "
";
        }
        // line 12
        echo "<script type=\"text/javascript\" charset=\"utf-8\">
    \$().ready(function() {
        var \$f = \$('.elfinder').elfinder({
            url : '";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ef_connect", array("instance" => (isset($context["instance"]) ? $context["instance"] : null), "homeFolder" => (isset($context["homeFolder"]) ? $context["homeFolder"] : null))), "html", null, true);
        echo "',
            lang : '";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["locale"]) ? $context["locale"] : null), "html", null, true);
        echo "',
            onlyMimes: ";
        // line 17
        echo (isset($context["onlyMimes"]) ? $context["onlyMimes"] : null);
        echo "
        });

        ";
        // line 20
        if ((isset($context["fullscreen"]) ? $context["fullscreen"] : null)) {
            // line 21
            echo "        var \$window = \$(window);
        \$window.resize(function(){
            var \$win_height = \$window.height();
            if( \$f.height() != \$win_height ){
                \$f.height(\$win_height).resize();
            }
        });
        ";
        }
        // line 29
        echo "    });
</script>
<div class=\"elfinder\"></div>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "FMElfinderBundle:Elfinder:simple.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 29,  65 => 21,  63 => 20,  57 => 17,  53 => 16,  49 => 15,  44 => 12,  38 => 10,  36 => 9,  32 => 7,  26 => 5,  24 => 4,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     {% if includeAssets %}*/
/*         {{ include("FMElfinderBundle:Elfinder:helper/assets_css.html.twig") }}*/
/*     {% endif %}*/
/* </head>*/
/* <body>*/
/* {% if includeAssets %}*/
/*     {{ include("FMElfinderBundle:Elfinder:helper/assets_js.html.twig") }}*/
/* {% endif %}*/
/* <script type="text/javascript" charset="utf-8">*/
/*     $().ready(function() {*/
/*         var $f = $('.elfinder').elfinder({*/
/*             url : '{{path('ef_connect', { 'instance': instance, 'homeFolder': homeFolder } )}}',*/
/*             lang : '{{locale}}',*/
/*             onlyMimes: {{ onlyMimes|raw }}*/
/*         });*/
/* */
/*         {% if fullscreen %}*/
/*         var $window = $(window);*/
/*         $window.resize(function(){*/
/*             var $win_height = $window.height();*/
/*             if( $f.height() != $win_height ){*/
/*                 $f.height($win_height).resize();*/
/*             }*/
/*         });*/
/*         {% endif %}*/
/*     });*/
/* </script>*/
/* <div class="elfinder"></div>*/
/* </body>*/
/* </html>*/
/* */
