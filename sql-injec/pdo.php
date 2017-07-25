<?php

$name = @$_POST['name'] ?:"";

$dsn = 'mysql:dbname=sql_injection;host=localhost';
$user = 'sql_user';
$password = 'sql_injection_pass';

$dbh = null;
try{
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');
}catch (PDOException $e){
    print('Connection failed:'.$e->getMessage());
    die();
}

if( isset($_POST['search']) && $name !== "" ) {

    //もし?ではなく$nameを調節入れるとインジェクションに対して無効
    $sql = " SELECT * FROM member WHERE name = ? ";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$name]);

    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        var_dump($result);
    }
}

$dbh = null;

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SQLインジェクション</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="name" value="<?php echo $name;?>">
        <!-- この値をいれると脆弱のあるSQLの場合全データが出てしまう     '  or 1=1 or  ' -->
        <input type="submit" name="search" value="検索">
    </form>
</body>
</html>
