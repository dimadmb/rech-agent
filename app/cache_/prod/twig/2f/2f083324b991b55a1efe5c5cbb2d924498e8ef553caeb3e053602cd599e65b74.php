<?php

/* FMElfinderBundle:Elfinder:ckeditor.html.twig */
class __TwigTemplate_78d733b57d1167982cc6464f31d9a3b4bf177a89ccf261122151c468c0ed37d8 extends Twig_Template
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
    <meta charset=\"utf-8\">
    ";
        // line 5
        if ((isset($context["includeAssets"]) ? $context["includeAssets"] : null)) {
            // line 6
            echo "        ";
            echo twig_include($this->env, $context, "FMElfinderBundle:Elfinder:helper/assets_css.html.twig");
            echo "
    ";
        }
        // line 8
        echo "</head>
<body>
";
        // line 10
        if ((isset($context["includeAssets"]) ? $context["includeAssets"] : null)) {
            // line 11
            echo "    ";
            echo twig_include($this->env, $context, "FMElfinderBundle:Elfinder:helper/assets_js.html.twig");
            echo "
";
        }
        // line 13
        echo "<script type=\"text/javascript\" charset=\"utf-8\">
    function getUrlParam(paramName) {
        var reParam = new RegExp('(?:[\\?&]|&amp;)' + paramName + '=([^&]+)', 'i') ;
        var match = window.location.search.match(reParam) ;

        return (match && match.length > 1) ? match[1] : '' ;
    }
    \$().ready(function() {
        var funcNum = getUrlParam('CKEditorFuncNum');
        var mode = getUrlParam('mode');

        var f = \$('.elfinder').elfinder({
            url : '";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ef_connect", array("instance" => (isset($context["instance"]) ? $context["instance"] : null), "homeFolder" => (isset($context["homeFolder"]) ? $context["homeFolder"] : null))), "html", null, true);
        echo "'+'?mode='+mode,
            lang : '";
        // line 26
        echo twig_escape_filter($this->env, (isset($context["locale"]) ? $context["locale"] : null), "html", null, true);
        echo "',
            onlyMimes: ";
        // line 27
        echo (isset($context["onlyMimes"]) ? $context["onlyMimes"] : null);
        echo ",
            getFileCallback : function(file) {
                if (funcNum) {
                    ";
        // line 30
        if ((isset($context["relative_path"]) ? $context["relative_path"] : null)) {
            // line 31
            echo "                        window.opener.CKEDITOR.tools.callFunction(funcNum, '";
            echo twig_escape_filter($this->env, (isset($context["pathPrefix"]) ? $context["pathPrefix"] : null), "html", null, true);
            echo "'+file.url.replace(\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "schemeAndHttpHost", array()), "html", null, true);
            echo "/\", \"\"));
                    ";
        } else {
            // line 33
            echo "                        window.opener.CKEDITOR.tools.callFunction(funcNum, file.url);
                    ";
        }
        // line 35
        echo "                    window.close();
                }
            }
        });

        ";
        // line 40
        if ((isset($context["fullscreen"]) ? $context["fullscreen"] : null)) {
            // line 41
            echo "        \$(window).resize(function(){
            var h = \$(window).height();
            var \$ef = \$('.elfinder');
            if(\$ef.height() != h - 20){
                \$ef.height(h -20).resize();
            }
        });
        ";
        }
        // line 49
        echo "    });
</script>
<div class=\"elfinder\"></div>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "FMElfinderBundle:Elfinder:ckeditor.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 49,  96 => 41,  94 => 40,  87 => 35,  83 => 33,  75 => 31,  73 => 30,  67 => 27,  63 => 26,  59 => 25,  45 => 13,  39 => 11,  37 => 10,  33 => 8,  27 => 6,  25 => 5,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <meta charset="utf-8">*/
/*     {% if includeAssets %}*/
/*         {{ include("FMElfinderBundle:Elfinder:helper/assets_css.html.twig") }}*/
/*     {% endif %}*/
/* </head>*/
/* <body>*/
/* {% if includeAssets %}*/
/*     {{ include("FMElfinderBundle:Elfinder:helper/assets_js.html.twig") }}*/
/* {% endif %}*/
/* <script type="text/javascript" charset="utf-8">*/
/*     function getUrlParam(paramName) {*/
/*         var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i') ;*/
/*         var match = window.location.search.match(reParam) ;*/
/* */
/*         return (match && match.length > 1) ? match[1] : '' ;*/
/*     }*/
/*     $().ready(function() {*/
/*         var funcNum = getUrlParam('CKEditorFuncNum');*/
/*         var mode = getUrlParam('mode');*/
/* */
/*         var f = $('.elfinder').elfinder({*/
/*             url : '{{path('ef_connect', {'instance': instance, 'homeFolder': homeFolder })}}'+'?mode='+mode,*/
/*             lang : '{{locale}}',*/
/*             onlyMimes: {{ onlyMimes|raw }},*/
/*             getFileCallback : function(file) {*/
/*                 if (funcNum) {*/
/*                     {% if relative_path %}*/
/*                         window.opener.CKEDITOR.tools.callFunction(funcNum, '{{ pathPrefix }}'+file.url.replace("{{ app.request.schemeAndHttpHost }}/", ""));*/
/*                     {% else %}*/
/*                         window.opener.CKEDITOR.tools.callFunction(funcNum, file.url);*/
/*                     {% endif %}*/
/*                     window.close();*/
/*                 }*/
/*             }*/
/*         });*/
/* */
/*         {% if fullscreen %}*/
/*         $(window).resize(function(){*/
/*             var h = $(window).height();*/
/*             var $ef = $('.elfinder');*/
/*             if($ef.height() != h - 20){*/
/*                 $ef.height(h -20).resize();*/
/*             }*/
/*         });*/
/*         {% endif %}*/
/*     });*/
/* </script>*/
/* <div class="elfinder"></div>*/
/* </body>*/
/* </html>*/
/* */
