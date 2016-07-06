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
        $__internal_7376470f4e21ee35a49ab0eb76f18a50e940939284b7a97d66c91ec8892eea64 = $this->env->getExtension("native_profiler");
        $__internal_7376470f4e21ee35a49ab0eb76f18a50e940939284b7a97d66c91ec8892eea64->enter($__internal_7376470f4e21ee35a49ab0eb76f18a50e940939284b7a97d66c91ec8892eea64_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_7376470f4e21ee35a49ab0eb76f18a50e940939284b7a97d66c91ec8892eea64->leave($__internal_7376470f4e21ee35a49ab0eb76f18a50e940939284b7a97d66c91ec8892eea64_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_2a21eed1e601eca03eb93b1203076d05fbd0eb8e4d7eeaac635d5c504e278818 = $this->env->getExtension("native_profiler");
        $__internal_2a21eed1e601eca03eb93b1203076d05fbd0eb8e4d7eeaac635d5c504e278818->enter($__internal_2a21eed1e601eca03eb93b1203076d05fbd0eb8e4d7eeaac635d5c504e278818_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_2a21eed1e601eca03eb93b1203076d05fbd0eb8e4d7eeaac635d5c504e278818->leave($__internal_2a21eed1e601eca03eb93b1203076d05fbd0eb8e4d7eeaac635d5c504e278818_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_62f92447b80a9d099c1224cfa6898c81b687ba6d0be919e394bf5e7516504c5f = $this->env->getExtension("native_profiler");
        $__internal_62f92447b80a9d099c1224cfa6898c81b687ba6d0be919e394bf5e7516504c5f->enter($__internal_62f92447b80a9d099c1224cfa6898c81b687ba6d0be919e394bf5e7516504c5f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_62f92447b80a9d099c1224cfa6898c81b687ba6d0be919e394bf5e7516504c5f->leave($__internal_62f92447b80a9d099c1224cfa6898c81b687ba6d0be919e394bf5e7516504c5f_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_5b5f9e75d11e88767e84171896db0423d3d311324758365b57cdee1bc1a4da8e = $this->env->getExtension("native_profiler");
        $__internal_5b5f9e75d11e88767e84171896db0423d3d311324758365b57cdee1bc1a4da8e->enter($__internal_5b5f9e75d11e88767e84171896db0423d3d311324758365b57cdee1bc1a4da8e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_5b5f9e75d11e88767e84171896db0423d3d311324758365b57cdee1bc1a4da8e->leave($__internal_5b5f9e75d11e88767e84171896db0423d3d311324758365b57cdee1bc1a4da8e_prof);

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
