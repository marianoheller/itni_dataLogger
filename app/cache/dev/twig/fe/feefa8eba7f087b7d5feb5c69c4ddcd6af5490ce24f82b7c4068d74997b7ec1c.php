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
        $__internal_bfbd20e8a7959ba5f0c2fba82514435af848a442879d37a1c1bebe28fb0917f4 = $this->env->getExtension("native_profiler");
        $__internal_bfbd20e8a7959ba5f0c2fba82514435af848a442879d37a1c1bebe28fb0917f4->enter($__internal_bfbd20e8a7959ba5f0c2fba82514435af848a442879d37a1c1bebe28fb0917f4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_bfbd20e8a7959ba5f0c2fba82514435af848a442879d37a1c1bebe28fb0917f4->leave($__internal_bfbd20e8a7959ba5f0c2fba82514435af848a442879d37a1c1bebe28fb0917f4_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_47cba45a67150628c319f7b2f9e255c5d1889aaa570a09dd795c67cbdb5d5ca4 = $this->env->getExtension("native_profiler");
        $__internal_47cba45a67150628c319f7b2f9e255c5d1889aaa570a09dd795c67cbdb5d5ca4->enter($__internal_47cba45a67150628c319f7b2f9e255c5d1889aaa570a09dd795c67cbdb5d5ca4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_47cba45a67150628c319f7b2f9e255c5d1889aaa570a09dd795c67cbdb5d5ca4->leave($__internal_47cba45a67150628c319f7b2f9e255c5d1889aaa570a09dd795c67cbdb5d5ca4_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_447989c54a3cd622af921c605a62839c749730305ab32f26a5266e8b681ba54a = $this->env->getExtension("native_profiler");
        $__internal_447989c54a3cd622af921c605a62839c749730305ab32f26a5266e8b681ba54a->enter($__internal_447989c54a3cd622af921c605a62839c749730305ab32f26a5266e8b681ba54a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_447989c54a3cd622af921c605a62839c749730305ab32f26a5266e8b681ba54a->leave($__internal_447989c54a3cd622af921c605a62839c749730305ab32f26a5266e8b681ba54a_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_835a923c0ca66987155f3ff1ea784745bff0647e250d858001bfd9c549530f1a = $this->env->getExtension("native_profiler");
        $__internal_835a923c0ca66987155f3ff1ea784745bff0647e250d858001bfd9c549530f1a->enter($__internal_835a923c0ca66987155f3ff1ea784745bff0647e250d858001bfd9c549530f1a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_835a923c0ca66987155f3ff1ea784745bff0647e250d858001bfd9c549530f1a->leave($__internal_835a923c0ca66987155f3ff1ea784745bff0647e250d858001bfd9c549530f1a_prof);

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
