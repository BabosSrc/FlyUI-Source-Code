<?php

namespace MulkiAqi192\FlyUI;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;

class main extends PluginBase implements Listener {

	public function onEnable(){

	}

	public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool {

		switch($cmd->getName()){
			case "fly":
			 if($sender instanceof Player){
			 	if($sender->hasPermission("flyui.use")){
			 		$this->openMyForm($sender);
			 	} else {
			 		$sender->sendMessage("§cBuy §6VIP+ §cinstend! uwu");
			 	}
			 }
		}
	return true;
	}

	public function openMyForm($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $player, int $data = null){
			$result = $data;
			if($result === null){
				return true;
			}
			switch($result){
				case 0:
					$player->setAllowFlight(true);
					$Player->sendMessage("§aEnabled! UwU");
				break;

				case 1:
					$player->setAllowFlight(false);
					$player->sendMessage("§cDisabled! UwU");
				break;
			}
		});
		$form->setTitle("§l§eJedi§cMasters");
		$form->setContent("§eToogle §aEnable§e/§cDisable §eFly Mode!");
		$form->addButton("§aEnable Fly");
		$form->addButton("§cDisable Fly");
		$form->sendToPlayer($player);
		return $form;
	}
}