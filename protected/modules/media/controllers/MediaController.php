<?php

class MediaController extends Controller
{
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }
    
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('view, edit, list,'),
                'users'=>array('*'),
            ),
        );
    }
    
    public function actionAdmin() {
        
        $id = Yii::app()->user->getId(); 
        
        try {
          $user = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($user->isAdmin != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        $this->layout = '//layouts/menu';

        $this->render('admin', array(
        ));
    } 
    
    public function actionPhotosCategories() {
        
        $id = Yii::app()->user->getId(); 
        
        try {
          $user = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($user->isAdmin != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        try {
            $locations = Location::model()->findAll();
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $this->layout = '//layouts/menu';

        $this->render('photo-categories', array(
            'locations' => $locations,
        ));
    } 
    
    public function actionPhotosAdmin() {
        
        $id = Yii::app()->user->getId(); 
        
        try {
          $user = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($user->isAdmin != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        $locationId = Yii::app()->request->getParam('id');
        
        $criteria = new CDbCriteria();
        
        try {
            $location = Location::model()->findByPk($locationId);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $criteria->addCondition("mediaType = 'photo'");
        $criteria->addCondition("locationId = '$locationId'");
        
        try {
            $photos = Media::model()->findAll($criteria);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if (empty($photos)) {
            Yii::app()->user->setFlash("notice", "There are no photos of this location");
        }
        
        
        $this->layout = '//layouts/menu';
        
        $this->render('photo-admin', array(
            'photos' => $photos,
            'location' => $location,
        ));
    }
    
    public function actionUploadPhoto() {
        
        $id = Yii::app()->user->getId(); 
        
        try {
          $user = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($user->isAdmin != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        $locationId = Yii::app()->request->getParam('id');
        
        try {
            $location = Location::model()->findByPk($locationId);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $this->layout = '//layouts/menu';
        
        $this->render('photo-upload', array(
            'location' => $location,
        ));
    }
    
    public function actionUploadPhotoToServer () {
        
        $id = Yii::app()->user->getId(); 
        
        try {
          $user = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($user->isAdmin != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        $locationId = Yii::app()->request->getParam('id');
        
        try {
            $location = Location::model()->findByPk($locationId);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $locationName = preg_replace("/[^a-zA-Z0-9]+/", "", $location->locationName);
        
        if (!file_exists(Yii::app()->basePath . '/../images/media/photos/' . $locationName)) {
            mkdir(Yii::app()->basePath . '/../images/media/photos/' . $locationName, 0777, true);
        }
        
        $model = new Media();
        
        $tempFile = $_FILES['file']['tmp_name'];
        $extension = explode(".", $_FILES['file']['name']);
        $targetPath = Yii::app()->basePath . '/../images/media/photos/' . $locationName . '/';
        
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $fileName = '';
        
        for ($i = 0; $i < 10; $i++) {
            $fileName .= $characters[rand(0, $charactersLength - 1)];
        
            
        }
        $targetFile =  $targetPath. $fileName . "." . $extension[1];
        
        move_uploaded_file($tempFile,$targetFile);
        
        $model->mediaPath = $fileName . "." . $extension[1];
        $model->mediaType = "photo";
        $model->locationId = $locationId;
        
        
        if ($model->save()) {
            Yii::trace("Media form sent", "http");
        }
    }
    
    public function actionDeletePhoto() {
        
        $id = Yii::app()->user->getId(); 
        
        try {
          $user = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($user->isAdmin != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        $locationId = Yii::app()->request->getParam('locationid');
        $photoId = Yii::app()->request->getParam('id');
        $photoTitle = Yii::app()->request->getParam('title');
        $photoFolder = Yii::app()->request->getParam('folder');
        
        if (Media::model()->deleteAll("mediaId ='" . $photoId . "'")) {
            @unlink(Yii::app()->basePath . '/../images/media/photos/' . $photoFolder . '/'. $photoTitle);
            Yii::trace("Photo was successfully removed", "http");
            Yii::app()->user->setFlash("success", "Photo was successfully removed");
            $this->redirect(array('media/photosadmin?id=' . $locationId));
        }
    }
    
    public function actionPanoramaCategories() {
        
        $id = Yii::app()->user->getId(); 
        
        try {
          $user = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($user->isAdmin != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        try {
            $locations = Location::model()->findAll();
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $this->layout = '//layouts/menu';

        $this->render('panorama-categories', array(
            'locations' => $locations,
        ));
    } 
    
    public function actionPanoramaAdmin() {
        
        $id = Yii::app()->user->getId(); 
        
        try {
          $user = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($user->isAdmin != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        $locationId = Yii::app()->request->getParam('id');
        
        $criteria = new CDbCriteria();
        
        try {
            $location = Location::model()->findByPk($locationId);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $criteria->addCondition("mediaType = 'panorama'");
        $criteria->addCondition("locationId = '$locationId'");
        
        try {
            $photos = Media::model()->findAll($criteria);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if (empty($photos)) {
            Yii::app()->user->setFlash("notice", "There are no photos of this location");
        }
        
        
        $this->layout = '//layouts/menu';
        
        $this->render('panorama-admin', array(
            'photos' => $photos,
            'location' => $location,
        ));
    }
    
    public function actionUploadPanorama() {
        
        $id = Yii::app()->user->getId(); 
        
        try {
          $user = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($user->isAdmin != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        $locationId = Yii::app()->request->getParam('id');
        
        try {
            $location = Location::model()->findByPk($locationId);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $this->layout = '//layouts/menu';
        
        $this->render('panorama-upload', array(
            'location' => $location,
        ));
    }
    
    public function actionUploadPanoramaToServer () {
        
        $id = Yii::app()->user->getId(); 
        
        try {
          $user = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($user->isAdmin != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        $locationId = Yii::app()->request->getParam('id');
        
        try {
            $location = Location::model()->findByPk($locationId);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $locationName = preg_replace("/[^a-zA-Z0-9]+/", "", $location->locationName);
        
        if (!file_exists(Yii::app()->basePath . '/../images/media/panorama/' . $locationName)) {
            mkdir(Yii::app()->basePath . '/../images/media/panorama/' . $locationName, 0777, true);
        }
        
        $model = new Media();
        
        $tempFile = $_FILES['file']['tmp_name'];
        $extension = explode(".", $_FILES['file']['name']);
        $targetPath = Yii::app()->basePath . '/../images/media/panorama/' . $locationName . '/';
        
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $fileName = '';
        
        for ($i = 0; $i < 10; $i++) {
            $fileName .= $characters[rand(0, $charactersLength - 1)];
        
            
        }
        $targetFile =  $targetPath. $fileName . "." . $extension[1];
        
        move_uploaded_file($tempFile,$targetFile);
        
        $model->mediaPath = $fileName . "." . $extension[1];
        $model->mediaType = "panorama";
        $model->locationId = $locationId;
        
        
        if ($model->save()) {
            Yii::trace("Media form sent", "http");
        }
    }
    
    public function actionDeletePanorama() {
        
        $id = Yii::app()->user->getId(); 
        
        try {
          $user = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($user->isAdmin != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        $locationId = Yii::app()->request->getParam('locationid');
        $photoId = Yii::app()->request->getParam('id');
        $photoTitle = Yii::app()->request->getParam('title');
        $photoFolder = Yii::app()->request->getParam('folder');
        
        if (Media::model()->deleteAll("mediaId ='" . $photoId . "'")) {
            @unlink(Yii::app()->basePath . '/../images/media/panorama/' . $photoFolder . '/'. $photoTitle);
            Yii::trace("Photo was successfully removed", "http");
            Yii::app()->user->setFlash("success", "Photo was successfully removed");
            $this->redirect(array('media/panoramaadmin?id=' . $locationId));
        }
    }
    
    public function actionPanoramaView() {
        $id = Yii::app()->user->getId(); 
        
        try {
          $user = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($user->isAdmin != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        $fileName = Yii::app()->request->getParam('id');
        $locationId = Yii::app()->request->getParam('location');
        
        try {
            $location = Location::model()->findByPk($locationId);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        Yii::trace("location name " . $location->locationName, "http");
        
        $criteria = new CDbCriteria();
        
        $criteria->addCondition("mediaType = 'panorama'");
        $criteria->addCondition("mediaPath = '$fileName'");
        
        try {
            $photos = Media::model()->findAll($criteria);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $this->layout = '//layouts/menu';
        
        $this->render('panorama-view', array(
            'photos' => $photos,
            'location' => $location,
        ));
    }
    
    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if(isset($_POST['ajax']) && $_POST['ajax']==='edit-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
