<?php
require "../../../viva-project/content/connection.php";

$search_input = $_POST["search_user"];

$query = Database::search("SELECT * FROM `user` INNER JOIN `status` ON `status`.`status_id` = `user`.`user_id`
WHERE `user_firstname` LIKE '" . $search_input . "%' OR `user_lastname` LIKE '" . $search_input . "%' OR `user_email` LIKE '" . $search_input . "%'");
"SELECT * FROM `product` WHERE `product_name` LIKE '" . $search_input . "%' OR `product_title` LIKE '" . $search_input . "%'";
$query_count = $query->num_rows;

for ($i = 0; $i < $query_count; $i++) {
    $query_data = $query->fetch_assoc();
    $user_id = $query_data["user_id"];

?>

    <tr>
        <td><?php echo $query_data["user_firstname"]; ?></td>
        <td><?php echo $query_data["user_lastname"]; ?></td>
        <td><?php echo $query_data["user_email"]; ?></td>
        <td><?php echo $query_data["user_joined_date"]; ?></td>
        <td><?php echo $query_data ["status_type"]; ?></td>
        <td>
            <button type="button" class="btn btn-outline-danger btn-sm button-icon "><i class="fe fe-plus "><a href="user-profile.php?user_id=<?php echo $user_id; ?>"></i>More</a></button>
        </td>
        <td><button type="button" class="btn btn-icon  btn-dark"><i class="fa fa-random" onclick="changestatus('<?php echo $user_id; ?>')"></i></button></td>
        <td><button type="button" class="btn btn-icon  btn-danger" onclick="deleteuser('<?php echo $user_id; ?>')"><i class="fa fa-trash"></i></button></td>

    </tr>

<?php
}
?>