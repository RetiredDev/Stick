<?php

namespace MightyStick;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\entity\Effect;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;


class Main extends PluginBase implements Listener {
	
	public function onEnable() {
		
		$this->saveDefaultConfig();
		$this->getServer()->getLogger()->notice("MightyStick has been enabled!");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		
	}
	
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {
		
		if(strtolower($command->getName()) === "stick") {
			
			if(count($args) < 1) {
			
				$sender->sendMessage("§cPlease use: /stick <player>");
				return true;
			 
			}
			if($sender->hasPermission("stick.cmd") || $sender->isOp()){
				
				if(isset($args[0])) {
				
					$player = $sender->getServer()->getPlayer($args[0]);

									
							$stick = Item::get(Item::LEVER, 2, 1);
							$stick->setCustomName(TF::RESET . TF::BOLD . TF::YELLOW . "Mighty Stick" . TF::RESET . TF::GRAY . " (Tap anywhere)" . PHP_EOL . PHP_EOL . 
							TF::DARK_GRAY . " *" . TF::AQUA . " Chance to get: " . PHP_EOL .
							TF::DARK_GRAY . " *" . TF::GRAY . "Effects");
							
							$player->getInventory()->addItem($stick);
							
							break;
							
						}
					}
				}
			}
			
			if(!$sender->hasPermission("stick.cmd")) {
				
				$sender->sendMessage("§cYou don't have permission to use this command.");
				
			}
			
			else {
				
				$sender->sendMessage("§aSuccessfully added the Mighty Stick.");
				
			}
		}
		
		return true;
		
	}
	
	public function onInteract(PlayerInteractEvent $event) {
		
		$player = $event->getPlayer();
		
		if($event->getItem()->getId() === 69) {
		
		if($event->getItem()->getDamage() === 2) {
				
				$random = (mt_rand(1, 5)
				
	switch($random) {
				
				case 1:
				
				$stick = Item::get(Item::LEVER, 2, 1);
   
				foreach($this->getConfig()->get("first-stick") as $effects) {
				
				$player->addEffect(Effect::get($effects, mt_rand($this->getConfig()->get("effect-min"), $this->getConfig()->get("effect-max"))));
				
				$player->addTitle("§aUsed §eMighty Stick");
				$player->getInventory()->removeItem($stick);
				
				break;
				
				case 2:
				
				$stick = Item::get(Item::LEVER, 2, 1);
   
				foreach($this->getConfig()->get("second-stick") as $effects) {
				
				$player->addEffect(Effect::get($effects, mt_rand($this->getConfig()->get("effect-min"), $this->getConfig()->get("effect-max"))));
				
				$player->addTitle("§aUsed §eMighty Stick");
				$player->getInventory()->removeItem($stick);
				
				break;
				
				case 3:
				
				$stick = Item::get(Item::LEVER, 2, 1);
   
				foreach($this->getConfig()->get("third-stick") as $effects) {
				
				$player->addEffect(Effect::get($effects, mt_rand($this->getConfig()->get("effect-min"), $this->getConfig()->get("effect-max"))));
				
				$player->addTitle("§aUsed §eMighty Stick");
				$player->getInventory()->removeItem($stick);
				
				break;
				
				case 1:
				
				$stick = Item::get(Item::LEVER, 2, 1);
   
				foreach($this->getConfig()->get("fourth-stick") as $effects) {
				
				$player->addEffect(Effect::get($effects, mt_rand($this->getConfig()->get("effect-min"), $this->getConfig()->get("effect-max"))));
				
				$player->addTitle("§aUsed §eMighty Stick");
				$player->getInventory()->removeItem($stick);
				
				break;
				
				case 1:
				
				$stick = Item::get(Item::LEVER, 2, 1);
   
				foreach($this->getConfig()->get("fifth-stick") as $effects) {
				
				$player->addEffect(Effect::get($effects, mt_rand($this->getConfig()->get("effect-min"), $this->getConfig()->get("effect-max"))));
				
				$player->addTitle("§aUsed §eMighty Stick");
				$player->getInventory()->removeItem($stick);
				
				break;
				
			}
		}
	}
	
	public function onPlace(BlockPlaceEvent $event) {
		
		if($event->getItem()->getId() == 69) {
			
			$damage = $event->getItem()->getDamage();
			
			if($damage === 2) {
				
				$event->setCancelled();
				
			}
		}
	}
}
