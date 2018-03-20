<?php

class UsersController extends Controller
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
        
        if ($user->isAdmin != "true" || $user->isConfirmed != "true") {
            Yii::trace("Someone without required permission tried to access admin page", "http");
            Yii::app()->user->setFlash("danger", "You do not have permissions to view this page");
            $this->redirect(array('/site/home'));
        }
        
        $criteria = new CDbCriteria();
        
        try {
            $count=User::model()->count($criteria);
            $pages=new CPagination($count);
            $pages->pageSize=10;
            $pages->applyLimit($criteria);
            $users = User::model()->findAll($criteria);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $this->layout = '//layouts/menu';

        $this->render('admin', array(
            'users' => $users,
            'pages' => $pages,
        ));
    }
    
    public function actionEdit(){
        
        $id = Yii::app()->user->getId(); 
        $selectedUserId = Yii::app()->request->getParam('id');
        
        if  ($id != $selectedUserId) {
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
        }
        
        if (!empty($selectedUserId)) {
            try{
                $model = User::model()->findByPk($selectedUserId, array());
            }
            catch(EActiveResourceRequestException_ResponseFalse $ex){
                Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
                Yii::app()->user->setFlash("danger", $ex->getMessage());
            }
        }
        else {
            $model = new User();
        }

        $this->performAjaxValidation($model);
        
        if(isset($_POST['User'])){
            $model->attributes=$_POST['User'];
            $model->image = CUploadedFile::getInstance($model,'image');
            $file = CUploadedFile::getInstance($model,'image');
            $userImageName = preg_replace("/[^a-zA-Z0-9]+/", "", $model->username);
            if ($file != null) {
                $extension = $model->image->getExtensionName();
                
                if (!file_exists(Yii::app()->basePath . '/../images/users')) {
                    mkdir(Yii::app()->basePath . '/../images/users', 0777, true);
                }
                
                @unlink(Yii::app()->basePath . '/../images/users/' . $userImageName . '.png');
                @unlink(Yii::app()->basePath . '/../images/users/' . $userImageName . '.jpg');
                @unlink(Yii::app()->basePath . '/../images/users/' . $userImageName . '.jpeg');
                @unlink(Yii::app()->basePath . '/../images/users/' . $userImageName . '.bmp');
                @unlink(Yii::app()->basePath . '/../images/users/' . $userImageName . '.tiff');
                @unlink(Yii::app()->basePath . '/../images/users/' . $userImageName . '.gif');

                $model->image->saveAs(Yii::app()->basePath . '/../images/users/' . $userImageName . '.' . $extension);
                $model->userImage = $userImageName . '.' . $extension;
            }
            
            if ($model->save()) {
                
                Yii::trace("User form sent", "http");
                Yii::app()->user->setFlash("success", "The changes were confirmed");
                $this->redirect(array('users/view?id=' . $selectedUserId));
            }
        }
        
        $this->layout = '//layouts/menu';

        $this->render('edit', array(
            'model' => $model,
        ));
    }   
    
    public function actionView() {
        
        $selectedUserId = Yii::app()->request->getParam('id');
        $id = Yii::app()->user->getId(); 
        
        try {
            $users = User::model()->findByPk($id);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if (!empty($id)) {
            try{
                $model = User::model()->findByPk($selectedUserId, array());
            }
            catch(EActiveResourceRequestException_ResponseFalse $ex){
                Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
                Yii::app()->user->setFlash("danger", $ex->getMessage());
            }
        }
        
        $this->layout = '//layouts/menu';

        $this->render('view', array(
            'model' => $model,
            'users' => $users,
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
        
        $userId = Yii::app()->request->getParam('id');
        
        try {
            $users = User::model()->findByPk($userId);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($userId == $id) {
            Yii::app()->user->setFlash("danger", "You are not able to remove the user you are logged in with");
            $this->redirect(array('users/admin'));
        }
        
        if (Participant::model()->deleteAll("userId ='" . $userId . "'")) {
            Yii::trace("Participant form sent", "http");
        }
        
        if (Message::model()->deleteAll("login ='" . $users->username . "'")) {
            Yii::trace("Message form sent", "http");
        }
        
        if (User::model()->deleteAll("userId ='" . $userId . "'")) {
            Yii::trace("User form sent", "http");
            Yii::app()->user->setFlash("success", "The changes were confirmed");
            $this->redirect(array('users/admin'));
        }
    }
    
    public function actionRequestsList() {
        
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
        $criteria->order = "joinDate ASC";
        $criteria -> addCondition("isAdmin = 'true'");
        $criteria -> addCondition("isConfirmed = 'false'");
        
        
        try {
            $count=User::model()->count($criteria);
            $pages=new CPagination($count);
            $pages->pageSize=10;
            $pages->applyLimit($criteria);
            $users = User::model()->findAll($criteria);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
        }
            
        
        $this->layout = '//layouts/menu';
        
        $this->render('requests', array(
            'users' => $users,
            'pages' => $pages,
        ));
    }
    
    public function actionRequestChangeStatus() {
        
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
        
        $userId = Yii::app()->request->getParam('id');
        $status = Yii::app()->request->getParam('status');
        
        try {
            $model = User::model()->findByPk($userId);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        if ($status == "decline") {
            $model->isAdmin = "false";
        }
        
        else if ($status == "accept") {
            $model->isConfirmed = "true";
        }
        
        $model->password = $model->realPassword;
        
        if ($model->save()) {
            Yii::trace("User form sent", "http");
            Yii::app()->user->setFlash("success", "The changes were confirmed");
            $this->redirect(array('users/requestslist'));
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
