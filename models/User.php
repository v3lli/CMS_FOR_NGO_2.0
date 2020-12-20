<?php
class User{

    private $table = 'users';
    private $conn;

    public $id;
    public $first_name;
    public $last_name;
    public $mobile;
    public $sex;
    public $email;
    public $password;
    public $created_at;

    public function __construct($db){
        $this->conn = $db;
    }

    function create(){
        $query = "INSERT INTO ' . $this->table . ' 
                    SET  first_name = :first_name,
                    last_name = :last_name, 
                    date_of_birth = :dob, 
                    gender = :sex, 
                    email = :email ";
        //prepare via custom helper function
        $stmt = $this->prep_clean_bind($query);
        //run via custom helper function
        $this->run($stmt);
    }

    function update_user(){
        $query = " UPDATE ' . $this->table. ' 
                    SET  first_name = :first_name,
                    last_name = :last_name, 
                    date_of_birth = :dob, 
                    gender = :sex, 
                    email = :email ";
        //prepare via custom helper function
        $stmt = $this->prep_clean_bind($query);
        //run via custom helper function
        $this->run($stmt);
    }

    function prep_clean_bind($ask){
        $stm = $this->conn->prepare($ask);

        //clean data
        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name = htmlspecialchars(strip_tags($this->last_name));
        $this->dob = htmlspecialchars(strip_tags($this->dob));
        $this->sex = htmlspecialchars(strip_tags($this->sex));
        $this->email = htmlspecialchars(strip_tags($this->email));

        $stm->bindParam(':first_name', $this->first_name);
        $stm->bindParam(':last_name', $this->last_name);
        $stm->bindParam(':dob', $this->dob);
        $stm->bindParam(':sex', $this->sex);
        $stm->bindParam(':email', $this->email);

        return $stm;

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
