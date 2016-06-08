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
        $__internal_02aea06ad678b708af8bf5dc1918e860790689de24204e83c07daaf0bc29743d = $this->env->getExtension("native_profiler");
        $__internal_02aea06ad678b708af8bf5dc1918e860790689de24204e83c07daaf0bc29743d->enter($__internal_02aea06ad678b708af8bf5dc1918e860790689de24204e83c07daaf0bc29743d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "datalogger/data.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_02aea06ad678b708af8bf5dc1918e860790689de24204e83c07daaf0bc29743d->leave($__internal_02aea06ad678b708af8bf5dc1918e860790689de24204e83c07daaf0bc29743d_prof);

    }

    // line 4
    public function block_dataHead($context, array $blocks = array())
    {
        $__internal_d16f5d95df604874c0e65bdd6e419587f94aa125ffe63f6fbb09a7f6047d0681 = $this->env->getExtension("native_profiler");
        $__internal_d16f5d95df604874c0e65bdd6e419587f94aa125ffe63f6fbb09a7f6047d0681->enter($__internal_d16f5d95df604874c0e65bdd6e419587f94aa125ffe63f6fbb09a7f6047d0681_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "dataHead"));

        // line 5
        echo "    <tr>
        <th class=\"text-left\">Month</th>
        <th class=\"text-left\">Sales</th>
    </tr>
";
        
        $__internal_d16f5d95df604874c0e65bdd6e419587f94aa125ffe63f6fbb09a7f6047d0681->leave($__internal_d16f5d95df604874c0e65bdd6e419587f94aa125ffe63f6fbb09a7f6047d0681_prof);

    }

    // line 13
    public function block_dataBody($context, array $blocks = array())
    {
        $__internal_92eebe73d0228376bf519fe1d6b56358d523110078233298eed1a26a01fffe5f = $this->env->getExtension("native_profiler");
        $__internal_92eebe73d0228376bf519fe1d6b56358d523110078233298eed1a26a01fffe5f->enter($__internal_92eebe73d0228376bf519fe1d6b56358d523110078233298eed1a26a01fffe5f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "dataBody"));

        // line 14
        echo "    <tr>
        <td class=\"text-left\">January</td>
        <td class=\"text-left\">\$ 50,000.00</td>
    </tr>
    <tr>
        <td class=\"text-left\">February</td>
        <td class=\"text-left\">\$ 10,000.00</td>
    </tr>
    <tr>
        <td class=\"text-left\">March</td>
        <td class=\"text-left\">\$ 85,000.00</td>
    </tr>
    <tr>
        <td class=\"text-left\">April</td>
        <td class=\"text-left\">\$ 56,000.00</td>
    </tr>
    <tr>
        <td class=\"text-left\">May</td>
        <td class=\"text-left\">\$ 98,000.00</td>
    </tr>
";
        
        $__internal_92eebe73d0228376bf519fe1d6b56358d523110078233298eed1a26a01fffe5f->leave($__internal_92eebe73d0228376bf519fe1d6b56358d523110078233298eed1a26a01fffe5f_prof);

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
        return array (  58 => 14,  52 => 13,  41 => 5,  35 => 4,  11 => 1,);
    }
}
/* {% extends 'datalogger_base.html.twig' %}*/
/* */
/* */
/* {% block dataHead %}*/
/*     <tr>*/
/*         <th class="text-left">Month</th>*/
/*         <th class="text-left">Sales</th>*/
/*     </tr>*/
/* {% endblock %}*/
/* */
/* */
/* */
/* {% block dataBody %}*/
/*     <tr>*/
/*         <td class="text-left">January</td>*/
/*         <td class="text-left">$ 50,000.00</td>*/
/*     </tr>*/
/*     <tr>*/
/*         <td class="text-left">February</td>*/
/*         <td class="text-left">$ 10,000.00</td>*/
/*     </tr>*/
/*     <tr>*/
/*         <td class="text-left">March</td>*/
/*         <td class="text-left">$ 85,000.00</td>*/
/*     </tr>*/
/*     <tr>*/
/*         <td class="text-left">April</td>*/
/*         <td class="text-left">$ 56,000.00</td>*/
/*     </tr>*/
/*     <tr>*/
/*         <td class="text-left">May</td>*/
/*         <td class="text-left">$ 98,000.00</td>*/
/*     </tr>*/
/* {% endblock %}*/
