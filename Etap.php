<?php
class Etap
{
	private $vinners = [];
	private $matches = [];

	public function run_matches($commands)
	{
		$num_matches = intval(count($commands)/2);
		shuffle($commands);
		echo "<table class='table table-striped'>";
		for ($i=0; $i < $num_matches; $i++)
		{
			$this->matches[$i] = Game::get_result($commands[$i*2],$commands[$i*2 + 1]);
			echo "<tr><td>{$this->matches[$i][1]->name}</td><td>{$this->matches[$i][3]->name}</td><td>{$this->matches[$i][0]}</td><td>{$this->matches[$i][2]}</td></tr>";
			if($this->matches[$i][0] > $this->matches[$i][2]) 
				$this->vinners[] = $this->matches[$i][1];
			else
				$this->vinners[] = $this->matches[$i][3];
			
		}
		echo "</table>";
		return $this->vinners;
	}
}