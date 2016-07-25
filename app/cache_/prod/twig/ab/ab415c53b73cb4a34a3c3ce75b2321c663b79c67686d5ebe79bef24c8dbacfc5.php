<?php

/* base.html.twig */
class __TwigTemplate_8fb23e7a201260d0ac7088279b1b44d5dd8e20536b11e8db299ccf12145f01ef extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'description' => array($this, 'block_description'),
            'keywords' => array($this, 'block_keywords'),
            'title' => array($this, 'block_title'),
            'carousel' => array($this, 'block_carousel'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>

    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">

    <meta name=\"description\" content=\"";
        // line 9
        $this->displayBlock('description', $context, $blocks);
        echo "\">
    <meta name=\"keywords\" content=\"";
        // line 10
        $this->displayBlock('keywords', $context, $blocks);
        echo "\">
    <meta name=\"author\" content=\"\">

    <title>";
        // line 13
        $this->displayBlock('title', $context, $blocks);
        echo "</title>


\t
\t <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\">
\t <link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/bootstrap-theme.css"), "html", null, true);
        echo "\">
\t <link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/bootstrap-slider.css"), "html", null, true);
        echo "\">
\t <link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\">
\t <link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/fancybox/jquery.fancybox.css"), "html", null, true);
        echo "\">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
        <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class=\"navbar navbar-default navbar-inverse navbar-static-top\" role=\"navigation\">
        <div class=\"container header-volna\" style=\"padding-top:30px; position:relative;\">
            <a  href=\"";
        // line 37
        echo $this->env->getExtension('routing')->getPath("homepage");
        echo "\"><img style=\" margin-top:-25px; max-width:100%\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/template/logo.png"), "html", null, true);
        echo "\" alt=\"Речное агентство\"></a>

\t\t\t<div style=\"position:absolute; right:400px; top:30px; \" >
\t\t\t<a class=\"navbar-brand navbar-right hidden-xs\" style=\"font-size: 24px;\" href=\"";
        // line 40
        echo $this->env->getExtension('routing')->getPath("page_small", array("first" => "contacts"));
        echo "\">Контакты:</a>
\t\t\t</div>
\t\t\t
\t\t\t<div style=\"position:absolute; right:150px; top:3px; /*margin-left:-100px;*/\" class=\"hidden-xs\" >
\t\t\t<a class=\"navbar-brand\" href=\"tel:84952223344\">8 (495) <span style=\"font-size:150%\">649-83-71</span></a>
\t\t\t<br>
\t\t\t<a class=\"navbar-brand\" href=\"tel:84952223344\">8 (495) <span style=\"font-size:150%\">698-29-67</span></a>
\t\t\t</div>
\t\t\t
\t\t\t<div style=\"position:absolute; right:30px; top:15px; \"  >
\t\t\t<a target=\"_blank\" href=\"https://vk.com/rechagent\"><img style=\"width:32px; margin-right:10px;\" src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/template/VK.png"), "html", null, true);
        echo "\"  alt=\"Вконтакте\"></a>
\t\t\t<a target=\"_blank\" href=\"https://www.facebook.com/rechagent/\"><img style=\"width:32px; margin-right:10px;     position: absolute;    top: 40px;    left: 0;\" src=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/template/facebook.png"), "html", null, true);
        echo "\"  alt=\"Facebook\"></a>
\t\t\t<a target=\"_blank\" href=\"http://instagram.com/rechagent\"><img style=\"width:32px; margin-right:0px;\" src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/template/inst.png"), "html", null, true);
        echo "\"  alt=\"instagram\"></a>
\t\t\t<a target=\"_blank\" href=\"http://m.ok.ru/group/53065077883088\"><img style=\"width:32px; margin-right:0px; position: absolute;    top: 40px;    right:0px;\" src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("images/template/ok.png"), "html", null, true);
        echo "\"  alt=\"Одноклассники\"></a>
\t\t\t</div>
\t\t\t

\t\t\t
\t\t\t
        </div>
        <!-- /.container -->
        <div class=\"container \">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class=\"navbar-header\">
                
