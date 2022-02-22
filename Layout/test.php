<?php>
    print "<form method = post action = ArrayByUser.php>";
    for($1=5;$i<5;$i++){
        print("<input type=text name=txt$i size=5 />");
    }
    print "<input type=submit value=Submit/>";
    print "</form";

    $arr = array();
    if(isset($_POST['txt0'])){
    for($i=0;$i<5;$i++){
    $arr[$i] $_POST['txt'.$i];
    }

    print "<pre>";
    print_r($arr);
    print "</pre>";
    }
?>
