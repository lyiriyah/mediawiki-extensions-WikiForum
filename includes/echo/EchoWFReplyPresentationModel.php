<?php

class EchoWFReplyPresentationModel extends EchoEventPresentationModel {
	/** @inheritDoc */
	public function getIconType() {
		return 'wikiforum-reply';
	}

    /** @inheritDoc */
	public function getHeaderMessage() {
		$msg = parent::getHeaderMessage();
		$msg->params( $this->event->getExtraParam( 'page_title' ) );
		return $msg;
	}

    /** @inheritDoc */
    public function getBodyMessage() {
		$comment = $this->event->getExtraParam( 'excerpt', false );
		if ( $comment ) {
			$msg = new RawMessage( '$1' );
			$msg->plaintextParams( $comment );
			return $msg;
		}
	}

	/** @inheritDoc */
	public function getPrimaryLink() {
		return [
			'url' => $this->event->getExtraParam( 'url' ),
			'label' =>$this->event->getExtraParam( 'page_title' ),
		];
	}
}