\t\t\t\t<div style=\"position:absolute; left:0%; top:90px; \" class=\"visible-xs\" >
\t\t\t\t<a class=\"navbar-brand\" style=\"padding:0 0 0 15px; height:30px;\" href=\"tel:84952223344\">8 (495) <span style=\"font-size:100%\">649-83-71</span></a>
\t\t\t\t<br>
\t\t\t\t<a class=\"navbar-brand\" style=\"padding:0 0 0 15px; height:30px;\" href=\"tel:84952223344\">8 (495) <span style=\"font-size:100%\">698-29-67</span></a>
\t\t\t\t</div>\t\t

\t\t\t\t<button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
\t\t\t
            <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
                <ul class=\"nav navbar-nav navbar-right\">
                    <li>
                        <a href=\"";
        // line 84
        echo $this->env->getExtension('routing')->getPath("cruise");
        echo "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Поиск круиза<b class=\"caret\"></b></a>
\t\t\t\t\t\t";
        // line 85
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("BaseBundle:Cruise:monthMenu"));
        echo "
                    </li>
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Спецпредложения<b class=\"caret\"></b></a>
                        <ul class=\"dropdown-menu\">
                            <li>
                                <a href=\"";
        // line 91
        echo $this->env->getExtension('routing')->getPath("specialoffer", array("offer" => "burningcruise"));
        echo "\">«Счастливые» круизы</a>
                            </li>
                            <li>
                                <a href=\"";
        // line 94
        echo $this->env->getExtension('routing')->getPath("specialoffer", array("offer" => "specialoffer"));
        echo "\">Специальные тарифы</a>
                            </li>
                        </ul>
                    </li>
                    <li class=\"dropdown\">
                        <a href=\"";
        // line 99
        echo $this->env->getExtension('routing')->getPath("alphabetlist");
        echo "\" >Теплоходы</a>

                    </li>
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Информация<b class=\"caret\"></b></a>
                        <ul class=\"dropdown-menu\">
                            <li>
                                <a href=\"";
        // line 106
        echo $this->env->getExtension('routing')->getPath("cruiseorder");
        echo "\">Бронь и покупка</a>
                            </li>
                            <li class=\"dropdown-submenu\">
                               <a href=\"";
        // line 109
        echo $this->env->getExtension('routing')->getPath("page_small", array("first" => "map"));
        echo "\" >Карта круизов</a>
\t\t\t\t\t\t\t   <ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
        // line 112
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("showDocuments", array("first" => "cruise", "second" => "settlement")), "html", null, true);
        echo "\">Порты и причалы</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
        // line 115
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("showDocuments", array("first" => "cruise", "second" => "river")), "html", null, true);
        echo "\">Реки и озёра</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t   </ul>
                            </li>
                            <li>
                                <a href=\"";
        // line 120
        echo $this->env->getExtension('routing')->getPath("page_small", array("first" => "remember"));
        echo "\">Памятка туриста</a>
                            </li>
                            <li>
                                <a href=\"";
        // line 123
        echo $this->env->getExtension('routing')->getPath("page_small", array("first" => "faq"));
        echo "\">Вопросы и ответы</a>
                            </li>
                            <li>
                                <a href=\"";
        // line 126
        echo $this->env->getExtension('routing')->getPath("cruiseroutes");
        echo "\">Описания круизов</a>
                            </li>
                            <li>
                                <a href=\"";
        // line 129
        echo $this->env->getExtension('routing')->getPath("page_small", array("first" => "river-fleet"));
        echo "\">Речной флот</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Агентствам<b class=\"caret\"></b></a>
\t\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a  href=\"";
        // line 138
        echo $this->env->getExtension('routing')->getPath("page_small", array("first" => "agency"));
        echo "\">Приглашаем к сотрудничеству</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a  href=\"";
        // line 141
        echo $this->env->getExtension('routing')->getPath("page_small", array("first" => "export"));
        echo "\">Экспорт данных</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
                    </li>
                    <li>
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">О компании<b class=\"caret\"></b></a>
\t\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a  href=\"";
        // line 149
        echo $this->env->getExtension('routing')->getPath("page_small", array("first" => "about"));
        echo "\">O компании</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a  href=\"";
        // line 152
        echo $this->env->getExtension('routing')->getPath("page_small", array("first" => "requisites"));
        echo "\">Реквизиты</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a  href=\"";
        // line 155
        echo $this->env->getExtension('routing')->getPath("page_small", array("first" => "contacts"));
        echo "\">Контакты</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
                    </li>\t\t\t
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

