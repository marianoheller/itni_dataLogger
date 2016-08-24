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
        $__internal_51939f826712ddef36abe55915fb97de856e7ac87e8468966b3339121beb68c8 = $this->env->getExtension("native_profiler");
        $__internal_51939f826712ddef36abe55915fb97de856e7ac87e8468966b3339121beb68c8->enter($__internal_51939f826712ddef36abe55915fb97de856e7ac87e8468966b3339121beb68c8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_51939f826712ddef36abe55915fb97de856e7ac87e8468966b3339121beb68c8->leave($__internal_51939f826712ddef36abe55915fb97de856e7ac87e8468966b3339121beb68c8_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_e7d327be78e766f64028be8927c7b8be5956dac2abfc9e5b4605d4662c8c3e5a = $this->env->getExtension("native_profiler");
        $__internal_e7d327be78e766f64028be8927c7b8be5956dac2abfc9e5b4605d4662c8c3e5a->enter($__internal_e7d327be78e766f64028be8927c7b8be5956dac2abfc9e5b4605d4662c8c3e5a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_e7d327be78e766f64028be8927c7b8be5956dac2abfc9e5b4605d4662c8c3e5a->leave($__internal_e7d327be78e766f64028be8927c7b8be5956dac2abfc9e5b4605d4662c8c3e5a_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_49e4e3479775075dbab4bc1746e367029bc7f0546ac2fa626f5e7d0d14f1714a = $this->env->getExtension("native_profiler");
        $__internal_49e4e3479775075dbab4bc1746e367029bc7f0546ac2fa626f5e7d0d14f1714a->enter($__internal_49e4e3479775075dbab4bc1746e367029bc7f0546ac2fa626f5e7d0d14f1714a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_49e4e3479775075dbab4bc1746e367029bc7f0546ac2fa626f5e7d0d14f1714a->leave($__internal_49e4e3479775075dbab4bc1746e367029bc7f0546ac2fa626f5e7d0d14f1714a_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_bb0b7ee17fd1e4af681694dab3217c3b8235852bd5b8124b502b92d50f47227d = $this->env->getExtension("native_profiler");
        $__internal_bb0b7ee17fd1e4af681694dab3217c3b8235852bd5b8124b502b92d50f47227d->enter($__internal_bb0b7ee17fd1e4af681694dab3217c3b8235852bd5b8124b502b92d50f47227d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_bb0b7ee17fd1e4af681694dab3217c3b8235852bd5b8124b502b92d50f47227d->leave($__internal_bb0b7ee17fd1e4af681694dab3217c3b8235852bd5b8124b502b92d50f47227d_prof);

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
