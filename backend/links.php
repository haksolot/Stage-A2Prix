<?php
    function linkResource($rel, $href)
    {
        echo "<link rel='{$rel}' href='{$href}'>";
    }
    function linkScript($src) {
        echo "<script src='{$src}'></script>";
    }
?>