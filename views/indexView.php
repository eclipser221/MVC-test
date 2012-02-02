<html>
    <head>
	<meta charset='utf-8' />
    <link rel='stylesheet' href='style.css' />
    <title><?php echo $title; ?></title>
</head>

<body>
    <h1><?php echo $title; ?></h1>

    <?php foreach($posts as $post) { ?>
        <h2><?php echo $post['title'];?></h2>
        <?php } ?>


</body>
</html>