<?php

class SiteController extends Controller
{
    /**
     * Declares class-based actions.
     */
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
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        // choose layout login
        $this->layout = '//layouts/index';

        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }
        
    public function actionHome()
    {        
        $id = Yii::app()->user->getId();
        
        $eventsCriteria = new CDbCriteria();
        $participantsCriteria = new CDbCriteria();
        
        $selectedLocation = Yii::app()->request->getParam('selectedlocation');
        
        try {
            $locations = Location::model()->findAll();
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }

        try {
            $participantsCriteria->addCondition("userId = '$id'");
            $participants = Participant::model()->findAll($participantsCriteria);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $subscribedEventIds = array();
        
        foreach ($participants as $participant) {
            array_push($subscribedEventIds, $participant->eventId);
        }
        
        try {
            if ($selectedLocation != "") {
                $eventsCriteria->addCondition("locationId = '$selectedLocation'");
            }
            
            $eventsCriteria -> addInCondition("eventId", $subscribedEventIds);
            $subscribedEvents = Event::model()->findAll($eventsCriteria);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $this->layout = '//layouts/menu';
            
        $this->render('home',array(
            'locations' => $locations,
            'subscribedEvents' => $subscribedEvents,
        ));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model=new LoginForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
//             validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login()) {
                $username = $model->username;
                Yii::trace("###### " . $username, "http");
                $users = User::model()->findAll();
                
                foreach ($users as $user) {
                    if ($user->username == $model->username) {
                        if ($user->isAdmin == "true") {
                            if ($user->isConfirmed == "true") {
                                $this->redirect('home');
                            }
                            else {
                                Yii::app()->user->setFlash('notice', "Before you will get administrator permisiions, current admin has to confirm your role. <br> If you will have any problems later, please contact our support team.");
                                $this->redirect('home');   
                            }
                        }
                        else {
                            $this->redirect('home');
                        }
                    }
                }
            }
            else {
                Yii::log("Warning - someone tried to login with incorrect details", 'warning', 'http.threads');
                Yii::app()->user->setFlash('danger', "The login or password is incorrect, try to relogin");
            }
        }

        // choose layout login
        $this->layout = '//layouts/login';

        // display the login form
        $this->render('login',array('model'=>$model));
    }

    /**
    * Displays the register page
    */
    public function actionRegister()
    {
        $model= new RegisterForm;
        $newUser = new User;

        $this->performAjaxValidation($model);

        // collect user input data
        if(isset($_POST['RegisterForm']))
        {
            $model->attributes=$_POST['RegisterForm'];
            
            $users = User::model()->findAll();
            
            foreach ($users as $user) {
                if ($model->username == $user->username) {
                    Yii::app()->user->setFlash('danger', "The user with such username exists <br> Try to use another username");
                    $this->redirect('register');
                }
            }
            
            if($model->isAdmin == "1") {
                $isAdmin = "true";
            } 
            else {
                $isAdmin = "false";
            }
            
            $newUser->username = $model->username;
            $newUser->password = $model->password;
            $newUser->realPassword = $model->realPassword;
            $newUser->city = $model->city;
            $newUser->firstName = $model->firstName;
            $newUser->lastName = $model->lastName;
            $newUser->email = $model->email;
            $newUser->phone = $model->phone;
            $newUser->country = $model->country;
            $newUser->position = $model->position;
            $newUser->birthday = $model->birthday;
            $newUser->isAdmin = $isAdmin;
            $newUser->isConfirmed = "false";
            $newUser->joinDate = date('Y-m-d');

            if($newUser->save()) {
                $identity=new UserIdentity($newUser->username,$model->password);
                $identity->authenticate();
                Yii::app()->user->login($identity,0);
                
                if ($newUser->isAdmin == "true") {
                    Yii::app()->user->setFlash('notice', "Before you will get administrator permisiions, current admin has to confirm your role. <br> If you will have any problems later, please contact our support team.");
                }
                
                $this->redirect('home');
            }

        }

        // choose layout login
        $this->layout = '//layouts/login';

        // display the register form
        $this->render('register',array('model'=>$model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
    
    public function actionLoadEvents() {
        
        $id = Yii::app()->user->getId();
        $eventsCriteria = new CDbCriteria();
        $participantsCriteria = new CDbCriteria();
        $selectedLocation = Yii::app()->request->getParam('id');
        
        try {
            $participantsCriteria->addCondition("userId = '$id'");
            $participants = Participant::model()->findAll($participantsCriteria);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
        $subscribedEventIds = array();
        
        foreach ($participants as $participant) {
            array_push($subscribedEventIds, $participant->eventId);
        }
        
        try {
            if ($selectedLocation != "") {
                $eventsCriteria->addCondition("locationId = '$selectedLocation'");
            }
            
            $eventsCriteria -> addInCondition("eventId", $subscribedEventIds);
            $subscribedEvents = Event::model()->findAll($eventsCriteria);
        }
        catch (Exception $ex){
            Yii::log("Exception \n".$ex->getMessage(), 'error', 'http.threads');
            Yii::app()->user->setFlash('danger', $ex->getMessage());
        }
        
         $this->renderPartial('_events', array(
            'subscribedEvents' => $subscribedEvents,
        ));
    }

    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model){
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form'){
            $errors = CActiveForm::validate($model);
            echo $errors;
            Yii::app()->end();

        }
    }
}