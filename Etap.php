<?php
class Etap
{
	private $vinners = [];
	private $matches = [];

	public function __construct($commands)
	{
        $this->run_matches($commands);
	}

	protected function run_matches($commands)
	{
		$num_matches = intval(count($commands)/2);
		shuffle($commands);
		for ($i=0; $i < $num_matches; $i++)
		{
			$this->matches[$i] = Game::get_result($commands[$i*2],$commands[$i*2 + 1]);
		}
		
	}
	
	public function get_vinners()
	{
		foreach ($this->matches as $match)
		{
			if($match[0] > $match[2]) 
				$this->vinners[] = $match[1];
			else
				$this->vinners[] = $match[3];
		}
		return $this->vinners;
	}

	
	public function show_result()
	{
		echo "<table class='table table-striped'>";
		foreach ($this->matches as $match)
		{
			echo "<tr><td>{$match[1]->name}</td><td>{$match[3]->name}</td><td>$match[0]</td><td>$match[2]</td></tr>";
		}
		echo "</table>";
	}
}