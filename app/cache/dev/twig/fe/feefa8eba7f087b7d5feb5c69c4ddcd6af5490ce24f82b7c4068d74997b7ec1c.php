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
        $__internal_3f66ddb98f13cdef76399574b7d0a0acdd8f1e5f477b1b7fecc2eafe21807749 = $this->env->getExtension("native_profiler");
        $__internal_3f66ddb98f13cdef76399574b7d0a0acdd8f1e5f477b1b7fecc2eafe21807749->enter($__internal_3f66ddb98f13cdef76399574b7d0a0acdd8f1e5f477b1b7fecc2eafe21807749_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_3f66ddb98f13cdef76399574b7d0a0acdd8f1e5f477b1b7fecc2eafe21807749->leave($__internal_3f66ddb98f13cdef76399574b7d0a0acdd8f1e5f477b1b7fecc2eafe21807749_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_7ddd119ddb459c0f83912ef9860effced9d99e6a96b5bbfefc61554e28d3f44c = $this->env->getExtension("native_profiler");
        $__internal_7ddd119ddb459c0f83912ef9860effced9d99e6a96b5bbfefc61554e28d3f44c->enter($__internal_7ddd119ddb459c0f83912ef9860effced9d99e6a96b5bbfefc61554e28d3f44c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_7ddd119ddb459c0f83912ef9860effced9d99e6a96b5bbfefc61554e28d3f44c->leave($__internal_7ddd119ddb459c0f83912ef9860effced9d99e6a96b5bbfefc61554e28d3f44c_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_0bb61292c9b121be3696327e74020154335bf03fceaee31332da779a4a7b1eac = $this->env->getExtension("native_profiler");
        $__internal_0bb61292c9b121be3696327e74020154335bf03fceaee31332da779a4a7b1eac->enter($__internal_0bb61292c9b121be3696327e74020154335bf03fceaee31332da779a4a7b1eac_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_0bb61292c9b121be3696327e74020154335bf03fceaee31332da779a4a7b1eac->leave($__internal_0bb61292c9b121be3696327e74020154335bf03fceaee31332da779a4a7b1eac_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_deab5885f808d96fbc1c52114307fcbdced518c8fc6224767a15fd3350381214 = $this->env->getExtension("native_profiler");
        $__internal_deab5885f808d96fbc1c52114307fcbdced518c8fc6224767a15fd3350381214->enter($__internal_deab5885f808d96fbc1c52114307fcbdced518c8fc6224767a15fd3350381214_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_deab5885f808d96fbc1c52114307fcbdced518c8fc6224767a15fd3350381214->leave($__internal_deab5885f808d96fbc1c52114307fcbdced518c8fc6224767a15fd3350381214_prof);

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
