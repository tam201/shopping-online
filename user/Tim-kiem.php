<?php
session_start();
?>
<link rel="stylesheet" href="assets/css/style.css">
<?php

include("menu.php");
?>
<form action="tim-kiem-process.php" style="position: relative;top:100px; height: 1000px;">
    <input type="text" id="search" placeholder="search..." onkeyup="searching(this)" name="search" value="<?php if (isset($_GET["search"])) {
                                                                                                                echo $_GET["search"];
                                                                                                            } ?>">
    <button>tìm kiếm</button>
</form>
<script>
    function searching(e) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Typical action to be performed when the document is ready:
                console.log(xhttp.responseText);
            }
        };
        xhttp.open("GET", "tim-kiem-process.php?search=" + e.value, true);
        xhttp.send();
    }
</script>
<div class="footer" style="position: absolute; height: 100%;">
    <?php
    include("footer.php");
    ?>
</div>