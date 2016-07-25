<?php

/* BaseBundle:Cruise:table_cruises.html.twig */
class __TwigTemplate_1dd02fbe4c6cf7ddcd7709a5667afa2ad0f143140cc91dd84989d545c8583931 extends Twig_Template
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
        $__internal_2e49919f001d5505c4713cc1fe07fbb5c480dc8773a2e9f89d2d63dfc111d7c1 = $this->env->getExtension("native_profiler");
        $__internal_2e49919f001d5505c4713cc1fe07fbb5c480dc8773a2e9f89d2d63dfc111d7c1->enter($__internal_2e49919f001d5505c4713cc1fe07fbb5c480dc8773a2e9f89d2d63dfc111d7c1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "BaseBundle:Cruise:table_cruises.html.twig"));

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
        $context['_seq'] = twig_ensure_traversable((isset($context["cruises"]) ? $context["cruises"] : $this->getContext($context, "cruises")));
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
        
        $__internal_2e49919f001d5505c4713cc1fe07fbb5c480dc8773a2e9f89d2d63dfc111d7c1->leave($__internal_2e49919f001d5505c4713cc1fe07fbb5c480dc8773a2e9f89d2d63dfc111d7c1_prof);

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
        return array (  146 => 57,  132 => 48,  126 => 46,  120 => 44,  118 => 43,  111 => 41,  108 => 40,  104 => 39,  97 => 34,  91 => 33,  85 => 30,  80 => 28,  77 => 27,  75 => 26,  68 => 22,  64 => 21,  58 => 20,  48 => 19,  45 => 18,  39 => 16,  22 => 1,);
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
