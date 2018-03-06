<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body style="background-color: #fff;margin: 40px;font: 13px/20px normal Helvetica, Arial, sans-serif;color: #4F5155;">

  <div id="container">

   <div id="body">
    <div> <center>
      <p><img src="https://image.ibb.co/hoZ6DH/logo.png" alt="TECHNOHOLICS" style="display: block; width:auto; max-width: 100%;height: 100%;"/></p> </div>
      <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;">Dear <b><?=ucwords($firstname)." ".ucwords($lastname)?>, </b></p>
      <br>
      <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;">Your <span style="color: #dc2f54"><b>Order Number <?=$order->order_id?></b></span> has been placed on <b><?php echo date("F j, Y",$order->transaction_date)?></b> via <b><?=$shipper_name?></b></p>
      <br>
      <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;">Your order has been received and is currently in verification process. We will update you once your order(s) is shipped.</p>
      <br>
      <?php if($payment == "bank_dep"): ?>
        <table style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;color: black;">
          <tr>
            <th style="padding-top: 5px;padding-bottom: 5px;text-align: left;background-color: #31bbe0;color: white;" colspan="4">Bank Transfer Instructions</th>
          </tr>
          <tr>
           <td style="background-color:#dc2f54; color: white;"> Bank Account </td>
           <td style="background-color:#dc2f54; color: white;">  Account Name </td>
           <td style="background-color:#dc2f54; color: white;"> Account Number </td>
         </tr>
         <tr>
           <td style="background-color:#ddd;"> BPI </td>
           <td style="background-color:#ddd;"> Technoholics Co. </td>
           <td style="background-color:#ddd;">8251 0215 39</td>
         </tr>
         <tr>
           <td style="background-color:#ddd;"> BDO</td>
           <td style="background-color:#ddd;"> Technoholics Co. </td>
           <td style="background-color:#ddd;">00 132 019 8684</td>
         </tr>
         <tr>
           <td style="background-color:#ddd;"> Metrobank</td>
           <td style="background-color:#ddd;"> Technoholics Co. </td>
           <td style="background-color:#ddd;">007 537 00142 5</td>
         </tr>
       </table>
       <br>
       <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;" >Please deposit the exact amount of your order, then send a copy of proof of payment at <b>online@technoholics.com.ph</b></p><br>
       <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;">Once payment is verified, we will place your order for shipping.<br><br>
         Your order will not ship until we receive payment.
       </p>
       <br>
     <?php endif; ?>
     <table style="border:0;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;">
      <tr>
        <th style="border: 1px solid #ddd;padding: 5px; padding-top: 5px;padding-bottom: 5px;text-align: left;background-color: #31bbe0;color: white;" colspan="4">Notice</th>
      </tr>
      <tr>
       <td style="background-color:#ddd;padding: 5px;" colspan="4"><p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;">
         We automatically created you an account in our online store. 
         <br>
         Username:<span style="color:#dc2f54;"><b><?=$username?></b></span><br>
         Password:<span style="color:#dc2f54;"><b><?=$username?></b></span>
         <br><br>
         You can change your username and password when you log in to your account, but you need to verify your account first.<br><br>
         <center>
          <a href="<?= base_url()?>confirm/update/<?=$verification_code?>">
            <button class="btn" href="<?= base_url()?>confirm/update/<?=$verification_code?>" style="background-color:#31bbe0; color:white; padding: 5px 10px;font-size: 16px; line-height: 1.3333333; border-radius: 6px;" size="50px">
              <b>Verify your email</b>
            </button>
          </a>
        </center>
      </p></td>
    </tr>
  </table>
  <br>
  <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;">You can track your order when you log in to your account.</p>
  <br>
  <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;">We will keep you updated on your order status through email and in your account.</p>
  <br>
  <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;">Your Order will be delivered to:</p>
  <p style="font-family: Arial Narrow;font-size: 16px;color: #dc2f54;padding: 0;margin:0;"><b><?=ucwords($firstname)." ".ucwords($lastname)?></b></p>
  <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;"><b><?=$order->shipping_address?></b></p>
  <p style="font-family: Arial Narrow;font-size: 16px;color: black;padding: 0;margin:0;">Phone: <b><?=$contact?></b> </p>
  <br>
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