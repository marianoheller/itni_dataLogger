<?php

/* datalogger/data.html.twig */
class __TwigTemplate_d216b61eaa40726ce2913421f75d379eca3916d9052102483c08a4783a3796a8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("datalogger_base.html.twig", "datalogger/data.html.twig", 1);
        $this->blocks = array(
            'pageTitle' => array($this, 'block_pageTitle'),
            'tableTitle' => array($this, 'block_tableTitle'),
            'dataHead' => array($this, 'block_dataHead'),
            'dataBody' => array($this, 'block_dataBody'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "datalogger_base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_fb6d9f79fdcfcd7b49eaab8589c3fa2f936b91d2256cc9a7a35dfd6ee382c5b1 = $this->env->getExtension("native_profiler");
        $__internal_fb6d9f79fdcfcd7b49eaab8589c3fa2f936b91d2256cc9a7a35dfd6ee382c5b1->enter($__internal_fb6d9f79fdcfcd7b49eaab8589c3fa2f936b91d2256cc9a7a35dfd6ee382c5b1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "datalogger/data.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_fb6d9f79fdcfcd7b49eaab8589c3fa2f936b91d2256cc9a7a35dfd6ee382c5b1->leave($__internal_fb6d9f79fdcfcd7b49eaab8589c3fa2f936b91d2256cc9a7a35dfd6ee382c5b1_prof);

    }

    // line 5
    public function block_pageTitle($context, array $blocks = array())
    {
        $__internal_223497d4911df39f81d165fe002d0f56710a4bb4225ad489f571b66539e03525 = $this->env->getExtension("native_profiler");
        $__internal_223497d4911df39f81d165fe002d0f56710a4bb4225ad489f571b66539e03525->enter($__internal_223497d4911df39f81d165fe002d0f56710a4bb4225ad489f571b66539e03525_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageTitle"));

        // line 6
        echo "    <title>Data Logger</title>
";
        
        $__internal_223497d4911df39f81d165fe002d0f56710a4bb4225ad489f571b66539e03525->leave($__internal_223497d4911df39f81d165fe002d0f56710a4bb4225ad489f571b66539e03525_prof);

    }

    // line 9
    public function block_tableTitle($context, array $blocks = array())
    {
        $__internal_5c6356b3c71c1bdf465292ed9a7963b1489d8b62ab41d4490fa63a5060025049 = $this->env->getExtension("native_profiler");
        $__internal_5c6356b3c71c1bdf465292ed9a7963b1489d8b62ab41d4490fa63a5060025049->enter($__internal_5c6356b3c71c1bdf465292ed9a7963b1489d8b62ab41d4490fa63a5060025049_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "tableTitle"));

        // line 10
        echo "    <h3>Data Table</h3>
";
        
        $__internal_5c6356b3c71c1bdf465292ed9a7963b1489d8b62ab41d4490fa63a5060025049->leave($__internal_5c6356b3c71c1bdf465292ed9a7963b1489d8b62ab41d4490fa63a5060025049_prof);

    }

    // line 14
    public function block_dataHead($context, array $blocks = array())
    {
        $__internal_071f22472cdbfdbfd1d76ad7f41fb18e74f417084443d5aec47975a356200d60 = $this->env->getExtension("native_profiler");
        $__internal_071f22472cdbfdbfd1d76ad7f41fb18e74f417084443d5aec47975a356200d60->enter($__internal_071f22472cdbfdbfd1d76ad7f41fb18e74f417084443d5aec47975a356200d60_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "dataHead"));

        // line 15
        echo "    <tr>
        ";
        // line 17
        echo "        <th class=\"text-left\">Sensor ID</th>
        <th class=\"text-left\">Medicion</th>
        <th class=\"text-left\">Hora</th>
        <th class=\"text-left\">Fecha</th>
    </tr>
";
        
        $__internal_071f22472cdbfdbfd1d76ad7f41fb18e74f417084443d5aec47975a356200d60->leave($__internal_071f22472cdbfdbfd1d76ad7f41fb18e74f417084443d5aec47975a356200d60_prof);

    }

    // line 26
    public function block_dataBody($context, array $blocks = array())
    {
        $__internal_7fc654206811ef7b75d4c6f25bcf6e302afccdbaa6a114f72765c7f8e341788a = $this->env->getExtension("native_profiler");
        $__internal_7fc654206811ef7b75d4c6f25bcf6e302afccdbaa6a114f72765c7f8e341788a->enter($__internal_7fc654206811ef7b75d4c6f25bcf6e302afccdbaa6a114f72765c7f8e341788a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "dataBody"));

        // line 27
        echo "
    ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["datalogArray"]) ? $context["datalogArray"] : $this->getContext($context, "datalogArray")));
        foreach ($context['_seq'] as $context["_key"] => $context["datalog"]) {
            // line 29
            echo "        ";
            // line 30
            echo "        <tr>
            <td class=\"text-left\">";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($context["datalog"], "sensorId", array()), "html", null, true);
            echo "</td>
            <td class=\"text-left\">";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($context["datalog"], "medicion", array()), "html", null, true);
            echo "</td>
            <td class=\"text-left\">";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["datalog"], "fecha", array()), "format", array(0 => "H:i:s"), "method"), "html", null, true);
            echo "</td>
            <td class=\"text-left\">";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["datalog"], "fecha", array()), "format", array(0 => "d-m-Y"), "method"), "html", null, true);
            echo "</td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['datalog'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_7fc654206811ef7b75d4c6f25bcf6e302afccdbaa6a114f72765c7f8e341788a->leave($__internal_7fc654206811ef7b75d4c6f25bcf6e302afccdbaa6a114f72765c7f8e341788a_prof);

    }

    public function getTemplateName()
    {
        return "datalogger/data.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 34,  112 => 33,  108 => 32,  104 => 31,  101 => 30,  99 => 29,  95 => 28,  92 => 27,  86 => 26,  74 => 17,  71 => 15,  65 => 14,  57 => 10,  51 => 9,  43 => 6,  37 => 5,  11 => 1,);
    }
}
/* {% extends 'datalogger_base.html.twig' %}*/
/* */
/* */
/* */
/* {% block pageTitle %}*/
/*     <title>Data Logger</title>*/
/* {% endblock %}*/
/* */
/* {% block tableTitle %}*/
/*     <h3>Data Table</h3>*/
/* {% endblock %}*/
/* */
/* */
/* {% block dataHead %}*/
/*     <tr>*/
/*         {# @var datalogArray \AppBundle\Entity\Datalog[] #}*/
/*         <th class="text-left">Sensor ID</th>*/
/*         <th class="text-left">Medicion</th>*/
/*         <th class="text-left">Hora</th>*/
/*         <th class="text-left">Fecha</th>*/
/*     </tr>*/
/* {% endblock %}*/
/* */
/* */
/* */
/* {% block dataBody %}*/
/* */
/*     {% for datalog in datalogArray %}*/
/*         {# @var datalog \AppBundle\Entity\Datalog #}*/
/*         <tr>*/
/*             <td class="text-left">{{ datalog.sensorId }}</td>*/
/*             <td class="text-left">{{ datalog.medicion }}</td>*/
/*             <td class="text-left">{{ datalog.fecha.format("H:i:s") }}</td>*/
/*             <td class="text-left">{{ datalog.fecha.format("d-m-Y") }}</td>*/
/*         </tr>*/
/*     {% endfor %}*/
/* {% endblock %}*/
