<div class="page-header">
    <h2><?= t('Disable user') ?></h2>
</div>

<div class="confirm">
    <p class="alert alert-info"><?= t('Do you really want to disable this user: "%s"?', $user['name'] ?: $user['username']) ?></p>

    <div class="form-actions">
        <?= $this->url->link(t('Yes'), 'Last_loginController', 'disable', array('user_id' => $user['id'], 'plugin' => 'last_login'), true, 'btn btn-red') ?>
        <?= t('or') ?>
        <?= $this->url->link(t('cancel'), 'Last_loginController', 'index', array('plugin' => 'last_login'), false, 'close-popover') ?>
    </div>
</div>
