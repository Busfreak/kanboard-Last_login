        <li <?= $this->app->checkMenuSelection('last_loginController', 'index') ?>>
            <?= $this->url->link(t('Last Login'), 'last_loginController', 'index', array('plugin' => 'last_login')) ?>
        </li>