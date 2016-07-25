<?php

/* LswMemcacheBundle:Collector:memcache.html.twig */
class __TwigTemplate_37e614c4a939082823d1c42e99a320040ebd5f06d5bcac2b618ac33e7f2e053f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("WebProfilerBundle:Profiler:layout.html.twig", "LswMemcacheBundle:Collector:memcache.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "WebProfilerBundle:Profiler:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        ob_start();
        // line 5
        echo "        <img width=\"20\" height=\"28\" alt=\"Memcache\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAhCAYAAAC4JqlRAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3wYcFiU0a9/iTQAABA9JREFUWMPtVl1II1cUPncmySSaCCZFgxCzpW0MS4MlyiqD0dgxjaEUYaOCQugaBUsRxSglJbBBMduKRdtUELHUSKHERV+iPoqbIJQVLBbqdrWIC11/iO0aq5huMpnbh+4EW1M3UehL/R7Pdw7nO9+5984AXOMa/3skEgmwWCwpudXV1XMxh8ORMtfpdF5OgEqlAgCAzs5OqdlsLq+srDTZ7fYbPN/T03OuBmMMVqtVbTAYTCaTiQ6FQmKe8/l8mYvAGENNTc0dmqafl5eX46qqqod1dXXtu7u72XzO2NhYMr+pqamAYZiFsrIyTNP0KcMwE62trWU839zcDCzLptUbAQAwDCOMRCL3OI7rRQgBxhhEIlE8KytrSafT3fN6vcGzRWaz+a3j4+OFaDRaAABAEASIxeInCoXiW7fb/UlJSclJusMTAACHh4eAMeYQQn+pQgji8bjw6OjonZWVlbnGxsbPMcYivohlWcxxXAIhBLzgaDR6Y2dnx9nb2/udw+F4m89dXFx8uYCLEIvFZJubm10mk2nL6XRWAgCQJEkQBEGmWCURiUTeXF5eXmxoaJgIBALZDMMk+dHR0dQr0Ov1QgAYAICPLjonAoEACgsLvwaAub29vYloNPoK79o/wXEc5ObmPlOr1R8AwILP5zu9lANJpQhBIpGA7e1tezgcvs+ybPa/NefPRSQSka+vr9/f39//xmaz0TzncrkyF3AWJycnQpZlJemKPjg4uL21tTVjsVg+nZ6elns8HmhpaclsBVfFixVyFEU91uv1Nq/X+/2lHbgMXrhBnJ6e3lxbW+u60gquYoRUKv3FYDAM/KcCEEIgFAqfFRQUfBkMBl/zeDw/d3R0ZC4AYwwAABKJ5IgkyT/S3Dvk5OTMabVa6/z8fBdCKD4+Pp58E9IWwHEciMViUCqV4wqFokckEp3wglI1xhiDXC5/olQq7Uaj8f2pqakHAADd3d3Q3t6ezBWkO3VeXt5P+fn5H2q12ofBYPB1jHEs1TvAcRxIJBJQKpWfURT1hd/vfxoIBAAAYGNjA4qKitJ/iDDGIBaLWY1GM6DT6W5ZrdYHLpcrmkgkCI7jEqlq5HL5j8XFxWXV1dVOv9//FACgr68PAOBc86QDFEVBLBaDs5aSJBmTSqU/lJaWdgwNDa2cdYMkSSAI4m+HjCTJX1Uq1VczMzN3EULxs03cbvfFH6PJyUlWJpNtCwSC3wmCiIpEokdqtfru0tLSLb55KBSC4eFhfsoIRVGPEULPSZL8TSaTzRmNRvPs7OzHCKF4Rn9H9fX1AAAwODiYbTab362oqLA7nc5Xeb6/vz9lnc1me4Om6Tu1tbXv8TGNRgPhcDjze2qz2c7F2traUuaOjIxkFL/GNa7xMvwJ4WuVPrHMR8YAAAAASUVORK5CYII=\" />
        <span class=\"sf-toolbar-status";
        // line 6
        if (($this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "totals", array()), "calls", array()) > 0)) {
            echo " sf-toolbar-status-green";
        }
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "totals", array()), "calls", array()), "html", null, true);
        echo "</span>
        ";
        // line 7
        if (($this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "totals", array()), "calls", array()) > 0)) {
            // line 8
            echo "            <span class=\"sf-toolbar-info-piece-additional-detail\">in ";
            echo twig_escape_filter($this->env, sprintf("%0.2f", ($this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "totals", array()), "time", array()) * 1000)), "html", null, true);
            echo " ms</span>
        ";
        }
        // line 10
        echo "    ";
        $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 11
        echo "    ";
        ob_start();
        // line 12
        echo "        <div class=\"sf-toolbar-info-piece\">
            <b>Memcache Calls</b>
            <span>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "totals", array()), "calls", array()), "html", null, true);
        echo "</span>
        </div>
        <div class=\"sf-toolbar-info-piece\">
            <b>Total time</b>
            <span>";
        // line 18
        echo twig_escape_filter($this->env, sprintf("%0.2f", ($this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "totals", array()), "time", array()) * 1000)), "html", null, true);
        echo " ms</span>
        </div>
        <div class=\"sf-toolbar-info-piece\">
            <b>Cache hits</b>
            <span>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "totals", array()), "hits", array()), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "totals", array()), "reads", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "totals", array()), "ratio", array()), "html", null, true);
        echo ")</span>
        </div>
        <div class=\"sf-toolbar-info-piece\">
            <b>Cache writes</b>
            <span>";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "totals", array()), "writes", array()), "html", null, true);
        echo "</span>
        </div>
    ";
        $context["text"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 29
        echo "    ";
        $this->loadTemplate("WebProfilerBundle:Profiler:toolbar_item.html.twig", "LswMemcacheBundle:Collector:memcache.html.twig", 29)->display(array_merge($context, array("link" => (isset($context["profiler_url"]) ? $context["profiler_url"] : null))));
    }

    // line 32
    public function block_menu($context, array $blocks = array())
    {
        // line 33
        echo "<span class=\"label\">
    <span class=\"icon\">
        <img width=\"32\" height=\"33\" alt=\"Memcache\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAhCAYAAAC4JqlRAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3wYcFiU0a9/iTQAABA9JREFUWMPtVl1II1cUPncmySSaCCZFgxCzpW0MS4MlyiqD0dgxjaEUYaOCQugaBUsRxSglJbBBMduKRdtUELHUSKHERV+iPoqbIJQVLBbqdrWIC11/iO0aq5huMpnbh+4EW1M3UehL/R7Pdw7nO9+5984AXOMa/3skEgmwWCwpudXV1XMxh8ORMtfpdF5OgEqlAgCAzs5OqdlsLq+srDTZ7fYbPN/T03OuBmMMVqtVbTAYTCaTiQ6FQmKe8/l8mYvAGENNTc0dmqafl5eX46qqqod1dXXtu7u72XzO2NhYMr+pqamAYZiFsrIyTNP0KcMwE62trWU839zcDCzLptUbAQAwDCOMRCL3OI7rRQgBxhhEIlE8KytrSafT3fN6vcGzRWaz+a3j4+OFaDRaAABAEASIxeInCoXiW7fb/UlJSclJusMTAACHh4eAMeYQQn+pQgji8bjw6OjonZWVlbnGxsbPMcYivohlWcxxXAIhBLzgaDR6Y2dnx9nb2/udw+F4m89dXFx8uYCLEIvFZJubm10mk2nL6XRWAgCQJEkQBEGmWCURiUTeXF5eXmxoaJgIBALZDMMk+dHR0dQr0Ov1QgAYAICPLjonAoEACgsLvwaAub29vYloNPoK79o/wXEc5ObmPlOr1R8AwILP5zu9lANJpQhBIpGA7e1tezgcvs+ybPa/NefPRSQSka+vr9/f39//xmaz0TzncrkyF3AWJycnQpZlJemKPjg4uL21tTVjsVg+nZ6elns8HmhpaclsBVfFixVyFEU91uv1Nq/X+/2lHbgMXrhBnJ6e3lxbW+u60gquYoRUKv3FYDAM/KcCEEIgFAqfFRQUfBkMBl/zeDw/d3R0ZC4AYwwAABKJ5IgkyT/S3Dvk5OTMabVa6/z8fBdCKD4+Pp58E9IWwHEciMViUCqV4wqFokckEp3wglI1xhiDXC5/olQq7Uaj8f2pqakHAADd3d3Q3t6ezBWkO3VeXt5P+fn5H2q12ofBYPB1jHEs1TvAcRxIJBJQKpWfURT1hd/vfxoIBAAAYGNjA4qKitJ/iDDGIBaLWY1GM6DT6W5ZrdYHLpcrmkgkCI7jEqlq5HL5j8XFxWXV1dVOv9//FACgr68PAOBc86QDFEVBLBaDs5aSJBmTSqU/lJaWdgwNDa2cdYMkSSAI4m+HjCTJX1Uq1VczMzN3EULxs03cbvfFH6PJyUlWJpNtCwSC3wmCiIpEokdqtfru0tLSLb55KBSC4eFhfsoIRVGPEULPSZL8TSaTzRmNRvPs7OzHCKF4Rn9H9fX1AAAwODiYbTab362oqLA7nc5Xeb6/vz9lnc1me4Om6Tu1tbXv8TGNRgPhcDjze2qz2c7F2traUuaOjIxkFL/GNa7xMvwJ4WuVPrHMR8YAAAAASUVORK5CYII=\" />
    </span>
    <strong>Memcache</strong>
    <span class=\"count\">
        <span>";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "totals", array()), "calls", array()), "html", null, true);
        echo "</span>
        <span>";
        // line 40
        echo twig_escape_filter($this->env, sprintf("%0.0f", ($this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "totals", array()), "time", array()) * 1000)), "html", null, true);
        echo " ms</span>
    </span>
