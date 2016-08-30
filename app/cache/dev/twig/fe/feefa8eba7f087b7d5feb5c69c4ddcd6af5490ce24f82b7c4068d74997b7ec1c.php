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
        $__internal_afca1283ea0b1a5581fe66c8a859a90cec1807724cf57ebce9a46d5925d809b4 = $this->env->getExtension("native_profiler");
        $__internal_afca1283ea0b1a5581fe66c8a859a90cec1807724cf57ebce9a46d5925d809b4->enter($__internal_afca1283ea0b1a5581fe66c8a859a90cec1807724cf57ebce9a46d5925d809b4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_afca1283ea0b1a5581fe66c8a859a90cec1807724cf57ebce9a46d5925d809b4->leave($__internal_afca1283ea0b1a5581fe66c8a859a90cec1807724cf57ebce9a46d5925d809b4_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_bf597dfd6d11967a9514e1660666d7ec806067a9f13218b91832b52023392d41 = $this->env->getExtension("native_profiler");
        $__internal_bf597dfd6d11967a9514e1660666d7ec806067a9f13218b91832b52023392d41->enter($__internal_bf597dfd6d11967a9514e1660666d7ec806067a9f13218b91832b52023392d41_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_bf597dfd6d11967a9514e1660666d7ec806067a9f13218b91832b52023392d41->leave($__internal_bf597dfd6d11967a9514e1660666d7ec806067a9f13218b91832b52023392d41_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_48621b41dd40aa075462d8ceea88e56d6e67c54038bfb6c157ecbe34fe7af9da = $this->env->getExtension("native_profiler");
        $__internal_48621b41dd40aa075462d8ceea88e56d6e67c54038bfb6c157ecbe34fe7af9da->enter($__internal_48621b41dd40aa075462d8ceea88e56d6e67c54038bfb6c157ecbe34fe7af9da_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_48621b41dd40aa075462d8ceea88e56d6e67c54038bfb6c157ecbe34fe7af9da->leave($__internal_48621b41dd40aa075462d8ceea88e56d6e67c54038bfb6c157ecbe34fe7af9da_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_d144a9d0e3ef1c3408a5b155f01182c87a6f9ff793ee24bc073d1db0046dad20 = $this->env->getExtension("native_profiler");
        $__internal_d144a9d0e3ef1c3408a5b155f01182c87a6f9ff793ee24bc073d1db0046dad20->enter($__internal_d144a9d0e3ef1c3408a5b155f01182c87a6f9ff793ee24bc073d1db0046dad20_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_d144a9d0e3ef1c3408a5b155f01182c87a6f9ff793ee24bc073d1db0046dad20->leave($__internal_d144a9d0e3ef1c3408a5b155f01182c87a6f9ff793ee24bc073d1db0046dad20_prof);

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
