<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'girnar');
define('DB_DATABASE', 'test');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

$q = $_REQUEST['q'];
if (!empty($q)) {
    $sql = "SELECT `name` FROM `countries` WHERE name LIKE '" . $q . "%' ORDER BY name ASC";
    $result = mysqli_query($link, $sql);
    ?>
    <ul id="country-list">
        <?php
        while($res = mysqli_fetch_assoc($result)) {
            ?>
            <li onClick="selectSuggesstion('<?php echo $res["name"]; ?>');"><?php echo $res["name"]; ?></li>
        <?php } ?>
    </ul>
    <?php
}
?>