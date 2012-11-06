<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles_model extends CI_Model {

	public function get_articles()
	{
		$query = $this->db->get('articles');
		return $query->result();
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
		$query = $this -> db -> insert('articles', $data);
		return $query;
	}
}