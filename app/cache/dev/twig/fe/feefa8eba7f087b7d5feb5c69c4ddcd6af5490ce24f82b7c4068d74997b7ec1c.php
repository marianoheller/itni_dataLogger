<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_2c795e4f6033b7397752f718220d85741e694fd3a9625b7ae667d48a668a1617 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_81c6cbc7b2f8390c0d19f4c93ef0d4d8851add3c8ede4c258f16bf22d9a82061 = $this->env->getExtension("native_profiler");
        $__internal_81c6cbc7b2f8390c0d19f4c93ef0d4d8851add3c8ede4c258f16bf22d9a82061->enter($__internal_81c6cbc7b2f8390c0d19f4c93ef0d4d8851add3c8ede4c258f16bf22d9a82061_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_81c6cbc7b2f8390c0d19f4c93ef0d4d8851add3c8ede4c258f16bf22d9a82061->leave($__internal_81c6cbc7b2f8390c0d19f4c93ef0d4d8851add3c8ede4c258f16bf22d9a82061_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_851d2f3757055a4881f781bdec5e81a6644f74bdbc2b8102c697ff20f4f88998 = $this->env->getExtension("native_profiler");
        $__internal_851d2f3757055a4881f781bdec5e81a6644f74bdbc2b8102c697ff20f4f88998->enter($__internal_851d2f3757055a4881f781bdec5e81a6644f74bdbc2b8102c697ff20f4f88998_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_851d2f3757055a4881f781bdec5e81a6644f74bdbc2b8102c697ff20f4f88998->leave($__internal_851d2f3757055a4881f781bdec5e81a6644f74bdbc2b8102c697ff20f4f88998_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_aa6bea959446a744fdb6072b18d30d9334eb05ec7298fa7546a6a76030d1d4ca = $this->env->getExtension("native_profiler");
        $__internal_aa6bea959446a744fdb6072b18d30d9334eb05ec7298fa7546a6a76030d1d4ca->enter($__internal_aa6bea959446a744fdb6072b18d30d9334eb05ec7298fa7546a6a76030d1d4ca_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_aa6bea959446a744fdb6072b18d30d9334eb05ec7298fa7546a6a76030d1d4ca->leave($__internal_aa6bea959446a744fdb6072b18d30d9334eb05ec7298fa7546a6a76030d1d4ca_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_329089cafb21a78f83c6563631b301963e561c5fc5eb6ac5b23609a4749d8651 = $this->env->getExtension("native_profiler");
        $__internal_329089cafb21a78f83c6563631b301963e561c5fc5eb6ac5b23609a4749d8651->enter($__internal_329089cafb21a78f83c6563631b301963e561c5fc5eb6ac5b23609a4749d8651_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_329089cafb21a78f83c6563631b301963e561c5fc5eb6ac5b23609a4749d8651->leave($__internal_329089cafb21a78f83c6563631b301963e561c5fc5eb6ac5b23609a4749d8651_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
