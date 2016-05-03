<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'girnar');
define('DB_DATABASE', 'test');

$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$con) {
    die("Opps some thing went wrong");
} else {
    mysql_select_db(DB_DATABASE, $con);
}

$q = $_REQUEST['q'];
if (!empty($q)) {
    $sql = "SELECT `name` FROM `category` WHERE name LIKE '" . $q . "%' ORDER BY name ASC";
    $result = mysql_query($sql);
    ?>
    <ul id="country-list">
        <?php
        while($cat = mysql_fetch_assoc($result)) {
            ?>
            <li onClick="selectSuggesstion('<?php echo $cat["name"]; ?>');"><?php echo $cat["name"]; ?></li>
        <?php } ?>
    </ul>
    <?php
}
?>