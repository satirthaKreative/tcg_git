<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Archetype_View extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function my_archetype_view_new($data_id)
	{
		$Query_Data = $this->db->select('*')
     				->from('archetype_category as t1')
     				->join('archetype_name as t2', 't1.id = t2.a_id', 'INNER')
                         ->join('format_tbl as t3', 't1.f_id = t3.id', 'INNER')
                         ->where('t3.id',$data_id)
     				->get();
     	if($Query_Data->num_rows() > 0 )
     	{
     		return $Query_Data->result();
     	}
     	else
     	{
     		return false;
     	}
	}

     public function my_archetype_view()
     {
          $Query_Data = $this->db->select('*')
                         ->from('archetype_category as t1')
                         ->join('archetype_name as t2', 't1.id = t2.a_id', 'INNER')
                         ->get();
          if($Query_Data->num_rows() > 0 )
          {
               return $Query_Data->result();
          }
          else
          {
               return false;
          }
     }

}

/* End of file my_archetype_view.php */
/* Location: ./application/models/my_archetype_view.php */