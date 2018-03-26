<?php

class LocationsController extends Controller
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

    
    public function actionList() {
        
        $criteria = new CDbCriteria();
        
        try {
            $count=Location::model()->count($criteria);
            $pages=new CPagination($count);
            $pages->pageSize=10;
            $pages->applyLimit($criteria);
            $locations = Location::model()->findAll($criteria);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $this->layout = '//layouts/menu';

        $this->render('list', array(
            'locations' => $locations,
            'pages' => $pages,
        ));
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
        
        if ($user->isAdmin != "true" || $user->isConfirmed != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        $criteria = new CDbCriteria();
        
        try {
            $count=Location::model()->count($criteria);
            $pages=new CPagination($count);
            $pages->pageSize=10;
            $pages->applyLimit($criteria);
            $locations = Location::model()->findAll($criteria);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $this->layout = '//layouts/menu';

        $this->render('admin', array(
            'locations' => $locations,
            'pages' => $pages,
        ));
    }
    
    public function actionEdit(){
        
        $id = Yii::app()->user->getId(); 
        
        try {
          $user = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($user->isAdmin != "true" || $user->isConfirmed != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        $locationId = Yii::app()->request->getParam('id');
        
        if (!empty($locationId)) {
            try{
                $model = Location::model()->findByPk($locationId, array());
            }
            catch(EActiveResourceRequestException_ResponseFalse $ex){
                Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
                Yii::app()->user->setFlash("danger", $ex->getMessage());
            }
        }
        else {
            $model = new Location();
        }

        $this->performAjaxValidation($model);
        
        if(isset($_POST['Location'])){
            $model->attributes=$_POST['Location'];
            $model->image = CUploadedFile::getInstance($model,'image');
            $file = CUploadedFile::getInstance($model,'image');
            $locationName = preg_replace("/[^a-zA-Z0-9]+/", "", $model->locationName);
            if ($file != null) {
                $extension = $model->image->getExtensionName();
                
                if (!file_exists(Yii::app()->basePath . '/../images/buildings')) {
                    mkdir(Yii::app()->basePath . '/../images/buildings', 0777, true);
                }
                
                @unlink(Yii::app()->basePath . '/../images/buildings/' . $locationName . '.png');
                @unlink(Yii::app()->basePath . '/../images/buildings/' . $locationName . '.jpg');
                @unlink(Yii::app()->basePath . '/../images/buildings/' . $locationName . '.jpeg');
                @unlink(Yii::app()->basePath . '/../images/buildings/' . $locationName . '.bmp');
                @unlink(Yii::app()->basePath . '/../images/buildings/' . $locationName . '.tiff');
                @unlink(Yii::app()->basePath . '/../images/buildings/' . $locationName . '.gif');

                $model->image->saveAs(Yii::app()->basePath . '/../images/buildings/' . $locationName . '.' . $extension);
                $model->locationImage = $locationName . '.' . $extension;
            }
            
            if ($model->save()) {
                
                Yii::trace("Location form sent", "http");
                Yii::app()->user->setFlash("success", "The changes were confirmed");
                $this->redirect(array('locations/admin'));
            }
        }
        
        $this->layout = '//layouts/menu';

        $this->render('edit', array(
            'model' => $model,
        ));
    }   
    
    public function actionView() {
        
        $locationId = Yii::app()->request->getParam('id');
        
        $photosCriteria = new CDbCriteria();
        $panoramasCriteria = new CDbCriteria();
        
        if (!empty($locationId)) {
            try{
                $model = Location::model()->findByPk($locationId, array());
            }
            catch(EActiveResourceRequestException_ResponseFalse $ex){
                Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
                Yii::app()->user->setFlash("danger", $ex->getMessage());
            }
        }
        
        $photosCriteria->addCondition("mediaType = 'photo'");
        $photosCriteria->addCondition("locationId = '$locationId'");
        
        try {
            $photos = Media::model()->findAll($photosCriteria);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $panoramasCriteria->addCondition("mediaType = 'panorama'");
        $panoramasCriteria->addCondition("locationId = '$locationId'");
        
        try {
            $panoramas = Media::model()->findAll($panoramasCriteria);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $this->layout = '//layouts/menu';

        $this->render('view', array(
            'model' => $model,
            'photos' => $photos,
            'panoramas' => $panoramas,
        ));
    }
    
    public function actionDeleteRecord() {
        
        $id = Yii::app()->user->getId(); 
        
        try {
          $user = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($user->isAdmin != "true" || $user->isConfirmed != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        $locationId = Yii::app()->request->getParam('id');
        
        $criteria = new CDbCriteria();
        $criteria->addCondition("locationId = '$locationId'");
        $events = Event::model()->findAll($criteria);
        
        foreach($events as $event) { 
            if (Participant::model()->deleteAll("eventId ='" . $event->eventId . "'")) {
                Yii::trace("Participant form sent", "http");
            }
        }
        
        if (Event::model()->deleteAll("locationId ='" . $locationId . "'")) {
            Yii::trace("Event form sent", "http");
        }
        
        if (Media::model()->deleteAll("locationId ='" . $locationId . "'")) {
            Yii::trace("Media form sent", "http");
        }
        
        if (Location::model()->deleteAll("locationId ='" . $locationId . "'")) {
            Yii::trace("Location form sent", "http");
            Yii::app()->user->setFlash("success", "The changes were confirmed");
            $this->redirect(array('locations/admin'));
        }
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
