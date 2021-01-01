<?php

declare(strict_types=1);

namespace muqsit\chunkgenerator;

use pocketmine\event\level\ChunkLoadEvent;
use pocketmine\event\level\ChunkPopulateEvent;
use pocketmine\event\Listener;

class ChunkListener implements Listener
{
	public function onChukLoader(ChunkLoadEvent $event){
		$level = $event->getLevel();
		$chunk = $event->getChunk();
		foreach ($level->getChunkLoaders($chunk->getX(), $chunk->getZ()) as $loader){
			if($loader instanceof ChunkGenerator){
				$loader->onChunkLoaded($chunk);
			}
		}
	}

	public function onChukPopulated(ChunkPopulateEvent $event){
		$level = $event->getLevel();
		$chunk = $event->getChunk();
		foreach ($level->getChunkLoaders($chunk->getX(), $chunk->getZ()) as $loader){
			if($loader instanceof ChunkGenerator){
				$loader->onChunkPopulated($chunk);
			}
		}
	}

}