<?php 
class Game
{
	public $firstCommand;
	public $secondCommand;
	
	public function __construct($first, $second)
	{
		$this->firstCommand = $first;
		$this->secondCommand = $second;
		$this->get_result();
	}
	
	public function get_result()
	{
		do{
			$zabito = intval(($this->firstCommand->power_attack + $this->secondCommand->power_defense) * rand(3,7)/10);
			$propuscheno = intval(($this->firstCommand->power_defense + $this->secondCommand->power_attack) * rand(3,7)/10);
		} 
		while($zabito == $propuscheno);
		return [$zabito, $this->firstCommand, $propuscheno, $this->secondCommand];
	}
	
	
}