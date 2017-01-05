<?php

namespace Kanboard\Plugin\Last_login\Model;

use Kanboard\Core\Base;
use Kanboard\Model\UserModel;

/**
 * LastLogin model
 *
 * @package  Kanboard\Model
 * @author   Martin Middeke
 */
class Last_loginModel extends Base
{
    /**
     * SQL table name
     *
     * @var string
     */
    const TABLE = 'last_logins';

    /**
     * Get the last connections for all
     *
     * @access public
     * @return array
     */
    public function getAll($user_id)
    {
        return $this->db
                    ->table(self::TABLE)
                    ->columns(
                        UserModel::TABLE.'.username',
                        UserModel::TABLE.'.name',
                        UserModel::TABLE.'.id',
                        UserModel::TABLE.'.is_active',
                        self::TABLE.'.auth_type',
                        self::TABLE.'.ip',
                        self::TABLE.'.user_agent',
                        'max('.self::TABLE.'.date_creation) AS date_creation'
                    )
                    ->join(UserModel::TABLE, 'id', 'user_id')
                    ->groupBy(UserModel::TABLE.'.name')
                    ->eq('is_active', 1)
                    ->findAll();
    }
}
