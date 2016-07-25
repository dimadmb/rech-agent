<?php

/* BaseBundle:Document:index.html.twig */
class __TwigTemplate_285b65136d78c96b8fd4bd6f1b94289d950d9c8eefc022e61a2342b12446dd53 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "BaseBundle:Document:index.html.twig", 1);
        $this->blocks = array(
            'description' => array($this, 'block_description'),
            'keywords' => array($this, 'block_keywords'),
            'title' => array($this, 'block_title'),
            'carousel' => array($this, 'block_carousel'),
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
    public function block_description($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["document"]) ? $context["document"] : null), "description", array()), "html", null, true);
    }

    // line 4
    public function block_keywords($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["document"]) ? $context["document"] : null), "keywords", array()), "html", null, true);
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["document"]) ? $context["document"] : null), "title", array()), "html", null, true);
    }

    // line 7
    public function block_carousel($context, array $blocks = array())
    {
        // line 8
        echo "    <!-- Header Carousel -->
    <header id=\"myCarousel\" class=\"carousel slide\" style=\"background: #4383BE;\">
        <!-- Indicators -->
        <ol class=\"carousel-indicators hidden-xs\">
            <li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class=\"carousel-inner\">
            <div class=\"item active\">

\t\t\t\t\t<img src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/slider/slide-1.png"), "html", null, true);
        echo "\" alt=\"\">

                <div class=\"carousel-caption\">
                    
                </div>
            </div>
            <div class=\"item\">

\t\t\t\t\t<img src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/slider/slide-2.png"), "html", null, true);
        echo "\" alt=\"\">

                <div class=\"carousel-caption\">
                    
                </div>
            </div>
            <div class=\"item\">

\t\t\t\t\t<img src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/slider/slide-3.png"), "html", null, true);
        echo "\" alt=\"\">

                <div class=\"carousel-caption\">
                    
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class=\"left carousel-control\" href=\"#myCarousel\" data-slide=\"prev\">
            <span class=\"icon-prev\"></span>
        </a>
        <a class=\"right carousel-control\" href=\"#myCarousel\" data-slide=\"next\">
            <span class=\"icon-next\"></span>
        </a>
    </header>
";
    }

    // line 55
    public function block_body($context, array $blocks = array())
    {
        // line 56
        echo "
<!--
тут разместим спецпредложения
-->

<div class=\"row specpredlozeniya\">
\t<div class=\"col-sm-4\"><a href=\"";
        // line 62
        echo $this->env->getExtension('routing')->getPath("specialoffer", array("offer" => "burningcruise"));
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/template/gk.png"), "html", null, true);
        echo "\" alt=\"«Горящие» круизы\" class=\"img-responsive\"></a><br></div>

\t<div class=\"col-sm-4\"><a href=\"";
        // line 64
        echo $this->env->getExtension('routing')->getPath("specialoffer", array("offer" => "specialoffer"));
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/template/st.png"), "html", null, true);
        echo "\" alt=\"Специальные тарифы\" class=\"img-responsive\"></a><br></div>
\t
\t<div class=\"col-sm-4\"><a href=\"//booking.rech-agent.ru/\"><img src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/template/online.png"), "html", null, true);
        echo "\" alt=\"Купить онлайн\" class=\"img-responsive\"></a><br></div>
</div>

\t<div class=\"row\">
\t";
        // line 70
        echo $this->getAttribute((isset($context["document"]) ? $context["document"] : null), "body", array());
        echo "
\t</div>

\t
\t";
        // line 74
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 75
            echo "\t\t<a class=\"btn btn-success\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_edit", array("id" => $this->getAttribute((isset($context["document"]) ? $context["document"] : null), "id", array()))), "html", null, true);
            echo "\">Редактировать</a>
\t";
        }
        // line 76
        echo "\t
\t
";
    }

    public function getTemplateName()
    {
        return "BaseBundle:Document:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 76,  152 => 75,  150 => 74,  143 => 70,  136 => 66,  129 => 64,  122 => 62,  114 => 56,  111 => 55,  90 => 37,  79 => 29,  68 => 21,  53 => 8,  50 => 7,  44 => 5,  38 => 4,  32 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block description %}{{document.description}}{% endblock %}*/
/* {% block keywords %}{{document.keywords}}{% endblock %}*/
/* {% block title %}{{document.title}}{% endblock %}*/
/* */
/* {% block carousel%}*/
/*     <!-- Header Carousel -->*/
/*     <header id="myCarousel" class="carousel slide" style="background: #4383BE;">*/
/*         <!-- Indicators -->*/
/*         <ol class="carousel-indicators hidden-xs">*/
/*             <li data-target="#myCarousel" data-slide-to="0" class="active"></li>*/
/*             <li data-target="#myCarousel" data-slide-to="1"></li>*/
/*             <li data-target="#myCarousel" data-slide-to="2"></li>*/
/*         </ol>*/
/* */
/*         <!-- Wrapper for slides -->*/
/*         <div class="carousel-inner">*/
/*             <div class="item active">*/
/* */
/* 					<img src="{{asset('images/slider/slide-1.png')}}" alt="">*/
/* */
/*                 <div class="carousel-caption">*/
/*                     */
/*                 </div>*/
/*             </div>*/
/*             <div class="item">*/
/* */
/* 					<img src="{{asset('images/slider/slide-2.png')}}" alt="">*/
/* */
/*                 <div class="carousel-caption">*/
/*                     */
/*                 </div>*/
/*             </div>*/
/*             <div class="item">*/
/* */
/* 					<img src="{{asset('images/slider/slide-3.png')}}" alt="">*/
/* */
/*                 <div class="carousel-caption">*/
/*                     */
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/* */
/*         <!-- Controls -->*/
/*         <a class="left carousel-control" href="#myCarousel" data-slide="prev">*/
/*             <span class="icon-prev"></span>*/
/*         </a>*/
/*         <a class="right carousel-control" href="#myCarousel" data-slide="next">*/
/*             <span class="icon-next"></span>*/
/*         </a>*/
/*     </header>*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/* */
/* <!--*/
/* тут разместим спецпредложения*/
/* -->*/
/* */
/* <div class="row specpredlozeniya">*/
/* 	<div class="col-sm-4"><a href="{{path('specialoffer',{'offer':'burningcruise'})}}"><img src="{{asset('images/template/gk.png')}}" alt="«Горящие» круизы" class="img-responsive"></a><br></div>*/
/* */
/* 	<div class="col-sm-4"><a href="{{path('specialoffer',{'offer':'specialoffer'})}}"><img src="{{asset('images/template/st.png')}}" alt="Специальные тарифы" class="img-responsive"></a><br></div>*/
/* 	*/
/* 	<div class="col-sm-4"><a href="//booking.rech-agent.ru/"><img src="{{asset('images/template/online.png')}}" alt="Купить онлайн" class="img-responsive"></a><br></div>*/
/* </div>*/
/* */
/* 	<div class="row">*/
/* 	{{ document.body | raw}}*/
/* 	</div>*/
/* */
/* 	*/
/* 	{% if is_granted('ROLE_ADMIN') %}*/
/* 		<a class="btn btn-success" href="{{path('page_edit',{'id':document.id})}}">Редактировать</a>*/
/* 	{% endif %}	*/
/* 	*/
/* {% endblock %}*/
/* */
/* */
