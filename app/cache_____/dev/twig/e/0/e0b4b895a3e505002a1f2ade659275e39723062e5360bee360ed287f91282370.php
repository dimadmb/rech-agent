<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_e0b4b895a3e505002a1f2ade659275e39723062e5360bee360ed287f91282370 extends Twig_Template
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
        $__internal_09149642febaefc760316a088608a7e60a97e21eb60049aa7529c85488cf5a5a = $this->env->getExtension("native_profiler");
        $__internal_09149642febaefc760316a088608a7e60a97e21eb60049aa7529c85488cf5a5a->enter($__internal_09149642febaefc760316a088608a7e60a97e21eb60049aa7529c85488cf5a5a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_09149642febaefc760316a088608a7e60a97e21eb60049aa7529c85488cf5a5a->leave($__internal_09149642febaefc760316a088608a7e60a97e21eb60049aa7529c85488cf5a5a_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_b648c9fc8f3d44a007a2a7cc2f91aeaee362dff5888cfef21782f9b9505b668b = $this->env->getExtension("native_profiler");
        $__internal_b648c9fc8f3d44a007a2a7cc2f91aeaee362dff5888cfef21782f9b9505b668b->enter($__internal_b648c9fc8f3d44a007a2a7cc2f91aeaee362dff5888cfef21782f9b9505b668b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_b648c9fc8f3d44a007a2a7cc2f91aeaee362dff5888cfef21782f9b9505b668b->leave($__internal_b648c9fc8f3d44a007a2a7cc2f91aeaee362dff5888cfef21782f9b9505b668b_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_95efa489462c84540edc0e7a86b3cdcf135d0befc574c894e46402198dd24641 = $this->env->getExtension("native_profiler");
        $__internal_95efa489462c84540edc0e7a86b3cdcf135d0befc574c894e46402198dd24641->enter($__internal_95efa489462c84540edc0e7a86b3cdcf135d0befc574c894e46402198dd24641_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_95efa489462c84540edc0e7a86b3cdcf135d0befc574c894e46402198dd24641->leave($__internal_95efa489462c84540edc0e7a86b3cdcf135d0befc574c894e46402198dd24641_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_46fb5a3e88785b79cdab55c2443a1aea29f2311bf6e2bef22da24692e61e5b57 = $this->env->getExtension("native_profiler");
        $__internal_46fb5a3e88785b79cdab55c2443a1aea29f2311bf6e2bef22da24692e61e5b57->enter($__internal_46fb5a3e88785b79cdab55c2443a1aea29f2311bf6e2bef22da24692e61e5b57_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_46fb5a3e88785b79cdab55c2443a1aea29f2311bf6e2bef22da24692e61e5b57->leave($__internal_46fb5a3e88785b79cdab55c2443a1aea29f2311bf6e2bef22da24692e61e5b57_prof);

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
