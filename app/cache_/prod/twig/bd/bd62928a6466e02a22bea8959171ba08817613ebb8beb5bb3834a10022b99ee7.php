<?php

/* BaseBundle:Cruise:table_cruises.html.twig */
class __TwigTemplate_05c6993c38d5156355cd37eac725e52dc8bb9d42b6f7612e1fdf93e406ea5003 extends Twig_Template
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
        echo "<div class=\"table-responsive\">
  <table class=\"table table-striped table-cruises\">
    <thead>
      <tr>
        <th style=\"width:45%;\">Маршрут</th>
        <th>Теплоход</th>
        <th>Отправление</th>
        <th>Дней</th>
        <th>Цена от</th>
        <th style=\"width:153px;\"></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
\t
\t";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cruises"]) ? $context["cruises"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["cruise"]) {
            echo "\t
\t";
            // line 18
            echo "\t  <tr>
        <td><a href=\"";
            // line 19
            echo $this->env->getExtension('routing')->getPath("homepage");
            echo "cruise/cruisedetails/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["cruise"], "ship", array()), "code", array()), "html", null, true);
            echo "_";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["cruise"], "code", array()), "code", array()), "html", null, true);
            echo ".html\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["cruise"], "route", array()), "html", null, true);
            echo "</a></td>
        <td><a href=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page", array("first" => "cruise", "second" => "ship", "name" => $this->getAttribute($this->getAttribute($context["cruise"], "ship", array()), "code", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["cruise"], "ship", array()), "html", null, true);
            echo "</a></td>
        <td>";
            // line 21
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["cruise"], "startdate", array()), "d.m.Y"), "html", null, true);
            echo "</td>
        <td>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($context["cruise"], "daycount", array()), "html", null, true);
            echo "</td>
        <td>
\t\t\t
\t\t\t
\t\t";
            // line 26
            if ($this->getAttribute($context["cruise"], "discount_price", array(), "any", true, true)) {
                // line 27
                echo "\t\t\t
\t\t\t<span style=\" text-decoration:line-through;\">";
                // line 28
                echo $this->getAttribute($context["cruise"], "discount_price_old", array());
                echo "&nbsp;руб.</span>
\t\t\t<br>
\t\t\t<span style=\"color:red;\">";
                // line 30
                echo $this->getAttribute($context["cruise"], "discount_price", array());
                echo "&nbsp;руб.</span>
\t\t
\t\t";
            } else {
                // line 33
                echo "\t\t\t";
                echo $this->getAttribute($context["cruise"], "minprice", array());
                echo "&nbsp;руб.
\t\t";
            }
            // line 34
            echo "\t

\t\t
\t\t\t
\t\t</td>
        <td style=\"min-width:153px;\">";
            // line 39
            if ($this->getAttribute($this->getAttribute($context["cruise"], "code", array()), "burningCruise", array())) {
                echo "<span class=\"table-special-span color-gk\">«Счастливый» круиз</span>";
            }
            // line 40
            echo "
        ";
            // line 41
            if ($this->getAttribute($this->getAttribute($context["cruise"], "code", array()), "specialoffer", array())) {
                echo " <span class=\"table-special-span color-st\">Специальный тариф</span> ";
            }
            echo "</td>

        ";
            // line 43
            if (($this->getAttribute($context["cruise"], "turOperator", array()) == "vodohod")) {
                // line 44
                echo "\t\t<td><a href=\"http://booking.rech-agent.ru/cruise/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["cruise"], "code", array()), "code", array()), "html", null, true);
                echo "\">Забронировать</a></td>
\t\t";
            } else {
                // line 46
                echo "\t\t<td><a data-code=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["cruise"], "code", array()), "code", array()), "html", null, true);
                echo "\" class=\"modal-zayavka\" href=\"javascript://\">Подать заявку</a></td>
\t\t";
            }
            // line 48
            echo "\t\t
\t\t
\t\t
      </tr>\t
\t  
\t  
\t\t\t\t
\t\t\t\t\t
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cruise'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "\t
    </tbody>
  </table>
</div>

";
    }

    public function getTemplateName()
    {
        return "BaseBundle:Cruise:table_cruises.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 57,  129 => 48,  123 => 46,  117 => 44,  115 => 43,  108 => 41,  105 => 40,  101 => 39,  94 => 34,  88 => 33,  82 => 30,  77 => 28,  74 => 27,  72 => 26,  65 => 22,  61 => 21,  55 => 20,  45 => 19,  42 => 18,  36 => 16,  19 => 1,);
    }
}
/* <div class="table-responsive">*/
/*   <table class="table table-striped table-cruises">*/
/*     <thead>*/
/*       <tr>*/
/*         <th style="width:45%;">Маршрут</th>*/
/*         <th>Теплоход</th>*/
/*         <th>Отправление</th>*/
/*         <th>Дней</th>*/
/*         <th>Цена от</th>*/
/*         <th style="width:153px;"></th>*/
/*         <th></th>*/
/*       </tr>*/
/*     </thead>*/
/*     <tbody>*/
/* 	*/
/* 	{% for cruise in cruises %}	*/
/* 	{#{dump(cruise.dump)}#}*/
/* 	  <tr>*/
/*         <td><a href="{{path('homepage')}}cruise/cruisedetails/{{cruise.ship.code}}_{{cruise.code.code}}.html">{{cruise.route}}</a></td>*/
/*         <td><a href="{{path('page',{'first':'cruise','second':'ship','name':cruise.ship.code})}}">{{cruise.ship}}</a></td>*/
/*         <td>{{cruise.startdate | date("d.m.Y")}}</td>*/
/*         <td>{{cruise.daycount}}</td>*/
/*         <td>*/
/* 			*/
/* 			*/
/* 		{% if cruise.discount_price is defined %}*/
/* 			*/
/* 			<span style=" text-decoration:line-through;">{{cruise.discount_price_old | raw}}&nbsp;руб.</span>*/
/* 			<br>*/
/* 			<span style="color:red;">{{cruise.discount_price | raw}}&nbsp;руб.</span>*/
/* 		*/
/* 		{% else %}*/
/* 			{{cruise.minprice| raw}}&nbsp;руб.*/
/* 		{% endif %}	*/
/* */
/* 		*/
/* 			*/
/* 		</td>*/
/*         <td style="min-width:153px;">{% if (cruise.code.burningCruise) %}<span class="table-special-span color-gk">«Счастливый» круиз</span>{% endif %}*/
/* */
/*         {% if (cruise.code.specialoffer) %} <span class="table-special-span color-st">Специальный тариф</span> {% endif %}</td>*/
/* */
/*         {% if(cruise.turOperator == "vodohod") %}*/
/* 		<td><a href="http://booking.rech-agent.ru/cruise/{{cruise.code.code}}">Забронировать</a></td>*/
/* 		{% else %}*/
/* 		<td><a data-code="{{cruise.code.code}}" class="modal-zayavka" href="javascript://">Подать заявку</a></td>*/
/* 		{% endif %}*/
/* 		*/
/* 		*/
/* 		*/
/*       </tr>	*/
/* 	  */
/* 	  */
/* 				*/
/* 					*/
/* 	{% endfor %}*/
/* 	*/
/*     </tbody>*/
/*   </table>*/
/* </div>*/
/* */
/* */
