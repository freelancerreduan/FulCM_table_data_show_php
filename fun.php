<?php

    class testApp{
        public $conn;
        public function __construct()
        {
            $dbHost='localhost';
            $dbUser='root';
            $dbPass="";
            $dbName='firstdb';


            $this->conn= mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);

            if(!$this->conn){
                die("Connection Faild! Please Try Again");
            }

        }


        public function add_data($data){
            $name = $data['name'];
            $number = $data['num'];
            $email = $data['email'];
                        
            // img upload code
            $img = $_FILES['img']['name'];
            $tmp_name =$_FILES['img']['tmp_name'];
            // move_uploaded_file($tmp_name , "upload/".$img_name);
            
    
            // Query For INSERT DATA from Database
            $query = "INSERT INTO student(name,number,email,img) VALUE ('$name',$number,'$email','$img')";
    
            // Condition Chack hear for connection Database....
            if(mysqli_query($this->conn, $query)){
                move_uploaded_file($tmp_name , "upload/".$img);
                return "Data Sent Succesfully";
            }
        }


        public function showData(){
            $query = "SELECT * FROM student";

            if(mysqli_query($this->conn, $query)){
                $rtn_msg = mysqli_query($this->conn, $query);
                return $rtn_msg;
            }
        }



        public function display_data($id){
            $query = "SELECT * FROM student WHERE id = $id";
            if(mysqli_query($this->conn , $query)){
                $rtn = mysqli_query($this->conn , $query);
                $rtn_msg = mysqli_fetch_assoc($rtn);
                return $rtn_msg;
            }
        }





     




    }

?>