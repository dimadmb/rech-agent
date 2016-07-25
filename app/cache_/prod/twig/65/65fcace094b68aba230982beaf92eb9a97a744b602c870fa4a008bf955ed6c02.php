<?php

/* BaseBundle:Cruise:details.html.twig */
class __TwigTemplate_404dea914c6c522d6f3077c69d6370c9d52319591728b5f3c6bfa1ae5a2b85b3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "BaseBundle:Cruise:details.html.twig", 1);
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
        echo "Описание речного круиза ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "route", array()), "html", null, true);
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "

<h1>Описание речного круиза  «";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "route", array()), "html", null, true);
        echo "»</h1>



<p>
Дата отправления:";
        // line 13
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "startdate", array()), "d.m.Y"), "html", null, true);
        echo "<br>
Дата прибытия:";
        // line 14
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "enddate", array()), "d.m.Y"), "html", null, true);
        echo "<br>
Длительность круиза (дней): ";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "daycount", array()), "html", null, true);
        echo "<br>
Теплоход: <a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page", array("first" => "cruise", "second" => "ship", "name" => $this->getAttribute($this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "ship", array()), "code", array()))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "ship", array()), "title", array()), "html", null, true);
        echo "</a><br>
Маршрут: ";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "route", array()), "html", null, true);
        echo " 
</p>

<hr>
<h3>Программа круиза</h3>

<table class=\"table table-striped \">
<thead>
\t<tr>
\t\t<th>Дата</th>
\t\t<th style=\"    width: 110px;\">Время</th>
\t\t<th>Стоянка\t</th>
\t\t<th>Программа дня</th>
\t</tr>
</thead>\t
";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "programItems", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 33
            echo "


\t<tr>
\t\t<td>";
            // line 37
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "date", array()), "d.m.Y"), "html", null, true);
            echo "</td>
\t\t<td>";
            // line 38
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "date", array()), "H:i"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "dateStop", array()), "H:i"), "html", null, true);
            echo "</td>
\t\t<td>
\t\t";
            // line 40
            if ((($this->getAttribute($context["item"], "place", array()) != null) && ($this->getAttribute($this->getAttribute($context["item"], "place", array()), "url", array()) != ""))) {
                // line 41
                echo "\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "place", array()), "title", array()), "html", null, true);
                echo "
\t\t";
            } else {
                // line 43
                echo "\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "placetitle", array()), "html", null, true);
                echo "
\t\t";
            }
            // line 44
            echo "\t
\t\t</td>
\t\t<td>";
            // line 46
            echo $this->getAttribute($context["item"], "description", array());
            echo "</td>
\t</tr>

\t
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "\t
</table>



<hr>
<h3>Стоимость тура на 1 человека * 
";
        // line 57
        if (($this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "turOperator", array()) == "vodohod")) {
            // line 58
            echo "<a href=\"http://booking.rech-agent.ru/cruise/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "code", array()), "code", array()), "html", null, true);
            echo "\" style=\"float: right;\" class=\"btn btn-danger btn-lg \">Купить онлайн</a>
";
        } else {
            // line 60
            echo "<a href=\"javascript://\" data-code=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "code", array()), "code", array()), "html", null, true);
            echo "\" style=\"float: right;\" class=\"btn btn-danger btn-lg modal-zayavka \">Оставить заявку</a>
";
        }
        // line 62
        echo "</h3>


<div style=\"clear:both;\"></div>
<br>

";
        // line 75
        echo "


