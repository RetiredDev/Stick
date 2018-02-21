<?php

namespace Voucher;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat as TF;


class Main extends PluginBase implements Listener {
	
	public function onEnable() {
		
		$this->getServer()->getLogger()->notice("Voucher has been enabled!");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		
	}
	
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {
		
		if(strtolower($command->getName()) === "voucher") {
			
			if(count($args) < 2) {
			
				$sender->sendMessage("§6[§dReflux§6]>§r §cPlease use: /voucher <player> 1");
				return true;
			 
			}
			if($sender->hasPermission("voucher.command.give") || $sender->isOp()){
				
				if(isset($args[0])) {
				
					$player = $sender->getServer()->getPlayer($args[0]);
					
					if(isset($args[1])) {
							
							$tier1 = Item::get(Item::PAPER, 3, 1);
							$tier1->setCustomName(TF::RESET . TF::BOLD . TF::LIGHT_PURPLE . "Voucher" . TF::RESET . TF::GRAY . " (Tap anywhere)" . PHP_EOL . PHP_EOL . 
							TF::DARK_GRAY . " *" . TF::AQUA . " Contains:" . PHP_EOL .
							TF::DARK_GRAY . " *" . TF::GRAY . "Cool rewards!");
							
							$player->getInventory()->addItem($tier1);
							
							break;
							
						}
					}
				}
			}
			
			if(!$sender->hasPermission("voucher.command.give")) {
				
				$sender->sendMessage("§6[§dReflux§6]>§r §cYou don't have permission to use this command.");
				
			}
			
			else {
				
				$sender->sendMessage("§6[§dReflux§6]>§r §aThe player has received the Voucher.");
				
			}
		}
	
	public function onInteract(PlayerInteractEvent $event) {
		
		$player = $event->getPlayer();
		
		if($event->getItem()->getId() === 339) {
		
	    if($event->getItem()->getDamage() === 3) {
			
				$tier1 = Item::get(Item::PAPER, 3, 1);
				$tier1win = rand(1, 5);
				
			
			switch($tier1win) {
	
				case 1:
													                             $player->getInventory()->addItem(Item::get(1, 0, mt_rand(1, 16)));
				
				$player->addTitle("§aUsed: §dVoucher");
				$player->getInventory()->removeItem($tier1);
				
				break;
				
				case 2:
													                             $player->getInventory()->addItem(Item::get(2, 0, mt_rand(1, 16)));
				
				$player->addTitle("§aUsed: §dVoucher");
				$player->getInventory()->removeItem($tier2);
				
				break;
				
				case 3:
													                             $player->getInventory()->addItem(Item::get(3, 0, mt_rand(1, 16)));
				
				$player->addTitle("§aUsed: " , "§dVoucher");
				$player->getInventory()->removeItem($tier3);
				
				break;
				
				case 4:
													                                          $player->getInventory()->addItem(Item::get(1, 0, mt_rand(1, 16)));
				
				$player->addTitle("§aUsed: §dVoucher");
				$player->getInventory()->removeItem($tier5);
				
				break;
				
				case 5:
													                             $player->getInventory()->addItem(Item::get(5, 0, mt_rand(1, 16)));
				
				$player->addTitle("§aUsed: §dVoucher");
				$player->getInventory()->removeItem($tier1);
				
				break;

	            }
			}
		}
	}
}
