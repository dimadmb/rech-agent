<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_6ab63400b4728bbde69f4ecf9301889e3eaa5a06828beda6735a26d03df6a180 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_dabd82004beb2822f63d105d7439237bc4a80fdec2bb3e089970b4fddb686fbc = $this->env->getExtension("native_profiler");
        $__internal_dabd82004beb2822f63d105d7439237bc4a80fdec2bb3e089970b4fddb686fbc->enter($__internal_dabd82004beb2822f63d105d7439237bc4a80fdec2bb3e089970b4fddb686fbc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_dabd82004beb2822f63d105d7439237bc4a80fdec2bb3e089970b4fddb686fbc->leave($__internal_dabd82004beb2822f63d105d7439237bc4a80fdec2bb3e089970b4fddb686fbc_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_0c8ad36071d751416ec5423fa44edadfd6b1a553aa1310711b14441e2749249b = $this->env->getExtension("native_profiler");
        $__internal_0c8ad36071d751416ec5423fa44edadfd6b1a553aa1310711b14441e2749249b->enter($__internal_0c8ad36071d751416ec5423fa44edadfd6b1a553aa1310711b14441e2749249b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_0c8ad36071d751416ec5423fa44edadfd6b1a553aa1310711b14441e2749249b->leave($__internal_0c8ad36071d751416ec5423fa44edadfd6b1a553aa1310711b14441e2749249b_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_c5a1ebd545a49fd47720487ec19ad69e73bca08d7e71d0f823a31afa302a0561 = $this->env->getExtension("native_profiler");
        $__internal_c5a1ebd545a49fd47720487ec19ad69e73bca08d7e71d0f823a31afa302a0561->enter($__internal_c5a1ebd545a49fd47720487ec19ad69e73bca08d7e71d0f823a31afa302a0561_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_c5a1ebd545a49fd47720487ec19ad69e73bca08d7e71d0f823a31afa302a0561->leave($__internal_c5a1ebd545a49fd47720487ec19ad69e73bca08d7e71d0f823a31afa302a0561_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_e73504b587248e90fe94782707bc2c837e3e009fb82ef911fe2b2b0b7c78477a = $this->env->getExtension("native_profiler");
        $__internal_e73504b587248e90fe94782707bc2c837e3e009fb82ef911fe2b2b0b7c78477a->enter($__internal_e73504b587248e90fe94782707bc2c837e3e009fb82ef911fe2b2b0b7c78477a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_e73504b587248e90fe94782707bc2c837e3e009fb82ef911fe2b2b0b7c78477a->leave($__internal_e73504b587248e90fe94782707bc2c837e3e009fb82ef911fe2b2b0b7c78477a_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends 'TwigBundle::layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include 'TwigBundle:Exception:exception.html.twig' %}*/
/* {% endblock %}*/
/* */
