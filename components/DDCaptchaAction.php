<?php

namespace app\components;

use Yii;
use yii\captcha\CaptchaAction;
use yii\helpers\Url;
use yii\web\Response;

class DDCaptchaAction extends CaptchaAction
{
    public function run() {
        if (Yii::$app->request->getQueryParam(self::REFRESH_GET_VAR) !== null) {
            // AJAX request for regenerating code
            $code = $this->getVerifyCode(true);

            return json_encode([
                'hash1' => $this->generateValidationHash($code),
                'hash2' => $this->generateValidationHash(strtolower($code)),
                // we add a random 'v' parameter so that FireFox can refresh the image
                // when src attribute of image tag is changed
                'url' => Url::to([$this->id, 'v' => uniqid()]),
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        } else {
            $this->setHttpHeaders();
            Yii::$app->response->format = Response::FORMAT_RAW;
            return $this->renderImage($this->getVerifyCode(true));
        }
    }
}
