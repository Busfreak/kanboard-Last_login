<?php

namespace Kanboard\Plugin\Last_login\Controller;

use Kanboard\Controller\BaseController;

/**
 * Last_login
 *
 * @package controller
 * @author  Martin Middeke
 */
class Last_loginController extends BaseController
{
    /**
     * Last_login index page
     *
     * @access public
     */
    public function index()
    {
        $user = $this->getUser();
        $this->response->html($this->helper->layout->config('Last_login:config/index', array(
            'title' => t('Settings').' &gt; '.'Last Login',
            'last_logins' => $this->last_loginModel->getAll($user['id']),
        )));
    }

    /**
     * Confirm disable a user
     *
     * @access public
     */
    public function confirmDisable()
    {
        $user = $this->getUser();

        $this->response->html($this->helper->layout->user('Last_login:user_status/disable', array(
            'user' => $user,
        )));
    }

    /**
     * Disable a user
     *
     * @access public
     */
    public function disable()
    {
        $user = $this->getUser();
        $this->checkCSRFParam();

        if ($this->userModel->disable($user['id'])) {
            $this->flash->success(t('User disabled successfully.'));
        } else {
            $this->flash->failure(t('Unable to disable this user.'));
        }

        $this->response->redirect($this->helper->url->to('Last_loginController', 'index', array('plugin' => 'last_login')));
    }
}
