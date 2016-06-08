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
        $__internal_499dd3c0d873ae52dfb730d1cf4013e93d4ca87336819d324aa7942d9d0d1509 = $this->env->getExtension("native_profiler");
        $__internal_499dd3c0d873ae52dfb730d1cf4013e93d4ca87336819d324aa7942d9d0d1509->enter($__internal_499dd3c0d873ae52dfb730d1cf4013e93d4ca87336819d324aa7942d9d0d1509_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_499dd3c0d873ae52dfb730d1cf4013e93d4ca87336819d324aa7942d9d0d1509->leave($__internal_499dd3c0d873ae52dfb730d1cf4013e93d4ca87336819d324aa7942d9d0d1509_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_1b8965dbe2d030de2b44cb223b28b2509eb0c364c4ee509ea49ac3fcf58172df = $this->env->getExtension("native_profiler");
        $__internal_1b8965dbe2d030de2b44cb223b28b2509eb0c364c4ee509ea49ac3fcf58172df->enter($__internal_1b8965dbe2d030de2b44cb223b28b2509eb0c364c4ee509ea49ac3fcf58172df_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_1b8965dbe2d030de2b44cb223b28b2509eb0c364c4ee509ea49ac3fcf58172df->leave($__internal_1b8965dbe2d030de2b44cb223b28b2509eb0c364c4ee509ea49ac3fcf58172df_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_962a53c455e7fda94d2b771288e419928632ac3965e63b519ec27ff062189b04 = $this->env->getExtension("native_profiler");
        $__internal_962a53c455e7fda94d2b771288e419928632ac3965e63b519ec27ff062189b04->enter($__internal_962a53c455e7fda94d2b771288e419928632ac3965e63b519ec27ff062189b04_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_962a53c455e7fda94d2b771288e419928632ac3965e63b519ec27ff062189b04->leave($__internal_962a53c455e7fda94d2b771288e419928632ac3965e63b519ec27ff062189b04_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_7fa221e7803411d102763d99a2bebc2a19cc81e4d67976396e273a0948d0bfca = $this->env->getExtension("native_profiler");
        $__internal_7fa221e7803411d102763d99a2bebc2a19cc81e4d67976396e273a0948d0bfca->enter($__internal_7fa221e7803411d102763d99a2bebc2a19cc81e4d67976396e273a0948d0bfca_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_7fa221e7803411d102763d99a2bebc2a19cc81e4d67976396e273a0948d0bfca->leave($__internal_7fa221e7803411d102763d99a2bebc2a19cc81e4d67976396e273a0948d0bfca_prof);

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
