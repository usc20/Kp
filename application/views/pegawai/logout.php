<?php
unset(
        $_SESSION['pegawaiid']
);
session_destroy();
header("Location: ".base_url()."")
?>
