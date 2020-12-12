<?php
    session_start();

    if(isset($_SESSION['logged']) and ($_SESSION['logged'])){
        session_destroy();
        echo '<script>alert("Su sesi\u00F3n se ha cerrado correctamente")
                self.location = "../../index.html"</script>';
    } else {
        echo '<script>alert("No hay sesi\u00F3n iniciada")
                self.location = "../../index.html"</script>';
    }
?>