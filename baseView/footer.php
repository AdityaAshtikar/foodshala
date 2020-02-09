<?php

    if ( isset($absPath) && $absPath ) {
        $bs4JqueryPath = "assets/public/js/jquery341.min.js";
        $customJsPath = "assets/public/js/";
        $bs4popper = "assets/public/js/popper.min.js";
        $bs4MinJs = "assets/public/js/bs4.min.js";
        $jqueryValidator = "assets/public/js/jsValidate.min.js";

    } else {
        $bs4JqueryPath = "../assets/public/js/jquery341.min.js";
        $customJsPath = "../assets/public/js/";
        $bs4popper = "../assets/public/js/popper.min.js";
        $bs4MinJs = "../assets/public/js/bs4.min.js";
        $jqueryValidator = "../assets/public/js/jsValidate.min.js";

    }

?>

    <script src="<?php echo $bs4JqueryPath ?>"></script>

    <!-- custom js file, one per module -->
    <?php if (isset($js))
        // echo '<script src=../assets/public/js/' . $js . '>';
        echo '<script src=' . $customJsPath . $js . '>';
    ?>
    <script src="<?php echo $bs4popper; ?>"></script>
    <script src="<?php echo $bs4MinJs; ?>"></script>
    <script src="<?php echo $jqueryValidator; ?>"></script>
    
</body>
</html>