";
        // line 166
        $this->displayBlock('carousel', $context, $blocks);
        // line 167
        echo "
<div class=\"container-fluid container-search\">
\t<div class=\"row\">
\t\t<div class=\"container\">
\t\t\t<div class=\"row\">

\t\t\t\t<div class=\"col-sm-12\">\t\t\t\t\t

\t\t\t\t";
        // line 175
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("BaseBundle:Cruise:searchForm"));
        echo "

\t\t\t\t</div>\t\t\t

\t\t\t</div>
\t\t</div>\t
\t</div>\t
</div>

\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t
\t\t\t<div class=\"col-sm-12\">\t\t\t\t\t
\t\t\t";
        // line 188
        $this->displayBlock('body', $context, $blocks);
        // line 190
        echo "\t
\t\t\t</div>
\t\t</div>
\t</div>\t
<br>

<div class=\"footer\">
          <div class=\"container \">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-sm-12\">
\t\t\t\t1997-2015 ВАШЕ РЕЧНОЕ АГЕНТСТВО<br>
\t\t\t\tМосква,  ул.Никольская, д 4/5, офис 403. Телефон +7 (495) 649-83-71, +7 (495) 698-29-67  E-mail: <a href=\"mailto:info@rech-agent.ru\">info@rech-agent.ru</a> <br>
\t\t\t\tИнформация на сайте не является публичной офёртой и носит информационный характер. 
\t\t\t\t</div>
\t\t\t</div>
\t\t  </div>
</div>


    <!-- Placed at the end of the document so the pages load faster -->
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>\t
\t<!-- Latest compiled and minified JavaScript -->
\t<script src=\"";
        // line 212
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 213
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/bootstrap-slider.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 214
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jquery.fancybox.js"), "html", null, true);
        echo "\"></script>

    <!-- Script to Activate the Carousel -->
    <script>
