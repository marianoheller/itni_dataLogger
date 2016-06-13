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
        $__internal_d7490fe6cc84734bdbec99f4bbbe324a04f42d2cde1ec3c4e73eccf95fb90ccc = $this->env->getExtension("native_profiler");
        $__internal_d7490fe6cc84734bdbec99f4bbbe324a04f42d2cde1ec3c4e73eccf95fb90ccc->enter($__internal_d7490fe6cc84734bdbec99f4bbbe324a04f42d2cde1ec3c4e73eccf95fb90ccc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d7490fe6cc84734bdbec99f4bbbe324a04f42d2cde1ec3c4e73eccf95fb90ccc->leave($__internal_d7490fe6cc84734bdbec99f4bbbe324a04f42d2cde1ec3c4e73eccf95fb90ccc_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_1d0b3324ee585fbefec5f33b6908433d0188629bc2f91dc18e3bf85b1344cfc3 = $this->env->getExtension("native_profiler");
        $__internal_1d0b3324ee585fbefec5f33b6908433d0188629bc2f91dc18e3bf85b1344cfc3->enter($__internal_1d0b3324ee585fbefec5f33b6908433d0188629bc2f91dc18e3bf85b1344cfc3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_1d0b3324ee585fbefec5f33b6908433d0188629bc2f91dc18e3bf85b1344cfc3->leave($__internal_1d0b3324ee585fbefec5f33b6908433d0188629bc2f91dc18e3bf85b1344cfc3_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_252fd716218f675df936bea10d0bbe59fed315af93303de0bb49d475f0707f0d = $this->env->getExtension("native_profiler");
        $__internal_252fd716218f675df936bea10d0bbe59fed315af93303de0bb49d475f0707f0d->enter($__internal_252fd716218f675df936bea10d0bbe59fed315af93303de0bb49d475f0707f0d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_252fd716218f675df936bea10d0bbe59fed315af93303de0bb49d475f0707f0d->leave($__internal_252fd716218f675df936bea10d0bbe59fed315af93303de0bb49d475f0707f0d_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_bc8bc8bc9fb39f802880b9b34e1d913943b3726d8a14b611d0f224c4c72313c0 = $this->env->getExtension("native_profiler");
        $__internal_bc8bc8bc9fb39f802880b9b34e1d913943b3726d8a14b611d0f224c4c72313c0->enter($__internal_bc8bc8bc9fb39f802880b9b34e1d913943b3726d8a14b611d0f224c4c72313c0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_bc8bc8bc9fb39f802880b9b34e1d913943b3726d8a14b611d0f224c4c72313c0->leave($__internal_bc8bc8bc9fb39f802880b9b34e1d913943b3726d8a14b611d0f224c4c72313c0_prof);

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
