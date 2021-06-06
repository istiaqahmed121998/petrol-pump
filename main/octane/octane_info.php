<?php
require_once '../config.php';
if(logged_in()){
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $sql= "SELECT id,date, time, m.manager_name,add_octane.shift ,prev_stock, new_stock, total_stock, sell_quantity, buy_rate, invest, sell_rate, earn,profit from add_octane inner join managerinfo m on add_octane.manager = m.manager_id ORDER BY date desc limit 100";
        $result= query($sql);
        confirm($result);

        if(row_count($result)>=1){
            $array=array();

            while($row = fetch_array($result)){
                $diesel = array("Date"=>$row['date'], "TIME"=>$row['time'], "Manager"=>$row['manager_name'],"Shift"=>$row['shift'],"Previous-Stock"=>$row['prev_stock'],"New-Stock"=>$row['new_stock'],"Total-Stock"=>$row['total_stock'],"Sell-Quantity"=>$row['sell_quantity'],"Buying-Rate"=>$row['buy_rate'],"Investment"=>$row['invest'],"Sell-Rate"=>$row['sell_rate'],"Earn"=>$row['earn'],"Profit"=>$row['profit'],"Edit"=>$row['id']);
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
        return;
    }
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['date']) && isset($_POST['time']) && isset($_POST['shift']) && isset($_POST['prevStock']) && isset($_POST['newStock']) && isset($_POST['totalStock']) && isset($_POST['sellQuantity']) && isset($_POST['buyRate']) && isset($_POST['investment']) && isset($_POST['sellRate']) && isset($_POST['profit']) && isset($_POST['earn']) && isset($_POST['investment'])){
            $sql = "INSERT INTO add_octane (date, time,shift, prev_stock, new_stock, total_stock, sell_quantity, buy_rate, invest, sell_rate, profit, earn, manager)
VALUES ('" . clean($_POST["date"]) . "','" . clean($_POST["time"]) . "','" . clean($_POST["shift"]) . "','" . clean($_POST["prevStock"]) . "','" . clean($_POST["newStock"]) . "','" . clean($_POST["totalStock"]) . "','" . clean($_POST["sellQuantity"]) . "','" . clean($_POST["buyRate"]) . "','" . clean(roundUp($_POST["investment"])) . "','" . clean($_POST["sellRate"]) . "','" . clean(roundUp($_POST["profit"])) . "','" . clean(roundUp($_POST["earn"])) . "','" . clean($_POST["manager"]) . "')";
            $result= query($sql);
            confirm($result);
        }
        elseif (isset($_POST['id']) && isset($_POST['managerEdit']) && isset($_POST['shiftEdit']) && isset($_POST['prevStockEdit']) && isset($_POST['newStockEdit']) && isset($_POST['totalStockEdit']) && isset($_POST['sellQuantityEdit']) && isset($_POST['buyRateEdit']) && isset($_POST['investmentEdit']) && isset($_POST['sellRateEdit']) && isset($_POST['earnEdit']) && isset($_POST['profitEdit'])){
            $sql = "UPDATE add_octane SET manager = '" . clean($_POST["managerEdit"]) . "',shift = '" . clean($_POST["shiftEdit"]) . "',prev_stock = '" . clean($_POST["prevStockEdit"]) . "',new_stock='" . clean($_POST["newStockEdit"]) . "',total_stock='" . clean($_POST["totalStockEdit"]) . "',sell_quantity='" . clean($_POST["sellQuantityEdit"]) . "',buy_rate='" . clean($_POST["buyRateEdit"]) . "',invest='" . clean(roundUp($_POST["investmentEdit"])) . "', sell_rate='" . clean($_POST["sellRateEdit"]) . "',earn='" . clean(roundUp($_POST["earnEdit"])) . "',profit='" . clean(roundUp($_POST["profitEdit"])) . "' where id='" . clean($_POST["id"]) . "'";
            $result = query($sql);
            confirm($result);
        }
        elseif (isset($_POST['id']) && isset($_POST['edit'])){
            $sql = "SELECT * from add_octane where id='" . clean($_POST['id']) . "'";
            $result = query($sql);
            confirm($result);
            $row = fetch_array($result);
            $json_data = array("id" => $row['id'], "shift"=>$row['shift'],"Date" => $row['date'], "TIME" => $row['time'], "Manager" => $row['manager'], "Previous-Stock" => $row['prev_stock'], "New-Stock" => $row['new_stock'], "Total-Stock" => $row['total_stock'], "Sell-Quantity" => $row['sell_quantity'], "Buying-Rate" => $row['buy_rate'], "Investment" => $row['invest'], "Sell-Rate" => $row['sell_rate'], "Earn" => $row['earn'], "Profit" => $row['profit'], "Edit" => $row['id']);
            echo json_encode($json_data);
        }
        elseif(isset($_POST['id']) && isset($_POST['delete'])){
            $sql="DELETE FROM add_octane where id='".clean($_POST["id"])."'";
            $result= query($sql);
            confirm($result);
        }

        else{
            die(header("HTTP/1.0 422 Not Found"));
        }
    }
}
else {
    die(header("HTTP/1.0 404 Not Found")); //Throw an error on failure
}
?>