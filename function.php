<?php

// Create a Simple Class
 class crudApp{
    
    // private data Connection header with $conn;
    private $conn;

    // publice funtion __construct() for localhost connection information hear for database
    public function __construct()
    {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = "";
        $dbname = 'app_php';

        // $this->conn added all variable hear
        $this->conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

        // Condition Chak for connection right ase kina ? jodi nah thake tahole Error asbe..
        if(!$this->conn){
            die("Connection Faild!");
        }
    }

    // this funtion for variable a Store All Data ,, ait input fild a theke name ar sahajje dhorte hobe....( add_data )ati funtion name hear.. AND $data ati dara ARGUMENT Pass korte hoi,,
    public function add_data($data){
        $name = $data['name'];
        $phone = $data['phone'];
        $email = $data['email'];
        
        // img file upload hear ...
        $img = $_FILES['img']['name'];
        $tmp_name =$_FILES['img']['tmp_name'];
        

        // Query For INSERT DATA from Database
        $query = "INSERT INTO student(name,phone,email,img) VALUE ('$name',$phone,'$email','$img')";

        // Condition Chack hear for connection Database....
        if(mysqli_query($this->conn, $query)){
            move_uploaded_file($tmp_name , "upload/".$img);
            return "Connection Succesfully";
        }
    }

    public function displayData(){
        $query = "SELECT * FROM student";
        if(mysqli_query($this->conn , $query)){
            $returndata = mysqli_query($this->conn , $query);
            return $returndata;
        }
    }
 }
// CONNECTION SUCCESSFULLY END HRAR======================================


















?>



























