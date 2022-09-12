<?php
    class crudApp{
        private $conn;

        public function __construct()
        {
            $dbhost='localhost';
            $dbuser='root';
            $dbpass="";
            $dbname='crud_app';

            $this->conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

            if(!$this->conn){
                die("Database Connection Error");
            }
        }
        public function add_data($data){
            $name=$data['name'];
            $roll=$data['roll'];
            $img=$_FILES['image']['name'];
            $tmp_name=$_FILES['image']['tmp_name'];
    
            $query="INSERT INTO students(name,roll,image) VALUE ('$name','$roll','$img')";
    
            if(mysqli_query($this->conn,$query)){
                move_uploaded_file($tmp_name,'upload/'.$img);
                return "Information added Succesfully";
            }
        }
    }

    
?>