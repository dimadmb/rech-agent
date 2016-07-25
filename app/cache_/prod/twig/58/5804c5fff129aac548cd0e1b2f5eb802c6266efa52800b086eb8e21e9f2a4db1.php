<?php

/* BaseBundle:ZayavkaSendAjax:index.html.twig */
class __TwigTemplate_91489b5e0f0a627a332ff1fec80c8ce25f587c64e3e5e9d3596f19b49311c1fa extends Twig_Template
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
        echo "
";
        // line 2
        echo (isset($context["answer"]) ? $context["answer"] : null);
        echo "
<p style=\"color:creen;\">Ваша заявка успешно отправлена</p>
";
    }

    public function getTemplateName()
    {
        return "BaseBundle:ZayavkaSendAjax:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,);
    }
}
/* */
/* {{answer | raw}}*/
/* <p style="color:creen;">Ваша заявка успешно отправлена</p>*/
/* */
