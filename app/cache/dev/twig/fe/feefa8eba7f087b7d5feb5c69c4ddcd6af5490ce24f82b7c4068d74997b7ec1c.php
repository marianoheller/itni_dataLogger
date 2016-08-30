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
        $__internal_6af0cf6cb0c2e69c18f5a3c8cc5227dbe821ae10d9d874835512225bd3bfee82 = $this->env->getExtension("native_profiler");
        $__internal_6af0cf6cb0c2e69c18f5a3c8cc5227dbe821ae10d9d874835512225bd3bfee82->enter($__internal_6af0cf6cb0c2e69c18f5a3c8cc5227dbe821ae10d9d874835512225bd3bfee82_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6af0cf6cb0c2e69c18f5a3c8cc5227dbe821ae10d9d874835512225bd3bfee82->leave($__internal_6af0cf6cb0c2e69c18f5a3c8cc5227dbe821ae10d9d874835512225bd3bfee82_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_100d4fffd0511fb94a5fa30c19906636fac74d9c0ad4c2d4ede5274dbb89d237 = $this->env->getExtension("native_profiler");
        $__internal_100d4fffd0511fb94a5fa30c19906636fac74d9c0ad4c2d4ede5274dbb89d237->enter($__internal_100d4fffd0511fb94a5fa30c19906636fac74d9c0ad4c2d4ede5274dbb89d237_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_100d4fffd0511fb94a5fa30c19906636fac74d9c0ad4c2d4ede5274dbb89d237->leave($__internal_100d4fffd0511fb94a5fa30c19906636fac74d9c0ad4c2d4ede5274dbb89d237_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_a1871b74e312193bfa9c2fe58024bed3b97ecb6e2e35f2d24b66a8c6b85f2059 = $this->env->getExtension("native_profiler");
        $__internal_a1871b74e312193bfa9c2fe58024bed3b97ecb6e2e35f2d24b66a8c6b85f2059->enter($__internal_a1871b74e312193bfa9c2fe58024bed3b97ecb6e2e35f2d24b66a8c6b85f2059_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_a1871b74e312193bfa9c2fe58024bed3b97ecb6e2e35f2d24b66a8c6b85f2059->leave($__internal_a1871b74e312193bfa9c2fe58024bed3b97ecb6e2e35f2d24b66a8c6b85f2059_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_6116cb694fd0114182c484b7188dcf5122b1af0e542828f28e1083062aabd01a = $this->env->getExtension("native_profiler");
        $__internal_6116cb694fd0114182c484b7188dcf5122b1af0e542828f28e1083062aabd01a->enter($__internal_6116cb694fd0114182c484b7188dcf5122b1af0e542828f28e1083062aabd01a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_6116cb694fd0114182c484b7188dcf5122b1af0e542828f28e1083062aabd01a->leave($__internal_6116cb694fd0114182c484b7188dcf5122b1af0e542828f28e1083062aabd01a_prof);

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
