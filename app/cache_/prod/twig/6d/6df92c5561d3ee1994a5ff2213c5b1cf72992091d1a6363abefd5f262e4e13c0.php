<?php

/* BaseBundle:Cruise:modal-zayavka-send-mail.html.twig */
class __TwigTemplate_7b95e548811f160a461390a3998eda9a9fe723bae47fce4e52f85984d13e644e extends Twig_Template
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
<p>";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "ship", array()), "html", null, true);
        echo "</p>
<p>";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "start", array()), "html", null, true);
        echo "</p>
<p>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "route", array()), "html", null, true);
        echo "</p>
<p>";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "</p>
<p>";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["phone"]) ? $context["phone"] : null), "html", null, true);
        echo "</p>
<p>";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["email"]) ? $context["email"] : null), "html", null, true);
        echo "</p>
<p>";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["comment"]) ? $context["comment"] : null), "html", null, true);
        echo "</p>


";
    }

    public function getTemplateName()
    {
        return "BaseBundle:Cruise:modal-zayavka-send-mail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 8,  42 => 7,  38 => 6,  34 => 5,  30 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
/* */
/* <p>{{cruise.ship}}</p>*/
/* <p>{{cruise.start}}</p>*/
/* <p>{{cruise.route}}</p>*/
/* <p>{{name}}</p>*/
/* <p>{{phone}}</p>*/
/* <p>{{email}}</p>*/
/* <p>{{comment}}</p>*/
/* */
/* */
/* */
