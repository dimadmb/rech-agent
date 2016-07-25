<?php

/* AdminBundle::baseadmin.html.twig */
class __TwigTemplate_a8bf58a287aacadf4cebbd14dd7b63707006a9c48cca8ea5488e5d5596b4bdf5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

\t <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("_admin/css/style.css"), "html", null, true);
        echo "\">\t
\t
    <!-- Bootstrap -->
\t <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\">
\t <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/bootstrap-theme.css"), "html", null, true);
        echo "\">

\t 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
      <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->
  </head>
  <body>
  <nav class=\"navbar navbar-default navbar-inverse navbar-static-top navbar-admin\" role=\"navigation\">
\t<div class=\"container-fluid\">
\t\t";
        // line 29
        echo "\t\t<a class=\"navbar-brand\" href=\"";
        echo $this->env->getExtension('routing')->getPath("loadvodohod");
        echo "\">Загрузить с Водохода</a>
\t\t<a class=\"navbar-brand navbar-right \" href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\">На сайт</a>
\t</div>
  </nav>
  <div class=\"container-fluid\">
   <div class=\"row\">
\t<div class=\"col-sm-12\">
\t\t";
        // line 36
        $this->displayBlock('body', $context, $blocks);
        // line 37
        echo "\t</div>
   </div>
\t\t
  </div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>\t
\t<!-- Latest compiled and minified JavaScript -->
\t<script src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
  </body>
</html>\t\t
\t\t

";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
    }

    // line 36
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "AdminBundle::baseadmin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 36,  96 => 7,  86 => 44,  77 => 37,  75 => 36,  66 => 30,  61 => 29,  44 => 13,  40 => 12,  34 => 9,  29 => 7,  21 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*   <head>*/
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1">*/
/*     <title>{% block title %}{% endblock %}</title>*/
/* */
/* 	 <link rel="stylesheet" href="{{ asset('_admin/css/style.css') }}">	*/
/* 	*/
/*     <!-- Bootstrap -->*/
/* 	 <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">*/
/* 	 <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}">*/
/* */
/* 	 */
/* */
/*     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->*/
/*     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/*     <!--[if lt IE 9]>*/
/*       <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>*/
/*       <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>*/
/*     <![endif]-->*/
/*   </head>*/
/*   <body>*/
/*   <nav class="navbar navbar-default navbar-inverse navbar-static-top navbar-admin" role="navigation">*/
/* 	<div class="container-fluid">*/
/* 		{#<a class="navbar-brand" href="{{path('admin')}}">Домой</a>*/
/* 		<a class="navbar-brand" href="{{path('loadship')}}">Загрузить теплоход</a>#}*/
/* 		<a class="navbar-brand" href="{{path('loadvodohod')}}">Загрузить с Водохода</a>*/
/* 		<a class="navbar-brand navbar-right " href="{{path('homepage')}}">На сайт</a>*/
/* 	</div>*/
/*   </nav>*/
/*   <div class="container-fluid">*/
/*    <div class="row">*/
/* 	<div class="col-sm-12">*/
/* 		{% block body %}{% endblock %}*/
/* 	</div>*/
/*    </div>*/
/* 		*/
/*   </div>*/
/*     <!-- Placed at the end of the document so the pages load faster -->*/
/*     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>	*/
/* 	<!-- Latest compiled and minified JavaScript -->*/
/* 	<script src="{{ asset('js/bootstrap.js') }}"></script>*/
/*   </body>*/
/* </html>		*/
/* 		*/
/* */
/* */
