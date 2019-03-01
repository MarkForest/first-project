<h3 class="page-header">Gallery Page</h3>
<form action="index.php?page=3" method="post">
    <p>Select graphics extensions</p>
    <select name="ext" class="form-control">
        <?php
            $path = 'images/';
            if ($dir = opendir($path)) {
                $arr = [];
                while (($file = readdir($dir)) != false) {
                    $fullname = $path.$file;
                    $pos = strrpos($fullname, '.');
                    $ext = substr($fullname, $pos+1);
                    $ext = strtolower($ext);
                    if (!in_array($ext, $arr)) {
                        $arr[] = $ext;
                        echo "<option>$ext</option>";
                    }
                }
                closedir($dir);
            }
        ?>
    </select>
    <input type="submit" name="submit" class="btn btn-primary" value="Show Picture">
</form>
<?php
    if (isset($_POST['submit'])) {
        $ext = $_POST['ext'];
        $arr = glob($path.'*.'.$ext);
        echo "<div class='panel panel-primary'>";
        echo "<div class='panel-heading'>";
        echo "<h3 class='panel-title'>Gallery content</h3></div>";
        echo "<div class='panel-body'>";
        foreach ($arr as $a) {
            echo "<a href='$a' target='_blank'><img style='height: 150px;' src='$a' alt='picture'></a>";
        }
        echo "</div>";
        echo "</div>";
    }
?>