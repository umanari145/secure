<?php
session_start();
?>
<body>
<!--echo $_GET["keyword"]のなかにJavaScriptを埋め込まれてしまう--> 
検索キーワード:<?php echo $_GET["keyword"]; ?>
</body>
