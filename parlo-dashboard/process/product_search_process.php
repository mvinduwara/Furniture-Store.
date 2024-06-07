<?php
require "../../../viva-project/content/connection.php";

$search_input = $_POST["search_input"];


// echo($search_input);
$query =Database::search("SELECT * FROM `product` INNER JOIN `status` ON `status`.`status_id` = `product`.`status_id`
WHERE `product_name` LIKE '" . $search_input . "%' OR `product_title` LIKE '" . $search_input . "%'"); "SELECT * FROM `product` WHERE `product_name` LIKE '" . $search_input . "%' OR `product_title` LIKE '" . $search_input . "%'";
$query_count = $query->num_rows;


for($i = 0; $i < $query_count; $i++){
    $query_data = $query->fetch_assoc();
    $product_id = $query_data["product_id"];

?>

    <tr>
        <td><?php echo $query_data["product_name"]  ?></td>
        <td><?php echo $query_data["product_quantity"]  ?></td>
        <td><?php echo $query_data["product_price"]  ?></td>
        <td><?php echo $query_data["product_datetime_added"] ?></td>
        <td><?php echo $query_data["status_type"]  ?></td>
        <td>
            <button type="button" class="btn btn-danger btn-sm button-icon "><i class="fe fe-plus "><a href="update-product.php?product_id=<?php echo $product_id; ?>"></i>More</a></button>
        </td>
        <td><button type="button" class="btn btn-icon  btn-dark" onclick="changestatusproduct('<?php echo $product_id; ?>')"><i class="fa fa-random"></i></button></td>
        <td><button type="button" class="btn btn-icon  btn-danger" onclick="deleteproduct('<?php echo $product_id; ?>')"><i class="fa fa-trash"></i></button></td>
    </tr>

<?php
}
?>