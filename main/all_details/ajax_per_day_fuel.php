<?php
require_once '../config.php';
if(logged_in()){
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['startDate']) && isset($_POST['endDate'])) {
            $sql="SELECT fuel.date as fuel_date,sell_quantity_diesel,invest_diesel,earn_diesel,profit_diesel,sell_quantity_octane,invest_octane,earn_octane,profit_octane,sell_quantity_mobil,invest_mobil,earn_mobil,profit_mobil,IfNull(expense, 0) as exp
FROM (select date, sum(sell_quantity1) as sell_quantity_diesel, sum(sell_quantity2) as sell_quantity_octane,sum(sell_quantity3) as sell_quantity_mobil,
             sum(earn1) as earn_diesel,sum(earn2) as earn_octane,sum(earn3) as earn_mobil,
             sum(invest1) as invest_diesel, sum(invest2) as invest_octane,sum(invest3) as invest_mobil,
             sum(profit1) as profit_diesel, sum(profit2) as profit_octane, sum(profit3) as profit_mobil
      from ((select date(date) as date, sum(profit) as profit1, 0 as profit2, 0 as profit3,
                    sum(sell_quantity) as sell_quantity1,0 as sell_quantity2, 0 as sell_quantity3,
                    sum(earn) as earn1,0 as earn2, 0 as earn3,
                    sum(invest) as invest1, 0 as invest2, 0 as invest3
             from add_diesel
             group by date(date)
            ) union all
            (select date(date) as date, 0 as profit1, sum(profit) as profit2, 0 as profit3,
                    0 as sell_quantity1,sum(sell_quantity) as sell_quantity2,0 as sell_quantity3,
                    0 as earn1,sum(earn) as earn2, 0 as earn3,
                    0 as invest1, sum(invest) as invest2, 0 as invest3
             from add_octane
             group by date(date)
            ) union all
            (select date(date) as date, 0 as profit1,0 as profit2, sum(profit) as profit3,
                    0 as sell_quantity1,0 as sell_quantity2,sum(sell_quantity) as sell_quantity3,
                    0 as earn1,0 as earn2, sum(earn) as earn3,
                    0 as invest1, 0 as invest2, sum(invest) as invest3
             from add_mobil
             group by date(date)
            )
           ) t
      group by date) fuel LEFT JOIN (SELECT date,sum(amount) as expense from expense_details group by date) expense ON fuel.date = expense.date where fuel.date between '".clean($_POST['startDate'])."' and '".clean($_POST['endDate'])."' order by 1 desc limit 40";
        }
        else{
            $sql="SELECT fuel.date as fuel_date,sell_quantity_diesel,invest_diesel,earn_diesel,profit_diesel,sell_quantity_octane,invest_octane,earn_octane,profit_octane,sell_quantity_mobil,invest_mobil,earn_mobil,profit_mobil,IfNull(expense, 0) as exp
FROM (select date, sum(sell_quantity1) as sell_quantity_diesel, sum(sell_quantity2) as sell_quantity_octane,sum(sell_quantity3) as sell_quantity_mobil,
             sum(earn1) as earn_diesel,sum(earn2) as earn_octane,sum(earn3) as earn_mobil,
             sum(invest1) as invest_diesel, sum(invest2) as invest_octane,sum(invest3) as invest_mobil,
             sum(profit1) as profit_diesel, sum(profit2) as profit_octane, sum(profit3) as profit_mobil
      from ((select date(date) as date, sum(profit) as profit1, 0 as profit2, 0 as profit3,
                    sum(sell_quantity) as sell_quantity1,0 as sell_quantity2, 0 as sell_quantity3,
                    sum(earn) as earn1,0 as earn2, 0 as earn3,
                    sum(invest) as invest1, 0 as invest2, 0 as invest3
             from add_diesel
             group by date(date)
            ) union all
            (select date(date) as date, 0 as profit1, sum(profit) as profit2, 0 as profit3,
                    0 as sell_quantity1,sum(sell_quantity) as sell_quantity2,0 as sell_quantity3,
                    0 as earn1,sum(earn) as earn2, 0 as earn3,
                    0 as invest1, sum(invest) as invest2, 0 as invest3
             from add_octane
             group by date(date)
            ) union all
            (select date(date) as date, 0 as profit1,0 as profit2, sum(profit) as profit3,
                    0 as sell_quantity1,0 as sell_quantity2,sum(sell_quantity) as sell_quantity3,
                    0 as earn1,0 as earn2, sum(earn) as earn3,
                    0 as invest1, 0 as invest2, sum(invest) as invest3
             from add_mobil
             group by date(date)
            )
           ) t
      group by date) fuel
LEFT JOIN (SELECT date,sum(amount) as expense from expense_details group by date) expense ON fuel.date = expense.date order by 1 desc limit 40";
        }
        $result=query($sql);
        confirm($result);
        if(row_count($result)>=1){
            $array=array();

            while($row = fetch_array($result)){
                $details = array("Date"=>$row['fuel_date'],"Diesel-Sell-Quantity"=>$row['sell_quantity_diesel'],"Diesel-Invest"=>$row['invest_diesel'],"Diesel-Earn"=>$row['earn_diesel'],"Diesel-Profit"=>$row['profit_diesel'],"Octane-Sell-Quantity"=>$row['sell_quantity_octane'],"Octane-Invest"=>$row['invest_octane'],"Octane-Earn"=>$row['earn_octane'],"Octane-Profit"=>$row['profit_octane'],"Mobil-Sell-Quantity"=>$row['sell_quantity_mobil'],"Mobil-Invest"=>$row['invest_mobil'],"Mobil-Earn"=>$row['earn_mobil'],"Mobil-Profit"=>$row['profit_mobil'],"Expense"=>$row['exp'],"Fuel-Invest"=>((float)$row['invest_diesel']+(float)$row['invest_octane']+(float)$row['invest_mobil']),"Fuel-Earn"=>((float)$row['earn_diesel']+(float)$row['earn_octane']+(float)$row['earn_mobil']),"Fuel-Profit"=>((float)$row['profit_diesel']+(float)$row['profit_mobil']+(float)$row['profit_octane']),"Total-Profit"=>((float)$row['profit_diesel']+(float)$row['profit_mobil']+(float)$row['profit_octane']-(float)$row['exp']));
                $array[]=$details;
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
