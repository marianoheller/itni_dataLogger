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
        $__internal_ded27a3007a99c8cdecb649f6931b4d2052a79a1dad1a29f20dd13222a363749 = $this->env->getExtension("native_profiler");
        $__internal_ded27a3007a99c8cdecb649f6931b4d2052a79a1dad1a29f20dd13222a363749->enter($__internal_ded27a3007a99c8cdecb649f6931b4d2052a79a1dad1a29f20dd13222a363749_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ded27a3007a99c8cdecb649f6931b4d2052a79a1dad1a29f20dd13222a363749->leave($__internal_ded27a3007a99c8cdecb649f6931b4d2052a79a1dad1a29f20dd13222a363749_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_60be38522bd64009eb5cd12155e562ab1f4a17b1f57be4347012d9358ae1a0ae = $this->env->getExtension("native_profiler");
        $__internal_60be38522bd64009eb5cd12155e562ab1f4a17b1f57be4347012d9358ae1a0ae->enter($__internal_60be38522bd64009eb5cd12155e562ab1f4a17b1f57be4347012d9358ae1a0ae_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_60be38522bd64009eb5cd12155e562ab1f4a17b1f57be4347012d9358ae1a0ae->leave($__internal_60be38522bd64009eb5cd12155e562ab1f4a17b1f57be4347012d9358ae1a0ae_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_7af5e05e9e001762734ece092eae446b87d719b7a7be611ed373179ee50a4653 = $this->env->getExtension("native_profiler");
        $__internal_7af5e05e9e001762734ece092eae446b87d719b7a7be611ed373179ee50a4653->enter($__internal_7af5e05e9e001762734ece092eae446b87d719b7a7be611ed373179ee50a4653_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_7af5e05e9e001762734ece092eae446b87d719b7a7be611ed373179ee50a4653->leave($__internal_7af5e05e9e001762734ece092eae446b87d719b7a7be611ed373179ee50a4653_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_c05f0c64d759a6488806acd83021a5ee0f47f3e6fb10025faa94cf9a54af13d3 = $this->env->getExtension("native_profiler");
        $__internal_c05f0c64d759a6488806acd83021a5ee0f47f3e6fb10025faa94cf9a54af13d3->enter($__internal_c05f0c64d759a6488806acd83021a5ee0f47f3e6fb10025faa94cf9a54af13d3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_c05f0c64d759a6488806acd83021a5ee0f47f3e6fb10025faa94cf9a54af13d3->leave($__internal_c05f0c64d759a6488806acd83021a5ee0f47f3e6fb10025faa94cf9a54af13d3_prof);

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
