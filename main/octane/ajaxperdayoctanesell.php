<?php
require_once '../config.php';
if(logged_in()){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['startDate']) && isset($_POST['endDate'])){
            $sql="SELECT date ,sum(sell_quantity) as sell_quantity, sum(buy_rate)/count(*) as buy_rate, sum(invest) as invest, sum(sell_rate)/count(*) as sell_rate, sum(earn) as earn,sum(profit) as profit from add_octane where date between '".$_POST['startDate']."' and '".$_POST['endDate']."' group by date order by date desc  limit 100";
        }
        else{
            $sql= "SELECT date ,sum(sell_quantity) as sell_quantity, sum(buy_rate)/count(*) as buy_rate, sum(invest) as invest, sum(sell_rate)/count(*) as sell_rate, sum(earn) as earn,sum(profit) as profit from add_octane GROUP BY date ORDER BY date desc limit 100";
        }

        $result= query($sql);
        confirm($result);

        if(row_count($result)>=1){
            $array=array();

            while($row = fetch_array($result)){
                $diesel = array("Date"=>$row['date'],"Sell-Quantity"=>$row['sell_quantity'],"Buying-Rate"=>$row['buy_rate'],"Investment"=>$row['invest'],"Sell-Rate"=>$row['sell_rate'],"Earn"=>$row['earn'],"Profit"=>$row['profit'],"Edit"=>$row['id']);
                $array[]=$diesel;

            }

            $json_data = array(
                "draw"            => intval( count($array)),
                "recordsTotal"    => intval( count($array) ),
                "recordsFiltered" => intval(count($array)),
                "data"            => $array
            );

            echo json_encode($json_data);
        }
    }
}
else {
    die(header("HTTP/1.0 404 Not Found")); //Throw an error on failure
}
?>