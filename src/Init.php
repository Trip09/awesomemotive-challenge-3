<?php

namespace AwesomeMotiveChallenge3;

use AwesomeMotiveChallenge3\Plugin\AssetsManager;
use AwesomeMotiveChallenge3\Plugin\MenuManager;
use AwesomeMotiveChallenge3\Twig\WordpressExtension;
use Twig_Environment;
use Twig_Extension_Debug;
use Twig_Extensions_Extension_Text;
use Twig_Loader_Filesystem;
use Twig_SimpleFunction;

define('AWESOME_MOTIVE_CHALLENGE_3_URL', plugins_url('../', __FILE__));

class Init
{
    const PATH_TO_VIEWS = 'src/View';

    protected $twig;

    public function __construct()
    {
        $this->setTwig();
        $this->addToWordpressFlow();
    }

    /**
     * Handle page request
     */
    public function setTwig()
    {
        // setup twig template engine
        $twigLoader = new Twig_Loader_Filesystem(plugin_dir_path(__DIR__) . self::PATH_TO_VIEWS);
        $this->twig = new Twig_Environment($twigLoader, ['debug' => false]);
        $this->twig->addExtension(new Twig_Extension_Debug());
        $this->twig->addExtension(new Twig_Extensions_Extension_Text());
        $this->twig->addFunction(new Twig_SimpleFunction('__', '__'));
        $this->twig->addExtension(new WordpressExtension());
    }

    protected function addToWordpressFlow(): void
    {
        (new MenuManager($this->twig))
            ->addActionsToWordpressFlow();
        (new AssetsManager())
            ->addActionsToWordpressFlow();
    }
}
