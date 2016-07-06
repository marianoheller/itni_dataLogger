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
        $__internal_d2cf86c0ebe9475ae738f2646d1a7de63934627550fde2293fa4a7f5cb8f1a10 = $this->env->getExtension("native_profiler");
        $__internal_d2cf86c0ebe9475ae738f2646d1a7de63934627550fde2293fa4a7f5cb8f1a10->enter($__internal_d2cf86c0ebe9475ae738f2646d1a7de63934627550fde2293fa4a7f5cb8f1a10_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d2cf86c0ebe9475ae738f2646d1a7de63934627550fde2293fa4a7f5cb8f1a10->leave($__internal_d2cf86c0ebe9475ae738f2646d1a7de63934627550fde2293fa4a7f5cb8f1a10_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_404e75ea40423d976096c024c3a94aae0260e49f67798180c0b441ba5158ff09 = $this->env->getExtension("native_profiler");
        $__internal_404e75ea40423d976096c024c3a94aae0260e49f67798180c0b441ba5158ff09->enter($__internal_404e75ea40423d976096c024c3a94aae0260e49f67798180c0b441ba5158ff09_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_404e75ea40423d976096c024c3a94aae0260e49f67798180c0b441ba5158ff09->leave($__internal_404e75ea40423d976096c024c3a94aae0260e49f67798180c0b441ba5158ff09_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_ff9af5ca028740d4769081040c3eaef71f986c4a3332286a14099f283e430408 = $this->env->getExtension("native_profiler");
        $__internal_ff9af5ca028740d4769081040c3eaef71f986c4a3332286a14099f283e430408->enter($__internal_ff9af5ca028740d4769081040c3eaef71f986c4a3332286a14099f283e430408_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_ff9af5ca028740d4769081040c3eaef71f986c4a3332286a14099f283e430408->leave($__internal_ff9af5ca028740d4769081040c3eaef71f986c4a3332286a14099f283e430408_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_c69f35fd6640d415dcaf59e425a591c5f8fb904128659cc00336ae5c96a2f6ed = $this->env->getExtension("native_profiler");
        $__internal_c69f35fd6640d415dcaf59e425a591c5f8fb904128659cc00336ae5c96a2f6ed->enter($__internal_c69f35fd6640d415dcaf59e425a591c5f8fb904128659cc00336ae5c96a2f6ed_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_c69f35fd6640d415dcaf59e425a591c5f8fb904128659cc00336ae5c96a2f6ed->leave($__internal_c69f35fd6640d415dcaf59e425a591c5f8fb904128659cc00336ae5c96a2f6ed_prof);

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
