<?php
/**
 * Message automatically generated by SDKgen please do not edit this file manually
 * @see https://sdkgen.app
 */

namespace SdkFabric\Discord;

use PSX\Schema\Attribute\Description;
use PSX\Schema\Attribute\Key;

#[Description('')]
class Message implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Description('Message contents (up to 2000 characters)')]
    protected ?string $content = null;
    #[Description('Can be used to verify a message was sent (up to 25 characters)')]
    protected ?string $nonce = null;
    #[Description('true if this is a TTS message')]
    protected ?bool $tts = null;
    /**
     * @var array<MessageEmbed>|null
     */
    #[Description('Up to 10 rich embeds (up to 6000 characters)')]
    protected ?array $embeds = null;
    #[Key('allowed_mentions')]
    #[Description('')]
    protected ?MessageAllowedMentions $allowedMentions = null;
    #[Key('message_reference')]
    #[Description('')]
    protected ?string $messageReference = null;
    public function setContent(?string $content) : void
    {
        $this->content = $content;
    }
    public function getContent() : ?string
    {
        return $this->content;
    }
    public function setNonce(?string $nonce) : void
    {
        $this->nonce = $nonce;
    }
    public function getNonce() : ?string
    {
        return $this->nonce;
    }
    public function setTts(?bool $tts) : void
    {
        $this->tts = $tts;
    }
    public function getTts() : ?bool
    {
        return $this->tts;
    }
    /**
     * @param array<MessageEmbed>|null $embeds
     */
    public function setEmbeds(?array $embeds) : void
    {
        $this->embeds = $embeds;
    }
    /**
     * @return array<MessageEmbed>|null
     */
    public function getEmbeds() : ?array
    {
        return $this->embeds;
    }
    public function setAllowedMentions(?MessageAllowedMentions $allowedMentions) : void
    {
        $this->allowedMentions = $allowedMentions;
    }
    public function getAllowedMentions() : ?MessageAllowedMentions
    {
        return $this->allowedMentions;
    }
    public function setMessageReference(?string $messageReference) : void
    {
        $this->messageReference = $messageReference;
    }
    public function getMessageReference() : ?string
    {
        return $this->messageReference;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('content', $this->content);
        $record->put('nonce', $this->nonce);
        $record->put('tts', $this->tts);
        $record->put('embeds', $this->embeds);
        $record->put('allowed_mentions', $this->allowedMentions);
        $record->put('message_reference', $this->messageReference);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}
