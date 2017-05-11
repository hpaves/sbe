<?php $allowedExts = array("jpg", "jpeg", "png");
$allowedTypes = array("image/jpeg", "image/png", "image/pjpeg");
$extension = end((explode(".", $_FILES['pilt']["name"])));
$bytes= 1000000;
$loc = "images";

if (in_array($_FILES['pilt']["type"], $allowedTypes) && ($_FILES['pilt']["size"] < $bytes) && in_array($extension, $allowedExts) ) {
    // fail õiget tüüpi ja suurusega

    if ($_FILES['pilt']["error"] > 0) {
        echo "<p>Faili üleslaadimine luhtus, veakood: " . $_FILES['pilt']["error"] . "</p>";
        include 'mysql_nogo.php';
    } else {

        if ( file_exists("$loc/" . $_FILES['pilt']["name"]) ) {
            // samanimeline fail on kaustas $loc olemas ära uuesti lae, prindi failinimi

            echo "<p>Fail <em>$loc/".$_FILES['pilt']["name"]."</em> juba eksisteerib.</p>";
            include 'mysql_nogo.php';
        } else {
            // kõik ok, aseta pilt kausta $loc

            move_uploaded_file($_FILES['pilt']["tmp_name"], $loc."/" . $_FILES['pilt']["name"]);
            echo "<p>Faili <em>".$_FILES['pilt']["name"]."</em> laadmine kausta <em>$loc</em> edukas.</p>";
            include 'mysql_go.php';
        }
    }
} else {
    echo "<p>Fail puudub, ei ole sobivat tüüpi või on liiga suur.</p>";
    include 'mysql_nogo.php';
}

    /* pildi üleslaadimise kood baseerub: http://enos.itcollege.ee/~ttanav/VRI/abiks/php_tut.php */
?>