<?php

namespace UtilityMessages;

use pocketmine\Server;
use pocketmine\plugin\PluginBase as Plugin;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as TF;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\utils\Config;

class Main extends Plugin implements Listener {

 public function onEnable() {
     $this->getServer()->getPluginManager()->registerEvents($this,$this);
     $this->saveDefaultConfig();
 }
 
 public function onJoin(PlayerJoinEvent $event) {
     $player = $event->getPlayer();
     $message = str_replace("{name}", $player->getDisplayName(), $this->getConfig()->get("JoinMessage"));
     $event->setJoinMessage($message);
     $line = str_replace("{line}", TF::EOL, $this->getConfig()->get("WelcomeMessage"));
     $player->sendMessage($line);
 }
 
 public function onQuit(PlayerQuitEvent $event) {
     $player = $event->getPlayer();
     $messages = str_replace("{name}", $player->getDisplayName(), $this->getConfig()->get("QuitMessage"));
     $event->setQuitMessage($messages);
 }
}
