<?php
require_once 'SessionManager.php';

$sessionManager = new SessionManager();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset'])) {
    $sessionManager->resetSession();
    header("Location: index.php");
    exit;
}

$sessionManager->incrementVisitCount();
$visitCount = $sessionManager->getVisitCount();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Example</title>
</head>
<body>
    <?php if ($visitCount === 1){ ?>
        <p>Bienvenue à notre plateforme.</p>
    <?php } else{ ?>
        <?php echo "<p> Merci pour votre fidélité, c’est votre  $visitCount  éme visite.</p>" ?>
    <?php } ?>

    <form method="post">
        <button type="submit" name="reset">Réinitialiser la session</button>
    </form>
</body>
</html>
