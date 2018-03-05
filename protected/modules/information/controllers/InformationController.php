<?php

class InformationController extends Controller
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
    
    public function actionAdmin() {
        $id = Yii::app()->user->getId(); 
        
        $criteria = new CDbCriteria();
        
        try {
            $users = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        try {
            $count=Information::model()->count($criteria);
            $pages=new CPagination($count);
            $pages->pageSize=10;
            $pages->applyLimit($criteria);
            $informations = Information::model()->findAll($criteria);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $this->layout = '//layouts/menu';

        $this->render('admin', array(
            'informations' => $informations,
            'pages' => $pages,
        ));
    }
    
    public function actionView(){
        
        $informationId = Yii::app()->request->getParam('id');
        
        if (!empty($informationId)) {
            try{
                $model = Information::model()->findByPk($informationId, array());
            }
            catch(EActiveResourceRequestException_ResponseFalse $ex){
                Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
                Yii::app()->user->setFlash("danger", $ex->getMessage());
            }
        }
        
        $this->layout = '//layouts/menu';

        $this->render('view', array(
            'model' => $model,
        ));
    }

    public function actionEdit(){
        $informationId = Yii::app()->request->getParam('id');
        $userId = Yii::app()->user->getId(); 
        
        try {
            $users = User::model()->findByPk($userId);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if (!empty($informationId)) {
            try{
                $model = Information::model()->findByPk($informationId, array());
            }
            catch(EActiveResourceRequestException_ResponseFalse $ex){
                Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
                Yii::app()->user->setFlash("danger", $ex->getMessage());
            }
        }
        else {
            $model = new Information();
        }

        $this->performAjaxValidation($model);
        
        if(isset($_POST['Information'])){
            $model->attributes=$_POST['Information'];
            
            if ($model->save()) {
                Yii::trace("Information form sent", "http");
                Yii::app()->user->setFlash("success", "The changes were confirmed");
                $this->redirect(array('/information/information/admin'));
            }
        }
        
        $this->layout = '//layouts/menu';

        $this->render('edit', array(
            'model' => $model,
        ));
    }
    
    public function actionDeleteRecord() {
        $informationId = Yii::app()->request->getParam('id');
        
        if (Information::model()->deleteAll("informationId ='" . $informationId . "'")) {
            Yii::trace("Information form sent", "http");
            Yii::app()->user->setFlash("success", "The changes were confirmed");
            $this->redirect(array('information/admin'));
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
