<?php

/* MailBundle::base_mail.html.twig */
class __TwigTemplate_e1b206068c98b0de1464eb2c9b29171a2854c928dc42f18697261c9385b96ec4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "


\t<div style=\"margin:0 auto; width:700px; border:1px solid #eee;\">
\t\t<div id=\"header\" style=\"width:100%;  height:130px; position:relative;  background: #EAA145;\" >
\t\t\t<a href=\"http://rech-agent.ru\"><img style=\"position:absolute; top:10px; left:10px;\" src=\"http://rech-agent.ru/web/mail/img/logo.png\" alt=\"\"></a>
\t\t\t<div style=\"width:45%; height:100%; float:right; color:#fff;\">
\t\t\t\t<p>ПЕРВЫЙ СПЕЦИАЛИЗИРОВАННЫЙ</p>
\t\t\t\t<p>ЦЕНТР РАСПРОДАЖ РЕЧНЫХ</p>
\t\t\t\t<p>КРУИЗОВ ПО РОССИИ</p>
\t\t\t</div>
\t\t</div>


";
        // line 15
        $this->displayBlock('body', $context, $blocks);
        // line 16
        echo "

\t\t<div id=\"footer\" style=\"padding:15px;\">
\t\t\t<hr style=\"border-color:#ccc;\">
\t\t\t<div style=\"color:#EAA145;\">
\t\t\t\t<p style=\"text-align:center;\">109012,  г. Москва, ул. Никольская, дом 4/5, офис 403</p>
\t\t\t\t<p style=\"text-align:center;\">Тел: (495) 649-83-71;  (495) 698-29-67; e-mail: info@rech-agent.ru; www.rech-agent.ru</p>
\t\t\t</div>
\t\t</div>
\t</div>
";
    }

    // line 15
    public function block_body($context, array $blocks = array())
    {
        echo "дефолтное тело";
    }

    public function getTemplateName()
    {
        return "MailBundle::base_mail.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  52 => 15,  38 => 16,  36 => 15,  20 => 1,);
    }
}
/* */
/* */
/* */
/* 	<div style="margin:0 auto; width:700px; border:1px solid #eee;">*/
/* 		<div id="header" style="width:100%;  height:130px; position:relative;  background: #EAA145;" >*/
/* 			<a href="http://rech-agent.ru"><img style="position:absolute; top:10px; left:10px;" src="http://rech-agent.ru/web/mail/img/logo.png" alt=""></a>*/
/* 			<div style="width:45%; height:100%; float:right; color:#fff;">*/
/* 				<p>ПЕРВЫЙ СПЕЦИАЛИЗИРОВАННЫЙ</p>*/
/* 				<p>ЦЕНТР РАСПРОДАЖ РЕЧНЫХ</p>*/
/* 				<p>КРУИЗОВ ПО РОССИИ</p>*/
/* 			</div>*/
/* 		</div>*/
/* */
/* */
/* {% block body %}дефолтное тело{% endblock %}*/
/* */
/* */
/* 		<div id="footer" style="padding:15px;">*/
/* 			<hr style="border-color:#ccc;">*/
/* 			<div style="color:#EAA145;">*/
/* 				<p style="text-align:center;">109012,  г. Москва, ул. Никольская, дом 4/5, офис 403</p>*/
/* 				<p style="text-align:center;">Тел: (495) 649-83-71;  (495) 698-29-67; e-mail: info@rech-agent.ru; www.rech-agent.ru</p>*/
/* 			</div>*/
/* 		</div>*/
/* 	</div>*/
/* */
