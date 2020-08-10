<?php


class LoginController extends Controller
{
    public $service;
    public $token;

    public function __construct()
    {
        $this->service = new LoginService();
        $this->token = new CSRFToken();
    }

    public function index()
    {
        if (!$this->service->isUserLoggedIn()){
            return $this->view('login');
        }
        return $this->view('index');
    }

    public function login($request)
    {
        if ($this->service->isUserLoggedIn()){
            return $this->view('index');
        }
        if ($request){
            if ($this->token->check($request->token, 'token')){
                if ($this->service->isEmailExist($request)){
                    if ($this->service->login($request)){
                        return $this->view('index');
                    }
                    return $this->view('login', ['errorPassword' => 'Wrong Password']);
                }
                return $this->view('login', ['errorEmail' => 'Email Doesnt Exist']);
            }
        }
        return $this->view('login');
    }

    public function logout()
    {
        $this->service->logout();
        return $this->view('login');
    }

    public function register($request)
    {
        if ($request) {
            if ($this->token->check($request->token, 'token')) {
                if ($this->service->isPasswordMatched($request)) {
                    // if Email doesnt exist then register
                    if (!$this->service->isEmailExist($request)) {
                        $this->service->registerUser($request);
                        if (!$this->service->isUserLoggedIn()) {
                            return $this->view('login');
                        }
                    } else {
                        return $this->view('register', ['errorEmail' => 'Email Already Exist']);
                    }
                } else {
                    return $this->view('register', ['errorPassword' => 'Password Didnt Match']);
                }
            }
        }
        return $this->view('register');
    }
}