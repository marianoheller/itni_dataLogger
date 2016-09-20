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
        $__internal_c1b75e23e0a11b7e7f57a4eb080252d899c469ee7892731b03a98a3c7fb025b9 = $this->env->getExtension("native_profiler");
        $__internal_c1b75e23e0a11b7e7f57a4eb080252d899c469ee7892731b03a98a3c7fb025b9->enter($__internal_c1b75e23e0a11b7e7f57a4eb080252d899c469ee7892731b03a98a3c7fb025b9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c1b75e23e0a11b7e7f57a4eb080252d899c469ee7892731b03a98a3c7fb025b9->leave($__internal_c1b75e23e0a11b7e7f57a4eb080252d899c469ee7892731b03a98a3c7fb025b9_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_3b21efa5b771f71366c25a85904463cb8bdd3b8eff5bd12c182853a408b2fc3e = $this->env->getExtension("native_profiler");
        $__internal_3b21efa5b771f71366c25a85904463cb8bdd3b8eff5bd12c182853a408b2fc3e->enter($__internal_3b21efa5b771f71366c25a85904463cb8bdd3b8eff5bd12c182853a408b2fc3e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_3b21efa5b771f71366c25a85904463cb8bdd3b8eff5bd12c182853a408b2fc3e->leave($__internal_3b21efa5b771f71366c25a85904463cb8bdd3b8eff5bd12c182853a408b2fc3e_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_740fcb58e473479a25b0b088f38ef67179bb34d2709b2d7df93449376380c615 = $this->env->getExtension("native_profiler");
        $__internal_740fcb58e473479a25b0b088f38ef67179bb34d2709b2d7df93449376380c615->enter($__internal_740fcb58e473479a25b0b088f38ef67179bb34d2709b2d7df93449376380c615_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_740fcb58e473479a25b0b088f38ef67179bb34d2709b2d7df93449376380c615->leave($__internal_740fcb58e473479a25b0b088f38ef67179bb34d2709b2d7df93449376380c615_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_be6325aadb7665668295d3c89800ba030ee68e0e6717838e2847bfc21a9a641c = $this->env->getExtension("native_profiler");
        $__internal_be6325aadb7665668295d3c89800ba030ee68e0e6717838e2847bfc21a9a641c->enter($__internal_be6325aadb7665668295d3c89800ba030ee68e0e6717838e2847bfc21a9a641c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_be6325aadb7665668295d3c89800ba030ee68e0e6717838e2847bfc21a9a641c->leave($__internal_be6325aadb7665668295d3c89800ba030ee68e0e6717838e2847bfc21a9a641c_prof);

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
