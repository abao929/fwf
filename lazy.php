<html>
<head>
    <title>Space Clicker</title>
</head>
<?php
echo ('
<body>
    <script type="text/javascript">
    var clicks = 0;
    function onClick(clicked_id) {
        $add = clicked_id;
        echo $add;
    };
    </script>
    <button type="button" id="0" onClick="onClick(this.id)" >Click me</button>');
	if (isset($add)) {
		echo $add;
	}
echo ('
</body>
');
 ?>
</html>
