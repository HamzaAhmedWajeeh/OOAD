
<?php
    $title = 'Profile';
    ob_start();
?>

<div>
    <h2>Yourr Profile Content Goes Here</h2>
    <!-- Add your profile content here -->
</div>

<?php
    $content = ob_get_clean();
    include 'layout.php';
?>
