<?php

namespace HyperEnte\JoinMessage\commands;

use HyperEnte\JoinMessage\JoinMessage;
use pocketmine\command\PluginCommand;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use HyperEnte\JoinMessage\forms\JoinMessageForm;

class JoinMessageCommand extends PluginCommand{

	public function __construct(){
		parent::__construct("joinmessage", JoinMessage::getMain());
		$this->setDescription("Change your JoinMessage");
		$this->setAliases(["jm", "jmessage"]);
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){
		if(!$sender instanceof Player) return;

		if(!$sender->hasPermission(JoinMessage::getMain()->getConfig()->get("permission"))){
			$sender->sendMessage(JoinMessage::getMain()->getConfig()->get("prefix") . JoinMessage::getMain()->getConfig()->get("noperm"));
			return true;
		}

		if($sender->hasPermission(JoinMessage::getMain()->getConfig()->get("permission"))){
			$sender->sendForm(new JoinMessageForm());
		}
	}
}