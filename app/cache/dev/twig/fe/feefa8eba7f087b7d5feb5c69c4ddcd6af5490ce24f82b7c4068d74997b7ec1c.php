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
        $__internal_f30c9482de09299ad105aa053c5eef43dab68a1bf6de2604037579c953825f88 = $this->env->getExtension("native_profiler");
        $__internal_f30c9482de09299ad105aa053c5eef43dab68a1bf6de2604037579c953825f88->enter($__internal_f30c9482de09299ad105aa053c5eef43dab68a1bf6de2604037579c953825f88_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f30c9482de09299ad105aa053c5eef43dab68a1bf6de2604037579c953825f88->leave($__internal_f30c9482de09299ad105aa053c5eef43dab68a1bf6de2604037579c953825f88_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_31a693212ebc67e5b3df98ca78214040ab0c3cb7aee3c40e185f850c5cf5f188 = $this->env->getExtension("native_profiler");
        $__internal_31a693212ebc67e5b3df98ca78214040ab0c3cb7aee3c40e185f850c5cf5f188->enter($__internal_31a693212ebc67e5b3df98ca78214040ab0c3cb7aee3c40e185f850c5cf5f188_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_31a693212ebc67e5b3df98ca78214040ab0c3cb7aee3c40e185f850c5cf5f188->leave($__internal_31a693212ebc67e5b3df98ca78214040ab0c3cb7aee3c40e185f850c5cf5f188_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_8d8ec46a034cad00213d3bfc25e3ebf4cf432dacc3f9505a379ed86136912bf1 = $this->env->getExtension("native_profiler");
        $__internal_8d8ec46a034cad00213d3bfc25e3ebf4cf432dacc3f9505a379ed86136912bf1->enter($__internal_8d8ec46a034cad00213d3bfc25e3ebf4cf432dacc3f9505a379ed86136912bf1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_8d8ec46a034cad00213d3bfc25e3ebf4cf432dacc3f9505a379ed86136912bf1->leave($__internal_8d8ec46a034cad00213d3bfc25e3ebf4cf432dacc3f9505a379ed86136912bf1_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_bb522625c1dca2b552dac032f5b3d8ab7e2b6d6c7fb5be87951c509bcf0fa55d = $this->env->getExtension("native_profiler");
        $__internal_bb522625c1dca2b552dac032f5b3d8ab7e2b6d6c7fb5be87951c509bcf0fa55d->enter($__internal_bb522625c1dca2b552dac032f5b3d8ab7e2b6d6c7fb5be87951c509bcf0fa55d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_bb522625c1dca2b552dac032f5b3d8ab7e2b6d6c7fb5be87951c509bcf0fa55d->leave($__internal_bb522625c1dca2b552dac032f5b3d8ab7e2b6d6c7fb5be87951c509bcf0fa55d_prof);

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
