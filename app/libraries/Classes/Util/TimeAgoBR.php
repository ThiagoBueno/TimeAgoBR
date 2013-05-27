<?php
namespace Classes\Util;

class TimeAgoBR{

  public static function rData($date){

  	if(empty($date)) {

			return "sem data informada";

		}

		$periods = array("segundo", "minuto", "hora", "dia", "semana", "mês", "ano", "decada");

		$lengths = array("60","60","24","7","4.35","12","10");

		$now = time();

		$unix_date = strtotime($date);

		//Verificar a validade da data
		if(empty($unix_date)) {

			return "data inválida";

		}
		
		//data futura ou data passada
		if($now > $unix_date) {

			$difference = $now - $unix_date;
			$tense = "atrás";

		}else{

			$difference = $unix_date - $now;
			$tense = "agora";
		}

		for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {

			$difference /= $lengths[$j];
			
		}

		$difference = round($difference);

		if($difference != 1) {

			if($periods[$j]=="mês"){

				//modificar para "meses"
				$periods[$j]= "meses";

			}else{

				$periods[$j].= "s";

			}

		}

		return "$difference $periods[$j] {$tense}";

	}
}
