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
        $__internal_24d74ea1223d4a36b23109fb9b8becfaa995e12f8fe4a57e9b98256e65b8e914 = $this->env->getExtension("native_profiler");
        $__internal_24d74ea1223d4a36b23109fb9b8becfaa995e12f8fe4a57e9b98256e65b8e914->enter($__internal_24d74ea1223d4a36b23109fb9b8becfaa995e12f8fe4a57e9b98256e65b8e914_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_24d74ea1223d4a36b23109fb9b8becfaa995e12f8fe4a57e9b98256e65b8e914->leave($__internal_24d74ea1223d4a36b23109fb9b8becfaa995e12f8fe4a57e9b98256e65b8e914_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_db0c83a40133387be43f55c7f2a9e4aba752da60075a889a65432c233860789b = $this->env->getExtension("native_profiler");
        $__internal_db0c83a40133387be43f55c7f2a9e4aba752da60075a889a65432c233860789b->enter($__internal_db0c83a40133387be43f55c7f2a9e4aba752da60075a889a65432c233860789b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_db0c83a40133387be43f55c7f2a9e4aba752da60075a889a65432c233860789b->leave($__internal_db0c83a40133387be43f55c7f2a9e4aba752da60075a889a65432c233860789b_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_41d39f142b2caa68b2f5d8955bad6fe0fe8951b8088afa5cd6d2f60ad8d5437b = $this->env->getExtension("native_profiler");
        $__internal_41d39f142b2caa68b2f5d8955bad6fe0fe8951b8088afa5cd6d2f60ad8d5437b->enter($__internal_41d39f142b2caa68b2f5d8955bad6fe0fe8951b8088afa5cd6d2f60ad8d5437b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_41d39f142b2caa68b2f5d8955bad6fe0fe8951b8088afa5cd6d2f60ad8d5437b->leave($__internal_41d39f142b2caa68b2f5d8955bad6fe0fe8951b8088afa5cd6d2f60ad8d5437b_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_9b442a5730e0fccd59a4e5cb066ebb864ebefbea982ab559d58ecf6d520663be = $this->env->getExtension("native_profiler");
        $__internal_9b442a5730e0fccd59a4e5cb066ebb864ebefbea982ab559d58ecf6d520663be->enter($__internal_9b442a5730e0fccd59a4e5cb066ebb864ebefbea982ab559d58ecf6d520663be_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_9b442a5730e0fccd59a4e5cb066ebb864ebefbea982ab559d58ecf6d520663be->leave($__internal_9b442a5730e0fccd59a4e5cb066ebb864ebefbea982ab559d58ecf6d520663be_prof);

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
