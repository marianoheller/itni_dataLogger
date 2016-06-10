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
        $__internal_c24599431a60b622e829258fbfa0cbdb9b08f71405d4161318226792b79a646a = $this->env->getExtension("native_profiler");
        $__internal_c24599431a60b622e829258fbfa0cbdb9b08f71405d4161318226792b79a646a->enter($__internal_c24599431a60b622e829258fbfa0cbdb9b08f71405d4161318226792b79a646a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "datalogger/data.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c24599431a60b622e829258fbfa0cbdb9b08f71405d4161318226792b79a646a->leave($__internal_c24599431a60b622e829258fbfa0cbdb9b08f71405d4161318226792b79a646a_prof);

    }

    // line 5
    public function block_pageTitle($context, array $blocks = array())
    {
        $__internal_9240688dbdeab536643e249f367a607dae9a90e6f4d5762a1bc22767073cfca9 = $this->env->getExtension("native_profiler");
        $__internal_9240688dbdeab536643e249f367a607dae9a90e6f4d5762a1bc22767073cfca9->enter($__internal_9240688dbdeab536643e249f367a607dae9a90e6f4d5762a1bc22767073cfca9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageTitle"));

        // line 6
        echo "    <title>Data Logger</title>
";
        
        $__internal_9240688dbdeab536643e249f367a607dae9a90e6f4d5762a1bc22767073cfca9->leave($__internal_9240688dbdeab536643e249f367a607dae9a90e6f4d5762a1bc22767073cfca9_prof);

    }

    // line 9
    public function block_tableTitle($context, array $blocks = array())
    {
        $__internal_73206a60fe9e0209234918c24ae62137e180555bab4d36d70fb6e0a3e1c53634 = $this->env->getExtension("native_profiler");
        $__internal_73206a60fe9e0209234918c24ae62137e180555bab4d36d70fb6e0a3e1c53634->enter($__internal_73206a60fe9e0209234918c24ae62137e180555bab4d36d70fb6e0a3e1c53634_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "tableTitle"));

        // line 10
        echo "    <h3>Data Table</h3>
";
        
        $__internal_73206a60fe9e0209234918c24ae62137e180555bab4d36d70fb6e0a3e1c53634->leave($__internal_73206a60fe9e0209234918c24ae62137e180555bab4d36d70fb6e0a3e1c53634_prof);

    }

    // line 14
    public function block_dataHead($context, array $blocks = array())
    {
        $__internal_66a87fac4eca4190dbd13c3977d148ab21632a006590820b3bdca0f2f0324270 = $this->env->getExtension("native_profiler");
        $__internal_66a87fac4eca4190dbd13c3977d148ab21632a006590820b3bdca0f2f0324270->enter($__internal_66a87fac4eca4190dbd13c3977d148ab21632a006590820b3bdca0f2f0324270_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "dataHead"));

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
        
        $__internal_66a87fac4eca4190dbd13c3977d148ab21632a006590820b3bdca0f2f0324270->leave($__internal_66a87fac4eca4190dbd13c3977d148ab21632a006590820b3bdca0f2f0324270_prof);

    }

    // line 26
    public function block_dataBody($context, array $blocks = array())
    {
        $__internal_bd7c654afb8902138e024b1ddba778344e7ec7f90a5ffa63e84f0c642d597936 = $this->env->getExtension("native_profiler");
        $__internal_bd7c654afb8902138e024b1ddba778344e7ec7f90a5ffa63e84f0c642d597936->enter($__internal_bd7c654afb8902138e024b1ddba778344e7ec7f90a5ffa63e84f0c642d597936_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "dataBody"));

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
        
        $__internal_bd7c654afb8902138e024b1ddba778344e7ec7f90a5ffa63e84f0c642d597936->leave($__internal_bd7c654afb8902138e024b1ddba778344e7ec7f90a5ffa63e84f0c642d597936_prof);

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
