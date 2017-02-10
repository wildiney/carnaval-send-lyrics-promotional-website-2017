<?php
class Voto_model extends CI_Model {
    public $matricula;
    
    public function votar($idEnredo){
        $this->matricula = $this->session->userdata('matricula');
        $this->db->select();
        $this->db->where('matricula', $this->matricula);
        $query = $this->db->get('votos');

        $data['idEnredo'] = $idEnredo;
        $data['matricula'] = $this->matricula;
        
        if($query->num_rows()>0){
            $this->db->where('matricula',$this->matricula);
            $this->db->update('votos',$data);
        } else {
            $this->db->insert('votos',$data);
        }
        
        redirect("/enredo/votacao/", "refresh");
    }
}
