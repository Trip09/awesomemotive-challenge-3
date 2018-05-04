<?php

namespace AwesomeMotiveChallenge3\Plugin;

use AwesomeMotiveChallenge3\Controller\AdminController;

class MenuManager
{
    const PAGE_TITLE = 'Ch3 - Server Info';
    const MENU_TITLE = 'Ch3 - Server Info';

    /**
     * @var \Twig_Environment
     */
    private $twig;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function registerInMenu()
    {
        add_menu_page(
            self::PAGE_TITLE,
            self::MENU_TITLE,
            AdminController::USER_PERMISSION_MANAGE_OPTIONS,
            AdminController::ROUTE_SHOW,
            [(new AdminController($this->twig)), 'showServerInfoAction']
        );
    }

    /**
     * Register custom actions in wordpress flow
     *
     * @return void
     */
    public function addActionsToWordpressFlow(): void
    {
        add_action('admin_menu', [$this, 'registerInMenu']);
    }
}
