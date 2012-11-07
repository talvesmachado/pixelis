<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles_model extends CI_Model {

	public function get_articles()
	{
		$query = $this->db->get('articles');
		/*$this->db->select('*');
		$this->db->from('articles');
		$this->db->join('files', 'files.nid = articles.nid');
		$query = $this->db->get();*/
		
		return $query->result();
	}
	public function get_articles_image($nid)
	{
		$query = $this->db->get_where('files',array('nid' => $nid));
		return $query->row();
	}
	public function get_article($nid)
	{
		$query = $this->db->get_where('articles', array('nid' => $nid));
		
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
		
		return $query->result();
	}
	public function set_articles($titre, $body, $uid) {
		$data = array('titre' => $titre, 'body' => $body, 'uid'=>$uid);
		$this -> db -> insert('articles', $data);
		return $this->db->insert_id();
	}
	public function add_articles_file($nid, $fileobj) {
		//krumo($fileobj);
		$data = array('nid' => $nid, 'filename' => 	$fileobj['file_name'], 
									 'uri'=>		$fileobj['full_path'], 
									 'filemime'=>	$fileobj['file_type'], 
									 'filesize'=>	$fileobj['file_size'], 
									 'width'=>		$fileobj['image_width'], 
									 'height'=>		$fileobj['image_height']);
		$this -> db -> insert('files', $data);
		return $this->db->insert_id();
	}
}