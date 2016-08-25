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
        $__internal_6b71369ed75a22a3bcfda875c862dfaaf824f5b56b78fcc65d32fe92ffc47fbe = $this->env->getExtension("native_profiler");
        $__internal_6b71369ed75a22a3bcfda875c862dfaaf824f5b56b78fcc65d32fe92ffc47fbe->enter($__internal_6b71369ed75a22a3bcfda875c862dfaaf824f5b56b78fcc65d32fe92ffc47fbe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6b71369ed75a22a3bcfda875c862dfaaf824f5b56b78fcc65d32fe92ffc47fbe->leave($__internal_6b71369ed75a22a3bcfda875c862dfaaf824f5b56b78fcc65d32fe92ffc47fbe_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_1abd359b90486e648280d42d865fcc2edb35dbcdc1cf80fae226e326127903c9 = $this->env->getExtension("native_profiler");
        $__internal_1abd359b90486e648280d42d865fcc2edb35dbcdc1cf80fae226e326127903c9->enter($__internal_1abd359b90486e648280d42d865fcc2edb35dbcdc1cf80fae226e326127903c9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_1abd359b90486e648280d42d865fcc2edb35dbcdc1cf80fae226e326127903c9->leave($__internal_1abd359b90486e648280d42d865fcc2edb35dbcdc1cf80fae226e326127903c9_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_70d7541c7d853c65a4bff10415b89a8317b6717d529b6c169e55a9bbd8a4c480 = $this->env->getExtension("native_profiler");
        $__internal_70d7541c7d853c65a4bff10415b89a8317b6717d529b6c169e55a9bbd8a4c480->enter($__internal_70d7541c7d853c65a4bff10415b89a8317b6717d529b6c169e55a9bbd8a4c480_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_70d7541c7d853c65a4bff10415b89a8317b6717d529b6c169e55a9bbd8a4c480->leave($__internal_70d7541c7d853c65a4bff10415b89a8317b6717d529b6c169e55a9bbd8a4c480_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_43cac29ba4366c1f1790113bffe3be4cb4e026d951ad82301977a1487217ed75 = $this->env->getExtension("native_profiler");
        $__internal_43cac29ba4366c1f1790113bffe3be4cb4e026d951ad82301977a1487217ed75->enter($__internal_43cac29ba4366c1f1790113bffe3be4cb4e026d951ad82301977a1487217ed75_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_43cac29ba4366c1f1790113bffe3be4cb4e026d951ad82301977a1487217ed75->leave($__internal_43cac29ba4366c1f1790113bffe3be4cb4e026d951ad82301977a1487217ed75_prof);

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
