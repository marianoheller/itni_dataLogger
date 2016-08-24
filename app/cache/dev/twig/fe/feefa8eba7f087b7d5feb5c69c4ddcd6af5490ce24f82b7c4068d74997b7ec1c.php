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
        $__internal_3ef3ade3c1419ceb2a5f716ee69d700f5aafc104e4415be1ac36bded4fee44b8 = $this->env->getExtension("native_profiler");
        $__internal_3ef3ade3c1419ceb2a5f716ee69d700f5aafc104e4415be1ac36bded4fee44b8->enter($__internal_3ef3ade3c1419ceb2a5f716ee69d700f5aafc104e4415be1ac36bded4fee44b8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_3ef3ade3c1419ceb2a5f716ee69d700f5aafc104e4415be1ac36bded4fee44b8->leave($__internal_3ef3ade3c1419ceb2a5f716ee69d700f5aafc104e4415be1ac36bded4fee44b8_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_5263621a80c3c007d4c9bcaa4b72e1da401a80e121c8d248e7af4ab0c6e0c568 = $this->env->getExtension("native_profiler");
        $__internal_5263621a80c3c007d4c9bcaa4b72e1da401a80e121c8d248e7af4ab0c6e0c568->enter($__internal_5263621a80c3c007d4c9bcaa4b72e1da401a80e121c8d248e7af4ab0c6e0c568_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_5263621a80c3c007d4c9bcaa4b72e1da401a80e121c8d248e7af4ab0c6e0c568->leave($__internal_5263621a80c3c007d4c9bcaa4b72e1da401a80e121c8d248e7af4ab0c6e0c568_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_c2af3093433f8a1a9d3b6c14bd47df14a1f40973e5bca9eb875b88177fe6e08f = $this->env->getExtension("native_profiler");
        $__internal_c2af3093433f8a1a9d3b6c14bd47df14a1f40973e5bca9eb875b88177fe6e08f->enter($__internal_c2af3093433f8a1a9d3b6c14bd47df14a1f40973e5bca9eb875b88177fe6e08f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_c2af3093433f8a1a9d3b6c14bd47df14a1f40973e5bca9eb875b88177fe6e08f->leave($__internal_c2af3093433f8a1a9d3b6c14bd47df14a1f40973e5bca9eb875b88177fe6e08f_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_d27eae3dfa6002b5e95cb3f0f0671023841169ccea641592f1173927f86a45f6 = $this->env->getExtension("native_profiler");
        $__internal_d27eae3dfa6002b5e95cb3f0f0671023841169ccea641592f1173927f86a45f6->enter($__internal_d27eae3dfa6002b5e95cb3f0f0671023841169ccea641592f1173927f86a45f6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_d27eae3dfa6002b5e95cb3f0f0671023841169ccea641592f1173927f86a45f6->leave($__internal_d27eae3dfa6002b5e95cb3f0f0671023841169ccea641592f1173927f86a45f6_prof);

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
