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
        $query = 'INSERT INTO ' . $this->table . ' 
                    SET  first_name = :first_name,
                    last_name = :last_name, 
                    gender = :gender,
                    password = :password, 
                    mobile = :mobile,
                    handle = :handle, 
                    email = :email';

        $stmt = $this->prep_clean_bind($query);

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

    function prep_clean_bind($ask){
        $stmt = $this->conn->prepare($ask);

        // Clean data
        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name = htmlspecialchars(strip_tags($this->last_name));
        $this->sex = htmlspecialchars(strip_tags($this->sex));
        $this->handle = htmlspecialchars(strip_tags($this->handle));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->mobile = htmlspecialchars(strip_tags($this->mobile));


        // Bind data
        $stmt->bindParam(':first_name', $this->first_name);
        $stmt->bindParam(':last_name', $this->last_name);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':handle', $this->handle);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':mobile', $this->mobile);

        return $stmt;

    }

    function run($stm){

        if($stm->execute()){
            return true;
        }
        printf("Error %s.\n", $stm->error);
        return false;
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
