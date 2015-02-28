<?php
/**
 * Created by PhpStorm.
 * User: alexhuang
 * Date: 15/2/6
 * Time: 下午11:27
 */

namespace app\modules\gym\models;


use app\models\Gym;
use app\models\Sports;
use app\models\GymMembercard;
use app\models\GymSports;
use Yii;
use yii\base\Model;

/**
 * This model which contributes to gym default, add, edit, which makes DefaultController more convenience.
 * */

class GymInfo extends  Model{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const STATUS_CLOSED = 11;

    /**
     * Gym information:
     */
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
    public $field;
    public $coach;

    public function rules()
    {
        return[
            [['name','open_time', 'area_id', 'location', 'description', 'manager', 'contact', 'logo', 'sports', 'field', 'coach'], 'required'],

            ['name', 'unique'],

            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED, self::STATUS_CLOSED]],

            ['support_membercard', 'default', 'value' => 1],
            ['support_membercard', 'in', 'range' => [0,1]],

        ];
    }


    public function attributeLabels()
    {
        return[
            "name" => "体育馆名字",
            "status" => "体育馆营业状态",
            "logo" => "体育馆logo",
            "open_time" => "营业时间",
            "contact" => "联系方式",
            "location" => "体育馆位置",
            "sports" => "经营项目",
            "manager" => "经理",
            "description" => "场馆描述",
            "wechat" => "场馆微信号",
            "support_membercard" => "支持会员",
            "field" => "场地列表",
            "coach" => "教练列表",
        ];
    }

    public function getInfoByID($id)
    {
        $gym = new Gym();
        $gym = $gym->findById($id);


        if($gym != null) {
            $this->name = $gym->name;
            $this->status = $gym->status;
            $this->contact = $gym->contact;
            $this->logo = $gym->logo;
            $this->manager = $gym->manager;
            $this->description = $gym->description;
            $this->open_time = $gym->open_time;
            $this->location = $gym->location;
            $this->wechat = $gym->wechat;
            $this->support_membercard = $gym->support_membercard;

            $this->sports = ['a','b'];
            $this->coach = [
                ['name' => '李晓波', 'gender' => '1', 'work_type' => '0', 'sport' => ['羽毛球', '篮球'],],
                ['name' => '德芙', 'gender' => '0', 'work_type' => '0', 'sport' => ['游泳', '篮球'],],
                ['name' => '哈哈哈', 'gender' => '1', 'work_type' => '0', 'sport' => ['羽毛球', '足球'],],
            ];

            $this->field = [
                ['name' => 'hahah', 'number' => '5'],
                ['name' => 'hehe', 'number' => '8'],
            ];


            return $this->attributes;

        }
        else
        {
            $this->name = 'gym->name';
            $this->status = 'gym->status';
            $this->contact = '2';
            $this->logo = '3';
            $this->manager = '4';
            $this->description = '5';
            $this->open_time = '6';
            $this->location = '7';
            $this->wechat = '8';
            $this->support_membercard = '0';


            $this->sports = ['a','b'];
            $this->coach = [
                ['name' => '李晓波', 'gender' => '1', 'work_type' => '0', 'sport' => ['羽毛球', '篮球'],],
                ['name' => '德芙', 'gender' => '0', 'work_type' => '0', 'sport' => ['游泳', '篮球'],],
                ['name' => '哈哈哈', 'gender' => '1', 'work_type' => '0', 'sport' => ['羽毛球', '足球'],],
            ];

            $this->field = [
                ['name' => 'hahah', 'number' => '5'],
                ['name' => 'hehe', 'number' => '8'],
            ];

            return $this->attributes;

        }

    }

    public function saveGymInfoByID()
    {

    }

    public function getAllSports()
    {

    }

}