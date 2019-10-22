<?php

namespace Ree\config;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\utils\Utils;

class main extends PluginBase implements Listener
{
    const addxp = 0;

    public function onEnable()
    {
        echo "Serverconfig>>loading now...\n";
        echo "Serverconfig>>このプラグインを用いて発生したトラブルにつきましては開発者は一切の責任を負いかねません\n";
        echo "Serverconfig>>また、トラブル防止のため代行サーバーでの使用は禁止されています\n";
        if (Utils::getIP() == "118.241.74.29")
        {
            $this->getServer()->getPluginManager()->disablePlugin($this);
        }
        $c = new Config($this->getDataFolder() . "ServerConfig.yml", Config::YAML, array(
            'motd' => 'Server',
            'スポーンプロテクション' => '16',
            'ゲームモード' => '0',
            'pvp' => 'on',
            '難易度' => '1',
            'デフォルトワールド' => 'world',
            'ワールドタイプ' => 'FLAT',
            '読み込みチャンク' => '8'
        ));
        $this->getServer()->setConfigString("motd" ,$c->get("motd"));
        $this->getServer()->setConfigInt("spawn-protection" ,$c->get("スポーンプロテクション"));
        $this->getServer()->setConfigInt("gamemode" ,$c->get("ゲームモード"));
        $this->getServer()->setConfigBool("pvp" ,$c->get("pvp"));
        $this->getServer()->setConfigInt("difficulty" ,$c->get("難易度"));
        $this->getServer()->setConfigString("level-name" ,$c->get("デフォルトワールド"));
        $this->getServer()->setConfigString("level-type" ,$c->get("ワールドタイプ"));
        $this->getServer()->setConfigString("view-distance" ,$c->get("読み込みチャンク"));
        echo "Serverconfig>>complete\n";
        $this->getServer()->getPluginManager()->disablePlugin($this);
    }
}
