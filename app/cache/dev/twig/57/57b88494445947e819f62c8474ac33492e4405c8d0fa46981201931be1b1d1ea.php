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
        $__internal_0a3b9ef692fddf36c1abb97538298ccbcbb57af7105b0058d78450b834b40234 = $this->env->getExtension("native_profiler");
        $__internal_0a3b9ef692fddf36c1abb97538298ccbcbb57af7105b0058d78450b834b40234->enter($__internal_0a3b9ef692fddf36c1abb97538298ccbcbb57af7105b0058d78450b834b40234_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_0a3b9ef692fddf36c1abb97538298ccbcbb57af7105b0058d78450b834b40234->leave($__internal_0a3b9ef692fddf36c1abb97538298ccbcbb57af7105b0058d78450b834b40234_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_46ac0e5732dd4165d8b691a185169b3884874a9ccd919aac3a15206c752003ee = $this->env->getExtension("native_profiler");
        $__internal_46ac0e5732dd4165d8b691a185169b3884874a9ccd919aac3a15206c752003ee->enter($__internal_46ac0e5732dd4165d8b691a185169b3884874a9ccd919aac3a15206c752003ee_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_46ac0e5732dd4165d8b691a185169b3884874a9ccd919aac3a15206c752003ee->leave($__internal_46ac0e5732dd4165d8b691a185169b3884874a9ccd919aac3a15206c752003ee_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_9638d453441e32673923f81c852e615029077af0358a1179123b1469c4b84df5 = $this->env->getExtension("native_profiler");
        $__internal_9638d453441e32673923f81c852e615029077af0358a1179123b1469c4b84df5->enter($__internal_9638d453441e32673923f81c852e615029077af0358a1179123b1469c4b84df5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_9638d453441e32673923f81c852e615029077af0358a1179123b1469c4b84df5->leave($__internal_9638d453441e32673923f81c852e615029077af0358a1179123b1469c4b84df5_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_4c39c6998e3e42f2a2d0870602a08637ac1574b8a8f14a9e8eed45cc0320c697 = $this->env->getExtension("native_profiler");
        $__internal_4c39c6998e3e42f2a2d0870602a08637ac1574b8a8f14a9e8eed45cc0320c697->enter($__internal_4c39c6998e3e42f2a2d0870602a08637ac1574b8a8f14a9e8eed45cc0320c697_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_4c39c6998e3e42f2a2d0870602a08637ac1574b8a8f14a9e8eed45cc0320c697->leave($__internal_4c39c6998e3e42f2a2d0870602a08637ac1574b8a8f14a9e8eed45cc0320c697_prof);

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
