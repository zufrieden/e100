<?php

/* WebProfilerBundle:Profiler:toolbar_js.html.twig */
class __TwigTemplate_9266f2ecd9c7b7daf2472a1184411500 extends Twig_Template
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
        echo "<div id=\"sfwdt";
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "\" class=\"sf-toolbar\" style=\"display: none\"></div>
";
        // line 2
        $this->env->loadTemplate("WebProfilerBundle:Profiler:base_js.html.twig")->display($context);
        // line 3
        echo "<script type=\"text/javascript\">/*<![CDATA[*/
    (function () {
        Sfjs.load(
            'sfwdt";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "',
            '";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_wdt", array("token" => $this->getContext($context, "token"))), "html", null, true);
        echo "',
            function(xhr, el) {
                el.style.display = -1 !== xhr.responseText.indexOf('sf-toolbarreset') ? 'block' : 'none';
            },
            function(xhr) {
                if (xhr.status !== 0) {
                    confirm('An error occurred while loading the web debug toolbar (' + xhr.status + ': ' + xhr.statusText + ').\\n\\nDo you want to open the profiler?') && (window.location = '";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler", array("token" => $this->getContext($context, "token"))), "html", null, true);
        echo "');
                }
            }
        );
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_js.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 20,  64 => 15,  55 => 14,  53 => 13,  42 => 13,  23 => 4,  96 => 22,  94 => 21,  87 => 19,  81 => 18,  74 => 16,  70 => 14,  66 => 12,  48 => 8,  31 => 5,  25 => 4,  22 => 2,  223 => 96,  214 => 90,  210 => 88,  203 => 84,  199 => 83,  194 => 80,  192 => 79,  189 => 78,  187 => 77,  184 => 76,  178 => 72,  176 => 71,  161 => 63,  157 => 61,  155 => 60,  152 => 59,  145 => 55,  141 => 54,  136 => 51,  128 => 47,  125 => 46,  119 => 45,  116 => 44,  112 => 43,  102 => 36,  98 => 34,  93 => 31,  76 => 28,  73 => 27,  69 => 26,  58 => 23,  56 => 9,  32 => 11,  79 => 40,  77 => 17,  57 => 22,  37 => 6,  29 => 6,  24 => 3,  19 => 2,  44 => 7,  91 => 20,  78 => 15,  72 => 16,  65 => 12,  59 => 11,  52 => 9,  39 => 9,  26 => 3,  17 => 1,  180 => 59,  175 => 10,  170 => 67,  162 => 81,  158 => 80,  154 => 79,  150 => 78,  146 => 77,  142 => 76,  138 => 75,  134 => 50,  130 => 48,  126 => 72,  122 => 71,  118 => 70,  114 => 69,  103 => 24,  101 => 59,  92 => 39,  85 => 17,  50 => 17,  46 => 19,  34 => 7,  30 => 4,  20 => 2,  90 => 51,  86 => 6,  82 => 19,  75 => 23,  71 => 22,  67 => 21,  61 => 24,  49 => 12,  45 => 10,  41 => 7,  36 => 6,  33 => 7,  27 => 3,);
    }
}
