<?php

/* frame.html */
class __TwigTemplate_af178f9f7d7b8b642a6d431aa60d9c7f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>TagFS - Режим просмотра</title>

    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js\"></script>
    <link href=\"../css/bootstrap.min.css\" rel=\"stylesheet\" media=\"screen\">
    <link href=\"../css/bootstrap.css\" rel=\"stylesheet\" media=\"screen\">
    <link rel=\"stylesheet\" href=\"../css/font-awesome.min.css\">
    <script src=\"../js/bootstrap.js\"></script>
    <link href='http://fonts.googleapis.com/css?family=Italiana' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Marmelad&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <style>
        body{
            font-family: 'Marmelad', sans-serif;
        }

    </style>
</head>
<body>
<form  action=\"/?cmd=editor&f=";
        // line 23
        if (isset($context["addfilter"])) { $_addfilter_ = $context["addfilter"]; } else { $_addfilter_ = null; }
        echo twig_escape_filter($this->env, $_addfilter_, "html", null, true);
        echo "\"  method=\"POST\"  class=\"navbar-form pull-left\">
    <div class=\"js_frameFilter\" id=\"js_frameFilter\" filter=\"";
        // line 24
        if (isset($context["filter"])) { $_filter_ = $context["filter"]; } else { $_filter_ = null; }
        echo twig_escape_filter($this->env, $_filter_, "html", null, true);
        echo "\" hidden=\"none\" >";
        if (isset($context["filter"])) { $_filter_ = $context["filter"]; } else { $_filter_ = null; }
        echo twig_escape_filter($this->env, $_filter_, "html", null, true);
        echo "</div>
    <button style=\"margin: 0px;\" class=\"btn btn-info  pull-right\"><i class=\"icon-plus\"></i> Добавить фильтр</button>

</form>


    <button onclick=\"parent.savePortal();\" style=\"margin:5px; margin-left: 0px; margin-right: 25px;\" class=\"btn btn-success pull-right\">Сохранить</button>
    <button style=\"margin:5px;\"  class=\"btn btn-danger pull-right\">Удалить портал</button>

</br>
<div class=\"row\" style=\"padding: 0px; margin-top: 32px;\">
    <ul class=\"breadcrumb\">
        ";
        // line 36
        if (isset($context["path"])) { $_path_ = $context["path"]; } else { $_path_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_path_);
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 37
            echo "        <li><a style='text-decoration: none; color: #000000;' href=\"?cmd=editor&f=";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "delete"), "html", null, true);
            echo "\"><i class=\"icon-trash\"></i></a> <a style='text-decoration: none; color: black;'  href=\"?f=";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "filter"), "html", null, true);
            echo "\">";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "name"), "html", null, true);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "
    </ul>
    <table class=\"table table-hover\" style=\"margin-top: -22px;\">
        <tbody>
        ";
        // line 43
        if (isset($context["root_dir"])) { $_root_dir_ = $context["root_dir"]; } else { $_root_dir_ = null; }
        if (($_root_dir_ != "false")) {
            // line 44
            echo "        <tr>
            <td style=\"width: 40px;\" onClick=\"document.location='?cmd=editor&f=";
            // line 45
            if (isset($context["backfilter"])) { $_backfilter_ = $context["backfilter"]; } else { $_backfilter_ = null; }
            echo twig_escape_filter($this->env, $_backfilter_, "html", null, true);
            echo "';\"><span class=\"label label-inverse\">/</span></td>
            <td onClick=\"document.location='?cmd=editor&f=";
            // line 46
            if (isset($context["backfilter"])) { $_backfilter_ = $context["backfilter"]; } else { $_backfilter_ = null; }
            echo twig_escape_filter($this->env, $_backfilter_, "html", null, true);
            echo "';\">. .</td>
        </tr>
        ";
        }
        // line 49
        echo "        ";
        if (isset($context["items"])) { $_items_ = $context["items"]; } else { $_items_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_items_);
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 50
            echo "        <tr>
            <td style=\"width: 40px;\" onClick=\"document.location='/?cmd=editor&f=";
            // line 51
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "filter"), "html", null, true);
            echo "';\"><span class=\"label label-inverse\">TAG</span></td>
            <td onClick=\"document.location='/?cmd=editor&f=";
            // line 52
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "filter"), "html", null, true);
            echo "';\">";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "name"), "html", null, true);
            echo "</td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "        ";
        if (isset($context["files"])) { $_files_ = $context["files"]; } else { $_files_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_files_);
        foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
            // line 56
            echo "        <tr>
            <td><span class=\"label label-success pull-right\">FILE</span></td>
            <td>";
            // line 58
            if (isset($context["file"])) { $_file_ = $context["file"]; } else { $_file_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_file_, "name"), "html", null, true);
            echo "</td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "        </tbody>
    </table>

</div>

</html>";
    }

    public function getTemplateName()
    {
        return "frame.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 61,  149 => 58,  145 => 56,  139 => 55,  126 => 52,  121 => 51,  118 => 50,  112 => 49,  105 => 46,  100 => 45,  97 => 44,  94 => 43,  88 => 39,  72 => 37,  67 => 36,  48 => 24,  43 => 23,  19 => 1,);
    }
}
