<?php

define("HOST", "localhost");
define("DATABASE", "todo");
define("CHARSET", "utf8mb4");
define("USER", "root");
define("PASSWORD", "");

try {
    $pdo = new PDO(
        "mysql:host=" . HOST . ";" .
        "dbname=" . DATABASE . ";" .
        "charset=" . CHARSET,
        USER, PASSWORD
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    error_log("Error: Failed to connect to database. " . $e->getMessage());
}

$sql_users = "SELECT * FROM users";
$stmt_users = $pdo->query($sql_users);
$users = $stmt_users->fetchAll(PDO::FETCH_ASSOC);


foreach ($users as $user) {
    echo "<h2>{$user['username']}</h2>";

    $sql_tasks = "SELECT * FROM tasks WHERE user_id = :user_id";
    $stmt_tasks = $pdo->prepare($sql_tasks);
    $stmt_tasks->execute([":user_id" => $user['id']]);
    $tasks = $stmt_tasks->fetchAll(PDO::FETCH_ASSOC);

    echo "<ul>";
    foreach ($tasks as $task) {
        if ($task['task_status'] == "completed") {
            echo "<li><s>{$task["task_name"]}</s></li>";
        } else {
            echo "<li>{$task["task_name"]}</li>";
        }
        echo "<p>Created at: {$task['created_at']}</p>";
    }
    echo "</ul>";
}
?>
