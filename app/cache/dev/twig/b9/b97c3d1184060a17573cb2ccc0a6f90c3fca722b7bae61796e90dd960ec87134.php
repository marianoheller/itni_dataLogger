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
        $__internal_50b4c7f549c012944a5e11142be2412e17ec26d81dbdb5ebe0a832f89619bbca = $this->env->getExtension("native_profiler");
        $__internal_50b4c7f549c012944a5e11142be2412e17ec26d81dbdb5ebe0a832f89619bbca->enter($__internal_50b4c7f549c012944a5e11142be2412e17ec26d81dbdb5ebe0a832f89619bbca_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "datalogger/data.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_50b4c7f549c012944a5e11142be2412e17ec26d81dbdb5ebe0a832f89619bbca->leave($__internal_50b4c7f549c012944a5e11142be2412e17ec26d81dbdb5ebe0a832f89619bbca_prof);

    }

    // line 5
    public function block_pageTitle($context, array $blocks = array())
    {
        $__internal_2abb68c322bcb94f58dc1aef546e0ec2660bd499d327ada532f303a9690efe5f = $this->env->getExtension("native_profiler");
        $__internal_2abb68c322bcb94f58dc1aef546e0ec2660bd499d327ada532f303a9690efe5f->enter($__internal_2abb68c322bcb94f58dc1aef546e0ec2660bd499d327ada532f303a9690efe5f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pageTitle"));

        // line 6
        echo "    <title>Data Logger</title>
";
        
        $__internal_2abb68c322bcb94f58dc1aef546e0ec2660bd499d327ada532f303a9690efe5f->leave($__internal_2abb68c322bcb94f58dc1aef546e0ec2660bd499d327ada532f303a9690efe5f_prof);

    }

    // line 9
    public function block_tableTitle($context, array $blocks = array())
    {
        $__internal_d07f66db7a714a1132934706560641fcd6842bb5fd0c234b92089897113f84f6 = $this->env->getExtension("native_profiler");
        $__internal_d07f66db7a714a1132934706560641fcd6842bb5fd0c234b92089897113f84f6->enter($__internal_d07f66db7a714a1132934706560641fcd6842bb5fd0c234b92089897113f84f6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "tableTitle"));

        // line 10
        echo "    <h3>Data Table</h3>
";
        
        $__internal_d07f66db7a714a1132934706560641fcd6842bb5fd0c234b92089897113f84f6->leave($__internal_d07f66db7a714a1132934706560641fcd6842bb5fd0c234b92089897113f84f6_prof);

    }

    // line 14
    public function block_dataHead($context, array $blocks = array())
    {
        $__internal_ce9d6dffdeb0c07e0503b9813c3bb393ae967d6262648076bbd3cad26c9bc1e9 = $this->env->getExtension("native_profiler");
        $__internal_ce9d6dffdeb0c07e0503b9813c3bb393ae967d6262648076bbd3cad26c9bc1e9->enter($__internal_ce9d6dffdeb0c07e0503b9813c3bb393ae967d6262648076bbd3cad26c9bc1e9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "dataHead"));

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
        
        $__internal_ce9d6dffdeb0c07e0503b9813c3bb393ae967d6262648076bbd3cad26c9bc1e9->leave($__internal_ce9d6dffdeb0c07e0503b9813c3bb393ae967d6262648076bbd3cad26c9bc1e9_prof);

    }

    // line 26
    public function block_dataBody($context, array $blocks = array())
    {
        $__internal_27aa684b3779e429c3a20ce42c5d9a567ac1273f6bf8e54d3f918cb48cbc3b89 = $this->env->getExtension("native_profiler");
        $__internal_27aa684b3779e429c3a20ce42c5d9a567ac1273f6bf8e54d3f918cb48cbc3b89->enter($__internal_27aa684b3779e429c3a20ce42c5d9a567ac1273f6bf8e54d3f918cb48cbc3b89_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "dataBody"));

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
        
        $__internal_27aa684b3779e429c3a20ce42c5d9a567ac1273f6bf8e54d3f918cb48cbc3b89->leave($__internal_27aa684b3779e429c3a20ce42c5d9a567ac1273f6bf8e54d3f918cb48cbc3b89_prof);

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
