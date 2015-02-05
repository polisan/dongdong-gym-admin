<?php
/**
 * @author deofly
 * @since 1.0 2015/01/17
 */

namespace app\components;

use Yii;
use yii\base\Action;
use yii\base\Exception;
use yii\base\UserException;
use yii\web\HttpException;

class DDErrorAction extends Action
{
    public $defaultCode = 1;

    public $defaultName = 'Error';

    public $defaultMessage = 'An internal server error occurred.';

    public function run() {
        if (($exception = Yii::$app->getErrorHandler()->exception) === null) {
            return '';
        }

        if ($exception instanceof HttpException) {
            $code = $exception->statusCode;
        } else {
            $code = $exception->getCode();
        }

        if ($exception instanceof Exception) {
            $name = $exception->getName();
        } else {
            $name = $this->defaultName;
        }

        if ($exception instanceof UserException) {
            $message = $exception->getMessage();
        } else {
            $message = $this->defaultMessage;
        }

        return json_encode([
            'code' => $code,
            'name' => $name,
            'message' => $message,
        ], JSON_UNESCAPED_UNICODE);
    }
}