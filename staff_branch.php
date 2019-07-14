<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>
<?php
if(isset($_POST['edit'])==true){
    if(isset($_POST['staffcode']) == false){//追加
        header('Location:staff_ng.php');    //追加
        exit();                             //追加
    }
    $staff_code=$_POST['staffcode'];
    header('Location:staff_edit.php?staffcode='.$staff_code);
    exit();
}

if(isset($_POST['delete'])==true){
    $staff_code=$POST['staffcode'];
    header('Location:staff_delete.php?staffcode='.$staff_code);
    exit();
}

?>
</body>

</html>