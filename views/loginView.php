<html>
    <head>
	<meta charset='utf-8' />
    <link rel='stylesheet' href='\css\style.css' />
    <title><?php echo $title; ?></title>
</head>

<body>
    <h1><?php echo $title; ?></h1>
    
    <form method="post" action='<?php echo $action; ?>'>
    <table>
        <tr>
            <td>Username</td>
            <td><input name="username" type="text"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input name="password" type="password"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
    </form>

</body>
</html>