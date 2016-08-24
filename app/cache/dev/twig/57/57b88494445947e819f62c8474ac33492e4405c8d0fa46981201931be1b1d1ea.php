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
        $__internal_827543cb33c7df1574477fd38ea0f7a801841d1b8dc3d5dc9ce2ee3b392b7200 = $this->env->getExtension("native_profiler");
        $__internal_827543cb33c7df1574477fd38ea0f7a801841d1b8dc3d5dc9ce2ee3b392b7200->enter($__internal_827543cb33c7df1574477fd38ea0f7a801841d1b8dc3d5dc9ce2ee3b392b7200_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_827543cb33c7df1574477fd38ea0f7a801841d1b8dc3d5dc9ce2ee3b392b7200->leave($__internal_827543cb33c7df1574477fd38ea0f7a801841d1b8dc3d5dc9ce2ee3b392b7200_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_ce51578eafc020c4f1aff45250017207938137f9c94e0389d5d4a5cb57c13f85 = $this->env->getExtension("native_profiler");
        $__internal_ce51578eafc020c4f1aff45250017207938137f9c94e0389d5d4a5cb57c13f85->enter($__internal_ce51578eafc020c4f1aff45250017207938137f9c94e0389d5d4a5cb57c13f85_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_ce51578eafc020c4f1aff45250017207938137f9c94e0389d5d4a5cb57c13f85->leave($__internal_ce51578eafc020c4f1aff45250017207938137f9c94e0389d5d4a5cb57c13f85_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_dea111e6f684c5a1248172a8e1d0f2a539287aa01d96501ca13887fe07cd2f55 = $this->env->getExtension("native_profiler");
        $__internal_dea111e6f684c5a1248172a8e1d0f2a539287aa01d96501ca13887fe07cd2f55->enter($__internal_dea111e6f684c5a1248172a8e1d0f2a539287aa01d96501ca13887fe07cd2f55_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_dea111e6f684c5a1248172a8e1d0f2a539287aa01d96501ca13887fe07cd2f55->leave($__internal_dea111e6f684c5a1248172a8e1d0f2a539287aa01d96501ca13887fe07cd2f55_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_f8b35d2dbace513ce762b9e669127409989c98abed9771611d5bffeabdc8dd8c = $this->env->getExtension("native_profiler");
        $__internal_f8b35d2dbace513ce762b9e669127409989c98abed9771611d5bffeabdc8dd8c->enter($__internal_f8b35d2dbace513ce762b9e669127409989c98abed9771611d5bffeabdc8dd8c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_f8b35d2dbace513ce762b9e669127409989c98abed9771611d5bffeabdc8dd8c->leave($__internal_f8b35d2dbace513ce762b9e669127409989c98abed9771611d5bffeabdc8dd8c_prof);

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
