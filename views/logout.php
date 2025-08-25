<?php
    session_destroy();
    if (headers_sent()) {
            echo "<script> window.location.href='index.php?vista=login';</script>"; // Redirigir al login
        } else {
            header("Location: index.php?vista=login");
        }
