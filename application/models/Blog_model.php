<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2016/8/31
 * Time: 9:06
 */
class Blog_model extends CI_Model{

    //映射数据库的表名
    public static $DB = "blog";

    //映射数据库的列
    public static $COL_ID = "blog_id";
    public static $COL_TITLE = "blog_title";
    public static $COL_CONTENT = "blog_content";
    public static $COL_DELETE = "blog_delete";
    public static $COL_CLASS= "blog_class";
    public static $COL_TIME = "blog_updatetime";
    public static $COL_UID = "blog_uid";

    public static $PAGE_SIZE = 2;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add($title,$content, $blog_class){
        if(!isset($_SESSION["user"])){
            return array('rs'=>'error', 'msg' => "need login");
        }
        $blog = array(
            self::$COL_TITLE=>$title,
            self::$COL_CONTENT=>$content,
            self::$COL_CLASS=>$blog_class,
            self::$COL_DELETE=>0,
            self::$COL_TIME =>time(),
            self::$COL_UID=>$_SESSION["user"]["uid"]
        );
        $this->db->insert(self::$DB,$blog);
        if($this->db->affected_rows()>0){
            return array('rs'=>'success', 'msg' => null);
        }
        log_message('error',$this->db->last_query().'添加文章失败');
        return array('rs'=>'error', 'msg' => "db error");
    }

    public function findByClass($class){
        $this->db->where(array(self::$COL_CLASS=>$class));
        $q = $this->db->get(self::$DB);
         return  $this->objarray_to_array($q->result());
    }

    public function findByUser($uid){
        $start = 0;
        if(isset($_GET["per_page"])){
            $start = $_GET["per_page"] - 1;
        }
        $this->db->where(array(self::$COL_UID=>$uid));
        $this->db->where(array(self::$COL_DELETE=>0));
        $total = $this->db->count_all_results(self::$DB,FALSE);
        $this->db->limit(self::$PAGE_SIZE,$start*self::$PAGE_SIZE);
        $q = $this->db->get();
         return array("rs"=>"success","data"=> $this->objarray_to_array($q->result()),'total'=>$total,'page_size'=>self::$PAGE_SIZE);
    }

    //将对象数组转换成普通数组
    public function objarray_to_array($obj) {
        $ret = array();
        if($obj == null){
            return $ret;
        }
        foreach ($obj as $key => $value) {
            if (gettype($value) == "array" || gettype($value) == "object"){
                $ret[$key] =  $this->objarray_to_array($value);
            }else{
                $ret[$key] = $value;
            }
        }
        return $ret;
    }
}
