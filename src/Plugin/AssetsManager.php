<?php

namespace AwesomeMotiveChallenge3\Plugin;


class AssetsManager
{
    public function loadScripts()
    {
        // TODO Just add when route is \AwesomeMotiveChallenge3\Controller\AdminController::ROUTE_SHOW
        if (true) {
            wp_enqueue_script(
                'awesome-motive-challenge-3-admin-vue-js',
                AWESOME_MOTIVE_CHALLENGE_3_URL . '/dist/js/admin.vue.min.js',
                null,
                null,
                true
            );
        }
    }

    /**
     * Register custom actions in wordpress flow
     *
     * @return void
     */
    public function addActionsToWordpressFlow(): void
    {
        add_action('admin_init', [$this, 'loadScripts']);
    }
}
