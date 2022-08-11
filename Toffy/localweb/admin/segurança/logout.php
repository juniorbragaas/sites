<?php
    session_start();
    session_destroy();
    echo "<script>window.history.pushState('', '', '/');</script>";
    echo "<script>alert('Logout');location.href='../index.php';</script>"
?>