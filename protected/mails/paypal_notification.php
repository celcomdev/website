Dear Admin,
<br /><br />
Paypal Bulk SMS Payment.<br /><br />

<table role="presentation" width="100%">
    <tbody>
        <tr>
            <td>Client</td>
            <td><?php echo $data['shipping']['name']['full_name']; ?></td>
        </tr>
        <tr>
            <td>Celcom Account ID</td>
            <td><?php echo $data['reference_id']; ?></td>
        </tr>
        <tr>
            <td>Order</td>
            <td><?php echo $data['description']; ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <table role="presentation" border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Amt</th>
                            <tbody>
                                <?php foreach ($data['items'] as $item) { ?>
                                <tr>
                                    <td><?php echo $item['name'] ?></td>
                                    <td><?php echo $item['description'] ?></td>
                                    <td>$ <?php echo $item['unit_amount']['value'] ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </tr>
                    </thead>
                </table>
            </td>
        </tr>
    </tbody>
</table>
