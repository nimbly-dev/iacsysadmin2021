<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity 24</title>
</head>
<body>
    <h3>Values inside the database</h3>
    <?php
        define('DB_HOST_IP', '127.0.0.1');
        define('DB_PORT', 3306);
        define('DB_USERNAME', 'nimbly');
        define('DB_PASSWORD', '123456');
        define('DB_NAME', 'sample_dup');

        @$db = new mysqli(DB_HOST_IP.':'.DB_PORT, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if (mysqli_connect_errno()){
            printf("Connect failed $s\n", mysqli_connect_error());
        }

        $query = 'SELECT * FROM sample_table';
        $stmt = $db->prepare($query);

        $stmt->execute();
        $result = $stmt->get_result();

        while($row = $result->fetch_assoc()){
            echo '<p>ID: '.$row['id'].' - Value: '.$row['value'];
        }
    ?>
</body>
</html>