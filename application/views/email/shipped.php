<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body style="background-color: #fff;margin: 40px;font: 13px/20px normal Helvetica, Arial, sans-serif;color: #4F5155;">

  <div id="container">

   <div id="body">
    <div> <center>
      <p><img src="https://image.ibb.co/hoZ6DH/logo.png" alt="" style="display: block; width:auto; max-width: 100%;height: 100%;"/></p> 
      <h1>Your Item has been Shipped</h1>
      <p><img src="https://image.ibb.co/jTgDYS/shipped.png" alt="" style="display: block; width:30%; max-width: 100%;height:auto;"/></p> </div>
      <table style="border:0;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;" >
        <tr><td style="background-color:#ddd; padding:15px;">
          <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;">Dear <b><?=ucwords($user->firstname)." ".ucwords($user->lastname)?>, </b></p>
          <br>
          <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;">Your <span style="color: #dc2f54"><b>Order #<?=$order->order_id?></b></span> is being shipped and will be out for delivery within the next 24 hours. Please see below for the expected shipment arrival of your order.</p>
          <br>
          <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;">Your Shipment will arrive by:<b><?php echo date("F j, Y",$order->delivery_date)?></b> <br> Shipped by: <b><?=$shipper->shipper_name?></b></p>
        </td>
      </tr>
      <tr>
        <td style=" padding:15px;">
          <p style="font-family: Arial Narrow;font-size: 20px;color: #dc2f54;padding: 0;margin:0;"><b>What's Next?</b></p>
          <br>
          <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;">Upon receipt of your package, we encourage you to examine it carefully and keep your buying invoice in case you need to return, replace, or claim your product's warranty.</p>
          <br>
          <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;">Your Order will be delivered to:</p>
          <p style="font-family: Arial Narrow;font-size: 16px;color: #dc2f54;padding: 0;margin:0;"><b><?=ucwords($user->firstname)." ".ucwords($user->lastname)?></b></p>
          <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;"><b><?=$order->shipping_address?></b></p>
          <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;">Phone: <b><?=$user->contact_no?></b> </p>
          <br>
        </td>
      </tr>
    </table>

    <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;">Order details:</p>
    <table style="border:0;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;" >
      <tr>
        <th style="padding-top: 5px;padding-bottom: 5px;text-align: left;background-color: #31bbe0;color: white;">Product Name</th>
        <th style="padding-top: 5px;padding-bottom: 5px;text-align: left;background-color: #31bbe0;color: white;">Quantity</th>
        <th style="padding-top: 5px;padding-bottom: 5px;text-align: left;background-color: #31bbe0;color: white;">Price</th>
        <th style="padding-top: 5px;padding-bottom: 5px;text-align: left;background-color: #31bbe0;color: white;">Subtotal</th>
      </tr>
      <?php foreach ($items as $order_items):?>
        <tr>
          <td style="text-align: left;padding: 8px;"><?= $order_items->product_name ?></td>
          <td style="text-align: left;padding: 8px;"><?= $order_items->quantity ?></td>
          <td style="text-align: left;padding: 8px;">&#8369;<?= number_format($order_items->product_price, 2) ?></td>
          <td style="text-align: left;padding: 8px;">&#8369;<?= number_format($order_items->product_subtotal, 2) ?></td>
        </tr>
      <?php endforeach ?>
      <tr>
        <th colspan="3" style="padding-top: 5px;padding-bottom: 5px;text-align: left;background-color: #dc2f54;color: white;">Total</th>
        <th style="padding-top: 5px;padding-bottom: 5px;text-align: left;background-color: #dc2f54;color: white; padding: 5px; spacing: 20px;">&#8369;<?=number_format($order->total_price,2)?></th>
      </tr>
    </table>
    <br>
    <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;"> Thank you for shopping at <b> Technoholics!</b></p>
  </div>
</div>

</body>
</html>