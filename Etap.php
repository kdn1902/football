<?php
class Etap
{
	private $vinners = [];
	private $matches = [];
	
	public function __construct()
	{
		global $commands;
        $this->run_matches();
		$this->get_vinners();
	}

	protected function run_matches()
	{
		global $commands;
		$num_matches = intval(count($commands)/2);
		shuffle($commands);
		for ($i=0; $i < $num_matches; $i++)
		{
			$match = new Game($commands[$i*2],$commands[$i*2 + 1]);
			$this->matches[$i] = $match->get_result();
		}
		
	}
	
	private function get_vinners()
	{
		global $commands;
		foreach ($this->matches as $match)
		{
			if($match[0] > $match[2]) 
				$this->vinners[] = $match[1];
			else
				$this->vinners[] = $match[3];
		}
		$commands = $this->vinners;
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