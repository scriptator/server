<?php declare(strict_types=1);

namespace OCP\Broadcast\Events;

use JsonSerializable;

/**
 * @since 18.0.0
 */
interface IBroadcastEvent {

	/**
	 * @return string the name of the event
	 * @since 18.0.0
	 */
	public function getName(): string;

	/**
	 * @return string[]
	 * @since 18.0.0
	 */
	public function getUids(): array;

	/**
	 * @return string
	 * @since 18.0.0
	 */
	public function getChannel(): string;

	/**
	 * @return JsonSerializable the data to be sent to the client
	 * @since 18.0.0
	 */
	public function getPayload(): JsonSerializable;

	/**
	 * @since 18.0.0
	 */
	public function setBroadcasted(): void;

}
