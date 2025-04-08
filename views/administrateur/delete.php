<?php
require_once "../models/class.model.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    if (deleteClass($id)) {
        header("Location: ?controller=rp&page=classes");
        exit();
    } else {
        header("Location: ?controller=rp&page=classes");
        exit();
    }
} else {
    header("Location: ?controller=rp&page=classes");
    exit();
}
?>
