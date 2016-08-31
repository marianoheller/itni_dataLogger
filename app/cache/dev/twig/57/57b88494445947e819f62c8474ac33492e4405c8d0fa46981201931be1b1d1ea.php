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
        $__internal_9f603b99d3d8516a4b54caf1737b8d858a93f3450e27154568eb07fd194c9ca4 = $this->env->getExtension("native_profiler");
        $__internal_9f603b99d3d8516a4b54caf1737b8d858a93f3450e27154568eb07fd194c9ca4->enter($__internal_9f603b99d3d8516a4b54caf1737b8d858a93f3450e27154568eb07fd194c9ca4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9f603b99d3d8516a4b54caf1737b8d858a93f3450e27154568eb07fd194c9ca4->leave($__internal_9f603b99d3d8516a4b54caf1737b8d858a93f3450e27154568eb07fd194c9ca4_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_450cb2322dda1bd44881f9848c05e66170749e7502e2108e62a818f8f28a153c = $this->env->getExtension("native_profiler");
        $__internal_450cb2322dda1bd44881f9848c05e66170749e7502e2108e62a818f8f28a153c->enter($__internal_450cb2322dda1bd44881f9848c05e66170749e7502e2108e62a818f8f28a153c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_450cb2322dda1bd44881f9848c05e66170749e7502e2108e62a818f8f28a153c->leave($__internal_450cb2322dda1bd44881f9848c05e66170749e7502e2108e62a818f8f28a153c_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_aa830a6ba724e000e88119a123052a86688c750c220eece589d6e15fcd9ba24e = $this->env->getExtension("native_profiler");
        $__internal_aa830a6ba724e000e88119a123052a86688c750c220eece589d6e15fcd9ba24e->enter($__internal_aa830a6ba724e000e88119a123052a86688c750c220eece589d6e15fcd9ba24e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_aa830a6ba724e000e88119a123052a86688c750c220eece589d6e15fcd9ba24e->leave($__internal_aa830a6ba724e000e88119a123052a86688c750c220eece589d6e15fcd9ba24e_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_cd7840f9c5a2c40074f238cef42c3dee60e0ca736363124ceb9c054dc4f18768 = $this->env->getExtension("native_profiler");
        $__internal_cd7840f9c5a2c40074f238cef42c3dee60e0ca736363124ceb9c054dc4f18768->enter($__internal_cd7840f9c5a2c40074f238cef42c3dee60e0ca736363124ceb9c054dc4f18768_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_cd7840f9c5a2c40074f238cef42c3dee60e0ca736363124ceb9c054dc4f18768->leave($__internal_cd7840f9c5a2c40074f238cef42c3dee60e0ca736363124ceb9c054dc4f18768_prof);

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
