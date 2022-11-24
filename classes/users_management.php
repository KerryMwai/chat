<?php
class User extends Database{
    private $image_name,$image_tmp, $full_name,$user_email,$pass;

    function __construct($image_name,$image_tmp, $full_name,$user_email,$pass)
    {
        $this->image_name=$image_name;
        $this->image_tmp=$image_tmp;
        $this->full_name=$full_name;
        $this->user_email=$user_email;
        $this->pass=$pass;
    }


    public function SignUpUser()
    {

        $sql10="SELECT * FROM users WHERE user_email=?";
        $stmt10=$this->Connect()->prepare($sql10);
        $stmt10->execute([$this->user_email]);
        $row=$stmt10->fetch();
        if($row){
            $failed="The user is already registered";
            header("location:../pages/register.php ? error=$failed");
        }else{
                $tm=md5(time());
                $dstenation1="../user_images/".$tm.$this->image_name;
                $dstenation2="../user_images/".$tm.$this->image_name;
                move_uploaded_file($this->image_tmp, $dstenation2);
                $passed=password_hash($this->pass,PASSWORD_DEFAULT);
                $sql="INSERT INTO users(user_image,full_name,user_email,user_password)
                    VALUES(?,?,?,?)";
                $stmt=$this->Connect()->prepare($sql);
                $stmt->execute([$dstenation1,$this->full_name,$this->user_email,$passed]);


                $sql1="SELECT * FROM users WHERE user_email=?";
                $stmt1=$this->Connect()->prepare($sql1);
                $stmt1->execute([$this->user_email]);
                $row1=$stmt1->fetch();
                if($row1){
                    session_start();
                    $_SESSION['id']=$row1['id'];
                    $_SESSION['name']=$row1['full_name'];
                    $_SESSION['user_image']="<img class='direct-chat-img' src='$row1[user_image]' alt='message user image'>";
                    $_SESSION['user_image2']=$row1['user_image'];
                    header("location:home.php");
                }
        }
    }

    public function SignIn()
    {
        $sql="SELECT * FROM users WHERE user_email=?";
        $stmt=$this->Connect()->prepare($sql);
        $stmt->execute([$this->user_email]);
        $row=$stmt->fetch();

        if($row){
            $passed=password_verify($this->pass, $row['user_password']);

            if($passed){
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['name']=$row['full_name'];
                $_SESSION['user_image']="<img class='direct-chat-img' src='$row[user_image]' alt='message user image'>";
                $_SESSION['user_image2']=$row['user_image'];
                header("location:./home.php");
            }
        }
    }
}

?>