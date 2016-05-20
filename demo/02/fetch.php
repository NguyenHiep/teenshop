<?php

  mysql_connect('localhost','root','');
  mysql_select_db('shop');

  $no = $_POST['getresult'];
  $select = mysql_query("select * from blog limit $no,2");
  while($row = mysql_fetch_array($select))
  {
    echo "<p class='result'>".$row['blog_name']."<br>".$row['content']."</p>";
  }

?>