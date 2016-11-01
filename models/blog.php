<?php
/*
*@author: NguyenHiep
*@version: 1.0
*/
class Model_Blog extends Database{
        
        public function __construct(){
            $this->connect();
        }
        public function listBlog($start, $limit){
            $sql[] = "SELECT bl.*, cat.slug AS slugcate,cat.cat_name,";
            $sql[] = "CONCAT_WS(' ',u.firstname,u.lastname) AS author,  u.nickname";
            $sql[] = "FROM blog AS bl LEFT JOIN user AS u USING(user_id)  LEFT JOIN cateblog AS cat USING(cat_id)";
            $sql[] = "WHERE bl.status = '1'";
            $sql[] = "ORDER BY bl.post_on DESC";
            $sql[] = "LIMIT {$start},{$limit}";
            $sql = implode(' ',$sql);
            $this->query($sql);
            return $this->fetchAll(); 
        }
        public function getBlogDetail($pid){
            $sql[] = "SELECT bl.*, cat.slug AS slugcate,cat.cat_name,";
            $sql[] = "CONCAT_WS(' ',u.firstname,u.lastname) AS author,";
            $sql[] = "u.avatart, u.nickname, u.short_instruction, u.share_facebook,";
            $sql[] = "u.share_google, u.share_twitter";
            $sql[] = "FROM blog AS bl LEFT JOIN user AS u USING(user_id)  LEFT JOIN cateblog AS cat USING(cat_id)";
            $sql[] = "WHERE bl.status = '1' AND bl.blog_id = '{$pid}'";
            $sql[] = "ORDER BY bl.post_on DESC";
            $sql = implode(' ',$sql);
            $this->query($sql);
            return $this->fetch();
        }
        public function totalBlog(){
            $sql = "SELECT COUNT(*) AS `count` FROM `blog`";
            $this->query($sql);
            return $this->fetch();
        }
        /* Get category by id and blog cung chuyen muc*/
        public function listBlogCate($cid, $pid="", $start=NULL, $limit=NULL){
            $sql[] = "SELECT bl.*, cat.slug AS slugcate,cat.cat_name, CONCAT_WS(' ',u.firstname,u.lastname) AS author";
            $sql[] = "FROM blog AS bl LEFT JOIN user AS u USING(user_id)  LEFT JOIN cateblog AS cat USING(cat_id)";
            $sql[] = "WHERE bl.status = '1' AND cat.cat_id = '{$cid}'";
            if($pid !=""){
             $sql[] = "AND `blog_id` != '{$pid}' ";   
            }
            $sql[] = "ORDER BY bl.post_on DESC";
            if(($start !=NULL && $limit !=NULL) || ($start== 0 && $limit != NULL )){
                $sql[] = "LIMIT {$start}, {$limit}";
            }
            
            $sql = implode(' ',$sql);

            $this->query($sql);
            return $this->fetchAll(); 
        }
         public function totalCateBlog($catid){
            $sql = "SELECT COUNT(*) AS `count` FROM `blog` WHERE `cat_id` = '{$catid}'";
            $this->query($sql);
            return $this->fetch();
        }
        public function listMostView(){
            $sql[] = "SELECT bl.blog_id, bl.blog_name, bl.slug, bl.view_post, bl.short_content, cat.slug AS slugcate,cat.cat_name, CONCAT_WS(' ',u.firstname,u.lastname) AS author";
            $sql[] = "FROM blog AS bl LEFT JOIN user AS u USING(user_id)  LEFT JOIN cateblog AS cat USING(cat_id)";
            $sql[] = "WHERE bl.status = '1'";
            $sql[] = "ORDER BY bl.view_post DESC";
            $sql[] = "LIMIT 5";
            $sql = implode(' ',$sql);
            $this->query($sql);
            return $this->fetchAll();
        }
        public function getSearchResult($keyword, $start="", $limit = ""){
            $sql[] = "SELECT bl.*, cat.slug AS slugcate,cat.cat_name, CONCAT_WS(' ',u.firstname,u.lastname) AS author";
            $sql[] = "FROM blog AS bl LEFT JOIN user AS u USING(user_id)  LEFT JOIN cateblog AS cat USING(cat_id)";
            $sql[] = "WHERE bl.status = '1'";
            //Begin filter search
            //Neu keyword trung category search theo category
            $sql[] = " AND (bl.blog_name REGEXP '{$keyword}' OR bl.content REGEXP '{$keyword}')";
            //End filter search
            $sql[] = "ORDER BY bl.post_on DESC";
             if(($start !=NULL && $limit !=NULL) || ($start== 0 && $limit != NULL )){
                $sql[] = "LIMIT {$start}, {$limit}";
            }
            $sql = implode(' ',$sql);
            $this->query($sql);
            
            return $this->fetchAll(); 
        }
        public function totalResultSearch($keyword){
            $sql[] = "SELECT COUNT(*) AS count";
            $sql[] = "FROM blog AS bl LEFT JOIN user AS u USING(user_id)  LEFT JOIN cateblog AS cat USING(cat_id)";
            $sql[] = "WHERE bl.status = '1'";
            //Begin filter search
            //Neu keyword trung category search theo category
            $sql[] = " AND (bl.blog_name REGEXP '{$keyword}' OR bl.content REGEXP '{$keyword}')";
            //End filter 
            $sql = implode(' ',$sql);
            $this->query($sql);
            return $this->fetch();
        }
        public function getBlogLightHight(){
            $sql[] = "SELECT bl.*, cat.slug AS slugcate,cat.cat_name, CONCAT_WS(' ',u.firstname,u.lastname) AS author";
            $sql[] = "FROM blog AS bl LEFT JOIN user AS u USING(user_id)  LEFT JOIN cateblog AS cat USING(cat_id)";
            $sql[] = "WHERE bl.status = '1' AND bl.hightlight = '1'";
            $sql[] = "ORDER BY bl.view_post DESC";
            $sql[] = "LIMIT 4";
            $sql = implode(' ',$sql);
            $this->query($sql);
            return $this->fetchAll();
        }
        public function getBlogNew(){
            $sql[] = "SELECT bl.*, cat.slug AS slugcate,cat.cat_name, CONCAT_WS(' ',u.firstname,u.lastname) AS author";
            $sql[] = "FROM blog AS bl LEFT JOIN user AS u USING(user_id)  LEFT JOIN cateblog AS cat USING(cat_id)";
            $sql[] = "WHERE bl.status = '1' AND bl.hightlight = '1'";
            $sql[] = "ORDER BY bl.view_post DESC";
            $sql[] = "LIMIT 4";
            $sql = implode(' ',$sql);
            $this->query($sql);
            return $this->fetchAll();
        }
        //Begin ajax for blog
        //Dem so luong record con lai khi da hien thi so blog
        public function coutBlogMore($blog_id){
            $sql[] = "SELECT COUNT(*) as num_rows";
            $sql[] = "FROM blog AS bl LEFT JOIN user AS u USING(user_id)  LEFT JOIN cateblog AS cat USING(cat_id)";
            $sql[] = "WHERE bl.status=1 AND bl.blog_id < {$blog_id}";
            $sql[] = "ORDER BY bl.blog_id DESC";
            $sql = implode(' ', $sql);
            $this->query($sql);
            return $this->fetch();
        }
        public function getBlogMore($blog_id, $limit){
            $sql[] = "SELECT bl.*, cat.slug AS slugcate,cat.cat_name, CONCAT_WS(' ',u.firstname,u.lastname) AS author";
            $sql[] = "FROM blog AS bl LEFT JOIN user AS u USING(user_id)  LEFT JOIN cateblog AS cat USING(cat_id)";
            $sql[] = "WHERE bl.status = '1' AND bl.blog_id < {$blog_id}";
            $sql[] = "ORDER BY bl.blog_id DESC";
            $sql[] = "LIMIT {$limit}";
            $sql = implode(' ', $sql);
            $this->query($sql);
            return $this->fetchAll();
        }
        // Lấy bài viết liên quan -> Cùng category, khác với bài viết hiện tại
        public function getBlogRelatedPost($cat_id, $blog_id){
            $sql[] = "SELECT bl.blog_id, bl.cat_id, bl.blog_name, bl.slug, cat.slug AS slugcate";
            $sql[] = "FROM blog AS bl LEFT JOIN cateblog AS cat USING(cat_id)";
            $sql[] = "WHERE bl.blog_id <> {$blog_id} AND bl.status = '1' AND bl.cat_id = '{$cat_id}'";
            $sql[] = "ORDER BY bl.blog_id DESC";
            $sql[] = "LIMIT 5";
            $sql   = implode(' ', $sql);
            $this->query($sql);
            return $this->fetchAll(); 
        }
        //Dem so luong record khi limit
        /*public function countBlogMoreLimit(){
            $sql[] = "SELECT *";
            $sql[] = "FROM blog";
            $sql[] = "WHERE blog_id < {$blog_id}";
            $sql[] = "ORDER BY blog_id DESC";
            $sql[] = "LIMIT {$limit}";
            $sql[] = implode(' ', $sql);
            $this->query($sql);
            return $this->fetch();
        }
        */
        //End ajax for blog
        
