<div class="page-header">
    <h2><?= t('Last logins') ?></h2>
</div>

<?php if (empty($last_logins)): ?>
    <p class="alert"><?= t('Never connected.') ?></p>
<?php else: ?>
    <table class="table-small table-fixed table-scrolling table-striped">
    <tr>
        <th class="column-15"><?= t('Name') ?></th>
        <th class="column-20"><?= t('Login date') ?></th>
        <th class="column-15"><?= t('Authentication method') ?></th>
        <th class="column-15"><?= t('IP address') ?></th>
        <th><?= t('User agent') ?></th>
        <th class="column-5"><?= t('Actions') ?></th>
    </tr>
    <?php foreach ($last_logins as $login): ?>
    <?php $user['id'] = $login['id'] ?>
    <?php $user['is_active'] = $login['is_active'] ?>
    <tr>
        <td><?= $this->text->e($login['name']) ?></td>
        <td><?= $this->dt->datetime($login['date_creation']) ?></td>
        <td><?= $this->text->e($login['auth_type']) ?></td>
        <td><?= $this->text->e($login['ip']) ?></td>
        <td><?= $this->text->e($login['user_agent']) ?></td>
        <td><?= $this->render('Last_login:user_list/dropdown', array('user' => $user)) ?></td>
    </tr>
    <?php endforeach ?>
    </table>
<?php endif ?>