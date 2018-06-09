<?php
session_start();
//下記URLでアクセスするとSESSIONIDが見える
//http://localhost/secure/xss/simple.php?keyword=<script>alert(document.cookie)</script>
?>
<body>
検索キーワード:<?php echo $_GET["keyword"]; ?>
</body>
