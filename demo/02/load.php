<html>
<head>
<link rel="stylesheet" type="text/css" href="load_style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  $("#load").click(function(){
    loadmore();
  });
});

function loadmore()
{
  var val = document.getElementById("result_no").value;
  $.ajax({
  type: 'post',
  url: 'fetch.php',
  data: {
    getresult:val
  },
  success: function (response) {
    var content = document.getElementById("result_para");
    content.innerHTML = content.innerHTML+response;

    // We increase the value by 2 because we limit the results by 2
    document.getElementById("result_no").value = Number(val)+2;
  }
  });
}
</script>

</head>

<body>

  <center>
    <p id="heading">Load More Results From Database Using Ajax,jQuery,PHP and MySQL</p>
    <div id="content">
    <div id="result_para">
      <?php
        mysql_connect('localhost','root','');
        mysql_select_db('shop');

        $select = mysql_query("select * from blog limit 0,2");
        while($row = mysql_fetch_array($select))
        {
          echo "<p class='result'>".$row['blog_name']."<br>".$row['content']."</p>";
        }
      ?>
 
      // We set the initial value 2 because we want only 2 results at a time
      <input type="hidden" id="result_no" value="2">
      <input type="button" id="load" value="Load More Results">
    </div>
    </div>
  </center>

</body>
</html>