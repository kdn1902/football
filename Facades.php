<?php
class Facades
{
	static public function get_commands()
	{
		global $commands;
		ini_set("auto_detect_line_endings", true);
		$file =  fopen ("data.csv","r");
		if ( !$file )
		{
				die("Ошибка открытия файла");
		}
		$data = fgetcsv ($file, 1000, ","); //первая строка
		while ($data = fgetcsv ($file, 1000, ";")) 
		{
			$command = new Command();
			$command->name=$data[0];
			$command->all_games=$data[1];
			$command->all_victories=$data[2];
			$command->all_nichia=$data[3];
			$command->all_porajenia=$data[4];
			list($command->all_zabito, $command->all_propusheno) = explode(" - ", $data[5]);
			$command->power_attack = (3*$command->all_victories + $command->all_nichia) / $command->all_games   * $command->all_zabito / $command->all_games ;
			$command->power_defense = (3*$command->all_porajenia + 2*$command->all_nichia) / $command->all_games * $command->all_propusheno / $command->all_games;
			$commands[] = $command;
		}
		fclose ( $file );	
	}
	
	static public function show_commands()
	{
		global $commands;
		echo "<table class='table table-striped'>";
		echo "<tr><td>#</td><td>Сборная</td><td>Мощность атаки</td><td>Мощность обороны</td></tr>";
		$count = 1;
		foreach ($commands as $command)
		{
			echo "<tr><td>$count</td><td>$command->name</td><td>$command->power_attack</td><td>$command->power_defense</td></tr>";
			$count++;
		}
		echo "</table>";
	}
	
	static public function run()
	{
		global $commands;
		$num_etapov = intval(log(count($commands),2));
		for ($i = 0; $i < $num_etapov; $i++)
		{
			$stadia = intval(count($commands)/2);
			if($stadia > 1)	
				echo "<p class='lead'>1/". $stadia." финала</p>";
			else
				echo "<p class='lead'>Финал!!!</p>";
			$etap = new Etap();
			$etap->show_result();
		}
	}
}