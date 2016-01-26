<?php

/* base.html.twig */
class __TwigTemplate_d1636de88d2bf57d56766ef4c66e6fb0683ee71756d602ec3c6ab1377985408c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_3baf552c2d4dfeda1b7675b7d39622f3dd6fa33ec89d2b9d933253b7cd675fbc = $this->env->getExtension("native_profiler");
        $__internal_3baf552c2d4dfeda1b7675b7d39622f3dd6fa33ec89d2b9d933253b7cd675fbc->enter($__internal_3baf552c2d4dfeda1b7675b7d39622f3dd6fa33ec89d2b9d933253b7cd675fbc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_3baf552c2d4dfeda1b7675b7d39622f3dd6fa33ec89d2b9d933253b7cd675fbc->leave($__internal_3baf552c2d4dfeda1b7675b7d39622f3dd6fa33ec89d2b9d933253b7cd675fbc_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_ce7deaf4d338c950c2cd91d8de88a577e0e2c0ca1b94e5cd0642c3b4760ca3dc = $this->env->getExtension("native_profiler");
        $__internal_ce7deaf4d338c950c2cd91d8de88a577e0e2c0ca1b94e5cd0642c3b4760ca3dc->enter($__internal_ce7deaf4d338c950c2cd91d8de88a577e0e2c0ca1b94e5cd0642c3b4760ca3dc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_ce7deaf4d338c950c2cd91d8de88a577e0e2c0ca1b94e5cd0642c3b4760ca3dc->leave($__internal_ce7deaf4d338c950c2cd91d8de88a577e0e2c0ca1b94e5cd0642c3b4760ca3dc_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_607c27747ffb56e16f41ca7f930061d10425af3dec4535a21f9aed88963263c5 = $this->env->getExtension("native_profiler");
        $__internal_607c27747ffb56e16f41ca7f930061d10425af3dec4535a21f9aed88963263c5->enter($__internal_607c27747ffb56e16f41ca7f930061d10425af3dec4535a21f9aed88963263c5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_607c27747ffb56e16f41ca7f930061d10425af3dec4535a21f9aed88963263c5->leave($__internal_607c27747ffb56e16f41ca7f930061d10425af3dec4535a21f9aed88963263c5_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_e673d6086132d31e0c9074f8878f58397646b0d0120ad91638677063b1a5e403 = $this->env->getExtension("native_profiler");
        $__internal_e673d6086132d31e0c9074f8878f58397646b0d0120ad91638677063b1a5e403->enter($__internal_e673d6086132d31e0c9074f8878f58397646b0d0120ad91638677063b1a5e403_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_e673d6086132d31e0c9074f8878f58397646b0d0120ad91638677063b1a5e403->leave($__internal_e673d6086132d31e0c9074f8878f58397646b0d0120ad91638677063b1a5e403_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_774f03b486ba35d985eea210e3ab01befaaed7b90b98d138d67d8b4a12286e27 = $this->env->getExtension("native_profiler");
        $__internal_774f03b486ba35d985eea210e3ab01befaaed7b90b98d138d67d8b4a12286e27->enter($__internal_774f03b486ba35d985eea210e3ab01befaaed7b90b98d138d67d8b4a12286e27_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_774f03b486ba35d985eea210e3ab01befaaed7b90b98d138d67d8b4a12286e27->leave($__internal_774f03b486ba35d985eea210e3ab01befaaed7b90b98d138d67d8b4a12286e27_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
