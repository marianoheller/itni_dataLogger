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
        $__internal_ec59fb471b41347be5d59f60dbb4dfbad1dee49d6d9052aaba0d75a40e417b52 = $this->env->getExtension("native_profiler");
        $__internal_ec59fb471b41347be5d59f60dbb4dfbad1dee49d6d9052aaba0d75a40e417b52->enter($__internal_ec59fb471b41347be5d59f60dbb4dfbad1dee49d6d9052aaba0d75a40e417b52_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ec59fb471b41347be5d59f60dbb4dfbad1dee49d6d9052aaba0d75a40e417b52->leave($__internal_ec59fb471b41347be5d59f60dbb4dfbad1dee49d6d9052aaba0d75a40e417b52_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_e572b0d1738603f0844118b8f8258271b5479eb87b0d668bfbf09b3264e90142 = $this->env->getExtension("native_profiler");
        $__internal_e572b0d1738603f0844118b8f8258271b5479eb87b0d668bfbf09b3264e90142->enter($__internal_e572b0d1738603f0844118b8f8258271b5479eb87b0d668bfbf09b3264e90142_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_e572b0d1738603f0844118b8f8258271b5479eb87b0d668bfbf09b3264e90142->leave($__internal_e572b0d1738603f0844118b8f8258271b5479eb87b0d668bfbf09b3264e90142_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_34b8e06601c8b99331f2c50c891334be55a848745be1bdca4ca5850126b3394a = $this->env->getExtension("native_profiler");
        $__internal_34b8e06601c8b99331f2c50c891334be55a848745be1bdca4ca5850126b3394a->enter($__internal_34b8e06601c8b99331f2c50c891334be55a848745be1bdca4ca5850126b3394a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_34b8e06601c8b99331f2c50c891334be55a848745be1bdca4ca5850126b3394a->leave($__internal_34b8e06601c8b99331f2c50c891334be55a848745be1bdca4ca5850126b3394a_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_d88073119324710c5c0f5659f9fdd958e912d3bdf2ea50ac2944a1a9334d1d3f = $this->env->getExtension("native_profiler");
        $__internal_d88073119324710c5c0f5659f9fdd958e912d3bdf2ea50ac2944a1a9334d1d3f->enter($__internal_d88073119324710c5c0f5659f9fdd958e912d3bdf2ea50ac2944a1a9334d1d3f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_d88073119324710c5c0f5659f9fdd958e912d3bdf2ea50ac2944a1a9334d1d3f->leave($__internal_d88073119324710c5c0f5659f9fdd958e912d3bdf2ea50ac2944a1a9334d1d3f_prof);

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
