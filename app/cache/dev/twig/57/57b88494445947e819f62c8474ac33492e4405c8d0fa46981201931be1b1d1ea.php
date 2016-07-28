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
        $__internal_3adf5d67ecdf3bf76864c8506a5a30e0e9d866a48c8abe73b8b87746b4fe18f7 = $this->env->getExtension("native_profiler");
        $__internal_3adf5d67ecdf3bf76864c8506a5a30e0e9d866a48c8abe73b8b87746b4fe18f7->enter($__internal_3adf5d67ecdf3bf76864c8506a5a30e0e9d866a48c8abe73b8b87746b4fe18f7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_3adf5d67ecdf3bf76864c8506a5a30e0e9d866a48c8abe73b8b87746b4fe18f7->leave($__internal_3adf5d67ecdf3bf76864c8506a5a30e0e9d866a48c8abe73b8b87746b4fe18f7_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_e5bcf93b822b51db1b49bf1be26e5f4bbe9eaf2128c4f917b3776bb5140f565c = $this->env->getExtension("native_profiler");
        $__internal_e5bcf93b822b51db1b49bf1be26e5f4bbe9eaf2128c4f917b3776bb5140f565c->enter($__internal_e5bcf93b822b51db1b49bf1be26e5f4bbe9eaf2128c4f917b3776bb5140f565c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_e5bcf93b822b51db1b49bf1be26e5f4bbe9eaf2128c4f917b3776bb5140f565c->leave($__internal_e5bcf93b822b51db1b49bf1be26e5f4bbe9eaf2128c4f917b3776bb5140f565c_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_473a310546872912e80024a1a1adc4820bb14b450832751221d8f794d39cd82d = $this->env->getExtension("native_profiler");
        $__internal_473a310546872912e80024a1a1adc4820bb14b450832751221d8f794d39cd82d->enter($__internal_473a310546872912e80024a1a1adc4820bb14b450832751221d8f794d39cd82d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_473a310546872912e80024a1a1adc4820bb14b450832751221d8f794d39cd82d->leave($__internal_473a310546872912e80024a1a1adc4820bb14b450832751221d8f794d39cd82d_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_9f9ea4dcf64f8abb61ae652145e517dc80a6aa60524bf127d72303a7c0d8624e = $this->env->getExtension("native_profiler");
        $__internal_9f9ea4dcf64f8abb61ae652145e517dc80a6aa60524bf127d72303a7c0d8624e->enter($__internal_9f9ea4dcf64f8abb61ae652145e517dc80a6aa60524bf127d72303a7c0d8624e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_9f9ea4dcf64f8abb61ae652145e517dc80a6aa60524bf127d72303a7c0d8624e->leave($__internal_9f9ea4dcf64f8abb61ae652145e517dc80a6aa60524bf127d72303a7c0d8624e_prof);

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
