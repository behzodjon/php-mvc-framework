<?php

use app\core\Application;

class m0003_add_tasks
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE tasks(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            task_text VARCHAR(255) NOT NULL,
            status TINYINT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB";
        $db->pdo->exec($SQL);
    }
    public function down()
    {
        $db = Application::$app->db;
        $SQL ="DROP TABLE tasks;";
        $db->pdo->exec($SQL);
    }
}
