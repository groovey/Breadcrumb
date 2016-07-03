<?php
namespace Groovey\Breadcrumb;

class Breadcrumb
{
    private $html;
    private $twig;

    public function __construct($path, $cachePath = '')
    {
        $cache  = ($cachePath) ? ['cache' => $cachePath] : [];
        $loader = new \Twig_Loader_Filesystem($path);
        $twig   = new \Twig_Environment($loader, $cache);

        $this->twig = $twig;
    }

    public function add($title, $url = '', $template = 'default.html')
    {
        $twig = $this->twig;

        $this->html .= $twig->render($template, [
                            'title' => $title,
                            'url'   => $url
                        ]);

    }

    public function render(){
        return $this->html;
    }
}