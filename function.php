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

        public function display_data(){
            $query="SELECT * FROM students";

            if(mysqli_query($this->conn,$query)){
                $return_data=mysqli_query($this->conn,$query);

                return $return_data;
            }
        }

        public function display_data_by_id($id){
            $query="SELECT * FROM students WHERE id=$id";

            if(mysqli_query($this->conn,$query)){
                $return_data=mysqli_query($this->conn,$query);

                $studentData=mysqli_fetch_assoc($return_data);
                return $studentData;
            }
        }
        public function updateData($data){
            $std_name=$data['anothername'];
            $std_roll=$data['anotherroll'];
            $std_id=$data['std_id'];
            $std_img=$_FILES['anotherimage']['name'];
            $tmp_name=$_FILES['anotherimage']['tmp_name'];

            $query="UPDATE students SET Name='$std_name',Roll='$std_roll',Image='$std_img' WHERE id='$std_id'";

            if(mysqli_query($this->conn,$query)){
                move_uploaded_file($tmp_name,'upload/'.$std_img);
                return "Information Updated Successfully";
            }
        }

        public function delete_data($id){
            $catch_img = "SELECT * FROM students WHERE id=$id";
            $delete_std_info = mysqli_query($this->conn, $catch_img);
            $std_infoDle = mysqli_fetch_assoc($delete_std_info);
            $deleteImg_data = $std_infoDle['image'];
            $query = "DELETE FROM students WHERE id=$id";
            if(mysqli_query($this->conn, $query)){
                unlink('upload/'.$deleteImg_data);
                return "Deleted Successfully";
            }
        }
    }

    
?>