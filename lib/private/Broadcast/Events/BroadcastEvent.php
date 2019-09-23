<?php declare(strict_types=1);

namespace OC\Broadcast\Events;

use JsonSerializable;
use OCP\Broadcast\Events\IBroadcastEvent;
use OCP\EventDispatcher\ABroadcastedEvent;
use OCP\EventDispatcher\Event;

class BroadcastEvent extends Event implements IBroadcastEvent {

	/** @var ABroadcastedEvent */
	private $event;

	public function __construct(ABroadcastedEvent $event) {
		parent::__construct();

		$this->event = $event;
	}

	public function getName(): string {
		return $this->event->broadcastAs();
	}

	public function getUids(): array {
		return $this->event->getUids();
	}

	public function getPayload(): JsonSerializable {
		return $this->event;
	}

	public function setBroadcasted(): void {
		$this->event->setBroadcasted();
	}

}
