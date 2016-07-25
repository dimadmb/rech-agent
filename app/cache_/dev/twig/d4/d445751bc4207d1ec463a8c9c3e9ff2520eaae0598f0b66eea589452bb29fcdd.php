<?php

/* FMElfinderBundle:Form:elfinder_widget.html.twig */
class __TwigTemplate_3b786916c2a9f01b35330f8ef3f10391949e8c48eb535bb282e55b6465135a76 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'elfinder_widget' => array($this, 'block_elfinder_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_a2f1c238684a8e1fc89378b4319fa031e7c33600756e09b3c49f09a2c4760588 = $this->env->getExtension("native_profiler");
        $__internal_a2f1c238684a8e1fc89378b4319fa031e7c33600756e09b3c49f09a2c4760588->enter($__internal_a2f1c238684a8e1fc89378b4319fa031e7c33600756e09b3c49f09a2c4760588_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FMElfinderBundle:Form:elfinder_widget.html.twig"));

        // line 1
        $this->displayBlock('elfinder_widget', $context, $blocks);
        
        $__internal_a2f1c238684a8e1fc89378b4319fa031e7c33600756e09b3c49f09a2c4760588->leave($__internal_a2f1c238684a8e1fc89378b4319fa031e7c33600756e09b3c49f09a2c4760588_prof);

    }

    public function block_elfinder_widget($context, array $blocks = array())
    {
        $__internal_5743bdaf40cc9a6803f56097baa4122cfb168bfcd0c959f97a5211926b89c192 = $this->env->getExtension("native_profiler");
        $__internal_5743bdaf40cc9a6803f56097baa4122cfb168bfcd0c959f97a5211926b89c192->enter($__internal_5743bdaf40cc9a6803f56097baa4122cfb168bfcd0c959f97a5211926b89c192_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "elfinder_widget"));

        // line 2
        echo "    <input type=\"text\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " ";
        if ( !twig_test_empty((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")))) {
            echo "value=\"";
            echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "html", null, true);
            echo "\" ";
        }
        echo " data-type=\"elfinder-input-field\" />
    ";
        // line 3
        if (((isset($context["enable"]) ? $context["enable"] : $this->getContext($context, "enable")) && array_key_exists("instance", $context))) {
            // line 4
            echo "        <script type=\"text/javascript\" charset=\"utf-8\">
            document.addEventListener(\"DOMContentLoaded\", function(event) {
                \$('[data-type=\"elfinder-input-field\"][id=\"";
            // line 6
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "\"]').on(\"click\",function() {
                    var childWin = window.open(\"";
            // line 7
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("elfinder", array("instance" => (isset($context["instance"]) ? $context["instance"] : $this->getContext($context, "instance")), "homeFolder" => (isset($context["homeFolder"]) ? $context["homeFolder"] : $this->getContext($context, "homeFolder")))), "html", null, true);
            echo "?id=";
            echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
            echo "\", \"popupWindow\", \"height=450, width=900\");
                });
            });
            
            function setValue(value, element_id) {
                \$('[data-type=\"elfinder-input-field\"]' + (element_id ? '[id=\"'+ element_id +'\"]': '')).val(value).change();
            }
        </script>
    ";
        }
        
        $__internal_5743bdaf40cc9a6803f56097baa4122cfb168bfcd0c959f97a5211926b89c192->leave($__internal_5743bdaf40cc9a6803f56097baa4122cfb168bfcd0c959f97a5211926b89c192_prof);

    }

    public function getTemplateName()
    {
        return "FMElfinderBundle:Form:elfinder_widget.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  56 => 7,  52 => 6,  48 => 4,  46 => 3,  35 => 2,  23 => 1,);
    }
}
/* {% block elfinder_widget %}*/
/*     <input type="text" {{ block('widget_attributes') }} {% if value is not empty %}value="{{ value }}" {% endif %} data-type="elfinder-input-field" />*/
/*     {% if enable and instance is defined %}*/
/*         <script type="text/javascript" charset="utf-8">*/
/*             document.addEventListener("DOMContentLoaded", function(event) {*/
/*                 $('[data-type="elfinder-input-field"][id="{{ id }}"]').on("click",function() {*/
/*                     var childWin = window.open("{{path('elfinder', {'instance': instance, 'homeFolder': homeFolder })}}?id={{ id }}", "popupWindow", "height=450, width=900");*/
/*                 });*/
/*             });*/
/*             */
/*             function setValue(value, element_id) {*/
/*                 $('[data-type="elfinder-input-field"]' + (element_id ? '[id="'+ element_id +'"]': '')).val(value).change();*/
/*             }*/
/*         </script>*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
