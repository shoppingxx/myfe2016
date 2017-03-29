<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Message_model extends CI_Model{
    public  function get_inbox($user_id){
        $sql = "select m.*,u.username from t_message m,t_user u where m.sender=u.user_id and m.receiver=$user_id";
        return $this->db->query($sql)->result();
    }
    public function delete_message($msg_id){
        $sql = "delete from t_message where msg_id=$msg_id";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function get_outbox($sender){
        $sql = "select u.username,m.* from t_message m,t_user u where u.user_id=m.receiver and m.sender=$sender";
        return $this->db->query($sql)->result();
    }
}