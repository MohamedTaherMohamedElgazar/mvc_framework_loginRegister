<?php


class Users extends Controller {

    public function __construct() {
        // instaniate it and use its methods
        $this->userModel = $this->model('User');
    }



    public function register() {
        $data = [
            'title'=>'Register page',
            'username'=>'',
            'email' =>'',
            'password'=>'',
            'confirmPassword'=>'',
            'usernameError'=>'',
            'passwordError'=>'',
            'emailError'=>'',
            'confirmPasswordError'=>''
            
        ];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // sanitize to not allow scripts
    //$_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    $data = [
        'username'=>trim($_POST['username']),
        'email' =>trim($_POST['email']),
        'password'=>trim($_POST['password']),
        'confirmPassword'=>trim($_POST['confirmPassword']),
        'usernameError'=>'',
        'passwordError'=>'',
        'emailError'=>'',
        'confirmPasswordError'=>''
        
    ];

    // validate to specific standards
    $nameValidation = "/^[a-zA-Z0-9]*$/";
    $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

    if (empty($data['username'])) {
        $data['usernameError'] = 'Please enter username.';
        // compare with validation
    } elseif (!preg_match($nameValidation, $data['username'])) {
        $data['usernameError'] = 'Name can only contain letters and numbers.';
    }


    //Validate email
    if (empty($data['email'])) {
        $data['emailError'] = 'Please enter email address.';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $data['emailError'] = 'Please enter the correct format.';
    }else{
        // check if email already taken
        // if true ===> print error
        if($this->userModel->findUserByEmail($data['email'])){
            $data['emailError'] = 'Email is already taken.';
        }
    }



    // validate password
    if(empty($data['password'])){
        $data['passwordError'] = 'Please enter password.';
    } elseif(strlen($data['password']) < 6){
        $data['passwordError'] = 'Password must be at least 8 characters';
    } elseif(!preg_match($passwordValidation, $data['password'])){
        $data['passwordError'] = 'Password must be have at least one numeric value.';
    }


    // validate confirmPassword
    if (empty($data['confirmPassword'])) {
        $data['confirmPasswordError'] = 'Please enter password.';
    } else {
        if ($data['password'] != $data['confirmPassword']) {
        $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
        }
    }


    // Make sure that errors are empty
    if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {
        // hash password
        $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

        // register user through a User model function
        if($this->userModel->register($data)) {
            // redirect to Home page
            header('Location:/mvc_framework/users/login');

        }else{
            die('User registration failed');
        }
    }
}

        $this->view('users/register',$data);
    }


    public function login() {
        $data = [
            'title'=>'log in page',
            'username'=>'',
            'password'=>'',
            'usernameError'=>'',
            'passwordError'=>''

        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // sanitize to not allow scripts
            //$_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [
                'username'=>trim($_POST['username']),
                'password'=>trim($_POST['password']),
                'usernameError'=>'',
                'passwordError'=>''
    
            ];

            // validate username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter username.';
            }

            // validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter username.';
            }

             // Make sure that errors are empty
    if (empty($data['usernameError']) && empty($data['passwordError'])) {

        $loggedInUser = $this->userModel->login($data['username'], $data['password']);

        if($loggedInUser){

            $this->createUserSession($loggedInUser);

        }else{
            $data['passwordError'] = 'Please try again.';

        }
    }
        }else{


            $data = [
                'title'=>'log in page',
                'username'=>'',
                'password'=>'',
                'usernameError'=>'',
                'passwordError'=>''
    
            ];
        }
        


        $this->view('users/login',$data);


    }


    public function logout(){


        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        header('Location:/mvc_framework/users/login');
    }


    public function createUserSession($user) {
        session_start();
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['user_name'] = $user->user_name;
        $_SESSION['user_email'] = $user->user_email;

    }


}



?>