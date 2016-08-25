<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_2c795e4f6033b7397752f718220d85741e694fd3a9625b7ae667d48a668a1617 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f02f25f9b5c419708adf32f9c170b31e3668f5e0abda9fd4a27bb9b9b006d530 = $this->env->getExtension("native_profiler");
        $__internal_f02f25f9b5c419708adf32f9c170b31e3668f5e0abda9fd4a27bb9b9b006d530->enter($__internal_f02f25f9b5c419708adf32f9c170b31e3668f5e0abda9fd4a27bb9b9b006d530_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f02f25f9b5c419708adf32f9c170b31e3668f5e0abda9fd4a27bb9b9b006d530->leave($__internal_f02f25f9b5c419708adf32f9c170b31e3668f5e0abda9fd4a27bb9b9b006d530_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_5f706164627bfaf49c6ba8c8873a9cf65d6821a70bf10d12f7a4c63daecb55bc = $this->env->getExtension("native_profiler");
        $__internal_5f706164627bfaf49c6ba8c8873a9cf65d6821a70bf10d12f7a4c63daecb55bc->enter($__internal_5f706164627bfaf49c6ba8c8873a9cf65d6821a70bf10d12f7a4c63daecb55bc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_5f706164627bfaf49c6ba8c8873a9cf65d6821a70bf10d12f7a4c63daecb55bc->leave($__internal_5f706164627bfaf49c6ba8c8873a9cf65d6821a70bf10d12f7a4c63daecb55bc_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_95479c3a18a2b5df792c565295ec9ce83bcebe07ae131c47f6f6b13f97bbb41f = $this->env->getExtension("native_profiler");
        $__internal_95479c3a18a2b5df792c565295ec9ce83bcebe07ae131c47f6f6b13f97bbb41f->enter($__internal_95479c3a18a2b5df792c565295ec9ce83bcebe07ae131c47f6f6b13f97bbb41f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_95479c3a18a2b5df792c565295ec9ce83bcebe07ae131c47f6f6b13f97bbb41f->leave($__internal_95479c3a18a2b5df792c565295ec9ce83bcebe07ae131c47f6f6b13f97bbb41f_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_eec98c2ca9301937c5a51917b8b005dc18ca0c3907627b1167eabed6d14d320d = $this->env->getExtension("native_profiler");
        $__internal_eec98c2ca9301937c5a51917b8b005dc18ca0c3907627b1167eabed6d14d320d->enter($__internal_eec98c2ca9301937c5a51917b8b005dc18ca0c3907627b1167eabed6d14d320d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_eec98c2ca9301937c5a51917b8b005dc18ca0c3907627b1167eabed6d14d320d->leave($__internal_eec98c2ca9301937c5a51917b8b005dc18ca0c3907627b1167eabed6d14d320d_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
