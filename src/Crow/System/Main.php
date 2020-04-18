<?php

namespace System;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener {

	public function onLoad() : void{
		$this->getLogger()->info(TextFormat::WHITE . "I've been loaded!");
	}

	public function onEnable() : void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getScheduler()->scheduleRepeatingTask(new CommandTask($this->getServer()), 10);
		$this->getLogger()->info(TextFormat::DARK_GREEN . "I've been enabled!");
	}

	public function onDisable() : void{
		$this->getLogger()->info(TextFormat::DARK_RED . "I've been disabled!");
	}

	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {

		switch ($cmd->getName()) {
			case "Vote":
				if ($sender instanceof Player) {
					// real player
					$sender->sendMessage(TextFormat:: GREEN . "");
				} else {
					// console command
				}
			break;
		}

		return true;
	}

	public function onJoin(PlayerJoinEvent $event) {
		$player = $event->getPlayer();

		$sender->sendMessage("Der Spieler" . $player->getName() . "Ist auf Paincraft Gejoint");
	}
}
     public function onQuit(PlayerJoinEvent $event) {
        $player = $event->getPlayer();

		$sender->sendMessage("Der Spieler" . $player->getName() . "Hat Das Spiel Verlassen");
	 }
}
