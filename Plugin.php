<?php

namespace Kanboard\Plugin\Last_login;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Security\Role;

class Plugin extends Base
{
    public function initialize()
    {
        $this->template->hook->attach('template:config:sidebar', 'Last_login:config/sidebar');
        $this->applicationAccessMap->add('last_loginController', 'index', Role::APP_ADMIN);
        $this->applicationAccessMap->add('last_loginController', 'disable', Role::APP_ADMIN);
    }

    public function getClasses() {
        return array(
            'Plugin\Last_login\Model' => array(
                'Last_loginModel',
            )
        );
    }

    public function getPluginName()
    {
        return 'Last_login';
    }

    public function getPluginDescription()
    {
        return t('Show last login from all active useres in settings page');
    }

    public function getPluginAuthor()
    {
        return 'Martin Middeke';
    }

    public function getPluginVersion()
    {
        return '0.0.1';
    }

	    public function getPluginHomepage()
    {
        return 'https://github.com/Busfreak/kanboard-Last_login';
    }
}