<?php

class apptest{
    // This funtion for DATABASE Connection. 
    private $conn;
    public function __construct()
    {
        $dbhost ='localhost';
        $dbuser ='root';
        $dbpass ="";
        $dbname ='app_php';

        $this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        if(!$this->conn){
            die ("<h4> Connection Faild!! </h4>");
        }
    }

    // This funtion for Data Recive in variable ... 
    public function app_data($data){
        $name = $data['name'];
        $phone = $data['phone'];
        $email = $data['email'];
        // img upload hear 
        $img = $_FILES['img']['name'];
        $tmp_name =$_FILES['img']['tmp_name'];
        $query = "INSERT INTO user(name,phone,email,img) VALUE ('$name','$phone','$email','$img')";
        if(mysqli_query($this->conn , $query)){
            move_uploaded_file($tmp_name , "upload/".$img);
            return ('Data Sent Successfully');
        }
    }

    // Form Data Select kore Display korar jonne ai function use kora hoiyese...
    public function display_data(){
        $query = "SELECT * FROM user";
        if(mysqli_query($this->conn , $query)){
            $returndata = mysqli_query($this->conn , $query);
            return $returndata;
        }
    }






    // This Function for Edite Data 
    public function display_data_by_id($id){
        $query = "SELECT * FROM user WHERE id='$id' ";
        if(mysqli_query($this->conn , $query)){
            $returndata = mysqli_query($this->conn , $query);
            $returndata = mysqli_fetch_assoc($returndata);
            return $returndata;
        }
    }


    public function update_data($data){
        $name = $data['u_name'];
        $number = $data['u_phone'];
        $email = $data['u_email'];
        $idno = $data['idno'];
        // img upload code
        $img = $_FILES['u_img']['name'];
        $tmp_name =$_FILES['u_img']['tmp_name'];
        
        $query = "UPDATE user SET name ='$name' , phone = $number, email ='$email', img='$img'  WHERE id= $idno";

        if(mysqli_query($this->conn, $query)){
            move_uploaded_file($tmp_name , "upload/".$img);
            return "Information Updated Successfully";
        }
    }


    public function delete_data($id){
        $query ="SELECT * FROM user WHERE id = $id";
        $user_data = mysqli_query($this->conn , $query);
        $user_info =mysqli_fetch_assoc($user_data);
        $user_img_info = $user_info['img'];

        // this query for deleted data
        $query = "DELETE FROM user WHERE id=$id";
        if(mysqli_query($this->conn , $query)){
            unlink('upload/'.$user_img_info);
            return "Deleted Successfully";
        }
    }
}













?>