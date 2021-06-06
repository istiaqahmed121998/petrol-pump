<?php
require_once '../config.php';
if(logged_in()){
    if(isset($_POST['graph'])){
        $sql="select d.month as month,(d.profit+m.profit+o.profit-e.expense) as profit,(d.earn+m.earn+o.earn) as earn, (d.invest+m.invest+o.invest) as invest
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
         (SELECT 1 mm UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12 ) derived left join expense_details u on derived.mm = month(date) and u.date > LAST_DAY(DATE_SUB(curdate(),INTERVAL 1 YEAR)) group by derived.mm ) e on d.month=e.month order by 1 asc ";
        $result=query($sql);
        confirm($result);
        if(row_count($result)>=1){
            $earn=array();
            $profit=array();
            $invest=array();

            while($row = fetch_array($result)){
                $earn[]=array("earn"=>$row['earn']);
                $profit[]=array("profit"=>$row['profit']);
                $invest[]=array("invest"=>$row['invest']);
            }

            $json_data = array(
                "earn"  => $earn,
                "profit"=>$profit,
                "invest"=>$invest
            );

            echo json_encode($json_data);
        }
    }
    if(isset($_POST['today'])){
                $sql="SELECT diesel_stock, octane_stock, mobil_stock from today_stock where id=1";
        $result=query($sql);
        confirm($result);
        if(row_count($result)>=1){
            $row = fetch_array($result);
            $json_data = array(
                "dieselSell"  => $row['diesel_stock'],
                "mobilSell"=>$row['mobil_stock'],
                "OctaneSell"=>$row['octane_stock']
            );

            echo json_encode($json_data);
        }
    }
    if(isset($_POST['yesterday'])){
        $sql="select COALESCE(add_diesel.sell_quantity, '0') as dieselSell,COALESCE(am.sell_quantity, '0') as mobilSell,COALESCE(ao.sell_quantity, '0') as OctaneSell from add_diesel left outer join add_octane ao on add_diesel.date = ao.date left outer join add_mobil am on ao.date = am.date where add_diesel.date='".date("Y-m-d", strtotime("yesterday"))."'";
        $result=query($sql);
        confirm($result);
        if(row_count($result)>=1){
            $row = fetch_array($result);
            $json_data = array(
                "dieselSell"  => $row['dieselSell'],
                "mobilSell"=>$row['mobilSell'],
                "OctaneSell"=>$row['OctaneSell']
            );

            echo json_encode($json_data);
        }
    }
}
else {
    die(header("HTTP/1.0 404 Not Found")); //Throw an error on failure
}
?>