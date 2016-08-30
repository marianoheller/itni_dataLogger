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
        $__internal_b5be57e88c58b48d112009d8806797e4e128bde11efd287b9ca8edbd72658e47 = $this->env->getExtension("native_profiler");
        $__internal_b5be57e88c58b48d112009d8806797e4e128bde11efd287b9ca8edbd72658e47->enter($__internal_b5be57e88c58b48d112009d8806797e4e128bde11efd287b9ca8edbd72658e47_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b5be57e88c58b48d112009d8806797e4e128bde11efd287b9ca8edbd72658e47->leave($__internal_b5be57e88c58b48d112009d8806797e4e128bde11efd287b9ca8edbd72658e47_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_1a28b3d66a470304727308d14ac2c51db81b80a4b4786c805fca07281d5af1b8 = $this->env->getExtension("native_profiler");
        $__internal_1a28b3d66a470304727308d14ac2c51db81b80a4b4786c805fca07281d5af1b8->enter($__internal_1a28b3d66a470304727308d14ac2c51db81b80a4b4786c805fca07281d5af1b8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_1a28b3d66a470304727308d14ac2c51db81b80a4b4786c805fca07281d5af1b8->leave($__internal_1a28b3d66a470304727308d14ac2c51db81b80a4b4786c805fca07281d5af1b8_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_3dfa4532a3c27231c290bb21f607411cf2b3cd6e038fa7ab42ba48c17a788cd4 = $this->env->getExtension("native_profiler");
        $__internal_3dfa4532a3c27231c290bb21f607411cf2b3cd6e038fa7ab42ba48c17a788cd4->enter($__internal_3dfa4532a3c27231c290bb21f607411cf2b3cd6e038fa7ab42ba48c17a788cd4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_3dfa4532a3c27231c290bb21f607411cf2b3cd6e038fa7ab42ba48c17a788cd4->leave($__internal_3dfa4532a3c27231c290bb21f607411cf2b3cd6e038fa7ab42ba48c17a788cd4_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_42506b3fb62ab51936fe59dc401b341e86ba79defe627bb2a358acc864b72d5d = $this->env->getExtension("native_profiler");
        $__internal_42506b3fb62ab51936fe59dc401b341e86ba79defe627bb2a358acc864b72d5d->enter($__internal_42506b3fb62ab51936fe59dc401b341e86ba79defe627bb2a358acc864b72d5d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_42506b3fb62ab51936fe59dc401b341e86ba79defe627bb2a358acc864b72d5d->leave($__internal_42506b3fb62ab51936fe59dc401b341e86ba79defe627bb2a358acc864b72d5d_prof);

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
