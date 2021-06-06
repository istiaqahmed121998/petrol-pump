<?php
require_once '../config.php';
if(logged_in()){
            $sql="select d.month as month,d.sell_quantity as sell_quantity_diesel,d.invest as invest_diesel,d.earn as earn_diesel, d.profit as profit_diesel,
       o.sell_quantity as sell_quantity_octane,o.invest as invest_octane,o.earn as earn_octane, o.profit as profit_octane,
       m.sell_quantity as sell_quantity_mobil,m.invest as invest_mobil,m.earn as earn_mobil, m.profit as profit_mobil,e.expense as exp
from (select derived.mm as month,
                      IF(sum(u.sell_quantity) IS NOT NULL,sum(u.sell_quantity),0) as sell_quantity,
                      IF(sum(u.invest) IS NOT NULL,sum(u.invest),0) as invest,
                      IF(sum(u.earn) IS NOT NULL,sum(u.earn),0) as earn,
                      IF(sum(u.profit) IS NOT NULL,sum(u.profit),0) as profit from (
                        SELECT 1 mm UNION ALL SELECT 2 UNION ALL SELECT 3
                        UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7
                        UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11
                        UNION ALL SELECT 12
                    ) derived left join add_diesel u on derived.mm = month(date) and u.date > LAST_DAY(DATE_SUB(curdate(),INTERVAL 1 YEAR))
               group by derived.mm ) d left join
                (select derived.mm as month,
                        IF(sum(u.sell_quantity) IS NOT NULL,sum(u.sell_quantity),0) as sell_quantity,
                        IF(sum(u.invest) IS NOT NULL,sum(u.invest),0) as invest,
                        IF(sum(u.earn) IS NOT NULL,sum(u.earn),0) as earn,
                        IF(sum(u.profit) IS NOT NULL,sum(u.profit),0) as profit
                        from
                (SELECT 1 mm UNION ALL SELECT 2 UNION ALL SELECT 3
                UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7
                UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11
                UNION ALL SELECT 12) derived left join add_octane u on derived.mm = month(date) and u.date > LAST_DAY(DATE_SUB(curdate(),INTERVAL 1 YEAR))
                group by derived.mm ) o on d.month=o.month left join (select derived.mm as month,
                IF(sum(u.sell_quantity) IS NOT NULL,sum(u.sell_quantity),0) as sell_quantity,
                IF(sum(u.invest) IS NOT NULL,sum(u.invest),0) as invest,
                IF(sum(u.earn) IS NOT NULL,sum(u.earn),0) as earn,
                IF(sum(u.profit) IS NOT NULL,sum(u.profit),0) as profit
                from (
                SELECT 1 mm UNION ALL SELECT 2 UNION ALL SELECT 3
                UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7
                UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11
                UNION ALL SELECT 12) derived left join add_mobil u on derived.mm = month(date) and u.date > LAST_DAY(DATE_SUB(curdate(),INTERVAL 1 YEAR)) group by derived.mm ) m on d.month=m.month left join
    (select derived.mm as month,IF(sum(u.amount) IS NOT NULL,sum(u.amount),0) as expense from
            (SELECT 1 mm UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12 ) derived left join expense_details u on derived.mm = month(date) and u.date > LAST_DAY(DATE_SUB(curdate(),INTERVAL 1 YEAR)) group by derived.mm ) e on d.month=e.month";
        $result=query($sql);
        confirm($result);
        if(row_count($result)>=1){
            $array=array();

            while($row = fetch_array($result)){
                $details = array("Month"=>$row['month'],"Diesel-Sell-Quantity"=>$row['sell_quantity_diesel'],"Diesel-Invest"=>$row['invest_diesel'],"Diesel-Earn"=>$row['earn_diesel'],"Diesel-Profit"=>$row['profit_diesel'],"Octane-Sell-Quantity"=>$row['sell_quantity_octane'],"Octane-Invest"=>$row['invest_octane'],"Octane-Earn"=>$row['earn_octane'],"Octane-Profit"=>$row['profit_octane'],"Mobil-Sell-Quantity"=>$row['sell_quantity_mobil'],"Mobil-Invest"=>$row['invest_mobil'],"Mobil-Earn"=>$row['earn_mobil'],"Mobil-Profit"=>$row['profit_mobil'],"Expense"=>$row['exp'],"Fuel-Invest"=>((float)$row['invest_diesel']+(float)$row['invest_octane']+(float)$row['invest_mobil']),"Fuel-Earn"=>((float)$row['earn_diesel']+(float)$row['earn_octane']+(float)$row['earn_mobil']),"Fuel-Profit"=>((float)$row['profit_diesel']+(float)$row['profit_mobil']+(float)$row['profit_octane']),"Total-Profit"=>((float)$row['profit_diesel']+(float)$row['profit_mobil']+(float)$row['profit_octane']-(float)$row['exp']));
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
else {
    die(header("HTTP/1.0 404 Not Found")); //Throw an error on failure
}
?>
