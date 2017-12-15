public function onCommand(CommandSender $sender, Command $cmd, string $label,array $args) : bool {
		switch($cmd->getName()){
			case "factionui":
				if($sender instanceof Player) {
					$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
					$form = $api->createSimpleForm(function (Player $sender, array $data){
					$result = $data[0];
					
					if($result === null){
						return true;
					}
						switch($result){
							case 0:
								$command = "f topfactions";
								$this->getServer()->getCommandMap()->dispatch($sender, $command);
							break;
              
                                                        case 1:
								$command = "f invite $player";
								$this->getServer()->getCommandMap()->dispatch($sender, $command);
							break;
								
						}
					});
					$form->setTitle("FactionUI Screen");
					$form->setContent("FactionUI Commands.");
					$form->addButton(TextFormat::BOLD . "§7Top Factions");	
                    $form->addButton(TextFormat::BOLD . "§7Invite Player");	
					$form->sendToPlayer($sender);
				}
				else{
					$sender->sendMessage(TextFormat::RED . "Use this Command in-game.");
					return true;
				}
			break;
		}
		return true;
    }
}
