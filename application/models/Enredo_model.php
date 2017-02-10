<?php

class Enredo_model extends CI_Model {
    
    public function addEnredo($data){
        if($this->db->insert('enredos', $data)){
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    
    public function listAllPending(){
        $this->db->select();
        $this->db->from('enredos');
        $this->db->join('users','enredos.matricula = users.matricula' );
        $this->db->where('status',null);
        $this->db->order_by('enredos.created_at','desc');
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function listApproved(){
        $this->db->select(
                  'enredos.matricula as e_matricula, enredos.idEnredo as e_idEnredo, enredos.tituloEnredo as e_tituloEnredo, enredos.compositor as e_compositor, enredos.enredo as e_enredo, enredos.created_at as e_created_at, enredos.imagemIlustrativa as imagem, '
                . 'users.cidade as u_cidade, users.matricula as u_matricula, '
                . 'votos.idVoto as v_idVoto, votos.idEnredo as v_idEnredo, votos.matricula as v_matricula, '
                . '((SELECT COUNT(votos.idEnredo) FROM votos WHERE votos.idEnredo=enredos.idEnredo)) as total'
                );
        $this->db->from('enredos');
        $this->db->join('users','enredos.matricula = users.matricula' );
        $this->db->join('votos','votos.idEnredo = enredos.idEnredo','left' );
        $this->db->where('status',1);
        $this->db->group_by('e_idEnredo');
        $this->db->order_by('enredos.created_at','desc');
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function changeStatus($idEnredo, $status){
        $data['status'] = $status;
        $this->db->where('idEnredo',$idEnredo);
        $query = $this->db->update('enredos',$data);
        
        if($query){
            return true;
        } else {
            return false;
        }
    }
}
