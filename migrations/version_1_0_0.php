<?php
/**
 * Created by PhpStorm.
 * User: bas
 * Date: 2019-03-28
 * Time: 13:12
 */

namespace noud\saml2\migrations;

use phpbb\db\migration\migration;

/**
 * SAML2 migration for version 1.0.0.
 */
class version_1_0_0 extends migration {
    static public function depends_on() {
        return array('\phpbb\db\migration\data\v31x\v314');
    }

    public function update_schema() {
        return array(
            'add_columns' => array(
                $this->table_prefix . 'users' => array(
                    'saml_username' => array('VCHAR', null)
                )
            ),
        );
    }

    public function revert_schema() {
        return array(
            'drop_columns'	=> array(
                $this->table_prefix . 'users'	=> array(
                    'saml_username',
                ),
            ),
        );
    }

    public function update_data() {
        return array(
            array('custom', array(array($this, 'update_saml_username'))),
        );
    }

    public function update_saml_username() {
        $sql = 'UPDATE ' . USERS_TABLE . ' SET saml_username = username WHERE saml_username IS NULL';
    }
}
