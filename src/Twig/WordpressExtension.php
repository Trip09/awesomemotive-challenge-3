<?php

namespace AwesomeMotiveChallenge3\Twig;

use Twig_Extension;
use Twig_SimpleFunction;

class WordpressExtension extends Twig_Extension
{
    /**
     * {@inheritDoc}
     * @see Twig_Extension::getFunctions()
     */
    public function getFunctions(): array
    {
        return [
            new Twig_SimpleFunction('wp_eval', [$this, 'wpEvalFunction']),
            new Twig_SimpleFunction('__', [$this, 'wpTranslatorFunction']),
        ];
    }

    public function wpTranslatorFunction($translationName, $domain)
    {
        return __($translationName, $domain);
    }

    /**
     * Call any wordpress function from twig template
     *
     * @param string $functionName
     * @param array  ...$args
     *
     * @return mixed
     */
    public function wpEvalFunction($functionName, ...$args)
    {
        return call_user_func_array($functionName, $args);
    }
}
