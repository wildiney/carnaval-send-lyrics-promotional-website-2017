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
class User_model extends CI_Model {
    public function addUser($data){
        if($this->db->insert($data)){
            return true;
        }
    }
    
    public function logar($data){
        $this->output->enable_profiler(false);
        $matricula = $data['matricula'];
        
        $nascimento = $data['dataDeNascimento'];
        $cleanNascimento = str_replace(array("/",'.'), array("-"), $nascimento);
        $date = new DateTime($cleanNascimento);
        $dataDeNascimento = $date->format('Y-m-d');
        
        $this->db->select('idUsuario, matricula, dataDeNascimento, nomeCompleto, email');
        $this->db->from('users');
        $this->db->where('matricula', $matricula);
        $this->db->where('dataDeNascimento', $dataDeNascimento);
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if($query->num_rows() == 1){
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function updatedAt($idUsuario){
        $data['idUsuario'] = $idUsuario;
        $data['updated_at'] = date("Y-m-d H:i:s");
        
        $this->db->where('idUsuario',$idUsuario);
        $this->db->update('users',$data);
    }
}
