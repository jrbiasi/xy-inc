<?php 
class Poi{
	private $db;
	private $nome;
	private $x = null;
	private $y = null;
	private $dis = null;	
	
	public function __construct() {
		$this->db = DB::getInstance();
	}
	
	public function listarPois() {
		$this->db->executeSql("SELECT * FROM pois ORDER BY id ASC");
		return $this->db->fetchAll();
	}
	
	public function proxiPoi($x, $y, $dis) {
		if(preg_match( '/^[1-9][0-9]*$/' ,$x) && preg_match( '/^[1-9][0-9]*$/' ,$y) && preg_match( '/^[1-9][0-9]*$/' ,$dis)) {
			$this->db->executeSql("SELECT * FROM pois ORDER BY id ASC");
			$rows = $this->db->fetchAll(); 
			if(count($rows) > 0) {
				foreach ($rows as $row){
					if(abs($row['cor_x'] - $x) + abs($row['cor_y'] - $y) <= $dis) {
						echo $row['nome']."</br>";
					}
				}
			} else {
				echo 'Nenhum POI encontrado.';
			}
		} else {
			echo 'Permitido somente números inteiros.';
		}
	}
	
	public function cadastrarPois($nome, $x, $y) {
			$values = array(
				':nome' => $nome,
				':cor_x' => $x,
				':cor_y' => $y,
			);			
			try {
				$this->db->executeSql("INSERT INTO pois (nome,cor_x,cor_y) VALUES (:nome,:cor_x,:cor_y)", $values);
			} catch (Exception $e) {
				echo 'Erro: ',  $e->getMessage(), "\n";
			}	
			
			echo 'Registro inserido com sucesso.';
	}
    
}