<?php 
require '../core/init.php';
if(isset($_POST['method'])=== true && empty($_POST['method']=== false)){
    $chat= new Chat();
    $method= trim($_POST['method']);
    if($method === 'fetch'){
        $messages= $chat->fetchMessages();
        echo'<div class="messages">';
        foreach ($messages as $key => $mensaje) {
            echo '<div class="message">';
            echo '<a href="#">'.$mensaje['username'].'</a> Dice:';
            echo '<p>'.$mensaje['message'].'</p>';
            echo '</div>';
        }
        echo '</div>';
    }elseif ($method==='throw' && isset($_POST['message'])) {
        $message= trim($_POST['message']);
        if(empty($message)=== false){
            $url = $_SERVER['HTTP_REFERER'];
$user_url = explode("?", $url);
$user = explode("=", $user_url[1]);

            $chat->throwMessage($user[1],$message);
        }
    }
}

?>