";
        // line 78
        if (((isset($context["cabins"]) ? $context["cabins"] : null) != null)) {
            // line 79
            echo "

<table class=\"table table-striped  \">
<thead>
\t<tr>
\t\t<th>Палуба</th>
\t\t<th>Тип каюты</th>
\t\t<th>Размещение</th>
\t\t<th>
\t\t<table style=\"width:100%;\">
\t\t\t<tr>
\t\t\t\t";
            // line 90
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tariff_arr"]) ? $context["tariff_arr"] : null));
            foreach ($context['_seq'] as $context["tariff"] => $context["one"]) {
                echo "\t
\t\t\t\t\t<td style=\"width:";
                // line 91
                echo twig_escape_filter($this->env, twig_round((100 / twig_length_filter($this->env, (isset($context["tariff_arr"]) ? $context["tariff_arr"] : null)))), "html", null, true);
                echo "%; text-align:center;\">
\t\t\t\t\t\t";
                // line 92
                echo twig_escape_filter($this->env, $context["tariff"], "html", null, true);
                echo "
\t\t\t\t\t</td>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['tariff'], $context['one'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 94
            echo " 
\t\t\t</tr>
\t\t</table>
\t\t
\t\t</th>
\t</tr>
</thead>


";
            // line 103
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["cabins"]) ? $context["cabins"] : null));
            foreach ($context['_seq'] as $context["deckName"] => $context["deck"]) {
                // line 104
                echo "\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["deck"]);
                foreach ($context['_seq'] as $context["_key"] => $context["type"]) {
                    // line 105
                    echo "\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["type"], "rpPrices", array()));
                    foreach ($context['_seq'] as $context["rpName"] => $context["rp"]) {
                        // line 106
                        echo "\t\t\t<tr>
\t\t\t\t<td>";
                        // line 107
                        echo twig_escape_filter($this->env, $context["deckName"], "html", null, true);
                        echo "</td>
\t\t\t\t<td>";
                        // line 108
                        echo twig_escape_filter($this->env, $this->getAttribute($context["type"], "cabinName", array()), "html", null, true);
                        echo "<br>
\t\t\t\t\t";
                        // line 109
                        if ((twig_length_filter($this->env, $this->getAttribute($context["type"], "rooms", array())) > 0)) {
                            // line 110
                            echo "\t\t\t\t\t№№ 
\t\t\t\t\t";
                        }
                        // line 112
                        echo "\t\t\t\t\t";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["type"], "rooms", array()));
                        foreach ($context['_seq'] as $context["_key"] => $context["room"]) {
                            // line 113
                            echo "\t\t\t\t\t\t<span style=\"color:red; font-weight:700;\" >";
                            echo twig_escape_filter($this->env, $context["room"], "html", null, true);
                            echo " </span>
\t\t\t\t\t\t
\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['room'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 115
                        echo "</td>
\t\t\t\t<td>";
                        // line 116
                        echo twig_escape_filter($this->env, $context["rpName"], "html", null, true);
                        echo "</td>
\t\t\t\t<td>
\t\t\t\t<table style=\"width:100%; \">
\t\t\t\t\t<tr>
\t\t\t\t\t
\t\t\t\t\t\t";
                        // line 121
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["tariff_arr"]) ? $context["tariff_arr"] : null));
                        foreach ($context['_seq'] as $context["tariff"] => $context["one"]) {
                            // line 122
                            echo "
\t\t\t\t\t\t
\t\t\t\t\t\t<td style=\"width:";
                            // line 124
                            echo twig_escape_filter($this->env, twig_round((100 / twig_length_filter($this->env, (isset($context["tariff_arr"]) ? $context["tariff_arr"] : null)))), "html", null, true);
                            echo "%; text-align:center;\">
\t\t\t\t\t\t
\t\t\t\t\t\t";
                            // line 126
                            if ($this->getAttribute($this->getAttribute($context["rp"], "prices", array(), "any", false, true), $context["tariff"], array(), "array", true, true)) {
                                echo "\t
\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
                                // line 144
                                echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
                                // line 147
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($context["rp"], "prices", array()), $context["tariff"], array(), "array"));
                                foreach ($context['_seq'] as $context["mealName"] => $context["meal"]) {
                                    // line 148
                                    echo "
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
                                    // line 150
                                    if ((twig_length_filter($this->env, $this->getAttribute($context["type"], "rooms", array())) > 0)) {
                                        // line 151
                                        echo "\t\t\t\t\t\t\t\t\t";
                                        if (($this->getAttribute($this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "code", array()), "specialOffer", array()) == 1)) {
                                            // line 152
                                            echo "\t\t\t\t\t\t\t\t\t\t<span style=\" text-decoration:line-through;\">";
                                            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["meal"], "price", array()), 0, ".", " "), "html", null, true);
                                            echo "  руб.</span><br>
