<!DOCTYPE HTML>
<html>
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
	<title>Apriori Alghoritm</title>
</head>
<body style="font-family: monospace;">
<?php   
include 'class.apriori.php';

$Apriori = new Apriori();

$Apriori->setMaxScan(20);       //Scan 2, 3, ...
$Apriori->setMinSup(2);         //Minimum support 1, 2, 3, ...
$Apriori->setMinConf(75);       //Minimum confidence - Percent 1, 2, ..., 100
$Apriori->setDelimiter(',');    //Delimiter 


// Use Array:
/*
$dataset   = array();
$dataset[0] = "A, B, C, D";
$dataset[1] = "A, D, C";
$dataset[2] = "B, C";
$dataset[3] = "A, E, C";
$Apriori->process($dataset);

$dataset[0] = "I1, I2, I5"; # isang transaction
$dataset[1] = "I2, I4";
$dataset[2] = "I2, I3";
$dataset[3] = "I1, I2, I4";
$dataset[4] = "I1, I3";
$dataset[5] = "I2, I3";
$dataset[6] = "I1, I3";
$dataset[7] = "I1, I2, I3, I5";
$dataset[8] = "I1, I2, I3";
*/

$order_id = $this->item_model->getDistinct("audit_trail", "customer_id = 9", "order_id", "ASC");

# store the fetched values into an array:
foreach($order_id as $order_id)
    $order_id_array[] = $order_id->order_id;

# get the orders of customer based on order_id:
for($i = 0; $i < sizeof($order_id_array); $i++) {
    $this->db->select("item_name");
    $tilted_transactions[] = $this->item_model->fetch("audit_trail", "customer_id = 9 AND order_id = " . $order_id_array[$i]);
}
$customer_transactions = array();
//for($i = 0; $i < sizeof($tilted_transactions); $i++) {

$i = 0;
foreach($tilted_transactions as $tilted_transaction){
    if(sizeof($tilted_transactions[$i]) > 1) {
        for($j = 0; $j < sizeof($tilted_transactions[$i]); $j++) {
            $customer_transactions[$i][$j] = (string)$tilted_transaction[$j]->item_name;
        } $i++; continue;
    }
    else
        $customer_transactions[] = (array)$tilted_transaction[0]->item_name;
    $i++;
}
# echo sizeof($customer_transactions[10])." ";
for($i = 0; $i < sizeof($customer_transactions); $i++) {
    for($j = 0; $j < sizeof($customer_transactions[$i]); $j++) {
        $customer_transactions_str[$i] = implode(", ", $customer_transactions[$i]);
    }
}

echo "<pre>";
print_r($customer_transactions_str);
echo "</pre>";

$Apriori->process($customer_transactions_str);

//Frequent Itemsets
echo '<h1>Frequent Itemsets</h1>';
$Apriori->printFreqItemsets();

echo '<h3>Frequent Itemsets Array</h3>';
echo "<pre>";
print_r($Apriori->getFreqItemsets());
echo "</pre>";

//Association Rules
echo '<h1>Association Rules</h1>';
$Apriori->printAssociationRules();

echo '<h3>Association Rules Array</h3>';
echo "<pre>";
print_r($Apriori->getAssociationRules());
echo "</pre>";

//Save to file
$Apriori->saveFreqItemsets('freqItemsets.txt');
$Apriori->saveAssociationRules('associationRules.txt');
?>  
</body>
</html>
