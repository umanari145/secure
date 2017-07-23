<?php

$name = @$_POST['name'] ?:"";
$mysqli = new mysqli('localhost', 'sql_user', 'sql_injection_pass', 'sql_injection');
if (!$mysqli->connect_error) {
    $mysqli->set_charset("utf8");

    if( isset($_POST['search']) && $name !== "" ) {
        // 脆弱性あり
        //$sql = " SELECT * FROM member WHERE name = '" . $name . "'";
        // if ($res = $mysqli->query($sql)) {
        //    while ($row = $res->fetch_assoc()) {
        //        var_dump($row);
        //    }
        //}

        $sql = " SELECT * FROM member WHERE name = '" .  $mysqli->real_escape_string($name) . "' ";
        if ($res = $mysqli->query($sql)) {
            while ($row = $res->fetch_assoc()) {
                var_dump($row);
            }
        }
    }

    $mysqli->close();

} else {
    echo $mysqli->connect_error;
    exit();
}

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
