<?php
unset(
        $_SESSION['adminid']
);
session_destroy();
header("Location: ".base_url()."")
?>