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
        $__internal_27e653c86754c28677abaa09974c1c4b399d0ed712f5593a9d2c455dcf6be864 = $this->env->getExtension("native_profiler");
        $__internal_27e653c86754c28677abaa09974c1c4b399d0ed712f5593a9d2c455dcf6be864->enter($__internal_27e653c86754c28677abaa09974c1c4b399d0ed712f5593a9d2c455dcf6be864_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_27e653c86754c28677abaa09974c1c4b399d0ed712f5593a9d2c455dcf6be864->leave($__internal_27e653c86754c28677abaa09974c1c4b399d0ed712f5593a9d2c455dcf6be864_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_8ffb92d6443aa484c151ba90b136960f9cd3864c93d08278f24299af730fc380 = $this->env->getExtension("native_profiler");
        $__internal_8ffb92d6443aa484c151ba90b136960f9cd3864c93d08278f24299af730fc380->enter($__internal_8ffb92d6443aa484c151ba90b136960f9cd3864c93d08278f24299af730fc380_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_8ffb92d6443aa484c151ba90b136960f9cd3864c93d08278f24299af730fc380->leave($__internal_8ffb92d6443aa484c151ba90b136960f9cd3864c93d08278f24299af730fc380_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_99463589948c2e59e1cab25135d8b7a76e5e0b8338c52c60d35ae6fd92741105 = $this->env->getExtension("native_profiler");
        $__internal_99463589948c2e59e1cab25135d8b7a76e5e0b8338c52c60d35ae6fd92741105->enter($__internal_99463589948c2e59e1cab25135d8b7a76e5e0b8338c52c60d35ae6fd92741105_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_99463589948c2e59e1cab25135d8b7a76e5e0b8338c52c60d35ae6fd92741105->leave($__internal_99463589948c2e59e1cab25135d8b7a76e5e0b8338c52c60d35ae6fd92741105_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_3c63522aef650e88866b4cde90c1e5212f4384e8b38996ddb38955f0322dbeee = $this->env->getExtension("native_profiler");
        $__internal_3c63522aef650e88866b4cde90c1e5212f4384e8b38996ddb38955f0322dbeee->enter($__internal_3c63522aef650e88866b4cde90c1e5212f4384e8b38996ddb38955f0322dbeee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_3c63522aef650e88866b4cde90c1e5212f4384e8b38996ddb38955f0322dbeee->leave($__internal_3c63522aef650e88866b4cde90c1e5212f4384e8b38996ddb38955f0322dbeee_prof);

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