\t\$(document).ready(function(){
\t\t\$('.carousel').carousel({
\t\t\tinterval: 5000 //changes the speed
\t\t})
\t\t\$(\"#form_days\").slider({});
\t\t\$('.photo').fancybox();
\t});
\t 
    </script>
<!-- Yandex.Metrika counter -->
<script type=\"text/javascript\">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter36501512 = new Ya.Metrika({
                    id:36501512,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName(\"script\")[0],
            s = d.createElement(\"script\"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = \"text/javascript\";
        s.async = true;
        s.src = \"https://mc.yandex.ru/metrika/watch.js\";

        if (w.opera == \"[object Opera]\") {
            d.addEventListener(\"DOMContentLoaded\", f, false);
        } else { f(); }
    })(document, window, \"yandex_metrika_callbacks\");
</script>
<noscript><div><img src=\"https://mc.yandex.ru/watch/36501512\" style=\"position:absolute; left:-9999px;\" alt=\"яндекс счётчик\" /></div></noscript>
<!-- /Yandex.Metrika counter -->

";
        // line 256
        $this->loadTemplate("BaseBundle:Cruise:modal-zayavka-form.html.twig", "base.html.twig", 256)->display($context);
        // line 257
        echo "
</body>

</html>
";
    }

    // line 9
    public function block_description($context, array $blocks = array())
    {
        echo "Речные круизы из Москвы. Круизы по Волге. «Речное агентство».";
    }

    // line 10
    public function block_keywords($context, array $blocks = array())
    {
        echo "речные круизы, Москва, туры на теплоходе, круизы выходного дня, круизы по Волге, круизы по рекам, отдых на теплоходах";
    }

    // line 13
    public function block_title($context, array $blocks = array())
    {
        echo "Дефолтный тайтл";
    }

    // line 166
    public function block_carousel($context, array $blocks = array())
    {
    }

    // line 188
    public function block_body($context, array $blocks = array())
    {
        // line 189
        echo "\t\t\t\tBlock body
\t\t\t";
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
        return array (  432 => 189,  429 => 188,  424 => 166,  418 => 13,  412 => 10,  406 => 9,  398 => 257,  396 => 256,  351 => 214,  347 => 213,  343 => 212,  319 => 190,  317 => 188,  301 => 175,  291 => 167,  289 => 166,  275 => 155,  269 => 152,  263 => 149,  252 => 141,  246 => 138,  234 => 129,  228 => 126,  222 => 123,  216 => 120,  208 => 115,  202 => 112,  196 => 109,  190 => 106,  180 => 99,  172 => 94,  166 => 91,  157 => 85,  153 => 84,  119 => 53,  115 => 52,  111 => 51,  107 => 50,  94 => 40,  86 => 37,  67 => 21,  63 => 20,  59 => 19,  55 => 18,  51 => 17,  44 => 13,  38 => 10,  34 => 9,  24 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* */
/* <head>*/
/* */
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/* */
/*     <meta name="description" content="{% block description %}Речные круизы из Москвы. Круизы по Волге. «Речное агентство».{% endblock %}">*/
/*     <meta name="keywords" content="{% block keywords %}речные круизы, Москва, туры на теплоходе, круизы выходного дня, круизы по Волге, круизы по рекам, отдых на теплоходах{% endblock %}">*/
/*     <meta name="author" content="">*/
/* */
/*     <title>{% block title %}Дефолтный тайтл{% endblock %}</title>*/
/* */
/* */
/* 	*/
/* 	 <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">*/
/* 	 <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}">*/
/* 	 <link rel="stylesheet" href="{{ asset('css/bootstrap-slider.css') }}">*/
/* 	 <link rel="stylesheet" href="{{ asset('css/style.css') }}">*/
/* 	 <link rel="stylesheet" href="{{ asset('css/fancybox/jquery.fancybox.css') }}">*/
/* */
/*     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->*/
/*     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/*     <!--[if lt IE 9]>*/
/*         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>*/
/*         <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>*/
/*     <![endif]-->*/
/* */
/* </head>*/
/* */
/* <body>*/
/* */
/*     <!-- Navigation -->*/
/*     <nav class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation">*/
/*         <div class="container header-volna" style="padding-top:30px; position:relative;">*/
/*             <a  href="{{path('homepage')}}"><img style=" margin-top:-25px; max-width:100%" src="{{asset('images/template/logo.png')}}" alt="Речное агентство"></a>*/
/* */
/* 			<div style="position:absolute; right:400px; top:30px; " >*/
/* 			<a class="navbar-brand navbar-right hidden-xs" style="font-size: 24px;" href="{{path('page_small',{'first':'contacts'})}}">Контакты:</a>*/
/* 			</div>*/
/* 			*/
/* 			<div style="position:absolute; right:150px; top:3px; /*margin-left:-100px;*//* " class="hidden-xs" >*/
/* 			<a class="navbar-brand" href="tel:84952223344">8 (495) <span style="font-size:150%">649-83-71</span></a>*/
/* 			<br>*/
/* 			<a class="navbar-brand" href="tel:84952223344">8 (495) <span style="font-size:150%">698-29-67</span></a>*/
/* 			</div>*/
/* 			*/
/* 			<div style="position:absolute; right:30px; top:15px; "  >*/
/* 			<a target="_blank" href="https://vk.com/rechagent"><img style="width:32px; margin-right:10px;" src="{{asset('images/template/VK.png')}}"  alt="Вконтакте"></a>*/
/* 			<a target="_blank" href="https://www.facebook.com/rechagent/"><img style="width:32px; margin-right:10px;     position: absolute;    top: 40px;    left: 0;" src="{{asset('images/template/facebook.png')}}"  alt="Facebook"></a>*/
/* 			<a target="_blank" href="http://instagram.com/rechagent"><img style="width:32px; margin-right:0px;" src="{{asset('images/template/inst.png')}}"  alt="instagram"></a>*/
/* 			<a target="_blank" href="http://m.ok.ru/group/53065077883088"><img style="width:32px; margin-right:0px; position: absolute;    top: 40px;    right:0px;" src="{{asset('images/template/ok.png')}}"  alt="Одноклассники"></a>*/
/* 			</div>*/
/* 			*/
/* */
/* 			*/
/* 			*/
/*         </div>*/
/*         <!-- /.container -->*/
/*         <div class="container ">*/
/*             <!-- Brand and toggle get grouped for better mobile display -->*/
/*             <div class="navbar-header">*/
/*                 */
/* 				<div style="position:absolute; left:0%; top:90px; " class="visible-xs" >*/
/* 				<a class="navbar-brand" style="padding:0 0 0 15px; height:30px;" href="tel:84952223344">8 (495) <span style="font-size:100%">649-83-71</span></a>*/
/* 				<br>*/
/* 				<a class="navbar-brand" style="padding:0 0 0 15px; height:30px;" href="tel:84952223344">8 (495) <span style="font-size:100%">698-29-67</span></a>*/
/* 				</div>		*/
/* */
/* 				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">*/
/*                     <span class="sr-only">Toggle navigation</span>*/
/*                     <span class="icon-bar"></span>*/
/*                     <span class="icon-bar"></span>*/
/*                     <span class="icon-bar"></span>*/
/*                 </button>*/
/*                 */
/*             </div>*/
/*             <!-- Collect the nav links, forms, and other content for toggling -->*/
/* 			*/
/*             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">*/
/*                 <ul class="nav navbar-nav navbar-right">*/
/*                     <li>*/
/*                         <a href="{{path('cruise')}}" class="dropdown-toggle" data-toggle="dropdown">Поиск круиза<b class="caret"></b></a>*/
/* 						{{ render(controller('BaseBundle:Cruise:monthMenu')) }}*/
/*                     </li>*/
/*                     <li class="dropdown">*/
/*                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">Спецпредложения<b class="caret"></b></a>*/
/*                         <ul class="dropdown-menu">*/
/*                             <li>*/
/*                                 <a href="{{path('specialoffer',{'offer':'burningcruise'})}}">«Счастливые» круизы</a>*/
/*                             </li>*/
/*                             <li>*/
/*                                 <a href="{{path('specialoffer',{'offer':'specialoffer'})}}">Специальные тарифы</a>*/
/*                             </li>*/
/*                         </ul>*/
/*                     </li>*/
/*                     <li class="dropdown">*/
/*                         <a href="{{path('alphabetlist')}}" >Теплоходы</a>*/
/* */
/*                     </li>*/
/*                     <li class="dropdown">*/
/*                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">Информация<b class="caret"></b></a>*/
/*                         <ul class="dropdown-menu">*/
/*                             <li>*/
/*                                 <a href="{{path('cruiseorder')}}">Бронь и покупка</a>*/
/*                             </li>*/
/*                             <li class="dropdown-submenu">*/
/*                                <a href="{{path('page_small',{'first':'map'})}}" >Карта круизов</a>*/
/* 							   <ul class="dropdown-menu">*/
/* 								<li>*/
/* 									<a href="{{path('showDocuments',{'first':'cruise','second':'settlement'} )}}">Порты и причалы</a>*/
/* 								</li>*/
/* 								<li>*/
/* 									<a href="{{path('showDocuments',{'first':'cruise','second':'river'} )}}">Реки и озёра</a>*/
/* 								</li>*/
/* 							   </ul>*/
/*                             </li>*/
/*                             <li>*/
/*                                 <a href="{{path('page_small',{'first':'remember'})}}">Памятка туриста</a>*/
/*                             </li>*/
/*                             <li>*/
/*                                 <a href="{{path('page_small',{'first':'faq'})}}">Вопросы и ответы</a>*/
/*                             </li>*/
/*                             <li>*/
/*                                 <a href="{{path('cruiseroutes')}}">Описания круизов</a>*/
/*                             </li>*/
/*                             <li>*/
/*                                 <a href="{{path('page_small',{'first':'river-fleet'})}}">Речной флот</a>*/
/*                             </li>*/
/*                         </ul>*/
/*                     </li>*/
/* */
/*                     <li>*/
/*                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">Агентствам<b class="caret"></b></a>*/
/* 						<ul class="dropdown-menu">*/
/* 							<li>*/
/* 								<a  href="{{path('page_small',{'first':'agency'})}}">Приглашаем к сотрудничеству</a>*/
/* 							</li>*/
/* 							<li>*/
/* 								<a  href="{{path('page_small',{'first':'export'})}}">Экспорт данных</a>*/
/* 							</li>*/
/* 						</ul>*/
/*                     </li>*/
/*                     <li>*/
/*                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">О компании<b class="caret"></b></a>*/
/* 						<ul class="dropdown-menu">*/
/* 							<li>*/
/* 								<a  href="{{path('page_small',{'first':'about'})}}">O компании</a>*/
/* 							</li>*/
/* 							<li>*/
/* 								<a  href="{{path('page_small',{'first':'requisites'})}}">Реквизиты</a>*/
/* 							</li>*/
/* 							<li>*/
/* 								<a  href="{{path('page_small',{'first':'contacts'})}}">Контакты</a>*/
/* 							</li>*/
/* 						</ul>*/
/*                     </li>			*/
/*                 </ul>*/
/*             </div>*/
/*             <!-- /.navbar-collapse -->*/
/*         </div>*/
/*         <!-- /.container -->*/
/*     </nav>*/
/* */
/* {% block carousel%}{% endblock %}*/
/* */
/* <div class="container-fluid container-search">*/
/* 	<div class="row">*/
/* 		<div class="container">*/
/* 			<div class="row">*/
/* */
/* 				<div class="col-sm-12">					*/
/* */
/* 				{{ render(controller('BaseBundle:Cruise:searchForm')) }}*/
/* */
/* 				</div>			*/
/* */
/* 			</div>*/
/* 		</div>	*/
/* 	</div>	*/
/* </div>*/
/* */
/* 	<div class="container">*/
/* 		<div class="row">*/
/* 		*/
/* 			<div class="col-sm-12">					*/
/* 			{% block body %}*/
/* 				Block body*/
/* 			{% endblock %}	*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>	*/
/* <br>*/
/* */
/* <div class="footer">*/
/*           <div class="container ">*/
/* 			<div class="row">*/
/* 				<div class="col-sm-12">*/
/* 				1997-2015 ВАШЕ РЕЧНОЕ АГЕНТСТВО<br>*/
/* 				Москва,  ул.Никольская, д 4/5, офис 403. Телефон +7 (495) 649-83-71, +7 (495) 698-29-67  E-mail: <a href="mailto:info@rech-agent.ru">info@rech-agent.ru</a> <br>*/
/* 				Информация на сайте не является публичной офёртой и носит информационный характер. */
/* 				</div>*/
/* 			</div>*/
/* 		  </div>*/
/* </div>*/
/* */
/* */
/*     <!-- Placed at the end of the document so the pages load faster -->*/
/*     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>	*/
/* 	<!-- Latest compiled and minified JavaScript -->*/
/* 	<script src="{{ asset('js/bootstrap.js') }}"></script>*/
/* 	<script src="{{ asset('js/bootstrap-slider.js') }}"></script>*/
/* 	<script src="{{ asset('js/jquery.fancybox.js') }}"></script>*/
/* */
/*     <!-- Script to Activate the Carousel -->*/
/*     <script>*/
/* 	$(document).ready(function(){*/
/* 		$('.carousel').carousel({*/
/* 			interval: 5000 //changes the speed*/
/* 		})*/
/* 		$("#form_days").slider({});*/
/* 		$('.photo').fancybox();*/
/* 	});*/
/* 	 */
/*     </script>*/
/* <!-- Yandex.Metrika counter -->*/
/* <script type="text/javascript">*/
/*     (function (d, w, c) {*/
/*         (w[c] = w[c] || []).push(function() {*/
/*             try {*/
/*                 w.yaCounter36501512 = new Ya.Metrika({*/
/*                     id:36501512,*/
/*                     clickmap:true,*/
/*                     trackLinks:true,*/
/*                     accurateTrackBounce:true*/
/*                 });*/
/*             } catch(e) { }*/
/*         });*/
/* */
/*         var n = d.getElementsByTagName("script")[0],*/
/*             s = d.createElement("script"),*/
/*             f = function () { n.parentNode.insertBefore(s, n); };*/
/*         s.type = "text/javascript";*/
/*         s.async = true;*/
/*         s.src = "https://mc.yandex.ru/metrika/watch.js";*/
/* */
/*         if (w.opera == "[object Opera]") {*/
/*             d.addEventListener("DOMContentLoaded", f, false);*/
/*         } else { f(); }*/
/*     })(document, window, "yandex_metrika_callbacks");*/
/* </script>*/
/* <noscript><div><img src="https://mc.yandex.ru/watch/36501512" style="position:absolute; left:-9999px;" alt="яндекс счётчик" /></div></noscript>*/
/* <!-- /Yandex.Metrika counter -->*/
/* */
/* {% include 'BaseBundle:Cruise:modal-zayavka-form.html.twig' %}*/
/* */
/* </body>*/
/* */
/* </html>*/
/* */
