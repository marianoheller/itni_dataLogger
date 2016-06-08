<?php

/* datalogger/data.html.twig */
class __TwigTemplate_d216b61eaa40726ce2913421f75d379eca3916d9052102483c08a4783a3796a8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("datalogger_base.html.twig", "datalogger/data.html.twig", 1);
        $this->blocks = array(
            'pageTitle' => array($this, 'block_pageTitle'),
            'tableTitle' => array($this, 'block_tableTitle'),
            'dataHead' => array($this, 'block_dataHead'),
            'dataBody' => array($this, 'block_dataBody'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "datalogger_base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_272064e2cdc5de5fb4b503e2e0c14c9e54cb7453bc7f0234b78dc7c537b30d8c = $this->env->getExtension("native_profiler");
        $__internal_272064e2cdc5de5fb4b503e2e0c14c9e54cb7453bc7f0234b78dc7c537b30d8c->enter($__internal_272064e2cdc5de5fb4b503e2e0c14c9e54cb7453bc7f0234b78dc7c537b30d8c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "datalogger/data.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_272064e2cdc5de5fb4b503e2e0c14c9e54cb7453bc7f0234b78dc7c537b30d8c->leave($__internal_272064e2cdc5de5fb4b503e2e0c14c9e54cb7453bc7f0234b78dc7c537b30d8c_prof);

    }

    // line 3
    public function block_pageTitle($context, array $blocks = array())
    {
        $__internal_f1804f4ab1388ab72e9eacf2774f44da7002a66f40fec72507113ec44f61733e = $this->env->getExtension("native_profiler");
        $__internal_f1804f4ab1388ab72e9eacf2774f44da7002a66f40fec72507113ec44f61733e->enter($__internal_f1804f4ab1388ab72e9eacf2774f44da7002a66f40fec72507113ec44f61733e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageTitle"));

        // line 4
        echo "    <title>Data Logger</title>
";
        
        $__internal_f1804f4ab1388ab72e9eacf2774f44da7002a66f40fec72507113ec44f61733e->leave($__internal_f1804f4ab1388ab72e9eacf2774f44da7002a66f40fec72507113ec44f61733e_prof);

    }

    // line 7
    public function block_tableTitle($context, array $blocks = array())
    {
        $__internal_1d948f213faaef2330c816577ea3c1ac39cd5a4580b21d3b2db8a7f23cffe44d = $this->env->getExtension("native_profiler");
        $__internal_1d948f213faaef2330c816577ea3c1ac39cd5a4580b21d3b2db8a7f23cffe44d->enter($__internal_1d948f213faaef2330c816577ea3c1ac39cd5a4580b21d3b2db8a7f23cffe44d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "tableTitle"));

        // line 8
        echo "    <h3>Data Table</h3>
";
        
        $__internal_1d948f213faaef2330c816577ea3c1ac39cd5a4580b21d3b2db8a7f23cffe44d->leave($__internal_1d948f213faaef2330c816577ea3c1ac39cd5a4580b21d3b2db8a7f23cffe44d_prof);

    }

    // line 12
    public function block_dataHead($context, array $blocks = array())
    {
        $__internal_896d0eabd683d6b22498d36a64a115879454f987a2454d59aad4cc26ec09eac1 = $this->env->getExtension("native_profiler");
        $__internal_896d0eabd683d6b22498d36a64a115879454f987a2454d59aad4cc26ec09eac1->enter($__internal_896d0eabd683d6b22498d36a64a115879454f987a2454d59aad4cc26ec09eac1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "dataHead"));

        // line 13
        echo "    <tr>
        <th class=\"text-left\">Month</th>
        <th class=\"text-left\">Sales</th>
    </tr>
";
        
        $__internal_896d0eabd683d6b22498d36a64a115879454f987a2454d59aad4cc26ec09eac1->leave($__internal_896d0eabd683d6b22498d36a64a115879454f987a2454d59aad4cc26ec09eac1_prof);

    }

    // line 21
    public function block_dataBody($context, array $blocks = array())
    {
        $__internal_7d3c0f298c350f6b204c5495a9ae1f6cc78d46d0471e52089a793398791332cd = $this->env->getExtension("native_profiler");
        $__internal_7d3c0f298c350f6b204c5495a9ae1f6cc78d46d0471e52089a793398791332cd->enter($__internal_7d3c0f298c350f6b204c5495a9ae1f6cc78d46d0471e52089a793398791332cd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "dataBody"));

        // line 22
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listParams"]) ? $context["listParams"] : $this->getContext($context, "listParams")));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 23
            echo "        <tr>
            <td class=\"text-left\">";
            // line 24
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "</td>
            <td class=\"text-left\">";
            // line 25
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "</td>
        </tr>

    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_7d3c0f298c350f6b204c5495a9ae1f6cc78d46d0471e52089a793398791332cd->leave($__internal_7d3c0f298c350f6b204c5495a9ae1f6cc78d46d0471e52089a793398791332cd_prof);

    }

    public function getTemplateName()
    {
        return "datalogger/data.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 25,  96 => 24,  93 => 23,  88 => 22,  82 => 21,  71 => 13,  65 => 12,  57 => 8,  51 => 7,  43 => 4,  37 => 3,  11 => 1,);
    }
}
/* {% extends 'datalogger_base.html.twig' %}*/
/* */
/* {% block pageTitle %}*/
/*     <title>Data Logger</title>*/
/* {% endblock %}*/
/* */
/* {% block tableTitle %}*/
/*     <h3>Data Table</h3>*/
/* {% endblock %}*/
/* */
/* */
/* {% block dataHead %}*/
/*     <tr>*/
/*         <th class="text-left">Month</th>*/
/*         <th class="text-left">Sales</th>*/
/*     </tr>*/
/* {% endblock %}*/
/* */
/* */
/* */
/* {% block dataBody %}*/
/*     {% for key,value in listParams %}*/
/*         <tr>*/
/*             <td class="text-left">{{ key }}</td>*/
/*             <td class="text-left">{{ value }}</td>*/
/*         </tr>*/
/* */
/*     {% endfor %}*/
/* {% endblock %}*/
