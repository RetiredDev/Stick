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


class Main extends PluginBase implements Listener {
	
	public function onEnable() {
		
		$this->getServer()->getLogger()->notice("MightyStick has been enabled!");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		
	}
	
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {
		
		if(strtolower($command->getName()) === "stick") {
			
			if(count($args) < 2) {
			
				$sender->sendMessage("§cPlease use: /stick <player> 1");
				return true;
			 
			}
			if($sender->hasPermission("stick.cmd") || $sender->isOp()){
				
				if(isset($args[0])) {
				
					$player = $sender->getServer()->getPlayer($args[0]);
					
					if(isset($args[1])) {
							
							$tier1 = Item::get(Item::LEVER, 5, 1);
							$tier1->setCustomName(TF::RESET . TF::BOLD . TF::YELLOW . "Mighty Stick" . TF::RESET . TF::GRAY . " (Tap anywhere)" . PHP_EOL . PHP_EOL . 
							TF::DARK_GRAY . " *" . TF::AQUA . " Chance to get: " . PHP_EOL .
							TF::DARK_GRAY . " *" . TF::GRAY . "Effects");
							
							$player->getInventory()->addItem($tier1);
							
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
		
	public function onInteract(PlayerInteractEvent $event) {
		
		$player = $event->getPlayer();
		
		if($event->getItem()->getId() === 69) {
		
		if($event->getItem()->getDamage() === 5) {

				$tier1 = Item::get(Item::LEVER, 5, 1);
				
				$effect = Effect::getEffect("5");
                                                    $effect->setDuration("1000000" * 18);
                                                    $effect->setAmplifier("4");
                                                    $player->addEffect($effect);
                                                    $effectb = Effect::getEffect("2");
                                                    $effectb->setDuration("1000000" * 18);
                                                    $player->addEffect($effectb);
                                                    $effectc = Effect::getEffect("11");
                                                    $effectc->setDuration("1000000" * 18);
                                                    $effectc->setAmplifier("4");
                                                    $player->addEffect($effectc);
				
				$player->addTitle("§aUsed §eMighty Stick");
				$player->getInventory()->removeItem($tier1);
				
				break;
				
			}
		}
	}
	
	public function onPlace(BlockPlaceEvent $event) {
		
		if($event->getItem()->getId() == 69) {
			
			$damage = $event->getItem()->getDamage();
			
			if($damage === 5) {
				
				$event->setCancelled();
				
			}
		}
	}
}
