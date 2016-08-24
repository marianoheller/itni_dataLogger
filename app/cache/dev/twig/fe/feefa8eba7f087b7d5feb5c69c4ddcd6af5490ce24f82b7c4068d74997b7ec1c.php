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
        $__internal_0607ec67564e97e404d8cb4fe7565588fd547427b490d5a60b1a96dd5986a1f0 = $this->env->getExtension("native_profiler");
        $__internal_0607ec67564e97e404d8cb4fe7565588fd547427b490d5a60b1a96dd5986a1f0->enter($__internal_0607ec67564e97e404d8cb4fe7565588fd547427b490d5a60b1a96dd5986a1f0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_0607ec67564e97e404d8cb4fe7565588fd547427b490d5a60b1a96dd5986a1f0->leave($__internal_0607ec67564e97e404d8cb4fe7565588fd547427b490d5a60b1a96dd5986a1f0_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_91447ae9e9526b8e721ab386b5eb23cc5197d10926ba3adf85bd9221813f50bc = $this->env->getExtension("native_profiler");
        $__internal_91447ae9e9526b8e721ab386b5eb23cc5197d10926ba3adf85bd9221813f50bc->enter($__internal_91447ae9e9526b8e721ab386b5eb23cc5197d10926ba3adf85bd9221813f50bc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_91447ae9e9526b8e721ab386b5eb23cc5197d10926ba3adf85bd9221813f50bc->leave($__internal_91447ae9e9526b8e721ab386b5eb23cc5197d10926ba3adf85bd9221813f50bc_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_d993271c87f6742d0f44c0c50ff402b1ea3911683ac444477c2f285e10b9a690 = $this->env->getExtension("native_profiler");
        $__internal_d993271c87f6742d0f44c0c50ff402b1ea3911683ac444477c2f285e10b9a690->enter($__internal_d993271c87f6742d0f44c0c50ff402b1ea3911683ac444477c2f285e10b9a690_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_d993271c87f6742d0f44c0c50ff402b1ea3911683ac444477c2f285e10b9a690->leave($__internal_d993271c87f6742d0f44c0c50ff402b1ea3911683ac444477c2f285e10b9a690_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_4916403ac3d0283bd7bdd17861ef2e43b914677fcbacbe154ba5b86fb7f8dd42 = $this->env->getExtension("native_profiler");
        $__internal_4916403ac3d0283bd7bdd17861ef2e43b914677fcbacbe154ba5b86fb7f8dd42->enter($__internal_4916403ac3d0283bd7bdd17861ef2e43b914677fcbacbe154ba5b86fb7f8dd42_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_4916403ac3d0283bd7bdd17861ef2e43b914677fcbacbe154ba5b86fb7f8dd42->leave($__internal_4916403ac3d0283bd7bdd17861ef2e43b914677fcbacbe154ba5b86fb7f8dd42_prof);

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
