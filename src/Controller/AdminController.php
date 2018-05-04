<?php

namespace AwesomeMotiveChallenge3\Controller;

class AdminController
{
    const USER_PERMISSION_MANAGE_OPTIONS = 'manage_options';
    const ROUTE_SHOW                     = 'awesome-motive-challenge-3';

    /**
     * @var \Twig_Environment
     */
    protected $twig;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * Handle actions from the options page
     */
    public function showServerInfoAction()
    {
        if (!current_user_can(self::USER_PERMISSION_MANAGE_OPTIONS)) {
            return;
        }

        // Example to pass info from controller to view
        $notify = false;

        $this->render(
            'ServerInfo/show.html.twig',
            [
                'ajax_url' => wp_json_encode(admin_url('admin-ajax.php', 'relative')),
                'notify'   => $notify,
                'columns'  => ['key' => 'Name', 'value' => 'Current Value'],
                'dataSet'  => [
                    ['key' => 'this_is_just_a_example', 'value' => 9000],
                    ['key' => 'post_max_stuff', 'value' => 3000],
                    ['key' => 'yet_just_another_value', 'value' => 0],
                ],
            ]
        );
    }

    /**
     * Render with twig
     *
     * @param string $template
     * @param array  $options
     */
    protected function render(string $template, array $options = [])
    {
        echo $this->twig->render($template, $options);
    }
}
