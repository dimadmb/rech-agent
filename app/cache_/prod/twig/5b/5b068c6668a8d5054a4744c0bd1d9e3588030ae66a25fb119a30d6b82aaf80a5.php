<?php

/* BaseBundle:Security:login.html.twig */
class __TwigTemplate_20d432cc96d382c224580c8616fdee2783f0922d4c972179ad8178e477f65e18 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "BaseBundle:Security:login.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Авторизация";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 7
            echo "        <div class=\"error\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "message", array()), "html", null, true);
            echo "</div>
    ";
        }
        // line 9
        echo " 
    <form class=\"login_form\" action=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("_security_check");
        echo "\" method=\"POST\">
        <table >
            <tr>
                <td>
                    <label for=\"username\">Логин:</label>
                </td>
                <td>
                    <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for=\"password\">Пароль:</label>
                </td>
                <td>
                    <input type=\"password\" id=\"password\" name=\"_password\" />
                </td>
            </tr>
        </table>
        <input type=\"submit\" name=\"login\" value=\"Войти\" />
    </form>
\t
";
    }

    public function getTemplateName()
    {
        return "BaseBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 17,  50 => 10,  47 => 9,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block title %}Авторизация{% endblock %}*/
/* */
/* {% block body %}*/
/*     {% if error %}*/
/*         <div class="error">{{ error.message }}</div>*/
/*     {% endif %}*/
/*  */
/*     <form class="login_form" action="{{ path('_security_check') }}" method="POST">*/
/*         <table >*/
/*             <tr>*/
/*                 <td>*/
/*                     <label for="username">Логин:</label>*/
/*                 </td>*/
/*                 <td>*/
/*                     <input type="text" id="username" name="_username" value="{{ last_username }}" />*/
/*                 </td>*/
/*             </tr>*/
/*             <tr>*/
/*                 <td>*/
/*                     <label for="password">Пароль:</label>*/
/*                 </td>*/
/*                 <td>*/
/*                     <input type="password" id="password" name="_password" />*/
/*                 </td>*/
/*             </tr>*/
/*         </table>*/
/*         <input type="submit" name="login" value="Войти" />*/
/*     </form>*/
/* 	*/
/* {% endblock %} */
