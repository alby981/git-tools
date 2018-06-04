<?php

$projects = [
	'<site1folder>',
	'<site2folder>'
];
$baseDir = "/home/alberto/Documents/";
function hard_reset($projects, $baseDir) {
	foreach($projects as $project) {
		chdir("{$baseDir}/{$project}/wp");
		$output = shell_exec('pwd');
		echo "\n\n$output\n\n";
		$output = shell_exec('git reset && git checkout . && git clean -fdx && git checkout development && git pull');
		echo "\n\n$output\n\n";
	}	
}

function create_new_branch($projects, $baseDir, $branch_name) {
	foreach($projects as $project) {
		chdir("{$baseDir}/{$project}/wp");
		if(!empty($branch_name)) {
			$output = shell_exec('git checkout -b '.$branch_name);	
		}	
	}
	
}

function push_changes($projects, $baseDir, $branch_name) {
	foreach($projects as $project) {
		chdir("{$baseDir}/{$project}/wp");
		if(!empty($branch_name)) {
			$output = shell_exec('git push origin '	. $branch_name);	
		}	
	}
}

//create_new_branch($projects, $baseDir, "Feature/plugins");
push_changes($projects, $baseDir, "Feature/plugins");

