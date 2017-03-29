<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('article_model');
        $this->load->model('comment_model');
        $this->load->model('message_model');
    }

    public function index(){
        $this->load->view('admin_index');
    }
    public function new_blog(){
        $loginedUser = $this->session->userdata('loginedUser');
        $types = $this->article_model->get_types_by_user($loginedUser->user_id);
        $this->load->view('new_blog', array(
            'types' => $types
        ));
    }

    public function post_blog(){
        $title = htmlspecialchars($this->input->post('title'));
        $content = htmlspecialchars($this->input->post('content'));
        $type_id = $this->input->post('type_id');

        $loginedUser = $this->session->userdata('loginedUser');

        $rows = $this->article_model->save_article($title, $content, $type_id, $loginedUser->user_id);
        if($rows > 0){
            redirect('admin/list_blogs');
        }else{
            echo 'fail';
        }
    }

    public function list_blogs(){
        $loginedUser = $this->session->userdata('loginedUser');
        $articles = $this->article_model->get_ariticles_by_user($loginedUser->user_id);
        $this->load->view('list_blogs', array(
            'articles' => $articles
        ));
    }
    public function delete_articles(){
        $ids = $this->input->get('ids');

        $rows = $this->article_model->delete_articles($ids);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
    public function get_comments_to_me(){
        $user_id = $this->session->userdata('loginedUser')->user_id;
        $results = $this->comment_model->get_comment_by_user_id($user_id);
        $this->load->library('pagination');//加载分页类
        $add = 'admin/get_comments_to_me';
        $count = count($results);
        $config = $this->page_config($count,$add);
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['list'] = $this->comment_model->get_comment_limit( $config ['per_page'], $this->uri->segment(3),$user_id);
        /*if($results) {*/
            $this->load->view('blog_comments', $data);
       // }
    }
    function page_config($count, $add) {
        $config ['base_url'] = $add; //设置基地址
        //$config ['uri_segment'] = 3; //设置url上第几段用于传递分页器的偏移量
        $config ['total_rows'] = $count;
        $config ['per_page'] = 2; //每页显示的数据数量
        $config ['first_link'] = '首页';
        $config ['last_link'] = '末页';
        $config ['next_link'] = '下一页>';
        $config ['prev_link'] = '<上一页';
        return $config;
    }
    public function get_blog_by_id(){
        //接数据
        $id = $this->input->get('id');
        $user_id = $this->session->userdata('loginedUser')->user_id;
        //调用model
        $results = $this->article_model->get_ariticles_by_user($user_id);
        $article_comment = $this->comment_model->get_comment_by_articlid($id);
        $prevArticle = null;
        $nextArticle = null;
        //$row = $this->article_model->get_blog_by_id($id);
        foreach($results as $index=>$result){
            if($id == $result->article_id){
                $row = $result;
                if($index>0){
                    $prevArticle = $results[$index-1];
                }
                if($index<count($results)-1){
                    $nextArticle = $results[$index+1];
                }
                break;
            }
        }
        if($row){
            $this->load->view('view_post',array(
                'row'=>$row,
                'prevArticle'=>$prevArticle,
                'nextArticle'=>$nextArticle,
                'article_comment'=>$article_comment
            ));
        }else{
            echo 'fail';
        }

    }

    public function save_comment(){
        $id = $this->input->post('id');
        $content = $this->input->post('content');
        $user_id = $this->session->userdata('loginedUser')->user_id;
        $rows = $this->comment_model->save_comment($id,$content,$user_id);
        if($rows >0){
            redirect("admin/get_blog_by_id?id=$id");
        }else{
            echo 'fail';
        }
    }
    public function delete_comment(){
        $comment_id = $this->input->get('comment_id');
        $row = $this->comment_model->delete_comment($comment_id);
        if($row>0){
            redirect('admin/get_comments_to_me');
        }else{
            echo 'fail';
        }
    }
    public function delete_comment_by_commentUser(){
        $commentUser = $this->input->get('commentUser');
        $user_id = $this->session->userdata('loginedUser')->user_id;
        $row = $this->comment_model->delete_comment_by_commentUser($commentUser,$user_id);
        if($row>0){
            redirect('admin/get_comments_to_me');
        }else{
            echo 'fail';
        }
    }
   public function get_article_type(){
       $user_id=$this->session->userdata('loginedUser')->user_id;
       $type_id = $this->input->get('type_id');
       $row = $this->article_model->get_article_type($type_id);
       $results = $this->article_model->get_types_by_user($user_id);
       if($row){
           $this->load->view('edit_catalog',array(
               'row'=>$row,
               'results'=>$results
           ));
       }else{
           echo 'fail';
       }
   }
    public function update_type(){
        $type_id = $this->input->post('type_id');
        $type_name = $this->input->post('type_name');
        $row = $this->article_model->update_type($type_id,$type_name);
        if($row){
            redirect('admin/get_blog_type');
            //echo 'ssssssssss';
        }else{
            echo 'fail';
        }
    }
    public function get_blog_type(){
        //$type = $this->input->post('type');
        $loginedUser = $this->session->userdata('loginedUser');
        /*if(!empty($type)) {
            $this->article_model->save_types($type, $loginedUser->user_id);
        }*/
        $articles = $this->article_model->get_types_by_user($loginedUser->user_id);
        $this->load->view('blog_catalogs',array(
            'articles'=>$articles
        ));
    }
    public function save_blog_type(){
        $user_id = $this->session ->userdata('loginedUser')->user_id;
        $type = $this->input->post('type');
        $row = $this->article_model->save_types($type, $user_id);
        if($row){
           /* $articles = $this->article_model->get_types_by_user($loginedUser->user_id);
            $this->load->view('blog_catalogs',array(
                'articles'=>$articles
            ));*/
            redirect('admin/get_blog_type');
        }
    }
    public function delete_article_type(){
        $type_id = $this->input->get('type_id');
        $row = $this->article_model->delete_article_type($type_id);
        if($row){
            redirect('admin/get_blog_type');
        }
    }
    public function inbox(){
        $user_id = $this->session->userdata('loginedUser')->user_id;
        $results = $this->message_model->get_inbox($user_id);
        $this->load->view('inbox',array(
            'results'=>$results
        ));
    }
    public function delete_message(){
        $msg_id = $this->input->get('msg_id');
        $row = $this->message_model->delete_message($msg_id);
        if($row){
            redirect('admin/inbox');
        }
    }
    public function outbox(){
        $sender = $this->session->userdata('loginedUser')->user_id;
        $results = $this->message_model->get_outbox($sender);
        $this->load->view('outbox',array(
            'results'=>$results
        ));
    }
}