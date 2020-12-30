<?php
class User{

    private $table = 'users_test';
    private $conn;

    public $id;
    public $first_name;
    public $last_name;
    public $mobile;
    public $gender;
    public $email;
    public $handle;
    public $password;
    public $created_at;

    public function __construct($db){
        $this->conn = $db;
    }

    function create(){
        $query = 'INSERT INTO ' . $this->table . ' SET email = :email, handle = :handle, password = :password';

        $stmt = $this->prep_clean($query);

        // Bind data
        $stmt->bindParam(':handle', $this->handle);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':email', $this->email);
        // Execute query
        if($stmt->execute()) {
            return true;
        }
        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

//    function update_user(){
//        $query = 'UPDATE ' . $this->table . '
//        SET first_name = :first_name,
//        last_name = :last_name,
//        gender = :sex,
//        mobile = :mobile,
//        email = :email';
//        //prepare via custom helper function
//        $stmt = $this->prep_clean_bind($query);
//        //run via custom helper function
//        $this->run($stmt);
//    }

    function prep_clean($ask){
        $stm = $this->conn->prepare($ask);

        // Clean data
        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name = htmlspecialchars(strip_tags($this->last_name));
        $this->mobile = htmlspecialchars(strip_tags($this->mobile));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->handle = htmlspecialchars(strip_tags($this->handle));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));

        return $stm;

    }

    function run($stm){

        if($stm->execute()){
            return true;
        }
        printf("Error %s.\n", $stm->error);
        return false;
    }

    public function get_user_by_pw() {
        // Create query
        $query = 'SELECT u.id, 
                        u.first_name, 
                        u.last_name, 
                        u.email, 
                        u.mobile,
                        u.handle, 
                        u.created_at
                                    FROM ' . $this->table . ' u
                                    WHERE
                                      u.password = ?
                                    LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->title = $row['title'];
        $this->body = $row['body'];
        $this->author = $row['author'];
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];
    }

    function get_users(){
    }

    function get_user_byID(){
    }

    function login(){
    }

    function logout(){
    }


}
