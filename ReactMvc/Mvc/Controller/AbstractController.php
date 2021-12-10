<?php

namespace ReactMvc\Mvc\Controller;

use ReactMvc\Mvc\Http\HtmlResponse;
use Twig\Environment as TwigEnvironment;

/**
 * AbstractController
 *
 * @package ReactMvc\Mvc\Controller
 * @author Philipp Lohmann <philipp.lohmann@check24.de>
 * @copyright CHECK24 GmbH
 */
abstract class AbstractController
{
    private bool $created = false;

    private TwigEnvironment $twig;

    /**
     * @param TwigEnvironment $twig
     * @return void
     */
    public function create(TwigEnvironment $twig): void
    {
        $this->twig = $twig;

        $this->created = true;
    }

    /**
     * @param string $template
     * @param array $args
     * @return HtmlResponse
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    protected function render(string $template, array $args = []): HtmlResponse
    {
        return new HtmlResponse($this->twig->render("{$template}.twig", $args));
    }

    /**
     * @return bool
     */
    public function isCreated(): bool
    {
        return $this->created;
    }

    /**
     * @return TwigEnvironment
     */
    protected function getTwig(): TwigEnvironment
    {
        return $this->twig;
    }
}