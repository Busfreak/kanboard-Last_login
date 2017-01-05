<div class="dropdown">
    <a href="#" class="dropdown-menu dropdown-menu-link-icon"><i class="fa fa-cog fa-fw"></i><i class="fa fa-caret-down"></i></a>
    <ul>
        <li>
            <i class="fa fa-user fa-fw"></i>
            <?= $this->url->link(t('View profile'), 'UserViewController', 'show', array('user_id' => $user['id'])) ?>
        </li>
        <?php if ($user['is_active'] == 1 && $this->user->hasAccess('Last_loginController', 'disable') && ! $this->user->isCurrentUser($user['id'])): ?>
            <li>
                <i class="fa fa-times fa-fw"></i>
                <?= $this->url->link(t('Disable'), 'Last_loginController', 'confirmDisable', array('user_id' => $user['id'], 'plugin' => 'last_login'), false, 'popover') ?>
            </li>
        <?php endif ?>
    </ul>
</div>
