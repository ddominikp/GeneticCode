<?php
class GeneticCode{
	private $codonTable = array(
										 'U' => array(
										 				  'U' => array(
										 				  					'U' => 'PHE,Fenyloalanina',
										 				  					'C' => 'PHE,Fenyloalanina',
										 				  					'A' => 'LEU,Leucyna',
										 				  					'G' => 'LEU,Leucyna',
										 				  ),
										 				  'C' => array(
										 				  					'U' => 'SER,Fenyloalanina',
										 				  					'C' => 'SER,Fenyloalanina',
										 				  					'A' => 'SER,Fenyloalanina',
										 				  					'G' => 'SER,Fenyloalanina',
										 				  	),
										 				  'A' => array(
										 				  					'U' => 'TYR,Tyrozyna',
										 				  					'C' => 'TYR,Tyrozyna',
										 				  					'A' => 'STOP,Kodon',
										 				  					'G' => 'STOP,Kodon',
										 				  	),
										 				  'G' => array(
										 				  					'U' => 'CYS,Cysteina',
										 				  					'C' => 'CYS,Cysteina',
										 				  					'A' => 'STOP,Kodon',
										 				  					'G' => 'TRP,Tryptofan',
										 				  	)
										 ),
										 'C' => array(
										 				  'U' => array(
										 				  					'U' => 'LEU,Leucyna',
										 				  					'C' => 'LEU,Leucyna',
										 				  					'A' => 'LEU,Leucyna',
										 				  					'G' => 'LEU,Leucyna',
										 				  ),
										 				  'C' => array(
										 				  					'U' => 'PRO,Prolina',
										 				  					'C' => 'PRO,Prolina',
										 				  					'A' => 'PRO,Prolina',
										 				  					'G' => 'PRO,Prolina',
										 				  	),
										 				  'A' => array(
										 				  					'U' => 'HIS,Histydyna',
										 				  					'C' => 'HIS,Histydyna',
										 				  					'A' => 'GLN,Glutamina',
										 				  					'G' => 'GLN,Glutamina',
										 				  	),
										 				  'G' => array(
										 				  					'U' => 'ARG,Arginina',
										 				  					'C' => 'ARG,Arginina',
										 				  					'A' => 'ARG,Arginina',
										 				  					'G' => 'ARG,Arginina',
										 				  	)
										 ),
										 'A' => array(
										 				  'U' => array(
										 				  					'U' => 'ILE,Izoleucyna',
										 				  					'C' => 'ILE,Izoleucyna',
										 				  					'A' => 'ILE,Izoleucyna',
										 				  					'G' => 'MET,Metionina',
										 				  ),
										 				  'C' => array(
										 				  					'U' => 'THR,Treonina',
										 				  					'C' => 'THR,Treonina',
										 				  					'A' => 'THR,Treonina',
										 				  					'G' => 'THR,Treonina',
										 				  	),
										 				  'A' => array(
										 				  					'U' => 'ASN,Asparagina',
										 				  					'C' => 'ASN,Asparagina',
										 				  					'A' => 'LYS,Lizyna',
										 				  					'G' => 'LYS,Lizyna',
										 				  	),
										 				  'G' => array(
										 				  					'U' => 'SER,Seryna',
										 				  					'C' => 'SER,Seryna',
										 				  					'A' => 'ARG,Arginina',
										 				  					'G' => 'ARG,Arginina',
										 				  	)
										 ),
										 'G' => array(
										 				  'U' => array(
										 				  					'U' => 'VAL,Walina',
										 				  					'C' => 'VAL,Walina',
										 				  					'A' => 'VAL,Walina',
										 				  					'G' => 'VAL,Walina',
										 				  ),
										 				  'C' => array(
										 				  					'U' => 'ALA,Alanina',
										 				  					'C' => 'ALA,Alanina',
										 				  					'A' => 'ALA,Alanina',
										 				  					'G' => 'ALA,Alanina',
										 				  	),
										 				  'A' => array(
										 				  					'U' => 'ASP,Kwas asparaginowy',
										 				  					'C' => 'ASP,Kwas asparaginowy',
										 				  					'A' => 'GLU,Glutamina',
										 				  					'G' => 'GLU,Glutamina',
										 				  	),
										 				  'G' => array(
										 				  					'U' => 'GLY,Glicyna',
										 				  					'C' => 'GLY,Glicyna',
										 				  					'A' => 'GLY,Glicyna',
										 				  					'G' => 'GLY,Glicyna',
										 				  	)
										 )
								 );
	private $codons = array();
	private $geneticCode;
	private $nucleotides=array('A', 'G', 'C', 'T', 'U');
	
	function __construct(){
		/*foreach($this->codonTable as $firstNucleotide => $val){
			foreach($val as $secondNucleotide => $val2){
				foreach($val2 as $thirdNucleotide => $val3){
					echo $firstNucleotide.$secondNucleotide.$thirdNucleotide.' => '.$val3."<br />\r\n";
				}
			}
		}*/
	}
	function __destruct(){}
	
	function getGeneticCode(){
		return $this->geneticCode;
	}
	function getCodons(){
		return $this->codons;
	}
	function setGeneticCode($code){
		$code = strtoupper($code);
		if($this->parseCode($code)){
			$this->code = $this->parseCode($code);
		}
	}
	function translateGeneticCode(){
		if(!$this->codons && strlen($this->code)){
			$this->codons = str_split($this->code, 3);
		}
		if(count($this->codons)>0){
			foreach($this->codons as $codon){
				$info = $this->translateCodon($codon);
				$tmp0[] = $codon;
				$tmp[] = $info[0];
				$tmp2[] = $info[1];
			}
			$r['codons'] = implode(" ", $tmp0);
			$r['mini'] = implode(" ", $tmp);
			$r['full'] = implode(", ", $tmp2);
			return $r;
		} else throw new Exception("Brak kodonów!");
	}
	private function translateCodon($codon){
		if(strlen($codon)==3){
			$info = explode(",", $this->codonTable[$codon{0}][$codon{1}][$codon{2}]);
			if(count($info) == 2){
				return $info;
			} else return false;
		} else throw new Exception("Kodon musi składać się z trzech nukleotydów!");
	}
	private function checkNucleotide($nucleotide){
		for($i=0;$i<count($this->nucleotides);$i++){
			if($this->nucleotides[$i] == $nucleotide)
				return true;
		}
		return false;
	}
	private function parseCode($code){
		if(strlen($code)%3 == 0){
			$check = true;
			for($i=0; $i<strlen($code); $i++){
				if($this->checkNucleotide($code{$i})===true){
					$check = true;
				} else{ $check = false; break; }
			}
			if($check==true){
					$code = str_replace('T', 'U', $code);
					$this->codons = str_split($code, 3);
					return $code;
			} else throw new Exception("Kod genetyczny może składać się tylko z adeniny, guaniny, cytozyny, tyminy bądź uracylu.");
		} else throw new Exception("Kod genetyczny musi składać się z kodonów!");
	}
}
?>