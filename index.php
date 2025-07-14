<?php
class UserAuth {

    protected $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("sqlite:my_database.sqlite");
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT NOT NULL,
            password TEXT NOT NULL
        )");
    }

    public function validateInput($input)
    {
        // TODO: implement this method

        // Basic input validation
        if (empty($input)) {
            return false;
        }

        // Remove whitespace and check for empty string
        $input = trim($input);
        if ($input === '') {
            return false;
        }

        return $input;
    }

    public function register($username, $password)
    {
        // TODO: check if the user already exists and handle this scenario

        // Validate inputs
        $username = $this->validateInput($username);
        $password = $this->validateInput($password);

        if (!$username || !$password) {
            throw new Exception('Invalid input');
        }

        // Check if user already exists
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            throw new Exception('Username already exists');
        }

        // TODO: Use secure password hashing
        // Secure password hashing
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        if ($passwordHash === false) {
            throw new Exception('Password hashing failed');
        }

        // add to the database
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password) VALUES ('$username', '$passwordHash')");
        $stmt->execute();

        return true;
    }

    public function login($username, $password)
    {
        // Validate inputs
        $username = $this->validateInput($username);
        $password = $this->validateInput($password);

        if (!$username || !$password) {
            return false;
        }


        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username=?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            return true;
        } else {
            return false;
        }
    }

    // TODO: implement a delete user method
    public function deleteUser($username)
    {
        //Validate inputs
        $username = $this->validateInput($username);
        if (!$username) {
            throw new Exception('Invalid username');
        }

        $stmt = $this->pdo->prepare("DELETE FROM users WHERE username = ?");
        $stmt->execute([$username]);

        $return = $stmt->rowCount() > 0;
        
        return $return;
    }
}

// === Test the class ===
$auth = new UserAuth();

// Test registration
// $auth->register("alice@gmail.com", "password123");

// Test login
if (!$auth->login("alice@gmail.com", "password123")) {
    throw new Exception('Log in details incorrect');
}

// Test delete
// if (!$auth->deleteUser("alice@gmail.com")) {
//     throw new Exception('Failed to delete user');
// }
