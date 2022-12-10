<?php
include('koneksi.php');
if($_POST["query"] != '') {
    $search_array = explode(",", $_POST["query"]); 
    $search_text = "'" . implode("', '", $search_array) . "'";
    $query = $conn->query("SELECT * FROM mahasiswa WHERE prodi IN (".$search_text.") ORDER BY nim DESC");
}else{
    $query = $conn->query("SELECT * FROM mahasiswa ORDER BY nim DESC");
}
$total_row = mysqli_num_rows($query);
$output = '';
if($total_row > 0)
{
    while ($row = $query ->fetch_object()) {

        $output .= '
        <tr>
            <td>'.$row->nim.'</td>
            <td>'.$row->nama.'</td>
            <td>'.$row->prodi.'</td>
        </tr>';
    }
}else{
    $output .= '
    <tr>
        <td colspan="5" align="center">No Data Found</td>
    </tr>
    ';
}
echo $output;
?>