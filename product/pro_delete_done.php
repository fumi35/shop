<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>

<?php

try{
    $pro_code = $_POST['code'];
    // $pro_name = $_POST['name'];
    // $pro_pass = $_POST['pass'];

    // $pro_name = htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
    // $pro_pass = htmlspecialchars($pro_pass,ENT_QUOTES,'UTF-8');

    $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
    $user = 'root';
    $password = 'password';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = 'DELETE FROM mst_product WHERE code=?';
    $stmt = $dbh->prepare($sql);
    // $data[] = $pro_name;
    // $data[] = $pro_pass;
    $data[] = $pro_code;
    $stmt->execute($data);

    $dbh = null;

    // print $pro_name;
    // print 'さんを追加しました。</br>';

}catch(Exception $e){
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    echo $e;
    exit();
}

?>

削除しました。<br/>
<br/>

<a href="pro_list.php">戻る</a>

</body>

</html>