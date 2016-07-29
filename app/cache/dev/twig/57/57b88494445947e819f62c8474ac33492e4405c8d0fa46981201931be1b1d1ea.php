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
        $__internal_9d0e8c334c29f67d1128d5421b31913098ee6cbbf050dddfd1db9a3486dc1de0 = $this->env->getExtension("native_profiler");
        $__internal_9d0e8c334c29f67d1128d5421b31913098ee6cbbf050dddfd1db9a3486dc1de0->enter($__internal_9d0e8c334c29f67d1128d5421b31913098ee6cbbf050dddfd1db9a3486dc1de0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9d0e8c334c29f67d1128d5421b31913098ee6cbbf050dddfd1db9a3486dc1de0->leave($__internal_9d0e8c334c29f67d1128d5421b31913098ee6cbbf050dddfd1db9a3486dc1de0_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_5f3a33115055b726187eb570a7f2d9e72668347658b3e95f0b47253746dacc9f = $this->env->getExtension("native_profiler");
        $__internal_5f3a33115055b726187eb570a7f2d9e72668347658b3e95f0b47253746dacc9f->enter($__internal_5f3a33115055b726187eb570a7f2d9e72668347658b3e95f0b47253746dacc9f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_5f3a33115055b726187eb570a7f2d9e72668347658b3e95f0b47253746dacc9f->leave($__internal_5f3a33115055b726187eb570a7f2d9e72668347658b3e95f0b47253746dacc9f_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_e4208e1acc2aeabfc41d2d88040b30e03baee3297c2ea0af8e86a32aa67de483 = $this->env->getExtension("native_profiler");
        $__internal_e4208e1acc2aeabfc41d2d88040b30e03baee3297c2ea0af8e86a32aa67de483->enter($__internal_e4208e1acc2aeabfc41d2d88040b30e03baee3297c2ea0af8e86a32aa67de483_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_e4208e1acc2aeabfc41d2d88040b30e03baee3297c2ea0af8e86a32aa67de483->leave($__internal_e4208e1acc2aeabfc41d2d88040b30e03baee3297c2ea0af8e86a32aa67de483_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_740def982ac869b6122e4092b3b4cd5d42b6b60e5426f1f520103b30faf51752 = $this->env->getExtension("native_profiler");
        $__internal_740def982ac869b6122e4092b3b4cd5d42b6b60e5426f1f520103b30faf51752->enter($__internal_740def982ac869b6122e4092b3b4cd5d42b6b60e5426f1f520103b30faf51752_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_740def982ac869b6122e4092b3b4cd5d42b6b60e5426f1f520103b30faf51752->leave($__internal_740def982ac869b6122e4092b3b4cd5d42b6b60e5426f1f520103b30faf51752_prof);

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
