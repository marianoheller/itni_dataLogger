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
        $__internal_89a409cefd0939d11dab4d26b56c1d32cc596aa64114d8dbb1932a71157795d5 = $this->env->getExtension("native_profiler");
        $__internal_89a409cefd0939d11dab4d26b56c1d32cc596aa64114d8dbb1932a71157795d5->enter($__internal_89a409cefd0939d11dab4d26b56c1d32cc596aa64114d8dbb1932a71157795d5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_89a409cefd0939d11dab4d26b56c1d32cc596aa64114d8dbb1932a71157795d5->leave($__internal_89a409cefd0939d11dab4d26b56c1d32cc596aa64114d8dbb1932a71157795d5_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_4eadc5128343abe154a6552e2748f5efe99d0873226e1d9b5ff418919dd43398 = $this->env->getExtension("native_profiler");
        $__internal_4eadc5128343abe154a6552e2748f5efe99d0873226e1d9b5ff418919dd43398->enter($__internal_4eadc5128343abe154a6552e2748f5efe99d0873226e1d9b5ff418919dd43398_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_4eadc5128343abe154a6552e2748f5efe99d0873226e1d9b5ff418919dd43398->leave($__internal_4eadc5128343abe154a6552e2748f5efe99d0873226e1d9b5ff418919dd43398_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_143b23db29a869b19627c1783db64bf0af53114e323aaddfb879402e78ee5f2e = $this->env->getExtension("native_profiler");
        $__internal_143b23db29a869b19627c1783db64bf0af53114e323aaddfb879402e78ee5f2e->enter($__internal_143b23db29a869b19627c1783db64bf0af53114e323aaddfb879402e78ee5f2e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_143b23db29a869b19627c1783db64bf0af53114e323aaddfb879402e78ee5f2e->leave($__internal_143b23db29a869b19627c1783db64bf0af53114e323aaddfb879402e78ee5f2e_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_2cf9add55dcaba69b5ad68bddba7e28b07328d77218d5c2b43d61712baac0739 = $this->env->getExtension("native_profiler");
        $__internal_2cf9add55dcaba69b5ad68bddba7e28b07328d77218d5c2b43d61712baac0739->enter($__internal_2cf9add55dcaba69b5ad68bddba7e28b07328d77218d5c2b43d61712baac0739_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_2cf9add55dcaba69b5ad68bddba7e28b07328d77218d5c2b43d61712baac0739->leave($__internal_2cf9add55dcaba69b5ad68bddba7e28b07328d77218d5c2b43d61712baac0739_prof);

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
