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
            
        $locations = Location::model()->findAll();
            
        $this->layout = '//layouts/menu';
            
        $this->render('home',array(
            'locations' => $locations
        ));
    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
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
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect('home');
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
                        $newUser->username = $model->username;
                        $newUser->password = $model->password;
                        $newUser->firstName = $model->firstName;
                        $newUser->lastName = $model->lastName;
                        $newUser->email = $model->email;
                        $newUser->phone = $model->phone;
                        $newUser->country = $model->country;
                        $newUser->city = $model->city;
                        $newUser->position = $model->position;
                        $newUser->birthday = $model->birthday;
                        $newUser->joinDate = date('Y-m-d');
                                
                        if($newUser->save()) {
                            $identity=new UserIdentity($newUser->username,$model->password);
                            $identity->authenticate();
                            Yii::app()->user->login($identity,0);
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
        
        /**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model){
		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form'){
			$errors = CActiveForm::validate($model);
			echo $errors;
			Yii::app()->end();
	
		}
	}
}