<?php


class LoginService
{
    private $repository;
    public $session;

    public function __construct()
    {
        $this->session = new Session();
        $this->repository = new UserRepository();
    }

      public function registerUser($data)
      {
         return $this->repository->create( $this->transform($data));

      }

      public function login($data)
      {
          $user = $this->repository->find('email', filter_var($data->email, FILTER_SANITIZE_EMAIL));
          if($user){
              if (Hash::make($data->password) == $user->password){
                  $this->session->put('session' , $user->id);
                  $this->session->put('home', $user->name);
                  return true;
              }
          }
          return false;
      }

      public function logout()
      {
            $this->session->delete('session');
      }

    public function isUserLoggedIn(){
        if ($this->session->get('session')){
            $userId = $this->session->get('session');
            $user = $this->repository->find('id', $userId);
            if ($user) {
                $this->session->put('home', $user->name);
                return true;
            }
        }
        return false;
    }

      private function transform($data)
      {
          $user = $this->repository->find('email', $data->email);
          // If Email Doesnt Exist Then Create
          if(!$user){
              return [
                  'username' => filter_var($data->username, FILTER_SANITIZE_STRING),
                  'password' => Hash::make($data->password),
                  'name' => filter_var($data->name, FILTER_SANITIZE_STRING),
                  'email' => filter_var($data->email, FILTER_SANITIZE_EMAIL)
              ];
          }
          return false;
      }

      public function isEmailExist($data){
          if($this->repository->find('email', $data->email)){
              return true;
          } else {
              return false;
          }
      }

      public function isPasswordMatched($data)
      {
          $password = filter_var($data->password, FILTER_SANITIZE_STRING);
          $passwordAgain = filter_var($data->password_again, FILTER_SANITIZE_STRING);
          if ($password === $passwordAgain){
              return true;
          } else {
              return false;
          }
      }
}