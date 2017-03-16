<?php
if(!empty($_GET)){
    if(isset($_GET['action'])){
        if($_GET['action'] == 'logout'){session_destroy();header('location:index.php');}
    }
    if(isset($_GET['archive'])){archiveRecord($_GET['archive']);}
    if(isset($_GET['delete'])){deleteRecord($_GET['delete']);}
    if(isset($_GET['deletecomment'])){deleteComment($_GET['deletecomment']);}
    if(isset($_GET['deleteuser'])){deleteUser($_GET['deleteuser']);}
}
if(!empty($_POST)) {
    if($_POST['action'] == "Einlogen"){trylogin($_POST['username'], $_POST['password'], 0);}
    if($_POST['action'] == "Registrieren"){register($_POST['username'], $_POST['password'],$_POST['geschlecht'],$_POST['geburtsdatum'],$_POST['email']);}
    if($_POST['action'] == "newrecord"){newRecord();}
    if($_POST['action'] == "updaterecord"){updateRecord();}
    if($_POST['action'] == "newComment"){newComment();}
    if($_POST['action'] == "updateProfile"){updateProfile();}
}


function getNameByID($ID){
    $query = "SELECT Username FROM Users WHERE UID = $ID";
    include 'dbc.php';
    while ($row = $results->fetchArray()) {
        return $row['Username'];
    }
    $db->close();
}


function getRecordListOfUser($ID){
    $query = "SELECT RecordID WHERE FK_UID = $ID";
    include 'dbc.php';
    return $results;
    $db->close();
}


