<?php declare(strict_types=1);

namespace OCP\EventDispatcher;

use JsonSerializable;

/**
 * @since 18.0.0
 */
abstract class ABroadcastedEvent extends Event implements JsonSerializable {

	private $broadcasted = false;

	/**
	 * Get the name of the event, as received on the client-side
	 *
	 * Uses the fully qualified event class name by default
	 *
	 * @return string
	 * @since 18.0.0
	 */
	public function broadcastAs(): string {
		return get_class($this);
	}

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

	abstract public function serialize(): array;

	public final function jsonSerialize() {
		return array_merge(
			$this->serialize(),
			[
				'name' => $this->broadcastAs(),
			]
		);
	}

}
