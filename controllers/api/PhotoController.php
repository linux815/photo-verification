<?php

namespace app\controllers\api;

use app\models\PhotoVerification;
use Exception;
use Yii;
use yii\rest\ActiveController;

class PhotoController extends ActiveController
{
    public $modelClass = 'app\models\PhotoVerification';

    /**
     * @throws Exception
     */
    public function actionCheckPhotoDecision()
    {
        $request = Yii::$app->request;
        if (PhotoVerification::find()->where(['photo_id' => $request->get('photo_id')])->exists()) {
            Yii::$app->response->statusCode = 500;
            return $this->asJson([
                'message' => 'The photo has already been processed',
                'code' => 500,
            ]);
        }

        return $this->asJson([]);
    }

    public function actionVerify()
    {
        $model = new PhotoVerification();
        $model->load(Yii::$app->request->post());
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post(), '') && $model->validate()) {
            $model->save();
            return $this->asJson(['message' => 'Successfully']);
        }
    }
}
