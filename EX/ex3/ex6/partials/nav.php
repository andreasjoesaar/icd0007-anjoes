<?php
declare(strict_types=1);
/** @var string $activePage */
?>
<nav>
    <a href="dashboard.php" <?php if (($activePage ?? '') === 'dashboard'): ?>aria-current="page"<?php endif; ?>>Töölaud</a>
    |
    <a href="logout.php">Logi välja</a>
</nav>
