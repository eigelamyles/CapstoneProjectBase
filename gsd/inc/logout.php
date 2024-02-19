<?php 

include '../../conn.php';

session_start();
session_destroy();
session_unset();
    
?>
<script>
    alert('logging out');
    location.href='../../index.php';
</script>