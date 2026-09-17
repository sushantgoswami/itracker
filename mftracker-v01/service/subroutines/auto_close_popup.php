<?php
if (isset($_SESSION['msg'])) {
    echo '<div id="messageBox">' . htmlspecialchars($_SESSION['msg']) . '</div>';
    unset($_SESSION['msg']);
}
?>

<style>
#messageBox {
    position: fixed;
    top: 20px;
    right: 20px;
    background: #4CAF50;
    color: white;
    padding: 12px 20px;
    border-radius: 5px;
    z-index: 9999;
}
</style>

<script>
setTimeout(function() {
    const message = document.getElementById('messageBox');
    if (message) {
        message.remove();
    }
}, 1000);
</script>
