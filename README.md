# 1. Import database vào host của bạn
# 2. Thay đổi đường dẫn folder trong file.htaccess
ErrorDocument 404 http://teenshop.local/404.html --> Tên domain của bạn
ErrorDocument 500  http://teenshop.local/500.html--> Tên domain của bạn

# 3. Vào thư  viện libraries: 
    Tìm đến file class.php thay đổi các thông số kết nối cơ sở dữ liệu
        protected $_hostname = "localhost";
        protected $_userhost = "root"; --> User host trên live
        protected $_passhost = "root"; --> Pass của database host trên live
        protected $_dbname = "db_giadinhit"; --> Database trên live
# 4. Cấu hình file main.js 
Vị trí file:  templates/frontend/version3/scripts/main.js)
Tìm đến dòng:
   addNofollow('teenshop.local'); Thay teenshop.local bằng tên domain của bạn

# 5. Demo hoàn chỉnh [http://giadinhit.com/](http://giadinhit.com/)