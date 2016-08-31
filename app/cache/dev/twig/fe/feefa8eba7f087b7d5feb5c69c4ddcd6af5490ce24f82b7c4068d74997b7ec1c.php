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
        $__internal_56926e3dfddecab358d0dc4566e3ae51a78c6c57ccbc0a7525c624bd80292233 = $this->env->getExtension("native_profiler");
        $__internal_56926e3dfddecab358d0dc4566e3ae51a78c6c57ccbc0a7525c624bd80292233->enter($__internal_56926e3dfddecab358d0dc4566e3ae51a78c6c57ccbc0a7525c624bd80292233_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_56926e3dfddecab358d0dc4566e3ae51a78c6c57ccbc0a7525c624bd80292233->leave($__internal_56926e3dfddecab358d0dc4566e3ae51a78c6c57ccbc0a7525c624bd80292233_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_50e0a5022fa275c8014f6d14b7bbd65cf088ef85bb2e1682dc150bacacc68189 = $this->env->getExtension("native_profiler");
        $__internal_50e0a5022fa275c8014f6d14b7bbd65cf088ef85bb2e1682dc150bacacc68189->enter($__internal_50e0a5022fa275c8014f6d14b7bbd65cf088ef85bb2e1682dc150bacacc68189_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_50e0a5022fa275c8014f6d14b7bbd65cf088ef85bb2e1682dc150bacacc68189->leave($__internal_50e0a5022fa275c8014f6d14b7bbd65cf088ef85bb2e1682dc150bacacc68189_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_3ae618eab84a4a0cedbf8cce71cd535e913e7a5255c24f77b8627da2649afddd = $this->env->getExtension("native_profiler");
        $__internal_3ae618eab84a4a0cedbf8cce71cd535e913e7a5255c24f77b8627da2649afddd->enter($__internal_3ae618eab84a4a0cedbf8cce71cd535e913e7a5255c24f77b8627da2649afddd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_3ae618eab84a4a0cedbf8cce71cd535e913e7a5255c24f77b8627da2649afddd->leave($__internal_3ae618eab84a4a0cedbf8cce71cd535e913e7a5255c24f77b8627da2649afddd_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_bdc802f52b379642701c0d93cc1a52ab623ee21a02cac985699545027f5a50a2 = $this->env->getExtension("native_profiler");
        $__internal_bdc802f52b379642701c0d93cc1a52ab623ee21a02cac985699545027f5a50a2->enter($__internal_bdc802f52b379642701c0d93cc1a52ab623ee21a02cac985699545027f5a50a2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_bdc802f52b379642701c0d93cc1a52ab623ee21a02cac985699545027f5a50a2->leave($__internal_bdc802f52b379642701c0d93cc1a52ab623ee21a02cac985699545027f5a50a2_prof);

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
