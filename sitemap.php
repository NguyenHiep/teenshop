<?php
    require_once "config.php";
    require_once "libraries/class.php";
    header("Content-type: text/xml");
    echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<urlset xmlns="http://www.google.com/schemas/sitemap/0.84" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">

    <url>
        <loc><?php echo BASE_URL;?></loc>
        <lastmod>2016-05-05</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.00</priority>
    </url>

    <url>
        <loc><?php echo BASE_URL;?>huong-dan.html</loc>
        <lastmod>2016-05-05</lastmod>
        <changefreq>never</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?php echo BASE_URL;?>lien-he.html</loc>
        <lastmod>2016-05-05</lastmod>
        <changefreq>never</changefreq>
        <priority>0.5</priority>
    </url>

    <?php
        $sql[] = "SELECT cat.*, COUNT(bl.cat_id) AS sumblog";
        $sql[] = "FROM cateblog AS cat LEFT JOIN  blog AS bl";
        $sql[] = "USING (cat_id)";
        $sql[] = "WHERE cat.status = '1'";
        $sql[] = "GROUP BY cat.cat_id";
        $sql[] = "ORDER BY cat.position ASC, cat.cat_name ASC";
        $sql = implode(' ',$sql);
        $conn = @mysql_connect("localhost", "root","");
        @mysql_select_db("shop");
        $result = mysql_query($sql, $conn);
        $html = "";
        if(mysql_num_rows($result) > 0){
            while($data = mysql_fetch_assoc($result)){
               if($data['slug'] == 'huong-dan' || $data['slug'] == 'lien-he')
                        continue;
                    
                $html .= "
                <url>
                    <loc>".BASE_URL."on-tap/".trim($data['slug'])."-".$data['cat_id'].".html</loc>
                    <changefreq>daily</changefreq>
                    <priority>0.8</priority>
                </url>";
            }
        }
        echo $html;
  ?>

</urlset>