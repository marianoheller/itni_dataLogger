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
        $__internal_5451930d82a32c698cb7412faa54fcbe109055fa77a82433d130ee38ebc3026c = $this->env->getExtension("native_profiler");
        $__internal_5451930d82a32c698cb7412faa54fcbe109055fa77a82433d130ee38ebc3026c->enter($__internal_5451930d82a32c698cb7412faa54fcbe109055fa77a82433d130ee38ebc3026c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5451930d82a32c698cb7412faa54fcbe109055fa77a82433d130ee38ebc3026c->leave($__internal_5451930d82a32c698cb7412faa54fcbe109055fa77a82433d130ee38ebc3026c_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_510c164e3fcbb1dad3e7740282f84d44e3eaa2fa02487ddc15323570f4deede5 = $this->env->getExtension("native_profiler");
        $__internal_510c164e3fcbb1dad3e7740282f84d44e3eaa2fa02487ddc15323570f4deede5->enter($__internal_510c164e3fcbb1dad3e7740282f84d44e3eaa2fa02487ddc15323570f4deede5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_510c164e3fcbb1dad3e7740282f84d44e3eaa2fa02487ddc15323570f4deede5->leave($__internal_510c164e3fcbb1dad3e7740282f84d44e3eaa2fa02487ddc15323570f4deede5_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_e6916cd5cf600f3720d335f7187198c819e1dec126bdc08affcc600a5650f8db = $this->env->getExtension("native_profiler");
        $__internal_e6916cd5cf600f3720d335f7187198c819e1dec126bdc08affcc600a5650f8db->enter($__internal_e6916cd5cf600f3720d335f7187198c819e1dec126bdc08affcc600a5650f8db_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_e6916cd5cf600f3720d335f7187198c819e1dec126bdc08affcc600a5650f8db->leave($__internal_e6916cd5cf600f3720d335f7187198c819e1dec126bdc08affcc600a5650f8db_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_da9b01321d5e03ed718693176c0ba6598939912b3165d6a8671a737c06a47992 = $this->env->getExtension("native_profiler");
        $__internal_da9b01321d5e03ed718693176c0ba6598939912b3165d6a8671a737c06a47992->enter($__internal_da9b01321d5e03ed718693176c0ba6598939912b3165d6a8671a737c06a47992_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_da9b01321d5e03ed718693176c0ba6598939912b3165d6a8671a737c06a47992->leave($__internal_da9b01321d5e03ed718693176c0ba6598939912b3165d6a8671a737c06a47992_prof);

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