\t\t\t\t\t\t\t\t\t\t<span style=\"color:red; \"><b>";
                                            // line 153
                                            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_round(($this->getAttribute($context["meal"], "price", array()) * 0.9)), 0, ".", " "), "html", null, true);
                                            echo " руб.</b></span>\t\t\t
\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 155
                                        echo "\t\t\t\t\t\t\t\t\t";
                                        if (($this->getAttribute($this->getAttribute((isset($context["cruise"]) ? $context["cruise"] : null), "code", array()), "burningCruise", array()) == 1)) {
                                            // line 156
                                            echo "\t\t\t\t\t\t\t\t\t\t<span style=\" text-decoration:line-through;\">";
                                            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["meal"], "price", array()), 0, ".", " "), "html", null, true);
                                            echo "  руб.</span><br>
\t\t\t\t\t\t\t\t\t\t<span style=\"color:red; \"><b>";
                                            // line 157
                                            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_round(($this->getAttribute($context["meal"], "price", array()) * 0.8)), 0, ".", " "), "html", null, true);
                                            echo " руб.</b></span>\t\t
\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 159
                                        echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
                                    } else {
                                        // line 160
                                        echo "\t
\t\t\t\t\t\t\t\t\t<p style=\"\"><span >";
                                        // line 161
                                        echo twig_escape_filter($this->env, $context["mealName"], "html", null, true);
                                        echo "</span> <b>";
                                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["meal"], "price", array()), 0, ".", " "), "html", null, true);
                                        echo "  руб.</b></p>
\t\t\t\t\t\t\t\t";
                                    }
                                    // line 163
                                    echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['mealName'], $context['meal'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 167
                                echo "\t\t
\t\t\t\t\t\t";
                            }
                            // line 169
                            echo "\t\t\t\t\t\t</td>\t\t\t\t\t\t
