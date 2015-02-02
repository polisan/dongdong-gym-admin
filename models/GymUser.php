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
    public $name;
    public $status;
    public $logo;
    public $open_time;
    public $contact;
    public $location;
    public $sports = array();
    public $manager;
    public $description;
    public $wechat;
    public $support_membercard;

    public $account = array();
    public $gym = array();

    /*
     * 模拟场馆账号的信息所用
     */
    public function __construct() {
        $this->account['name'] = '动动场馆';

        $this->gym[0]['name'] = 'XX体育馆';
        $this->gym[0]['status'] = 10;    // 0:del, 10:active, 11:closed
        $this->gym[0]['sports'] = array('football', 'basketball');
        $this->gym[0]['contact'] = '1234568901';
        $this->gym[0]['location'] = '浙大玉泉9舍';
        $this->gym[0]['wechat'] = 'dongdong';
        $this->gym[0]['open_time'] = "10:00-22:00";
        $this->gym[0]['authentic'] = false;          // 是否认证
        $this->gym[0]['support_membercard'] = true;   // 是否支持会员
        $this->gym[0]['manager'] = "The Arrow";
        $this->gym[0]['description'] = "XX体育馆俱乐部是为推动全民健身发展而成立的一家体育文化俱乐部。
                        俱乐部致力于优秀体育文化产业的开拓和发展，以大众健身、趣味体育运动、体育运动文化节及健康知识培训为先导，策划组织体育文化交流活动， 是浙江省“全民健身工程”的有力推动者和积极响应者。
                        俱乐部自成立以来，我们深受许多健身爱好者的支持，我们也一直致力于全民健身文化的发展，承办健康文明的体育活动。
                        我们的目标：成为中国大众体育运动的领航者 我们的使命：让每一个参加运动的人都体会到运动带来的改变 我们的口号：每天进步一点点";

        $this->gym[0]['field'][0]['name'] = '普通羽毛球场';
        $this->gym[0]['field'][0]['number'] = 7;
        $this->gym[0]['field'][1]['name'] = '足球场';
        $this->gym[0]['field'][1]['number'] = 5;

        $this->gym[0]['coach'][0]['name'] = '王小波';
        $this->gym[0]['coach'][0]['gender'] = 1;
        $this->gym[0]['coach'][0]['work_type'] = 0;
        $this->gym[0]['coach'][0]['sport'] = array('羽毛球', '游泳');
        $this->gym[0]['coach'][1]['name'] = '王波';
        $this->gym[0]['coach'][1]['gender'] = 0;
        $this->gym[0]['coach'][1]['work_type'] = 0;
        $this->gym[0]['coach'][1]['sport'] = array('羽毛球');
        $this->gym[0]['coach'][2]['name'] = '小风';
        $this->gym[0]['coach'][2]['gender'] = 1;
        $this->gym[0]['coach'][2]['work_type'] = 0;
        $this->gym[0]['coach'][2]['sport'] = array('羽毛球');


        $this->gym[1]['name'] = '动动体育馆';
        $this->gym[1]['status'] = 10;    // 0:del, 10:active, 11:closed
        $this->gym[1]['sports'] = array('football', 'swim');
        $this->gym[1]['contact'] = '1234568901';
        $this->gym[1]['location'] = '浙大玉泉9舍';
        $this->gym[1]['wechat'] = 'dongdong';
        $this->gym[1]['open_time'] = "10:00-22:00";
        $this->gym[1]['authentic'] = true;          // 是否认证
        $this->gym[1]['support_membercard'] = true;   // 是否支持会员
        $this->gym[1]['manager'] = "The Flash";
        $this->gym[1]['description'] = "动动体育馆俱乐部是为推动全民健身发展而成立的一家体育文化俱乐部。
                        俱乐部致力于优秀体育文化产业的开拓和发展，以大众健身、趣味体育运动、体育运动文化节及健康知识培训为先导，策划组织体育文化交流活动， 是浙江省“全民健身工程”的有力推动者和积极响应者。
                        俱乐部自成立以来，我们深受许多健身爱好者的支持，我们也一直致力于全民健身文化的发展，承办健康文明的体育活动。
                        我们的目标：成为中国大众体育运动的领航者 我们的使命：让每一个参加运动的人都体会到运动带来的改变 我们的口号：每天进步一点点";

        $this->gym[1]['field'][0]['name'] = '普通羽毛球场';
        $this->gym[1]['field'][0]['number'] = 7;
        $this->gym[1]['field'][1]['name'] = '足球场';
        $this->gym[1]['field'][1]['number'] = 5;

        $this->gym[1]['coach'][0]['name'] = '王小波';
        $this->gym[1]['coach'][0]['gender'] = 1;
        $this->gym[1]['coach'][0]['work_type'] = 0;
        $this->gym[1]['coach'][0]['sport'] = array('羽毛球', '游泳');
        $this->gym[1]['coach'][1]['name'] = '王波';
        $this->gym[1]['coach'][1]['gender'] = 0;
        $this->gym[1]['coach'][1]['work_type'] = 1;
        $this->gym[1]['coach'][1]['sport'] = array('羽毛球');
    }

    public function getAccount() {
        return $this->account;
    }

    public function getGymInfo() {
        return $this->gym;
    }

    public function getAllSports() {
        $allSports = [
            'workout' => '健身',
            'yoga'    => '瑜伽',
            'swim'    => '游泳',
            'football' => '足球',
            'basketball' => '篮球',
            'pingpong' => '乒乓球',
            'tennis' => '网球',
            'badminton' => '羽毛球',
        ];

        return $allSports;
    }}