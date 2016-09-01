<?php
class User_model extends CI_Model
{
    //映射数据库的表名
    public static $DB = "blog_user";

    //映射数据库的列
    public static $COL_ID = "user_id";
    public static $COL_NAME = "user_name";
    public static $COL_PWD = "user_pwd";
    public static $COL_DELETE = "user_delete";
    public static $COL_IMG = "user_img";
    public static $COL_EMAIL = "user_email";

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function add($username,$pwd, $user_email){

        $user = array(
            self::$COL_NAME=>$username,
            self::$COL_PWD=>$pwd,
            self::$COL_EMAIL=>$user_email
        );
        $this->db->insert(self::$DB,$user);
        if($this->db->affected_rows()>0){
            return array('rs'=>'success', 'msg' => null);
        }
        log_message('error',$this->db->last_query().'添加用户失败');
        return array('rs'=>'error', 'msg' => "db error");
    }

    public function login($username, $password){
        $this->db->where(array(self::$COL_NAME=>$username));
        $this->db->where(array(self::$COL_PWD=>$password));
        $q = $this->db->get(self::$DB);

        if($q->num_rows() > 0) {
            return array("rs" => "success","data"=>$q->first_row());
        }
        return array("rs" => "error","data"=>null);
    }

}
