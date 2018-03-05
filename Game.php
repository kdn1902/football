<?php 
class Game
{
	static public function get_result($first, $second)
	{
		do{
			$zabito = intval(($first->power_attack + $second->power_defense) * rand(3,7)/10);
			$propuscheno = intval(($first->power_defense + $second->power_attack) * rand(3,7)/10);
		} 
		while($zabito == $propuscheno);
		return [$zabito, $first, $propuscheno, $second];
	}
}