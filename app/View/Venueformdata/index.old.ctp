<table id="js-datatable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?php echo h('Venues'); ?></th>
        </tr>
    </thead>
    <tbody>
<?php foreach ($Venueformdatas as $Venueformdata): ?>
            <tr>
                <td><?php echo h($Venueformdata['$Venueformdata']['venue']); ?>&nbsp;</td>
     
            </tr>
    <?php endforeach; ?>
    </tbody>
</table>

