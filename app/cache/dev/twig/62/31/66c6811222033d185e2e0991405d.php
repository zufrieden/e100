<?php

/* WebProfilerBundle:Profiler:base_js.html.twig */
class __TwigTemplate_623166c6811222033d185e2e0991405d extends Twig_Template
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
        echo "<script type=\"text/javascript\">/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},
            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 === xhr.readyState && 200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else if (4 === xhr.readyState && xhr.status != 200) {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },
            hasClass = function(el, klass) {
                return el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },
            removeClass = function(el, klass) {
                el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
            },
            addClass = function(el, klass) {
                if (!hasClass(el, klass)) { el.className += \" \" + klass; }
            };

        return {
            hasClass: hasClass,
            removeClass: removeClass,
            addClass: addClass,
            request: request,
            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        options
                    );
                }

                return this;
            },
            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }

        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  89 => 20,  64 => 15,  55 => 14,  53 => 13,  42 => 13,  23 => 4,  96 => 22,  94 => 21,  87 => 19,  81 => 18,  74 => 16,  70 => 14,  66 => 12,  48 => 8,  31 => 5,  25 => 4,  22 => 2,  223 => 96,  214 => 90,  210 => 88,  203 => 84,  199 => 83,  194 => 80,  192 => 79,  189 => 78,  187 => 77,  184 => 76,  178 => 72,  176 => 71,  161 => 63,  157 => 61,  155 => 60,  152 => 59,  145 => 55,  141 => 54,  136 => 51,  128 => 47,  125 => 46,  119 => 45,  116 => 44,  112 => 43,  102 => 36,  98 => 34,  93 => 31,  76 => 28,  73 => 27,  69 => 26,  58 => 23,  56 => 9,  32 => 11,  79 => 40,  77 => 17,  57 => 22,  37 => 6,  29 => 6,  24 => 3,  19 => 2,  44 => 7,  91 => 20,  78 => 15,  72 => 16,  65 => 12,  59 => 11,  52 => 9,  39 => 9,  26 => 3,  17 => 1,  180 => 59,  175 => 10,  170 => 67,  162 => 81,  158 => 80,  154 => 79,  150 => 78,  146 => 77,  142 => 76,  138 => 75,  134 => 50,  130 => 48,  126 => 72,  122 => 71,  118 => 70,  114 => 69,  103 => 24,  101 => 59,  92 => 39,  85 => 17,  50 => 17,  46 => 19,  34 => 7,  30 => 4,  20 => 2,  90 => 51,  86 => 6,  82 => 19,  75 => 23,  71 => 22,  67 => 21,  61 => 24,  49 => 12,  45 => 10,  41 => 7,  36 => 6,  33 => 7,  27 => 3,);
    }
}
