<?php
if(isset($_POST["id"]) && !empty($_POST["id"])){

//include database configuration file
//db details
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'shop';

//connect and select db
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

//count all rows except already displayed
$queryAll = mysqli_query($con,"SELECT COUNT(*) as num_rows FROM blog WHERE status=1 AND blog_id < ".$_POST['id']." ORDER BY blog_id DESC");
$row = mysqli_fetch_assoc($queryAll);
$allRows = $row['num_rows'];

$showLimit = 4;

//get rows query
$query = mysqli_query($con, "SELECT * FROM blog WHERE blog_id < ".$_POST['id']." ORDER BY blog_id DESC LIMIT ".$showLimit);

//number of rows
$rowCount = mysqli_num_rows($query);

if($rowCount > 0){ 
    while($row = mysqli_fetch_assoc($query)){ 
        $tutorial_id = $row["blog_id"]; ?>
        <div class="list_item"><a href="javascript:void(0);"><h2><?php echo $row["blog_name"]; ?></h2></a></div>
<?php } ?>
<?php if($allRows > $showLimit){ ?>
    <div class="row show_more_main" id="show_more_main<?php echo $tutorial_id; ?>">
        <span id="<?php echo $tutorial_id; ?>" class="show_more" title="Hiển thị nhiều bài viết hơn nữa">Hiển thị nhiều hơn nữa </span>
        <span class="loding" style="display: none;"><span class="loding_txt">Loading…</span></span>
    </div>
<?php } ?>  
<?php 
    } 
}
?>