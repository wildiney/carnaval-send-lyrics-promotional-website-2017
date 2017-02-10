<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_model
 *
 * @author wfpimentel
 */
class Admin_model extends CI_Model {
    public function logar($data){
        $this->output->enable_profiler(false);
        $email = $data['emailAdmin'];
        $password = $data['senhaAdmin'];

        $this->db->select('nomeAdmin, idAdmin, emailAdmin, levelAdmin');
        $this->db->from('admin');
        $this->db->where('emailAdmin', $email);
        $this->db->where('senhaAdmin', $password);
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if($query->num_rows() == 1){
            return $query->result();
        } else {
            return false;
        }
    }
}
