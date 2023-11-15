<?php

namespace app\controllers;

use app\models\PhotoVerification;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $token = Yii::$app->params['token'];
        if ($request->get($token, false) !== false) {
            return $this->redirect('admin?' . $token);
        }

        return $this->render('index');
    }

    public function actionAdmin()
    {
        $request = Yii::$app->request;
        $token = Yii::$app->params['token'];
        if ($request->get($token, false) === false) {
            return $this->redirect('index');
        }

        $photos = new ActiveDataProvider([
            'query' => PhotoVerification::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('admin', [
            'photos' => $photos,
        ]);
    }

    public function actionCancel()
    {
        $request = Yii::$app->request;
        $token = Yii::$app->params['token'];
        if ($request->get($token, false) === false) {
            return $this->redirect('index');
        }

        try {
            PhotoVerification::deleteAll(['photo_id' => $request->get('photo_id')]);
        } catch (\Exception $exception) {
            return $this->render('error', ['exception' => $exception]);
        }

        return $this->redirect('admin?' . $token);
    }
}
