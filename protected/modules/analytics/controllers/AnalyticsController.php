<?php

class AnalyticsController extends Controller
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
                'actions'=>array('view, edit, listAllEvents, listSubscribedEvents'),
                'users'=>array('*'),
            ),
        );
    }
    
    public function actionView(){
        
        try {
            $charts = Chart::model()->findAll();
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        try {
            $datas = Data::model()->findAll();
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $this->layout = '//layouts/menu';

        $this->render('view', array(
            'charts' => $charts,
            'datas' => $datas,
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
            $count=Chart::model()->count($criteria);
            $pages=new CPagination($count);
            $pages->pageSize=10;
            $pages->applyLimit($criteria);
            $charts = Chart::model()->findAll($criteria);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $this->layout = '//layouts/menu';

        $this->render('admin', array(
            'charts' => $charts,
            'pages' => $pages,
        ));
    }
    
    public function actionEdit(){
        
        $id = Yii::app()->user->getId(); 
        
        $criteria = new CDbCriteria();
        
        $datas = array();
        
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
        
        $chartId = Yii::app()->request->getParam('id');
        
        if (!empty($chartId)) {
            try{
                $model = Chart::model()->findByPk($chartId, array());
            }
            catch(EActiveResourceRequestException_ResponseFalse $ex){
                Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
                Yii::app()->user->setFlash("danger", $ex->getMessage());
            }
            
            try{
                $criteria->addCondition("chartId = '$chartId'");
                $datas = Data::model()->findAll($criteria);
            }
            catch(EActiveResourceRequestException_ResponseFalse $ex){
                Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
                Yii::app()->user->setFlash("danger", $ex->getMessage());
            }
        }
        else {
            $model = new Chart();
        }

        $this->performAjaxValidation($model);
        
        if(isset($_POST['Chart'])){
            $model->attributes=$_POST['Chart'];
            
            if ($model->save()) {
                
                Yii::trace("Chart form sent", "http");
                Yii::app()->user->setFlash("success", "The changes were confirmed");
                $this->redirect(array('analytics/admin'));
            }
        }
        
        $this->layout = '//layouts/menu';

        $this->render('edit', array(
            'model' => $model,
            'datas' => $datas,
        ));
    }  

    public function actionSaveData() {
        
        $chartId = $_POST['id'];
        $data = json_decode($_POST['data']);
        
        if (Data::model()->deleteAll("chartId ='" . $chartId . "'")) {
            Yii::trace("Data form sent", "http");
        }
        
        Yii::trace($chartId, "http");
        foreach ($data as $key => $value) {
            $model = new Data();
            $this->performAjaxValidation($model);

            $model->chartId = $chartId;
            $model->title = $key;
            $model->number = $value;
            
            if ($model->save()) {
             Yii::trace("Data form sent", "http");
            }
            else {
                Yii::trace("Something went wrong", "http");
            }
       }
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
        
        $chartId = Yii::app()->request->getParam('id');
        
        if (Data::model()->deleteAll("chartId ='" . $chartId . "'")) {
            Yii::trace("Data form sent", "http");
            Yii::app()->user->setFlash("success", "The changes were confirmed");
        }
        
        if (Chart::model()->deleteAll("id ='" . $chartId . "'")) {
            Yii::trace("Chart form sent", "http");
            Yii::app()->user->setFlash("success", "The changes were confirmed");
            $this->redirect(array('analytics/admin'));
        }
    }

    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='edit-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
