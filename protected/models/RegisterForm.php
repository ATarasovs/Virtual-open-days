<?php

/**
 * RegisterForm class.
 * RegisterForm is the data structure for keeping
 * user registration form data. It is used by the 'register' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
        public $username;
        public $password;
        public $firstName;
        public $lastName;
        public $email;
        public $phone;
        public $country;
        public $city;
        public $position;
        public $birthday;
        public $isAdmin;
        public $isConfirmed;
        public $joinDate;

        private $_identity;

        /**
         * Declares the validation rules.
         * The rules state that username, password & email are required,
         * and username & email needs to be unique.
         */
        public function rules()
        {
                return array(
                        array('username, password, firstName, lastName, email, phone, country, city, position, birthday, isAdmin, isConfirmed', 'length', 'max'=>128),
                        // make sure username and email are unique
//                        array('username, email', 'unique'),
                );
        }

        /**
         * Declares attribute labels.
         */
        public function attributeLabels()
        {
                return array(
                        'username'=>'Username',
                        'password'=>'Password',
                        'firstName'=>'First name',
                        'lastName'=>'Last name',
                        'email'=>'Email',
                        'phone'=>'Phone',
                        'country'=>'Country',
                        'city'=>'City',
                        'position'=>'Position',
                        'birthday'=>'Birthday',
                        'isAdmin'=>'Is admin',
                        'isConfirmed'=>'Is confirmed',
                        'joinDate'=>'Join date'
                );
        }
}
