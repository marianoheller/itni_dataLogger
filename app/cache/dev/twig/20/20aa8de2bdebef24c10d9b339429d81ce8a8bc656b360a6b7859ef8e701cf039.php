<?php

/* @WebProfiler/Collector/exception.html.twig */
class __TwigTemplate_d8a02a32ce769956f26b0e3e539345fc75814c28fd758c0e6344da35c3a820d4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/exception.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
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
        $__internal_694c0a17d5e28ba1f2b72f76634ddc49718729b16a2abfc73061c386b467df7d = $this->env->getExtension("native_profiler");
        $__internal_694c0a17d5e28ba1f2b72f76634ddc49718729b16a2abfc73061c386b467df7d->enter($__internal_694c0a17d5e28ba1f2b72f76634ddc49718729b16a2abfc73061c386b467df7d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_694c0a17d5e28ba1f2b72f76634ddc49718729b16a2abfc73061c386b467df7d->leave($__internal_694c0a17d5e28ba1f2b72f76634ddc49718729b16a2abfc73061c386b467df7d_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_e3d3f02eb5c693afbabb30432f0ffe4b7852fe4e0e55775ed91e96b82cddbeef = $this->env->getExtension("native_profiler");
        $__internal_e3d3f02eb5c693afbabb30432f0ffe4b7852fe4e0e55775ed91e96b82cddbeef->enter($__internal_e3d3f02eb5c693afbabb30432f0ffe4b7852fe4e0e55775ed91e96b82cddbeef_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    ";
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 5
            echo "        <style>
            ";
            // line 6
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_exception_css", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
            echo "
        </style>
    ";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
        
        $__internal_e3d3f02eb5c693afbabb30432f0ffe4b7852fe4e0e55775ed91e96b82cddbeef->leave($__internal_e3d3f02eb5c693afbabb30432f0ffe4b7852fe4e0e55775ed91e96b82cddbeef_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_121fd9ab001ad5baf35ed3ec4eb70b0a95dc4d198fc0cff7f23f0d7c528d39fb = $this->env->getExtension("native_profiler");
        $__internal_121fd9ab001ad5baf35ed3ec4eb70b0a95dc4d198fc0cff7f23f0d7c528d39fb->enter($__internal_121fd9ab001ad5baf35ed3ec4eb70b0a95dc4d198fc0cff7f23f0d7c528d39fb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 13
        echo "    <span class=\"label ";
        echo (($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) ? ("label-status-error") : ("disabled"));
        echo "\">
        <span class=\"icon\">";
        // line 14
        echo twig_include($this->env, $context, "@WebProfiler/Icon/exception.svg");
        echo "</span>
        <strong>Exception</strong>
        ";
        // line 16
        if ($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 17
            echo "            <span class=\"count\">
                <span>1</span>
            </span>
        ";
        }
        // line 21
        echo "    </span>
";
        
        $__internal_121fd9ab001ad5baf35ed3ec4eb70b0a95dc4d198fc0cff7f23f0d7c528d39fb->leave($__internal_121fd9ab001ad5baf35ed3ec4eb70b0a95dc4d198fc0cff7f23f0d7c528d39fb_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_81a6d155d80126c4b55a98c6e26f993a3b63f3e38cd7bdcf832d75d5b22e9f7b = $this->env->getExtension("native_profiler");
        $__internal_81a6d155d80126c4b55a98c6e26f993a3b63f3e38cd7bdcf832d75d5b22e9f7b->enter($__internal_81a6d155d80126c4b55a98c6e26f993a3b63f3e38cd7bdcf832d75d5b22e9f7b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 25
        echo "    <h2>Exceptions</h2>

    ";
        // line 27
        if ( !$this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "hasexception", array())) {
            // line 28
            echo "        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    ";
        } else {
            // line 32
            echo "        <div class=\"sf-reset\">
            ";
            // line 33
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_exception", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
            echo "
        </div>
    ";
        }
        
        $__internal_81a6d155d80126c4b55a98c6e26f993a3b63f3e38cd7bdcf832d75d5b22e9f7b->leave($__internal_81a6d155d80126c4b55a98c6e26f993a3b63f3e38cd7bdcf832d75d5b22e9f7b_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 33,  114 => 32,  108 => 28,  106 => 27,  102 => 25,  96 => 24,  88 => 21,  82 => 17,  80 => 16,  75 => 14,  70 => 13,  64 => 12,  54 => 9,  48 => 6,  45 => 5,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     {% if collector.hasexception %}*/
/*         <style>*/
/*             {{ render(path('_profiler_exception_css', { token: token })) }}*/
/*         </style>*/
/*     {% endif %}*/
/*     {{ parent() }}*/
/* {% endblock %}*/
/* */
/* {% block menu %}*/
/*     <span class="label {{ collector.hasexception ? 'label-status-error' : 'disabled' }}">*/
/*         <span class="icon">{{ include('@WebProfiler/Icon/exception.svg') }}</span>*/
/*         <strong>Exception</strong>*/
/*         {% if collector.hasexception %}*/
/*             <span class="count">*/
/*                 <span>1</span>*/
/*             </span>*/
/*         {% endif %}*/
/*     </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     <h2>Exceptions</h2>*/
/* */
/*     {% if not collector.hasexception %}*/
/*         <div class="empty">*/
/*             <p>No exception was thrown and caught during the request.</p>*/
/*         </div>*/
/*     {% else %}*/
/*         <div class="sf-reset">*/
/*             {{ render(path('_profiler_exception', { token: token })) }}*/
/*         </div>*/
/*     {% endif %}*/
/* {% endblock %}*/
/* */
