<?php 
    class User extends CI_Model
    {
       
        // public function getUsers()
            // {
            //     $this->db->get('');

                // $query = $this->db->query("SELECT * FROM  users");

                // $consulta = $query->result_array();

            //     foreach ($consulta as $key => $value) {
            //         $as = $value;
            //         // debug($as);
            //         $val = $as['name'];
            //         // debug($val);
            //     }
            //     return $consulta;

            //     // //me trae segun la posicion por ej 1
            //     // $row = $query->row(1, 'Users');
            //     // // debug($row);
            //     // return $row->name; // access attributes
            //     // return $row->id;
            
        // }
        
        public function consultaUsers($consulta = '')
        {
            $result = $this->db->query("SELECT * FROM  registro WHERE nSerie = '" . $consulta . "' ");
            
            if ($result->num_rows() > 0) {
                return $result->result_array();
            } else {
                return null;
            }
               
            
        }

        public function dregistro($usuario = ''){
            $result = $this->db->query("SELECT * FROM  registro WHERE email = '" . $usuario . "' ");
            
            if ($result->num_rows() > 0) {
                return $result->row_array();
            } else {
                return null;
            }
        }

    
        
    }



?>