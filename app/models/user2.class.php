<?php


class User
{

    public $id;
    public $username;
    public $email;
    private $passwordHash;

    public static function find($username) {
        require_once '../conf/database.php';
        $query = $db->prepare("SELECT id, username, password, email FROM users WHERE username = ?");
        $query->bind_param("s", $username);
        $query->execute();
        $result = $query->get_result();
        
        if ($result->num_rows < 1) {
            return null;
            
        }

        $user_data = $result->fetch_assoc();
        return new User($user_data);
    }

    public static function login($username, $password) {
        $user = User::find($username);
        
        if(empty($user)) {
            return null;
        }

        if(!$user->checkPassword($password)) {
            return null;
        }

        return $user;
    }

    public function __construct($data = array())
    {
        $this->id = $data['id'];
        $this->username = $data['username'];
        $this->passwordHash = $data['password'];
        $this->email = $data['email'];
    }

    public function checkPassword($password)
    {
        return password_verify($password, $this->passwordHash);
    }
}

function user_login($username, $password)
{
    require_once '../conf/database.php';
    $query = $db->prepare("SELECT id, username, password, email FROM users WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();
    
    if ($result->num_rows >= 1) {
        $user_data = $result->fetch_assoc();
        $user = new User($user_data);

        if ($user->checkPassword($password)) {
            return $user;
        }
    }
    return null;
}

// $admin = new User('admin', password_hash("admin123", PASSWORD_DEFAULT));