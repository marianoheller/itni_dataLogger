<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_7883c97ce0cf77f645a3e7d7fd3a88eb4f44297198296c225041107035eabf90 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_15a996e55f88205be5fc57f137e02d2ab9f99f8e59c7dd5f447270652e888889 = $this->env->getExtension("native_profiler");
        $__internal_15a996e55f88205be5fc57f137e02d2ab9f99f8e59c7dd5f447270652e888889->enter($__internal_15a996e55f88205be5fc57f137e02d2ab9f99f8e59c7dd5f447270652e888889_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_15a996e55f88205be5fc57f137e02d2ab9f99f8e59c7dd5f447270652e888889->leave($__internal_15a996e55f88205be5fc57f137e02d2ab9f99f8e59c7dd5f447270652e888889_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_71272a3d500839b74fd7b1bf108c6731801c77c76e53a701bb21036cdd4eaaa2 = $this->env->getExtension("native_profiler");
        $__internal_71272a3d500839b74fd7b1bf108c6731801c77c76e53a701bb21036cdd4eaaa2->enter($__internal_71272a3d500839b74fd7b1bf108c6731801c77c76e53a701bb21036cdd4eaaa2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_71272a3d500839b74fd7b1bf108c6731801c77c76e53a701bb21036cdd4eaaa2->leave($__internal_71272a3d500839b74fd7b1bf108c6731801c77c76e53a701bb21036cdd4eaaa2_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_7679d1763a71f57792361470e6adef23e6da7359506ccc4a46cbcb5c3865888b = $this->env->getExtension("native_profiler");
        $__internal_7679d1763a71f57792361470e6adef23e6da7359506ccc4a46cbcb5c3865888b->enter($__internal_7679d1763a71f57792361470e6adef23e6da7359506ccc4a46cbcb5c3865888b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_7679d1763a71f57792361470e6adef23e6da7359506ccc4a46cbcb5c3865888b->leave($__internal_7679d1763a71f57792361470e6adef23e6da7359506ccc4a46cbcb5c3865888b_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_8041038d5fa1463f5db7972a8279045f5d8f1b0d20bb5bb61304b8a51ff61fe6 = $this->env->getExtension("native_profiler");
        $__internal_8041038d5fa1463f5db7972a8279045f5d8f1b0d20bb5bb61304b8a51ff61fe6->enter($__internal_8041038d5fa1463f5db7972a8279045f5d8f1b0d20bb5bb61304b8a51ff61fe6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_8041038d5fa1463f5db7972a8279045f5d8f1b0d20bb5bb61304b8a51ff61fe6->leave($__internal_8041038d5fa1463f5db7972a8279045f5d8f1b0d20bb5bb61304b8a51ff61fe6_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
