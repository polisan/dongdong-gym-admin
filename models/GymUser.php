<?php
/*****************************************************************
 * File   : GymUser.php
 * Author : dove
 * Date   : 1/30/15
 * Update : 1/30/15
 * Description: 
 *****************************************************************/

namespace app\models;


use yii\base\Model;

class GymUser extends Model {
    public $account = array();
    public $gym = array();

    /*
     * 模拟场馆账号的信息所用
     */
    public function __construct() {
        $this->account['name'] = '动动场馆';
        $this->gym[0]['name'] = '杭州体育馆';
        $this->gym[0]['sports'] = array('football', 'basketball');
        $this->gym[0]['telephone'] = '1234568901';
        $this->gym[0]['status'] = 1;
        $this->gym[0]['authentic'] = false;
    }

    public function getAccount() {
        return $this->account;
    }

    public function getGymInfo() {
        return $this->gym;
    }

} 