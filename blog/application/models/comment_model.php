<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model{
    public function get_comment_by_articlid($article_id){
        $sql = "select c.*,u.username from t_comment c,t_user u where c.user_id = u.user_id and article_id=$article_id";
        return $this->db->query($sql)->result();
    }
    public function save_comment($id,$content,$user_id){
        $this->db->insert('t_comment',array(
            'article_id' => $id,
            'content' =>$content,
            'user_id' => $user_id
        ));
            return $this->db->affected_rows();
   }
    public function get_comment_by_user_id($user_id){
       //$sql = "select a.title,u.username,p.* from t_article a,t_comment p,t_user u where a.article_id=p.article_id and a.user_id=u.user_id and a.user_id = $user_id";
        $sql = "select c.*,a.title,u.username from t_comment c,t_article a,t_user u where a.article_id=c.article_id and c.user_id=u.user_id and a.user_id=$user_id";
        return $this->db->query($sql)->result();
    }
    public function delete_comment($comment_id){
        $this->db->delete('t_comment',array(
            'comm_id'=>$comment_id
        ));
        return $this->db->affected_rows();
    }
    public function delete_comment_by_commentUser($commentUser,$user_id){
        $sql="delete  from t_comment where user_id=$commentUser and article_id in(select t_article.article_id from t_article where t_article.user_id=$user_id) ";
        //select t_article.article_id from t_article where user_id=$user_id
        //select * from t_comment where user_id=$commentUser and article_id
        $this->db->query($sql);
        return  $this->db->affected_rows();
    }
    public function get_comment_limit($n,$o,$user_id) {
        if($o==''){$o=0;}
        $sql = "select c.*,a.title,u.username from t_article a,t_comment c,t_user u where c.user_id = u.user_id and c.article_id = a.article_id and a.user_id = $user_id limit $o,$n";
        $result = $this->db->query ($sql);
        $re = $result->result ();
        return $re;
    }
}