<?php 
include __DIR__ . '/db.sql.php'; 
session_start();
header("Cache-Control: no-cache, must-revalidate");
header('Content-Type: text/html; charset=utf-8');
define("localhost", $localhost_db);
define("username", $username_db); 
define("password", $password_db); 
define("database", $database_db);
$thanhdieudb = @mysqli_connect(localhost, username, password, database);
if (!$thanhdieudb) {
    echo "<iframe src='error' style='position:absolute;width: 100%;height: 100%;top: 0;left: 0;border: none;' allowfullscreen></iframe>";
	exit('404 Not Found');
}
// include __DIR__ . '/common.php'; 
function DetectSQLInjection($input) {
    $list_query = "/\b(union|select|insert|update|delete|drop|alter|truncate|exec|xp_cmdshell|or|order\s*by|from|where|and|group\s*by|having|char|nchar|varchar|nvarchar|cast|convert|declare|script|' OR '1'='1' -- -|' OR '1'='1' #|' OR 1=1 --|' OR 'x'='x' --|' OR 1=1 LIMIT 1 -- -|' OR 1=1; --|' OR '1'='1' --|' OR '1'='1'; --|' OR '1'='1'; DROP TABLE users -- -|' OR 1=CONVERT\(int, \(SELECT @@version\)\) --|' OR 1=\(SELECT COUNT\(\*\) FROM information_schema\.tables\) --|' OR 'x'='x' AND 'y'='y' --|' OR 'x'='x' AND 'y'='z' --|' UNION SELECT null, taikhoan, matkhau FROM users --)\b/i";
    $excluded_query = "/' UNION SELECT null, taikhoan, matkhau FROM users --/i";
    if (preg_match($list_query, $input) && !preg_match($excluded_query, $input)) {
        return true;
    }
    return false;
}