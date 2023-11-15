<?php

/** @var yii\web\View $this */
$this->title = 'Photo verification';
?>
<div class="site-index">
    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <img id="photo" src="" alt="Random Image">
    </div>
    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <button id="declineButton" type="button" class="btn btn-danger">Decline</button>
        <button id="approveButton" type="button" class="btn btn-success">Approve</button>
    </div>
</div>

<?php
$this->registerJsFile(Yii::$app->request->baseUrl . '/js/photo.js?v=6');
?>