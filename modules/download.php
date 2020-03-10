<?php include '../includes/config.php'; ?>
<div id="menu">
    <h1 class="fontawesome-lock">DOWNLOAD</h1>
    <fieldset>
    <table class="menu-table">
        <thead>
        <th>#</th>
        <th>Name</th>
        <th>Size</th>
        <th>From</th>
        <th>Link</th>
        </thead>
        <tbody>
            <td>1</td>
            <td><?php echo $clientName ?></td>
            <td><?php echo $clientSize ?></td>
            <td><?php echo $clientFrom ?></td>
            <td><a class="button" target="_blank"  href="<?php echo $clientLink ?>">Download</a></td>
        </tbody>
    </table>
    </fieldset>
</div>