\t\t\t\t\t\t
\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['tariff'], $context['one'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 171
                        echo "\t\t\t\t\t

\t\t\t\t\t</tr>
\t\t\t\t</table>
\t\t\t\t</td>
\t\t\t</tr>
\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['rpName'], $context['rp'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 178
                    echo "\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['type'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['deckName'], $context['deck'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 180
            echo "</table>


<p>* Цены действительны на момент публикации и могут незначительно измениться до полной оплаты рейса.</p>
";
        } else {
            // line 185
            echo "<p>Нет доступных круизов</p>
";
        }
        // line 187
        echo "


";
    }

    public function getTemplateName()
    {
        return "BaseBundle:Cruise:details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  402 => 187,  398 => 185,  391 => 180,  381 => 178,  369 => 171,  361 => 169,  357 => 167,  348 => 163,  341 => 161,  338 => 160,  334 => 159,  329 => 157,  324 => 156,  321 => 155,  316 => 153,  311 => 152,  308 => 151,  306 => 150,  302 => 148,  298 => 147,  293 => 144,  288 => 126,  283 => 124,  279 => 122,  275 => 121,  267 => 116,  264 => 115,  254 => 113,  249 => 112,  245 => 110,  243 => 109,  239 => 108,  235 => 107,  232 => 106,  227 => 105,  222 => 104,  218 => 103,  207 => 94,  198 => 92,  194 => 91,  188 => 90,  175 => 79,  173 => 78,  168 => 75,  160 => 62,  154 => 60,  148 => 58,  146 => 57,  137 => 50,  126 => 46,  122 => 44,  116 => 43,  110 => 41,  108 => 40,  101 => 38,  97 => 37,  91 => 33,  87 => 32,  69 => 17,  63 => 16,  59 => 15,  55 => 14,  51 => 13,  43 => 8,  39 => 6,  36 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block title %}Описание речного круиза {{cruise.route}}{% endblock %}*/
/* */
/* {% block body %}*/
/* */
/* */
/* <h1>Описание речного круиза  «{{cruise.route}}»</h1>*/
/* */
/* */
/* */
/* <p>*/
/* Дата отправления:{{cruise.startdate | date("d.m.Y")}}<br>*/
/* Дата прибытия:{{cruise.enddate | date("d.m.Y")}}<br>*/
/* Длительность круиза (дней): {{cruise.daycount}}<br>*/
/* Теплоход: <a href="{{path('page',{'first':'cruise','second':'ship','name':cruise.ship.code})}}">{{cruise.ship.title}}</a><br>*/
/* Маршрут: {{cruise.route}} */
/* </p>*/
/* */
/* <hr>*/
/* <h3>Программа круиза</h3>*/
/* */
/* <table class="table table-striped ">*/
/* <thead>*/
/* 	<tr>*/
/* 		<th>Дата</th>*/
/* 		<th style="    width: 110px;">Время</th>*/
/* 		<th>Стоянка	</th>*/
/* 		<th>Программа дня</th>*/
/* 	</tr>*/
/* </thead>	*/
/* {% for item in cruise.programItems %}*/
/* */
/* */
/* */
/* 	<tr>*/
/* 		<td>{{item.date | date("d.m.Y")}}</td>*/
/* 		<td>{{item.date | date("H:i")}} - {{item.dateStop | date("H:i")}}</td>*/
/* 		<td>*/
/* 		{% if (item.place != null) and (item.place.url != '')  %}*/
/* 			{#<a href="{{path('page',{'first':'cruise','second':'settlement','name':item.place.url})}}"></a>#}{{item.place.title}}*/
/* 		{% else %}*/
/* 			{{item.placetitle}}*/
/* 		{% endif %}	*/
/* 		</td>*/
/* 		<td>{{item.description | raw}}</td>*/
/* 	</tr>*/
/* */
/* 	*/
/* {% endfor %}	*/
/* </table>*/
/* */
/* */
/* */
/* <hr>*/
/* <h3>Стоимость тура на 1 человека * */
/* {% if (cruise.turOperator == "vodohod") %}*/
/* <a href="http://booking.rech-agent.ru/cruise/{{cruise.code.code}}" style="float: right;" class="btn btn-danger btn-lg ">Купить онлайн</a>*/
/* {% else %}*/
/* <a href="javascript://" data-code="{{cruise.code.code}}" style="float: right;" class="btn btn-danger btn-lg modal-zayavka ">Оставить заявку</a>*/
/* {% endif %}*/
/* </h3>*/
/* */
/* */
/* <div style="clear:both;"></div>*/
/* <br>*/
/* */
/* {#% if (cruise.code.specialOffer == 1) %}*/
/* 	<span style="color:red; font-weight:700;">* На выделенные каюты распространяется специальный тариф -10% от указанной стоимости</span><br><br>*/
/* {% endif %}*/
/* */
/* {% if (cruise.code.burningCruise == 1) %}*/
/* 	<span style="color:red; font-weight:700;">* На выделенные каюты распространяется специальный тариф -20% от указанной стоимости</span><br><br>*/
/* {% endif %#}*/
/* */
/* */
/* */
/* {% if (cabins != null) %}*/
/* */
/* */
/* <table class="table table-striped  ">*/
/* <thead>*/
/* 	<tr>*/
/* 		<th>Палуба</th>*/
/* 		<th>Тип каюты</th>*/
/* 		<th>Размещение</th>*/
/* 		<th>*/
/* 		<table style="width:100%;">*/
/* 			<tr>*/
/* 				{% for tariff,one in tariff_arr %}	*/
/* 					<td style="width:{{ (100/(tariff_arr|length))|round }}%; text-align:center;">*/
/* 						{{tariff}}*/
/* 					</td>*/
/* 				{% endfor %} */
/* 			</tr>*/
/* 		</table>*/
/* 		*/
/* 		</th>*/
/* 	</tr>*/
/* </thead>*/
/* */
/* */
/* {% for  deckName, deck in cabins %}*/
/* 	{% for type in deck %}*/
/* 		{% for rpName, rp in type.rpPrices  %}*/
/* 			<tr>*/
/* 				<td>{{deckName}}</td>*/
/* 				<td>{{type.cabinName}}<br>*/
/* 					{% if (type.rooms|length > 0) %}*/
/* 					№№ */
/* 					{% endif %}*/
/* 					{% for room in type.rooms %}*/
/* 						<span style="color:red; font-weight:700;" >{{room}} </span>*/
/* 						*/
/* 					{% endfor %}</td>*/
/* 				<td>{{rpName}}</td>*/
/* 				<td>*/
/* 				<table style="width:100%; ">*/
/* 					<tr>*/
/* 					*/
/* 						{% for tariff,one in tariff_arr %}*/
/* */
/* 						*/
/* 						<td style="width:{{ (100/(tariff_arr|length))|round }}%; text-align:center;">*/
/* 						*/
/* 						{% if (rp.prices[tariff]) is defined %}	*/
/* 						*/
/* 								{#*/
/* 								{% if (type.rooms|length > 0) %}*/
/* 									{% if (cruise.code.specialOffer == 1) %}*/
/* 										<span style=" text-decoration:line-through;">{{(rp.prices[tariff]).price|number_format(0, '.', ' ')}}  руб.</span><br>*/
/* 										<span style="color:red; "><b>{{((rp.prices[tariff]).price*0.9) | round|number_format(0, '.', ' ')}} руб.</b></span>			*/
/* 									{% endif %}*/
/* 									{% if (cruise.code.burningCruise == 1) %}*/
/* 										<span style=" text-decoration:line-through;">{{(rp.prices[tariff]).price|number_format(0, '.', ' ')}}  руб.</span><br>*/
/* 										<span style="color:red; "><b>{{((rp.prices[tariff]).price*0.8) | round |number_format(0, '.', ' ')}} руб.</b></span>		*/
/* 									{% endif %}*/
/* 									*/
/* 								{% else %}	*/
/* 									<b>{{(rp.prices[tariff]).price|number_format(0, '.', ' ')}}  руб.</b>*/
/* 								{% endif %}*/
/* 								*/
/* 								#}*/
/* 								*/
/* 								*/
/* 								*/
/* 								{% for mealName,meal in rp.prices[tariff] %}*/
/* */
/* 									*/
/* 								{% if (type.rooms|length > 0) %}*/
/* 									{% if (cruise.code.specialOffer == 1) %}*/
/* 										<span style=" text-decoration:line-through;">{{meal.price|number_format(0, '.', ' ')}}  руб.</span><br>*/
/* 										<span style="color:red; "><b>{{(meal.price*0.9) | round|number_format(0, '.', ' ')}} руб.</b></span>			*/
/* 									{% endif %}*/
/* 									{% if (cruise.code.burningCruise == 1) %}*/
/* 										<span style=" text-decoration:line-through;">{{meal.price|number_format(0, '.', ' ')}}  руб.</span><br>*/
/* 										<span style="color:red; "><b>{{(meal.price*0.8) | round |number_format(0, '.', ' ')}} руб.</b></span>		*/
/* 									{% endif %}*/
/* 									*/
/* 								{% else %}	*/
/* 									<p style=""><span >{{mealName}}</span> <b>{{meal.price|number_format(0, '.', ' ')}}  руб.</b></p>*/
/* 								{% endif %}*/
/* 									*/
/* 									*/
/* 									*/
/* 								{% endfor %}*/
/* 		*/
/* 						{% endif %}*/
/* 						</td>						*/
/* 						*/
/* 						{% endfor %}					*/
/* */
/* 					</tr>*/
/* 				</table>*/
/* 				</td>*/
/* 			</tr>*/
/* 		{% endfor %}*/
/* 	{% endfor %}*/
/* {% endfor %}*/
/* </table>*/
/* */
/* */
/* <p>* Цены действительны на момент публикации и могут незначительно измениться до полной оплаты рейса.</p>*/
/* {% else %}*/
/* <p>Нет доступных круизов</p>*/
/* {% endif %}*/
/* */
/* */
/* */
/* {% endblock %}*/
