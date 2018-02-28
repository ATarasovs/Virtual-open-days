<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $userId
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $firstName
 * @property string $lastName
 * @property string $email
 * @property string $phone
 * @property string $country
 * @property string $city
 * @property string $position
 * @property string $birthday
 * @property string $isAdmin
 * @property string $isConfirmed
 * @property string $joinDate
 * @property string $userImage
 * @property string $image
 */
class User extends CActiveRecord
{
        public $image;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('userId, username, password, firstName, lastName, phone, email, country, city, position, birthday, isAdmin, isConfirmed, userImage', 'safe'),
                        array('image', 'file', 'types'=>'jpg, png, jpeg, bmp, tiff, gif', 'safe' => false, 'allowEmpty' => true),
//                        array('username, email', 'unique'),
                        
//                        array('phone',
//				'ext.validators.UserPhoneValidator', 'userId'=>$this->userId),
//                        
//                        array('email',
//				'ext.validators.UserEmailValidator', 'userId'=>$this->userId),
                    
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userId' => 'User',
			'username' => 'Username',
			'password' => 'Password',
			'salt' => 'Salt',
			'firstName' => 'First name',
			'lastName' => 'Last name',
			'email' => 'Email',
			'phone' => 'Phone',
			'country' => 'Country',
			'city' => 'City',
			'position' => 'Position',
			'birthday' => 'Birthday',
                        'joinDate' => 'Join date',
                        'isAdmin' => 'Admin',
                        'isConfirmed' => 'Confirmed',
                        'userImage' => 'User Image',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('userId',$this->userId);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('birthday',$this->birthday,true);
                $criteria->compare('isAdmin',$this->isAdmin,true);
                $criteria->compare('isConfirmed',$this->isConfirmed,true);
                $criteria->compare('userImage',$this->userImage, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        // hash password
        public function hashPassword($password, $salt)
        {
            return md5($salt.$password);
        }

        // password validation
        public function validatePassword($password)
        {
            return $this->hashPassword($password,$this->salt)===$this->password;
        }

        //generate salt
        public function generateSalt()
        {
            return uniqid('',true);
        }

        public function beforeValidate()
        {
            $this->salt = $this->generateSalt();
            return parent::beforeValidate();
        }

        public function beforeSave()
        {
            $this->password = $this->hashPassword($this->password, $this->salt);
            return parent::beforeSave();
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
