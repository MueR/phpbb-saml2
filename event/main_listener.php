<?php
/**
 * Created by PhpStorm.
 * User: bas
 * Date: 2019-03-28
 * Time: 13:31
 */

namespace noud\saml2\event;

use phpbb\auth\auth;
use phpbb\config\config;
use phpbb\controller\helper;
use phpbb\event\data;
use phpbb\language\language;
use phpbb\template\template;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class main_listener implements EventSubscriberInterface {
    // core.user_add_modify_data

    static public function getSubscribedEvents() {
        return array(
            'core.user_add_modify_data' => 'user_add_modify_data',
        );
    }

    public function user_add_modify_data(data $event) {
        $data['sql_ary']['saml_username'] = $event['user_row']['username'];
    }
}
