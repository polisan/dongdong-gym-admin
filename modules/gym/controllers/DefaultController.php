<?php

namespace app\modules\gym\controllers;

use app\models\Area;
use yii\web\Controller;

class DefaultController extends Controller
{
    /** TODO: 查看场馆信息
     * 1、基本信息：包括名字，Logo，营业时间，联系方式，地区，详细地址，
     * 微信公共账号，是否支持会员，是否认证，经营体育项目，
     * 相册，当前营业状态，场馆简介（详见gym*表）
     * 2、所有场地简略信息：包括场地种类名及场地数量（详见field_category表）
     * 3、所有教练简略信息：包含教练名，教练头像，性别，工作类型，运动类型（详见coach表）
     */
    public function actionIndex()
    {
        $model = new GymUser();
        return $this->render('index', ['model' => $model]);
    }

    /** TODO: 编辑场馆信息
     * 编辑上述场馆基本信息
     **/
    public function actionEdit()
    {
        $model = new Gymuser();
        return $this->render('gym_edit', ['model' => $model]);
    }

    // TODO: 新添场馆
    // 表单包含上述场馆基本信息
    public function actionAdd()
    {
        $model = new Gymuser();

        $provinces = Area::findProvinces();
        $provinceNames[] = "请选择省份";
        foreach ($provinces as $province) {
            $provinceNames[$province['id']] = $province['name'];
        }

        return $this->render('gym_add', [
            'model' => $model,
            'provinces' => $provinceNames,
        ]);
    }

    public function actionDelete()
    {}
}

/*----------- 写页面所用，后要删除 ---------*/

use yii\base\Model;

class GymUser extends Model {

    // 场馆信息
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

    private $gym = array();      // 模拟场馆账号信息所用

    /*
     * 模拟场馆账号的信息所用
     */
    public function __construct() {

        $this->gym['name'] = 'XX体育馆';
        $this->gym['status'] = 10;    // 0:del, 10:active, 11:closed
        $this->gym['sports'] = array('football', 'basketball');
        $this->gym['contact'] = '1234568901';
        $this->gym['location'] = '浙大玉泉9舍';
        $this->gym['wechat'] = 'dongdong';
        $this->gym['open_time'] = "10:00-22:00";
        $this->gym['authentic'] = false;          // 是否认证
        $this->gym['support_membercard'] = true;   // 是否支持会员
        $this->gym['manager'] = "The Arrow";
        $this->gym['description'] = "XX体育馆俱乐部是为推动全民健身发展而成立的一家体育文化俱乐部。
                     俱乐部致力于优秀体育文化产业的开拓和发展，以大众健身、趣味体育运动、体育运动文化节及健康知识培训为先导，策划组织体育文化交流活动， 是浙江省“全民健身工程”的有力推动者和积极响应者。
                     俱乐部自成立以来，我们深受许多健身爱好者的支持，我们也一直致力于全民健身文化的发展，承办健康文明的体育活动。
                     我们的目标：成为中国大众体育运动的领航者 我们的使命：让每一个参加运动的人都体会到运动带来的改变 我们的口号：每天进步一点点";

        $this->gym['field'][0]['name'] = '普通羽毛球场';
        $this->gym['field'][0]['number'] = 7;
        $this->gym['field'][1]['name'] = '足球场';
        $this->gym['field'][1]['number'] = 5;

        $this->gym['coach'][0]['name'] = '王小波';
        $this->gym['coach'][0]['gender'] = 1;
        $this->gym['coach'][0]['work_type'] = 0;
        $this->gym['coach'][0]['sport'] = array('羽毛球', '游泳');
        $this->gym['coach'][1]['name'] = '王波';
        $this->gym['coach'][1]['gender'] = 0;
        $this->gym['coach'][1]['work_type'] = 0;
        $this->gym['coach'][1]['sport'] = array('羽毛球');
        $this->gym['coach'][2]['name'] = '小风';
        $this->gym['coach'][2]['gender'] = 1;
        $this->gym['coach'][2]['work_type'] = 0;
        $this->gym['coach'][2]['sport'] = array('羽毛球');

    }

    public function getGym() {
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