</span>
";
    }

    // line 45
    public function block_panel($context, array $blocks = array())
    {
        // line 46
        echo "    <h2>Memcache</h2>
    ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "calls", array()));
        foreach ($context['_seq'] as $context["name"] => $context["calls"]) {
            // line 48
            echo "        <h3>Statistics for pool '";
            echo twig_escape_filter($this->env, $context["name"], "html", null, true);
            echo "'</h3>
        <table>
        <thead><tr>
        ";
            // line 51
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "statistics", array()), $context["name"], array(), "array"));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 52
                echo "        <th>";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["key"]), "html", null, true);
                echo "</th>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            echo "        </tr></thead><tbody><tr>
        ";
            // line 55
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "statistics", array()), $context["name"], array(), "array"));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 56
                echo "            ";
                if (($context["key"] == "time")) {
                    // line 57
                    echo "                <td>";
                    echo twig_escape_filter($this->env, sprintf("%0.2f", ($context["value"] * 1000)), "html", null, true);
                    echo " ms</td>
            ";
                } else {
                    // line 59
                    echo "                <td>";
                    echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                    echo "</td>
            ";
                }
                // line 61
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 62
            echo "        </tr></tbody></table>

        <h3>Calls for pool '";
            // line 64
            echo twig_escape_filter($this->env, $context["name"], "html", null, true);
            echo "'</h3>

        ";
            // line 66
            if ( !$this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "totals", array()), "calls", array())) {
                // line 67
                echo "            <p>
                <em>No calls.</em>
            </p>
        ";
            } else {
                // line 71
                echo "            <ul class=\"alt\">
                ";
                // line 72
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["calls"]);
                foreach ($context['_seq'] as $context["i"] => $context["call"]) {
                    // line 73
                    echo "                    <li class=\"";
                    echo ((($context["i"] % 2 == 1)) ? ("odd") : ("even"));
                    echo "\">
                        <div>
                            <strong>Name</strong>: ";
                    // line 75
                    echo twig_escape_filter($this->env, $this->getAttribute($context["call"], "name", array()), "html", null, true);
                    echo "<br />
                            <strong>Arguments</strong>: ";
                    // line 76
                    echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute($context["call"], "arguments", array())), "html", null, true);
                    echo "<br/>
                            <strong>Results</strong>: ";
                    // line 77
                    echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute($context["call"], "result", array())), "html", null, true);
                    echo "<br/>
                        </div>
                        <small>
                            <strong>Time</strong>: ";
                    // line 80
                    echo twig_escape_filter($this->env, sprintf("%0.2f", ($this->getAttribute($context["call"], "time", array()) * 1000)), "html", null, true);
                    echo " ms
                        </small>
                    </li>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['i'], $context['call'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 84
                echo "            </ul>
        ";
            }
            // line 86
            echo "
        <h3>Options for pool '";
            // line 87
            echo twig_escape_filter($this->env, $context["name"], "html", null, true);
            echo "'</h3>
        <pre>";
            // line 89
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["collector"]) ? $context["collector"] : null), "options", array()), $context["name"], array(), "array"));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 90
                echo twig_escape_filter($this->env, sprintf("%-25s", ($context["key"] . ":")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                echo "
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 92
            echo "        </pre>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['calls'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 94
        echo "
";
    }

    public function getTemplateName()
    {
        return "LswMemcacheBundle:Collector:memcache.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  268 => 94,  261 => 92,  251 => 90,  247 => 89,  243 => 87,  240 => 86,  236 => 84,  226 => 80,  220 => 77,  216 => 76,  212 => 75,  206 => 73,  202 => 72,  199 => 71,  193 => 67,  191 => 66,  186 => 64,  182 => 62,  176 => 61,  170 => 59,  164 => 57,  161 => 56,  157 => 55,  154 => 54,  145 => 52,  141 => 51,  134 => 48,  130 => 47,  127 => 46,  124 => 45,  116 => 40,  112 => 39,  104 => 33,  101 => 32,  96 => 29,  90 => 26,  79 => 22,  72 => 18,  65 => 14,  61 => 12,  58 => 11,  55 => 10,  49 => 8,  47 => 7,  39 => 6,  36 => 5,  33 => 4,  30 => 3,  11 => 1,);
    }
}
/* {% extends 'WebProfilerBundle:Profiler:layout.html.twig' %}*/
/* */
/* {% block toolbar %}*/
/*     {% set icon %}*/
/*         <img width="20" height="28" alt="Memcache" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAhCAYAAAC4JqlRAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3wYcFiU0a9/iTQAABA9JREFUWMPtVl1II1cUPncmySSaCCZFgxCzpW0MS4MlyiqD0dgxjaEUYaOCQugaBUsRxSglJbBBMduKRdtUELHUSKHERV+iPoqbIJQVLBbqdrWIC11/iO0aq5huMpnbh+4EW1M3UehL/R7Pdw7nO9+5984AXOMa/3skEgmwWCwpudXV1XMxh8ORMtfpdF5OgEqlAgCAzs5OqdlsLq+srDTZ7fYbPN/T03OuBmMMVqtVbTAYTCaTiQ6FQmKe8/l8mYvAGENNTc0dmqafl5eX46qqqod1dXXtu7u72XzO2NhYMr+pqamAYZiFsrIyTNP0KcMwE62trWU839zcDCzLptUbAQAwDCOMRCL3OI7rRQgBxhhEIlE8KytrSafT3fN6vcGzRWaz+a3j4+OFaDRaAABAEASIxeInCoXiW7fb/UlJSclJusMTAACHh4eAMeYQQn+pQgji8bjw6OjonZWVlbnGxsbPMcYivohlWcxxXAIhBLzgaDR6Y2dnx9nb2/udw+F4m89dXFx8uYCLEIvFZJubm10mk2nL6XRWAgCQJEkQBEGmWCURiUTeXF5eXmxoaJgIBALZDMMk+dHR0dQr0Ov1QgAYAICPLjonAoEACgsLvwaAub29vYloNPoK79o/wXEc5ObmPlOr1R8AwILP5zu9lANJpQhBIpGA7e1tezgcvs+ybPa/NefPRSQSka+vr9/f39//xmaz0TzncrkyF3AWJycnQpZlJemKPjg4uL21tTVjsVg+nZ6elns8HmhpaclsBVfFixVyFEU91uv1Nq/X+/2lHbgMXrhBnJ6e3lxbW+u60gquYoRUKv3FYDAM/KcCEEIgFAqfFRQUfBkMBl/zeDw/d3R0ZC4AYwwAABKJ5IgkyT/S3Dvk5OTMabVa6/z8fBdCKD4+Pp58E9IWwHEciMViUCqV4wqFokckEp3wglI1xhiDXC5/olQq7Uaj8f2pqakHAADd3d3Q3t6ezBWkO3VeXt5P+fn5H2q12ofBYPB1jHEs1TvAcRxIJBJQKpWfURT1hd/vfxoIBAAAYGNjA4qKitJ/iDDGIBaLWY1GM6DT6W5ZrdYHLpcrmkgkCI7jEqlq5HL5j8XFxWXV1dVOv9//FACgr68PAOBc86QDFEVBLBaDs5aSJBmTSqU/lJaWdgwNDa2cdYMkSSAI4m+HjCTJX1Uq1VczMzN3EULxs03cbvfFH6PJyUlWJpNtCwSC3wmCiIpEokdqtfru0tLSLb55KBSC4eFhfsoIRVGPEULPSZL8TSaTzRmNRvPs7OzHCKF4Rn9H9fX1AAAwODiYbTab362oqLA7nc5Xeb6/vz9lnc1me4Om6Tu1tbXv8TGNRgPhcDjze2qz2c7F2traUuaOjIxkFL/GNa7xMvwJ4WuVPrHMR8YAAAAASUVORK5CYII=" />*/
/*         <span class="sf-toolbar-status{% if collector.totals.calls > 0 %} sf-toolbar-status-green{% endif %}">{{ collector.totals.calls }}</span>*/
/*         {% if collector.totals.calls > 0 %}*/
/*             <span class="sf-toolbar-info-piece-additional-detail">in {{ '%0.2f'|format(collector.totals.time * 1000) }} ms</span>*/
/*         {% endif %}*/
/*     {% endset %}*/
/*     {% set text %}*/
/*         <div class="sf-toolbar-info-piece">*/
/*             <b>Memcache Calls</b>*/
/*             <span>{{ collector.totals.calls }}</span>*/
/*         </div>*/
/*         <div class="sf-toolbar-info-piece">*/
/*             <b>Total time</b>*/
/*             <span>{{ '%0.2f'|format(collector.totals.time * 1000) }} ms</span>*/
/*         </div>*/
/*         <div class="sf-toolbar-info-piece">*/
/*             <b>Cache hits</b>*/
/*             <span>{{ collector.totals.hits }}/{{ collector.totals.reads }} ({{ collector.totals.ratio }})</span>*/
/*         </div>*/
/*         <div class="sf-toolbar-info-piece">*/
/*             <b>Cache writes</b>*/
/*             <span>{{ collector.totals.writes }}</span>*/
/*         </div>*/
/*     {% endset %}*/
/*     {% include 'WebProfilerBundle:Profiler:toolbar_item.html.twig' with { 'link': profiler_url } %}*/
/* {% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">*/
/*         <img width="32" height="33" alt="Memcache" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAhCAYAAAC4JqlRAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3wYcFiU0a9/iTQAABA9JREFUWMPtVl1II1cUPncmySSaCCZFgxCzpW0MS4MlyiqD0dgxjaEUYaOCQugaBUsRxSglJbBBMduKRdtUELHUSKHERV+iPoqbIJQVLBbqdrWIC11/iO0aq5huMpnbh+4EW1M3UehL/R7Pdw7nO9+5984AXOMa/3skEgmwWCwpudXV1XMxh8ORMtfpdF5OgEqlAgCAzs5OqdlsLq+srDTZ7fYbPN/T03OuBmMMVqtVbTAYTCaTiQ6FQmKe8/l8mYvAGENNTc0dmqafl5eX46qqqod1dXXtu7u72XzO2NhYMr+pqamAYZiFsrIyTNP0KcMwE62trWU839zcDCzLptUbAQAwDCOMRCL3OI7rRQgBxhhEIlE8KytrSafT3fN6vcGzRWaz+a3j4+OFaDRaAABAEASIxeInCoXiW7fb/UlJSclJusMTAACHh4eAMeYQQn+pQgji8bjw6OjonZWVlbnGxsbPMcYivohlWcxxXAIhBLzgaDR6Y2dnx9nb2/udw+F4m89dXFx8uYCLEIvFZJubm10mk2nL6XRWAgCQJEkQBEGmWCURiUTeXF5eXmxoaJgIBALZDMMk+dHR0dQr0Ov1QgAYAICPLjonAoEACgsLvwaAub29vYloNPoK79o/wXEc5ObmPlOr1R8AwILP5zu9lANJpQhBIpGA7e1tezgcvs+ybPa/NefPRSQSka+vr9/f39//xmaz0TzncrkyF3AWJycnQpZlJemKPjg4uL21tTVjsVg+nZ6elns8HmhpaclsBVfFixVyFEU91uv1Nq/X+/2lHbgMXrhBnJ6e3lxbW+u60gquYoRUKv3FYDAM/KcCEEIgFAqfFRQUfBkMBl/zeDw/d3R0ZC4AYwwAABKJ5IgkyT/S3Dvk5OTMabVa6/z8fBdCKD4+Pp58E9IWwHEciMViUCqV4wqFokckEp3wglI1xhiDXC5/olQq7Uaj8f2pqakHAADd3d3Q3t6ezBWkO3VeXt5P+fn5H2q12ofBYPB1jHEs1TvAcRxIJBJQKpWfURT1hd/vfxoIBAAAYGNjA4qKitJ/iDDGIBaLWY1GM6DT6W5ZrdYHLpcrmkgkCI7jEqlq5HL5j8XFxWXV1dVOv9//FACgr68PAOBc86QDFEVBLBaDs5aSJBmTSqU/lJaWdgwNDa2cdYMkSSAI4m+HjCTJX1Uq1VczMzN3EULxs03cbvfFH6PJyUlWJpNtCwSC3wmCiIpEokdqtfru0tLSLb55KBSC4eFhfsoIRVGPEULPSZL8TSaTzRmNRvPs7OzHCKF4Rn9H9fX1AAAwODiYbTab362oqLA7nc5Xeb6/vz9lnc1me4Om6Tu1tbXv8TGNRgPhcDjze2qz2c7F2traUuaOjIxkFL/GNa7xMvwJ4WuVPrHMR8YAAAAASUVORK5CYII=" />*/
/*     </span>*/
/*     <strong>Memcache</strong>*/
/*     <span class="count">*/
/*         <span>{{ collector.totals.calls }}</span>*/
/*         <span>{{ '%0.0f'|format(collector.totals.time * 1000) }} ms</span>*/
/*     </span>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     <h2>Memcache</h2>*/
/*     {% for name, calls in collector.calls %}*/
/*         <h3>Statistics for pool '{{ name }}'</h3>*/
/*         <table>*/
/*         <thead><tr>*/
/*         {% for key, value in collector.statistics[name] %}*/
/*         <th>{{ key|capitalize }}</th>*/
/*         {% endfor %}*/
/*         </tr></thead><tbody><tr>*/
/*         {% for key, value in collector.statistics[name] %}*/
/*             {% if key == 'time' %}*/
/*                 <td>{{ '%0.2f'|format(value * 1000) }} ms</td>*/
/*             {% else %}*/
/*                 <td>{{ value }}</td>*/
/*             {% endif %}*/
/*         {% endfor %}*/
/*         </tr></tbody></table>*/
/* */
/*         <h3>Calls for pool '{{ name }}'</h3>*/
/* */
/*         {% if not collector.totals.calls %}*/
/*             <p>*/
/*                 <em>No calls.</em>*/
/*             </p>*/
/*         {% else %}*/
/*             <ul class="alt">*/
/*                 {% for i, call in calls %}*/
/*                     <li class="{{ i is odd ? 'odd' : 'even' }}">*/
/*                         <div>*/
/*                             <strong>Name</strong>: {{ call.name }}<br />*/
/*                             <strong>Arguments</strong>: {{ call.arguments|json_encode() }}<br/>*/
/*                             <strong>Results</strong>: {{ call.result|json_encode() }}<br/>*/
/*                         </div>*/
/*                         <small>*/
/*                             <strong>Time</strong>: {{ '%0.2f'|format(call.time * 1000) }} ms*/
/*                         </small>*/
/*                     </li>*/
/*                 {% endfor %}*/
/*             </ul>*/
/*         {% endif %}*/
/* */
/*         <h3>Options for pool '{{ name }}'</h3>*/
/*         <pre>*/
/*             {%- for key, value in collector.options[name] %}*/
/*                 {{- '%-25s'|format(key~':') }} {{ value }}{{ "\n" -}}*/
/*             {% endfor %}*/
/*         </pre>*/
/*     {% endfor %}*/
/* */
/* {% endblock %}*/
/* */
