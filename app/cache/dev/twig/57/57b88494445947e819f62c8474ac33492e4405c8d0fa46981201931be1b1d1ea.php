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
        $__internal_4225eec59be48a20fc751ff150c6340631752f367ea1d6dcdbc757c9a4a0751c = $this->env->getExtension("native_profiler");
        $__internal_4225eec59be48a20fc751ff150c6340631752f367ea1d6dcdbc757c9a4a0751c->enter($__internal_4225eec59be48a20fc751ff150c6340631752f367ea1d6dcdbc757c9a4a0751c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_4225eec59be48a20fc751ff150c6340631752f367ea1d6dcdbc757c9a4a0751c->leave($__internal_4225eec59be48a20fc751ff150c6340631752f367ea1d6dcdbc757c9a4a0751c_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_6794568afc648591d8a056cfc43438adf94af40ad40af72355842dcda31a6aba = $this->env->getExtension("native_profiler");
        $__internal_6794568afc648591d8a056cfc43438adf94af40ad40af72355842dcda31a6aba->enter($__internal_6794568afc648591d8a056cfc43438adf94af40ad40af72355842dcda31a6aba_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_6794568afc648591d8a056cfc43438adf94af40ad40af72355842dcda31a6aba->leave($__internal_6794568afc648591d8a056cfc43438adf94af40ad40af72355842dcda31a6aba_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_2c1645efa06bc37753670afa86c38041db15569b9f1e9ad337e579048f47b84c = $this->env->getExtension("native_profiler");
        $__internal_2c1645efa06bc37753670afa86c38041db15569b9f1e9ad337e579048f47b84c->enter($__internal_2c1645efa06bc37753670afa86c38041db15569b9f1e9ad337e579048f47b84c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_2c1645efa06bc37753670afa86c38041db15569b9f1e9ad337e579048f47b84c->leave($__internal_2c1645efa06bc37753670afa86c38041db15569b9f1e9ad337e579048f47b84c_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_065b2ae7f441864474e94dba4e9f413dbeb4bf4d35d2797ab6967e1c0cb20888 = $this->env->getExtension("native_profiler");
        $__internal_065b2ae7f441864474e94dba4e9f413dbeb4bf4d35d2797ab6967e1c0cb20888->enter($__internal_065b2ae7f441864474e94dba4e9f413dbeb4bf4d35d2797ab6967e1c0cb20888_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_065b2ae7f441864474e94dba4e9f413dbeb4bf4d35d2797ab6967e1c0cb20888->leave($__internal_065b2ae7f441864474e94dba4e9f413dbeb4bf4d35d2797ab6967e1c0cb20888_prof);

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