function printProfile($uid){
    $query = "SELECT * FROM Users Where UID = '$uid'";
    include 'dbc.php';
        while ($row = $results->fetchArray()) {
        echo("
        <article>
                <h2>".$row['Username']."</h2>
                <table>
                    <tr><td>Geschlecht : </td><td>".notEmpty($row['Geschlecht'])."</td></tr>
                    <tr><td>Geburtsdatum : </td><td>".notEmpty($row['Geburtsdatum'])."</td></tr>
                    <tr><td>E-mail : </td><td>".notEmpty($row['email'])."</td></tr>
                </table>
                 <a href='list.php?listtype=user&uid=".$row['UID']."'>Eintr&aumlge ansehen</a>");
                 if(isset($_SESSION["UID"])){
                    if($_SESSION['UID']=='1'){
                     echo("</br><span class='entypo-block'> <a href='users.php?deleteuser=$uid'>L&oumlschen</a></span>");
                    }
                 }
                 echo("
        </article>
        ");
        }
    $db->close();
}


function printUsers(){
    $query = "SELECT * FROM Users ORDER BY Username";
    include 'dbc.php';
    while($row = $results->fetchArray()) {
        $UID = $row['UID'];
        echo("
        <article>
                <h2><a href='profile.php?profileID=$UID'>".$row['Username']."</a></h2>
                <table>
                    <tr><td>Geschlecht : </td><td>".notEmpty($row['Geschlecht'])."</td></tr>
                    <tr><td>Geburtsdatum : </td><td>".notEmpty($row['Geburtsdatum'])."</td></tr>
                    <tr><td>E-mail : </td><td>".notEmpty($row['email'])."</td></tr>
                </table>
                 <a href='list.php?listtype=user&uid=".$row['UID']."'>Eintr&aumlge ansehen</a>");
                 if(isset($_SESSION["UID"])){
                    if($_SESSION['UID']=='1'){
                        if($UID != 1){
                        echo("</br><span class='entypo-block'> <a href='users.php?deleteuser=$UID'>L&oumlschen</a></span>");
                        }
                    }
                }
                 echo("
        </article>
        ");
    }

}


function printNewest(){
    $query = "
            SELECT Users.UID as CreatorID,
            Users.Username as CreatorName,
            Records.Title as Title,
            Records.RecordID as RecordID,
            Records.Description as Description,
            Records.Content as Content,
            Records.CreationDate as CreationDate,
            Records.LastModified as LastModified,
            Records.Archivated as Archivated
            FROM Records LEFT JOIN Users ON Users.UID = Records.FK_UID
            WHERE Archivated = '0'
            ORDER BY LastModified desc, RecordID desc";
    include 'dbc.php';
    while ($row = $results->fetchArray()) {
        $row = minifyArray($row);
        echo("
            <article>
                <h4><a href='record.php?recID=".$row['RecordID']."'>".htmlspecialchars_decode($row['Title'])."</a>&nbsp;<small> von <a href='profile.php?profileID=".$row['CreatorID']."'>".$row['CreatorName']."</a></small></h4>
                <p>".htmlspecialchars_decode($row['Description'])."</p>
                <p class='meta'>
                    <time><span class='entypo-clock'></span> ".$row['CreationDate']."</time>");
                    if($row['LastModified']!=$row['CreationDate']){
                        echo("<time><span class='entypo-tools'></span> ".$row['LastModified']."</time>");
                    }
                    echo("
                    </span>
                  </p>
            </article>
        ");
    }
    $db->close();
}


function printByUser($uid){
    $count = 0;
    $query = "
            SELECT Users.UID as CreatorID,
            Users.Username as CreatorName,
            Records.Title as Title,
            Records.RecordID as RecordID,
            Records.Description as Description,
            Records.Content as Content,
            Records.CreationDate as CreationDate,
            Records.Archivated as Archivated
            FROM Records LEFT JOIN Users ON Users.UID = Records.FK_UID
            WHERE CreatorID = '$uid' AND Archivated='0'
            ORDER BY RecordID desc";
    include 'dbc.php';
    while ($row = $results->fetchArray()) {
        $count +=1;
        $row = minifyArray($row);
        echo("
            <article>
                <h4><a href='record.php?recID=".$row['RecordID']."'>".htmlspecialchars_decode($row['Title'])."</a>&nbsp;<small> von <a href='profile.php?profileID=".$row['CreatorID']."'>".$row['CreatorName']."</a></small></h4>
                <p>".htmlspecialchars_decode($row['Description'])."</p>
                <p class='meta'>
                    <time><span class='entypo-clock'></span> ".$row['CreationDate']."</time>
                    </span>
                  </p>
            </article>
        ");
    }
    $db->close();
    if($count==0){
        echo("<center><h4><i>Dieser Benutzer hat noch keinen Eintrag erstellt.</i></h4></center>");
    }
}


function printTitle($RecordID){
    $query ="SELECT
                Records.Title as Title
                FROM Records LEFT JOIN Users ON Users.UID = Records.FK_UID WHERE RecordID = '$RecordID'";
    include 'dbc.php';
    while ($row = $results->fetchArray()) {
        echo(htmlspecialchars_decode($row['Title']));
    }
    $db->close();
}


function printrecord($RecordID){
    $query ="SELECT
                Users.UID as CreatorID
                ,Users.Username as CreatorName
                ,Records.Title as Title
                ,Records.RecordID as RecordID
                ,Records.Description as Description
                ,Records.Content as Content
                ,Records.CreationDate as CreationDate
                ,Records.LastModified as LastModified
                FROM Records LEFT JOIN Users ON Users.UID = Records.FK_UID WHERE RecordID = '$RecordID'";
    include 'dbc.php';
    while ($row = $results->fetchArray()) {
        echo("
        <article>
                <h2>".htmlspecialchars_decode($row['Title'])." </br><small> von <a href='profile.php?profileID=".$row['CreatorID']."'> ".$row['CreatorName']."</a></small></h4>
                <p>".htmlspecialchars_decode($row['Content'])."</p>
                <p class='meta'>
                    <time><span class='entypo-clock'></span> ".$row['CreationDate']."</time>");
                    if($row['LastModified']!=$row['CreationDate']){
                        echo("<time><span class='entypo-tools'></span> ".$row['LastModified']."</time>");
                    }
                    if(isset($_SESSION['UID'])){
                        if($_SESSION['UID']==$row['CreatorID'] or $_SESSION['UID']=='1'){
                            echo("<span class='entypo-tools'> <a href='editrecord.php?recID=".$row['RecordID']."'>Bearbeiten</a></span>");
                            echo("<span class='entypo-archive'> <a href='list.php?listtype=newest&archive=$RecordID'>Archivieren</a></span>");
                            echo("<span class='entypo-block'> <a href='list.php?listtype=newest&delete=$RecordID'>L&oumlschen</a></span>");
                        }
                    }
                    echo("
                    </span>
                  </p>
        </article>
        <section class='comments'>");
        if(isset($_SESSION['UID']) && $_SESSION['UID']!=$row['CreatorID']){
        echo("
        <div>
            <h3>Kommentare</h3>
            <form id='Comment' action='".$_SERVER["REQUEST_URI"]."' method='POST' onsubmit='newComment();'>
            <div class='newPost'>
                <input type='text' name='title' placeholder='Titel' required='required'>");
                include 'res/editor.php';
            echo("
            <script>$('#action').attr('value', 'newComment');</script>
            </form>
        </div>");
        }
        printComments($RecordID, $row['CreatorID']);
        echo("</section>");
    }
    $db->close();
}


function printComments($RecordID, $RecordCreator){
    $query = "SELECT
                Comments.CommentID as CommentID
                ,Comments.FK_RecordID as FK_RecordID
                ,Comments.FK_UID as CreatorID
                ,Comments.Title as Title
                ,Comments.Content as Content
                ,Comments.CreationDate as CreationDate
                ,Users.Username as CreatorName
                FROM Comments LEFT JOIN Users ON Users.UID = Comments.FK_UID WHERE FK_RecordID = '$RecordID' ORDER BY CreationDate desc";
    include 'dbc.php';
    echo("<div class='comment'>");
    while ($comment = $results->fetchArray()) {
        $CommentID = $comment['CommentID'];
        $RecordID = $comment['FK_RecordID'];
        echo("<h3>".htmlspecialchars_decode($comment['Title'])." <small>".$comment['CreationDate']."</br>von <a href='profile.php?profileID=".$comment['CreatorID']."'>".$comment['CreatorName']."</a></small></h3>");
        echo(htmlspecialchars_decode($comment['Content']));
        if(isset($_SESSION["UID"])){
            if($_SESSION['UID']==$comment['CreatorID'] OR $_SESSION['UID']==$RecordCreator OR $_SESSION['UID']==1)echo("</br><span class='entypo-block'> <a href='record.php?recID=$RecordID&deletecomment=$CommentID'>L&oumlschen</a></span>");
        }
        echo("</br></br></br>");
    }
    $db->close();
}


function printEditRecord($RecordID){
    $query ="SELECT
                Users.UID as CreatorID
                ,Users.Username as CreatorName
                ,Records.Title as Title
                ,Records.RecordID as RecordID
                ,Records.Description as Description
                ,Records.Content as Content
                ,Records.CreationDate as CreationDate
                FROM Records LEFT JOIN Users ON Users.UID = Records.FK_UID WHERE RecordID = '$RecordID'";
    include 'dbc.php';
    while ($row = $results->fetchArray()) {
        if(!($_SESSION['UID']==$row['CreatorID'] or $_SESSION['UID']=='1')){header('Location: record.php?recID='.$RecordID.'&error=1');}
        echo("
        <h2>".htmlspecialchars_decode($row['Title'])."</h2>
        <textarea name='description'>".htmlspecialchars_decode($row['Description'])."</textarea>");
        include 'res/editor.php';
        echo("<script>$('.editor').html('".htmlspecialchars_decode($row['Content'])."');$('#action').val('updaterecord');</script>");
    }
}


function printEditableProfile(){
    $query = "SELECT * FROM Users WHERE UID = '".$_SESSION['UID']."'";
    include 'dbc.php';
    while ($row = $results->fetchArray()) {
        echo("
            <table>
                <tr><td>Geschlecht<td><input type='radio' name='gender' value='maennlich'"); if($row['Geschlecht']=="Mann"){echo(" checked='checked'");} echo("><td>M&aumlnnlich</td></tr>
                <tr><td></td><td><input type='radio' name='gender' value='weiblich'"); if($row['Geschlecht']=="Frau"){echo(" checked='checked'");} echo("></td><td>Weiblich</td></tr>
                <tr><td>Geburtsdatum<td><td><input id='bday' type='date' name='bday' style='width: 100%'/><td></tr>
                <tr><td>E-Mail<td><td><input id='email' type='text' name='email' style='width: 100%' pattern='^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$'/><td></tr>
                <script>$('#bday').val('".$row['Geburtsdatum']."');$('#email').val('".$row['email']."');</script>
            </table>
        ");
    }
}


function printError($error){
    echo("
    <div class='outerErrorDiv' style='padding-top:10px;'>
        <div class='errorDiv' style='width:50%;height:50px;background-color:#FF6B6B;border-radius:25px;align-items:center;display:flex;margin-left:auto;margin-right:auto;'>
            <div style='margin-left:auto;margin-right:auto;'>$error</div>
        </div>
    </div>
    ");
}


function printSuccess($alert){
    echo("
    <div class='outerErrorDiv' style='padding-top:10px;'>
        <div class='errorDiv' style='width:50%;height:50px;background-color:6BFF77;border-radius:25px;align-items:center;display:flex;margin-left:auto;margin-right:auto;'>
            <div style='margin-left:auto;margin-right:auto;'>$alert</div>
        </div>
    </div>
    ");

}


function register($username, $password,$geschlecht,$geburtsdatum,$email){
    $query = "SELECT Count(*) as number FROM Users Where Username = '$username'";
    include 'dbc.php';
    while ($row = $results->fetchArray()) {
        if($row['number']== 0){
            $db->close();
            unset($db);
            $hashedPW = hashit($password);
            $query = "INSERT into Users (Username, Password, Geschlecht,Geburtsdatum,email) VALUES('$username','$hashedPW','$geschlecht','$geburtsdatum','$email')";
            include 'dbc.php';
            header('Location: index.php?success=2');
            trylogin($username, $password, 1);
        }
        else{
            header('Location: register.php?error=1');
        }
    }
    $db->close();
}


function trylogin($username, $password, $mode){
logToConsole("login");
    $numrow=0;
    $hashedPW = hashit($password);
    $query = "SELECT * FROM Users Where Username = '$username' AND Password = '$hashedPW'";
    include 'dbc.php';
        while ($row = $results->fetchArray()) {
            $numrow++;
        }
        if($numrow == 1){
            while ($row = $results->fetchArray()) {
            header('Location: index.php');
            $_SESSION['UID']=$row['UID'];
            $_SESSION['username']=$row['Username'];
            }
            switch($mode){
                case "0":
                    header('Location: index.php?success=1');
                    break;
                case "1":
                    header('Location: index.php?success=2');
                    break;
            }

        }
        else{
            header('Location: login.php?error=1');
        }
    $db->close();
}


function logToConsole( $data ) {
    if ( is_array( $data ) )
        $output = "<script>console.log( \"Debug Objects: " . print_r($data) . "\" );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
}


function newRecord(){
    if(isset($_SESSION['UID'])){
        $creator = $_SESSION['UID'];
        $title = htmlspecialchars_decode($_POST['title']);
        $description = htmlspecialchars_decode($_POST['description']);
        $content = htmlspecialchars($_POST['content']);
        $date = date("Y-m-d H:i:s");

       $query = "INSERT into Records (FK_UID,Title,Description,Content,CreationDate,LastModified,Archivated) VALUES('$creator','$title','$description','$content','$date','$date','0')";
       include 'dbc.php';
       $db->close();
    }
}


function newComment(){
    $post = $_GET['recID'];
    $creator = $_SESSION['UID'];
    $title = htmlspecialchars_decode($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $date = date("Y-m-d H:i:s");
    $query = "INSERT into Comments (FK_RecordID,FK_UID,Title,Content,CreationDate) VALUES ('$post','$creator','$title','$content','$date')";
    include 'dbc.php';
    $db->close();
}


function updateProfile(){
    $UID = $_SESSION['UID'];
    $gender = $_POST['gender'];
    $birthday = $_POST['bday'];
    $email = $_POST['email'];
    $query = "Update Users SET
                Geschlecht='$gender',
                Geburtsdatum='$birthday',
                email='$email'
                WHERE UID='$UID'";
    include 'dbc.php';
    $db->close();
    header('Location: profile.php?profileID='.$_SESSION['UID']);
}


function updateRecord(){
    $RecordID = $_GET['recID'];
    $description = $_POST['description'];
    $content = htmlspecialchars($_POST['content']);
    $date = date("Y-m-d H:i:s");
    logToConsole($date);
    $query ="Update Records SET Description='$description', Content='$content', LastModified='$date' WHERE RecordID='$RecordID'";
    include 'dbc.php';
    $db->close();
}


function deleteRecord($recID){
    $query="Select FK_UID From Records WHERE RecordID = '$recID'";
    include 'dbc.php';
    while ($row = $results->fetchArray()) {
        if($_SESSION['UID'] == $row['FK_UID'] or $_SESSION['UID']=='1'){
            $db->close();
            $query = "DELETE FROM Records WHERE RecordID='$recID'";
            include 'dbc.php';
            $db->close();
            $query = "DELETE FROM Comments WHERE FK_RecordID='$recID'";
            include 'dbc.php';

            header('Location: index.php?success=4');
        }
        else{
            header('Location: record.php?recID='.$recID.'&error=3');
        }
    }
    $db->close();
}


function deleteComment($commentID){
    $query="Select
                Comments.FK_UID
                ,Records.FK_UID as RecordCreator
                From Comments LEFT JOIN Records ON Records.RecordID = Comments.FK_RecordID
                WHERE CommentID = '$commentID'";
    include 'dbc.php';
    while ($row = $results->fetchArray()) {
        $RecordCreator = $row['RecordCreator'];
        logToConsole($RecordCreator);
        if($_SESSION['UID'] == $row['FK_UID'] or $_SESSION['UID']=='1' or $_SESSION == $RecordCreator){
            $db->close();
            $query = "DELETE FROM Comments WHERE CommentID='$commentID'";
            include 'dbc.php';
            $db->close();
            header('Location: record.php?recID='.$_GET['recID'].'&success=1');
        }
        else{
            header('Location: record.php?recID='.$recID.'&error=3');
        }
    }
    $db->close();
}


function deleteUser($uid){
    if($_SESSION['UID'] =='1'){
        $query = "DELETE FROM Users WHERE UID='$uid'";
        include 'dbc.php';
        header('Location: users.php&success=1');
        }
        else{
            header('Location: users.php&error=1');
        }
    $db->close();
}


function archiveRecord($recID){
    $query="Select FK_UID From Records WHERE RecordID = '$recID'";
    include 'dbc.php';
    while ($row = $results->fetchArray()) {
        if($_SESSION['UID'] == $row['FK_UID'] or $_SESSION['UID']=='1'){
            $db->close();
            $query = "Update Records SET Archivated = '1' WHERE RecordID='$recID'";
            include 'dbc.php';
            header('Location: index.php?success=3');

        }
        else{
            header('Location: record.php?recID='.$recID.'&error=2');
        }
    }
    $db->close();
}


function minifyArray($array){
    foreach ($array as $key => $value) {
        if(is_numeric($key)){
            unset($array[$key]);
        }
    }
    $array = array_merge($array);
    return $array;
}


function notEmpty($string){
    if($string == ""){
        return "Nicht angegeben";
    }
    else{
        return $string;
    }
}


function hashit($pw){
    $hashedPW = md5(md5($pw."SaL1")."m0Re_S41T");
    return $hashedPW;
}


function getArchiv(){
    $query = "
            SELECT Users.UID as CreatorID,
            Users.Username as CreatorName,
            Records.Title as Title,
            Records.RecordID as RecordID,
            Records.Description as Description,
            Records.Content as Content,
            Records.CreationDate as CreationDate,
            Records.LastModified as LastModified,
            Records.Archivated as Archivated
            FROM Records LEFT JOIN Users ON Users.UID = Records.FK_UID
            WHERE Archivated = '1'
            ORDER BY LastModified desc, RecordID desc";
    include 'dbc.php';
    while ($row = $results->fetchArray()) {
        $row = minifyArray($row);
        echo("
            <article>
                <h4><a href='record.php?recID=".$row['RecordID']."'>".htmlspecialchars_decode($row['Title'])."</a>&nbsp;<small> von <a href='profile.php?profileID=".$row['CreatorID']."'>".$row['CreatorName']."</a></small></h4>
                <p>".htmlspecialchars_decode($row['Description'])."</p>
                <p class='meta'>
                    <time><span class='entypo-clock'></span> ".$row['CreationDate']."</time>");
                    if($row['LastModified']!=$row['CreationDate']){
                        echo("<time><span class='entypo-tools'></span> ".$row['LastModified']."</time>");
                    }
                    echo("
                    </span>
                  </p>
            </article>
        ");
    }
    $db->close();
}
?>