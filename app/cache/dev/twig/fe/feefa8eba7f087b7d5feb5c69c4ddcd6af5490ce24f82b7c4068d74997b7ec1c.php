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
        $__internal_e3634f15eb2a161530a4378430b49456c7bb7153c5da9f2fe53b233dd011531f = $this->env->getExtension("native_profiler");
        $__internal_e3634f15eb2a161530a4378430b49456c7bb7153c5da9f2fe53b233dd011531f->enter($__internal_e3634f15eb2a161530a4378430b49456c7bb7153c5da9f2fe53b233dd011531f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e3634f15eb2a161530a4378430b49456c7bb7153c5da9f2fe53b233dd011531f->leave($__internal_e3634f15eb2a161530a4378430b49456c7bb7153c5da9f2fe53b233dd011531f_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_2445183c01d898aad2e373d9e99a39e26e9bf40a18937bbe8a1631185e04fd93 = $this->env->getExtension("native_profiler");
        $__internal_2445183c01d898aad2e373d9e99a39e26e9bf40a18937bbe8a1631185e04fd93->enter($__internal_2445183c01d898aad2e373d9e99a39e26e9bf40a18937bbe8a1631185e04fd93_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_2445183c01d898aad2e373d9e99a39e26e9bf40a18937bbe8a1631185e04fd93->leave($__internal_2445183c01d898aad2e373d9e99a39e26e9bf40a18937bbe8a1631185e04fd93_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_00f034c6d68407d0f60fd7550165473d68a94191d0ee9d6f34a1ba0b26e1c00d = $this->env->getExtension("native_profiler");
        $__internal_00f034c6d68407d0f60fd7550165473d68a94191d0ee9d6f34a1ba0b26e1c00d->enter($__internal_00f034c6d68407d0f60fd7550165473d68a94191d0ee9d6f34a1ba0b26e1c00d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_00f034c6d68407d0f60fd7550165473d68a94191d0ee9d6f34a1ba0b26e1c00d->leave($__internal_00f034c6d68407d0f60fd7550165473d68a94191d0ee9d6f34a1ba0b26e1c00d_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_cb69ea98eb2985d19312b68805fd37c898f60adbbebd6eb8ed77130252d13860 = $this->env->getExtension("native_profiler");
        $__internal_cb69ea98eb2985d19312b68805fd37c898f60adbbebd6eb8ed77130252d13860->enter($__internal_cb69ea98eb2985d19312b68805fd37c898f60adbbebd6eb8ed77130252d13860_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_cb69ea98eb2985d19312b68805fd37c898f60adbbebd6eb8ed77130252d13860->leave($__internal_cb69ea98eb2985d19312b68805fd37c898f60adbbebd6eb8ed77130252d13860_prof);

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
