<?php 

    class Site_model extends CI_Model{
        
        public function login($data){
            $this->db->select('*');
            $this->db->from('profesores');
            $this->db->where('user',$data['user']);
            $this->db->where('pass',$data['pass']);

            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->result();
            }else{
                $this->db->select('*');
                $this->db->from('alumnos');
                $this->db->where('user',$data['user']);
                $this->db->where('pass',$data['pass']);

                $queryalumnos = $this->db->get();
                if ($queryalumnos->num_rows() > 0) {
                    return $queryalumnos->result();
                }
                
                return NULL;
                
            }
        }

        public function getAlumnos(){
            $this->db->select('*');
            $this->db->from('alumnos');
            $this->db->where('curso',$_SESSION['curso']);
            $this->db->where('deleted',0);

            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->result();
            }else{
                return NULL;
            }
            
        }
        public function deletealumno($id){

            $array = array(
                'deleted' => 1
            );
            $this->db->where('alumno_id',$id);
            $this->db->update('alumnos',$array);
        }
        public function uploadTareas($data,$archivo=null){
            if ($archivo) {
                $array = array(
                    'nombre'=>$data['nombre'],
                    'descripcion'=>$data['descripcion'],
                    'fecha'=>$data['fecha'],
                    'archivo'=>$archivo,
                    'curso'=>$data['curso'],
                );
            }else{
                $array = array(
                    'nombre'=>$data['nombre'],
                    'descripcion'=>$data['descripcion'],
                    'fecha'=>$data['fecha'],
                    'curso'=>$data['curso'],
                );
            }
            
            $this->db->insert('tareas',$array);
        }
        public function getTareas($curso){
            $this->db->select('*');
            $this->db->from('tareas');
            $this->db->where('curso',$curso);
            $this->db->order_by('fecha','ASC');

            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->result();
            }else{
                return NULL;
            }
        }
    }

?>