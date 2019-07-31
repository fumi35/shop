<?php
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['member_login'])==false){
        print 'ようこそゲスト様 ';
        print '<a href="member_login.html">会員ログイン</a></br>';
        print '<br/>';
    }else{
        print 'ようこそ';
        print ＄_SESSION['member_name'];
        print '様 ';
        print '<a href="member_logout.php">ログアウト</a><br/>';
        print '<br/>';
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>
<?php
    try{
        $pro_code = $_GET['procode'];//変更点:$_POST→$_GET

        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = 'password';
        $dbh = new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT name,price,gazou FROM mst_product WHERE code=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $pro_code;
        $stmt -> execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $pro_name=$rec['name'];
        $pro_price=$rec['price'];
        $pro_gazou_name=$rec['gazou'];

        $dbh = null;

        if($pro_gazou_name==''){
            $disp_gazou='';
        }else{
            $disp_gazou='<img src="../product/gazou/'.$pro_gazou_name.'">';
        }

        print '<a href="shop_cartin.php?procode='.$pro_code.'">カートに入れる</a><br/><br/>';

    }catch(Exception $e){
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
?>

商品情報参照<br/>
<br/>
商品コード<br/>
<?php print $pro_code;?>
<br/>
商品名<br/>
<?php print $pro_name;?>
<br/>
価格<br/>
<?php print $pro_price;?>円
<br/>
<br/>
<?php print $disp_gazou;?>
<br/>
<br/>
<form>
<!-- <form method="post" action="pro_edit_check.php">
<input type="hidden" name="code" value="<?php print $pro_code;?>">
商品名<br/>
<input type="text" name="name" style="width:200px" value="<?php print $pro_name;?>"><br/>
パスワードを入力して下さい。<br/>
<input type="password" name="pass" style="width:100px"><br/>
パスワードをもう一度入力して下さい。<br/>
<input type="password" name="pass2" style="width:100px"><br/> -->
<input type="button" onclick="history.back()" value="戻る">
<!-- <input type="submit" value="OK"> -->
</form>
</body>

</html>