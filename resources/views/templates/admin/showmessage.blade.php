<!-- Message Succès -->
<?php 
    if(isset($_GET["success"]) && $_GET["success"] == 1 && isset($_GET["message"]) && isset($_GET["tittle"])) : ?>

<script> 
    swal({
    title: "<?= $_GET["tittle"] ?>",
    text: "<?= $_GET["message"] ?>",
    icon: "success",
    button: "Okay :)",
    });
</script>

<?php endif; ?>

<!-- Message Erreur -->
<?php  
    if(isset($_GET["error"]) && $_GET["error"] == 1 && isset($_GET["message"]) && isset($_GET["tittle"])) : ?>

<script> 
    swal({
    timer: 2000,
    timerProgressBar: true,
    title: "<?= $_GET["tittle"] ?>",
    text: "<?= $_GET["message"] ?>",
    icon: "error",
    button: "Oh :(",
    });
</script>

<?php endif; ?>