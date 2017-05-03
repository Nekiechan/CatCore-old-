<?php

namespace ExamplePlugin;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

class MainClass extends PluginBase implements Listener{

	public function onLoad(){
		$this->getLogger()->info(TextFormat::BLUE . "[CatCraft]: Core Enabled!");
	}

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new BroadcastPluginTask($this), 120);
		$this->getLogger()->info(TextFormat::DARK_GREEN . "[CatCraft]: Enabled!");
		@mkdir($this->getDataFolder());
$config = new Config ($this->getDataFolder() . "config.yml" , Config::YAML);
    }

	public function onDisable(){
		$this->getLogger()->info(TextFormat::DARK_RED . "[CatCraft]:Disabled!");
	}
public $stafflist=array("Staff");
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){

			case "cathelp":
                        $sender->sendMessage("§0[§9CatCraft§0]§f§l Showing help Pg 1 of 2:");
$sender->sendMessage("§0[§9CatCraft§0]§f§l /hub - - - - warp to main spawn!");
$sender->sendMessage("§0[§9CatCraft§0]§f§l /wpoff - - - - turn Walking Particles off!");
$sender->sendMessage("§0[§9CatCraft§0]§f§l /wpon - - - - turn Walking Particles on!");
$sender->sendMessage("§0[§9CatCraft§0]§f§l /wppack [pack] - - - - try a Walking Particles pack!");
$sender->sendMessage("§0[§9CatCraft§0]§f§l /warp [warp] - - - - warp usage (leave args blank to list warps)!");
$sender->sendMessage("§0[§9CatCraft§0]§f§l /catstaff!");
				return true;
                    if($arg[0] == "2"){
			$sender->sendMessage("§0[§9CatCraft§0]§f§l Showing help Pg 2 of 2:");
return true;
}
case "staff":
$sender->sendMessage("§7-------------=§cHelp§7=-------------");
$sender->sendMessage("§f/staff <help|add|remove|list>");
$sender->sendMessage("§f/staff help §o§a- Shows Staff help!");
$sender->sendMessage("§f/staff add <player> §o§a- adds Player to staff!");
$sender->sendMessage("§f/staff remove <player> §o§a- removes a Player from staff!");
$sender->sendMessage("§f/staff list §o§a- Lists all Players on staff!");
$sender->sendMessage("§7-------------=§cHelp§7=-------------");
if(count($args) == null){
						$sender->sendMessage("§9[§cStaffy§9]:§c need help? do §a[/staff-help]§c!");
						return true;
					}
if($args[0]=="add"){
$sender->sendMessage("§9[§cStaffy§9]:§7 Added:§l§f " . $args[1] . " §r§7To the Staff list!");
return true;
}
if($args[0]=="help"){
$sender->sendMessage("§7-------------=§cHelp§7=-------------");
$sender->sendMessage("§f/staff <help|add|remove|list>");
$sender->sendMessage("§f/staff help §o§a- Shows Staff help!");
$sender->sendMessage("§f/staff add <player> §o§a- adds Player to staff!");
$sender->sendMessage("§f/staff remove <player> §o§a- removes a Player from staff!");
$sender->sendMessage("§f/staff list §o§a- Lists all Players on staff!");
$sender->sendMessage("§7-------------=§cHelp§7=-------------");
return true;
}
if($args[0]=="list"){
$sender->sendMessage("§9[§cStaffy§9]:§7 Staff: " . $stafflist[0] . " , " . $stafflist[1] . " , " . $stafflist[2] . " , " . $stafflist[3] . " , " . $stafflist[4] . " , " . $stafflist[4] . " , " . stafflist[5] . " !");
return true;
}
if($args[0]=="remove"){
return false;
}
return true;

case "score":
		 $sender->sendMessage("§0[§9CatCraft§0]§f§l W.I.P!" );
		 return true;
			default:
				return false;
		}
	}

	/**
	 * @param PlayerRespawnEvent $event
	 *
	 * @priority        NORMAL
	 * @ignoreCancelled false
	 */
	public function onSpawn(PlayerRespawnEvent $event){
		Server::getInstance()->broadcastMessage($event->getPlayer()->getDisplayName() . " Welcome to §l§9CatCraft! §r§fDo (/cathelp) for CatCraftApi Commands!");
	}
}
