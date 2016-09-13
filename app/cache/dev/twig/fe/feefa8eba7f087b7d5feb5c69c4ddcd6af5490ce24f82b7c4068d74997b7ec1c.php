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
        $__internal_0c4baf6f63533156f40b2d6921ac12fb33bc8647398024fd64a09fceb5710ef3 = $this->env->getExtension("native_profiler");
        $__internal_0c4baf6f63533156f40b2d6921ac12fb33bc8647398024fd64a09fceb5710ef3->enter($__internal_0c4baf6f63533156f40b2d6921ac12fb33bc8647398024fd64a09fceb5710ef3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_0c4baf6f63533156f40b2d6921ac12fb33bc8647398024fd64a09fceb5710ef3->leave($__internal_0c4baf6f63533156f40b2d6921ac12fb33bc8647398024fd64a09fceb5710ef3_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_7f3c9bc0ede0cf06693eccc4473d945dd841c2bc7bb696f6a5431c9056431b2a = $this->env->getExtension("native_profiler");
        $__internal_7f3c9bc0ede0cf06693eccc4473d945dd841c2bc7bb696f6a5431c9056431b2a->enter($__internal_7f3c9bc0ede0cf06693eccc4473d945dd841c2bc7bb696f6a5431c9056431b2a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_7f3c9bc0ede0cf06693eccc4473d945dd841c2bc7bb696f6a5431c9056431b2a->leave($__internal_7f3c9bc0ede0cf06693eccc4473d945dd841c2bc7bb696f6a5431c9056431b2a_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_ef2417b3c85f9b66aeaef92740f3693b2ce95795d1d2d2a6cbe3e6f2ed4e91da = $this->env->getExtension("native_profiler");
        $__internal_ef2417b3c85f9b66aeaef92740f3693b2ce95795d1d2d2a6cbe3e6f2ed4e91da->enter($__internal_ef2417b3c85f9b66aeaef92740f3693b2ce95795d1d2d2a6cbe3e6f2ed4e91da_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_ef2417b3c85f9b66aeaef92740f3693b2ce95795d1d2d2a6cbe3e6f2ed4e91da->leave($__internal_ef2417b3c85f9b66aeaef92740f3693b2ce95795d1d2d2a6cbe3e6f2ed4e91da_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_3b713b301c00a3217935b9fc2f2117f7859edbce4b0464f9fd337fdfc22993e7 = $this->env->getExtension("native_profiler");
        $__internal_3b713b301c00a3217935b9fc2f2117f7859edbce4b0464f9fd337fdfc22993e7->enter($__internal_3b713b301c00a3217935b9fc2f2117f7859edbce4b0464f9fd337fdfc22993e7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_3b713b301c00a3217935b9fc2f2117f7859edbce4b0464f9fd337fdfc22993e7->leave($__internal_3b713b301c00a3217935b9fc2f2117f7859edbce4b0464f9fd337fdfc22993e7_prof);

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