        public function getNextPostId($blog_id){
            $sql[] = "SELECT bl.blog_id, bl.blog_name, bl.slug, bl.view_post, bl.short_content, cat.slug AS slugcate,cat.cat_name, CONCAT_WS(' ',u.firstname,u.lastname) AS author";
            $sql[] = "FROM blog AS bl LEFT JOIN user AS u USING(user_id)  LEFT JOIN cateblog AS cat USING(cat_id)";
            $sql[] = "WHERE bl.status = '1' AND bl.blog_id > {$blog_id}"; // Important
            $sql[] = "ORDER BY bl.blog_id ASC"; // Important
            $sql[] = "LIMIT 1";
            $sql = implode(' ',$sql);
            $this->query($sql);
            return $this->fetch();
        }
        public function getPrePostId($blog_id){
            $sql[] = "SELECT bl.blog_id, bl.blog_name, bl.slug, bl.view_post, bl.short_content, cat.slug AS slugcate,cat.cat_name, CONCAT_WS(' ',u.firstname,u.lastname) AS author";
            $sql[] = "FROM blog AS bl LEFT JOIN user AS u USING(user_id)  LEFT JOIN cateblog AS cat USING(cat_id)";
            $sql[] = "WHERE bl.status = '1' AND bl.blog_id < {$blog_id}"; // Important
            $sql[] = "ORDER BY bl.blog_id DESC"; // Important
            $sql[] = "LIMIT 1";
            $sql = implode(' ',$sql);
            $this->query($sql);
            return $this->fetch();
        }
}