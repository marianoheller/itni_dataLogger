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
        $__internal_e213f2f5294f3d051085082c83560dc819cd5eb3cd3ba9d0c4fb0c7c5dfe3473 = $this->env->getExtension("native_profiler");
        $__internal_e213f2f5294f3d051085082c83560dc819cd5eb3cd3ba9d0c4fb0c7c5dfe3473->enter($__internal_e213f2f5294f3d051085082c83560dc819cd5eb3cd3ba9d0c4fb0c7c5dfe3473_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e213f2f5294f3d051085082c83560dc819cd5eb3cd3ba9d0c4fb0c7c5dfe3473->leave($__internal_e213f2f5294f3d051085082c83560dc819cd5eb3cd3ba9d0c4fb0c7c5dfe3473_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_4273d34ab42fa4008e7eddec4942942b49f9101553716ce3f7561303a3ee6579 = $this->env->getExtension("native_profiler");
        $__internal_4273d34ab42fa4008e7eddec4942942b49f9101553716ce3f7561303a3ee6579->enter($__internal_4273d34ab42fa4008e7eddec4942942b49f9101553716ce3f7561303a3ee6579_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_4273d34ab42fa4008e7eddec4942942b49f9101553716ce3f7561303a3ee6579->leave($__internal_4273d34ab42fa4008e7eddec4942942b49f9101553716ce3f7561303a3ee6579_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_2c6fbad3f5b6f42c2966a0319746edd43dd389cd4109fc8cba51138fe876ce17 = $this->env->getExtension("native_profiler");
        $__internal_2c6fbad3f5b6f42c2966a0319746edd43dd389cd4109fc8cba51138fe876ce17->enter($__internal_2c6fbad3f5b6f42c2966a0319746edd43dd389cd4109fc8cba51138fe876ce17_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_2c6fbad3f5b6f42c2966a0319746edd43dd389cd4109fc8cba51138fe876ce17->leave($__internal_2c6fbad3f5b6f42c2966a0319746edd43dd389cd4109fc8cba51138fe876ce17_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_8b1116897cdc1bcee379e7c69243484818ab3e6f3568523ec2a6cea0c9abb822 = $this->env->getExtension("native_profiler");
        $__internal_8b1116897cdc1bcee379e7c69243484818ab3e6f3568523ec2a6cea0c9abb822->enter($__internal_8b1116897cdc1bcee379e7c69243484818ab3e6f3568523ec2a6cea0c9abb822_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_8b1116897cdc1bcee379e7c69243484818ab3e6f3568523ec2a6cea0c9abb822->leave($__internal_8b1116897cdc1bcee379e7c69243484818ab3e6f3568523ec2a6cea0c9abb822_prof);

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
