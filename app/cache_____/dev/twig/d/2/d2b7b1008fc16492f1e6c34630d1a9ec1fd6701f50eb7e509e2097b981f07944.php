<?php

/* TwigBundle:Exception:traces.txt.twig */
class __TwigTemplate_d2b7b1008fc16492f1e6c34630d1a9ec1fd6701f50eb7e509e2097b981f07944 extends Twig_Template
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
        $__internal_767554e26eeb2e1b3297a12809c740eac618492db308bfa18e88e5d3742023e9 = $this->env->getExtension("native_profiler");
        $__internal_767554e26eeb2e1b3297a12809c740eac618492db308bfa18e88e5d3742023e9->enter($__internal_767554e26eeb2e1b3297a12809c740eac618492db308bfa18e88e5d3742023e9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:traces.txt.twig"));

        // line 1
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "trace", array()))) {
            // line 2
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "trace", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["trace"]) {
                // line 3
                $this->loadTemplate("TwigBundle:Exception:trace.txt.twig", "TwigBundle:Exception:traces.txt.twig", 3)->display(array("trace" => $context["trace"]));
                // line 4
                echo "
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['trace'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        
        $__internal_767554e26eeb2e1b3297a12809c740eac618492db308bfa18e88e5d3742023e9->leave($__internal_767554e26eeb2e1b3297a12809c740eac618492db308bfa18e88e5d3742023e9_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:traces.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 4,  28 => 3,  24 => 2,  22 => 1,);
    }
}
