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
        $__internal_1315b750072086fbf2f8fa170834d0159986b2180ea5f7de8823acd6e90724bc = $this->env->getExtension("native_profiler");
        $__internal_1315b750072086fbf2f8fa170834d0159986b2180ea5f7de8823acd6e90724bc->enter($__internal_1315b750072086fbf2f8fa170834d0159986b2180ea5f7de8823acd6e90724bc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_1315b750072086fbf2f8fa170834d0159986b2180ea5f7de8823acd6e90724bc->leave($__internal_1315b750072086fbf2f8fa170834d0159986b2180ea5f7de8823acd6e90724bc_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_1c8c92184f28260d207c4924eed705df3b01dbc5078f5ad9e2dde1fc235f1ab9 = $this->env->getExtension("native_profiler");
        $__internal_1c8c92184f28260d207c4924eed705df3b01dbc5078f5ad9e2dde1fc235f1ab9->enter($__internal_1c8c92184f28260d207c4924eed705df3b01dbc5078f5ad9e2dde1fc235f1ab9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_1c8c92184f28260d207c4924eed705df3b01dbc5078f5ad9e2dde1fc235f1ab9->leave($__internal_1c8c92184f28260d207c4924eed705df3b01dbc5078f5ad9e2dde1fc235f1ab9_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_1b0023a3a18dba4efabf6fa7225993f16ee9470a3ef45b138676db1c174448cb = $this->env->getExtension("native_profiler");
        $__internal_1b0023a3a18dba4efabf6fa7225993f16ee9470a3ef45b138676db1c174448cb->enter($__internal_1b0023a3a18dba4efabf6fa7225993f16ee9470a3ef45b138676db1c174448cb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_1b0023a3a18dba4efabf6fa7225993f16ee9470a3ef45b138676db1c174448cb->leave($__internal_1b0023a3a18dba4efabf6fa7225993f16ee9470a3ef45b138676db1c174448cb_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_e4a449bb01ac829b7a1eb779a3c765e7b42675bb7f5aacda0ea5ba920a3f83b9 = $this->env->getExtension("native_profiler");
        $__internal_e4a449bb01ac829b7a1eb779a3c765e7b42675bb7f5aacda0ea5ba920a3f83b9->enter($__internal_e4a449bb01ac829b7a1eb779a3c765e7b42675bb7f5aacda0ea5ba920a3f83b9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_e4a449bb01ac829b7a1eb779a3c765e7b42675bb7f5aacda0ea5ba920a3f83b9->leave($__internal_e4a449bb01ac829b7a1eb779a3c765e7b42675bb7f5aacda0ea5ba920a3f83b9_prof);

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
