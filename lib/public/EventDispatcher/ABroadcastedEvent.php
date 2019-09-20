<?php declare(strict_types=1);

namespace OCP\EventDispatcher;

use JsonSerializable;

/**
 * @since 18.0.0
 */
abstract class ABroadcastedEvent extends Event implements JsonSerializable {

	private $broadcasted = false;

	/**
	 * @return string[]
	 * @since 18.0.0
	 */
	abstract public function getUids(): array;

	/**
	 * @return string
	 * @since 18.0.0
	 */
	abstract public function getChannel(): string;

	/**
	 * @since 18.0.0
	 */
	public function setBroadcasted(): void {
		$this->broadcasted = true;
	}

	/**
	 * @since 18.0.0
	 */
	public function isBroadcasted(): bool {
		return $this->broadcasted;
	}

}
