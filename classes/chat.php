<?php
class Chat extends Database{
    private $chat;

    function __construct($chat)
    {
        $this->chat=$chat;
    }
    public function UserChat()
    {
        $sql="SELECT * FROM users WHERE user_image=?";
        $stmt=$this->Connect()->prepare($sql);
        $stmt->execute([$_SESSION['user_image2']]);
        $row=$stmt->fetch();
        if($row){
            // Capture time and date
            $date=new DateTime("now");
            $date->setTimezone(new DateTimeZone("Africa/Nairobi"));
            $time=$date->format("g:i A");
            $dateresults=$date->format("Y/m/d");

            // Executing the operation
            $sql1="INSERT INTO chats(user_id,chat,date,time) VALUES(?,?,?,?)";
            $stmt1=$this->Connect()->prepare($sql1);
            $stmt1->execute([$row['id'], $this->chat, $dateresults,$time]);
        }
    }

    public function RenderTexts()

    {   
        $date=new DateTime("now");
        $date->setTimezone(new DateTimeZone("Africa/Nairobi"));
        $time=$date->format("g:i A");

        $sql="SELECT * FROM chats ORDER BY created_at";
        $stmt=$this->Connect()->query($sql);
        $rows=$stmt->fetchAll();

        if($rows){
            foreach($rows as $row){
                    $sql2="SELECT * FROM users WHERE id=?";
                    $stmt2=$this->Connect()->prepare($sql2);
                    $stmt2->execute([$row['user_id']]);
                    $row2=$stmt2->fetch();
                    if($row['user_id']==$_SESSION['id']){
                        echo 
                        "
                        <div class='direct-chat-msg'>
                        <div class='direct-chat-infos clearfix'>
                        <span class='direct-chat-name float-left'>$row2[full_name]</span>
                        <span class='direct-chat-timestamp float-right'>
                        ";
                        if($row['time']==$time){
                            echo "now";
                        }else{
                            echo $row['time'];
                        }

                        echo"
                        </span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class='direct-chat-img' src='$row2[user_image]' alt='message user image'>
                        <!-- /.direct-chat-img -->
                        <div class='direct-chat-text' style='background-color:teal; color:white'>
                        $row[chat]
                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
                        ";
                    }else{

                        echo 
                        "
                        <div class='direct-chat-msg right'>
                        <div class='direct-chat-infos clearfix'>
                        <span class='direct-chat-name float-right'>$row2[full_name]</span>
                        <span class='direct-chat-timestamp float-left'>
                        ";
                        if($row['time']==$time){
                            echo "now";
                        }else{
                            echo $row['time'];
                        }

                        echo"
                        </span>
                        </div>
                        
                        <img class='direct-chat-img' src='$row2[user_image]' alt='message user image'>
                        
                        <div class='direct-chat-text' style='background-color:#001f3f; color:white'>
                        $row[chat]
                        </div>
                       
                        </div>
                        ";
                    }
            }
        }
    }
}

?>