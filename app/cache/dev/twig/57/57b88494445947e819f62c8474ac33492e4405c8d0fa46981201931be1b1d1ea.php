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
        $__internal_2cdf884e7c48981919fa731bf898cdff29e7b73f808f709e7b4ab058ef6ae2f5 = $this->env->getExtension("native_profiler");
        $__internal_2cdf884e7c48981919fa731bf898cdff29e7b73f808f709e7b4ab058ef6ae2f5->enter($__internal_2cdf884e7c48981919fa731bf898cdff29e7b73f808f709e7b4ab058ef6ae2f5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_2cdf884e7c48981919fa731bf898cdff29e7b73f808f709e7b4ab058ef6ae2f5->leave($__internal_2cdf884e7c48981919fa731bf898cdff29e7b73f808f709e7b4ab058ef6ae2f5_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_83be371d1de33d8a7eab413e044ef6ab2ab9c5e54075030070b9daebf8135e9b = $this->env->getExtension("native_profiler");
        $__internal_83be371d1de33d8a7eab413e044ef6ab2ab9c5e54075030070b9daebf8135e9b->enter($__internal_83be371d1de33d8a7eab413e044ef6ab2ab9c5e54075030070b9daebf8135e9b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_83be371d1de33d8a7eab413e044ef6ab2ab9c5e54075030070b9daebf8135e9b->leave($__internal_83be371d1de33d8a7eab413e044ef6ab2ab9c5e54075030070b9daebf8135e9b_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_eb35b10a3eadd7c08dc1183a25086b4b0d2a36c27c44e365700a600f913e6cb8 = $this->env->getExtension("native_profiler");
        $__internal_eb35b10a3eadd7c08dc1183a25086b4b0d2a36c27c44e365700a600f913e6cb8->enter($__internal_eb35b10a3eadd7c08dc1183a25086b4b0d2a36c27c44e365700a600f913e6cb8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_eb35b10a3eadd7c08dc1183a25086b4b0d2a36c27c44e365700a600f913e6cb8->leave($__internal_eb35b10a3eadd7c08dc1183a25086b4b0d2a36c27c44e365700a600f913e6cb8_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_285c5230384007c08154b38f118f1b8c558a3afb20b35e7728aa73e4a35ef9bf = $this->env->getExtension("native_profiler");
        $__internal_285c5230384007c08154b38f118f1b8c558a3afb20b35e7728aa73e4a35ef9bf->enter($__internal_285c5230384007c08154b38f118f1b8c558a3afb20b35e7728aa73e4a35ef9bf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_285c5230384007c08154b38f118f1b8c558a3afb20b35e7728aa73e4a35ef9bf->leave($__internal_285c5230384007c08154b38f118f1b8c558a3afb20b35e7728aa73e4a35ef9bf_prof);

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
