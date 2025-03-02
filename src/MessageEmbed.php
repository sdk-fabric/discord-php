<?php
/**
 * MessageEmbed automatically generated by SDKgen please do not edit this file manually
 * @see https://sdkgen.app
 */

namespace SdkFabric\Discord;

use PSX\Schema\Attribute\Description;

#[Description('')]
class MessageEmbed implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Description('Title of embed')]
    protected ?string $title = null;
    #[Description('Type of embed (always "rich" for webhook embeds)')]
    protected ?string $type = null;
    #[Description('Description of embed')]
    protected ?string $description = null;
    #[Description('Url of embed')]
    protected ?string $url = null;
    #[Description('Timestamp of embed content')]
    protected ?string $timestamp = null;
    #[Description('Color code of the embed')]
    protected ?int $color = null;
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }
    public function getTitle(): ?string
    {
        return $this->title;
    }
    public function setType(?string $type): void
    {
        $this->type = $type;
    }
    public function getType(): ?string
    {
        return $this->type;
    }
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }
    public function getUrl(): ?string
    {
        return $this->url;
    }
    public function setTimestamp(?string $timestamp): void
    {
        $this->timestamp = $timestamp;
    }
    public function getTimestamp(): ?string
    {
        return $this->timestamp;
    }
    public function setColor(?int $color): void
    {
        $this->color = $color;
    }
    public function getColor(): ?int
    {
        return $this->color;
    }
    public function toRecord(): \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('title', $this->title);
        $record->put('type', $this->type);
        $record->put('description', $this->description);
        $record->put('url', $this->url);
        $record->put('timestamp', $this->timestamp);
        $record->put('color', $this->color);
        return $record;
    }
    public function jsonSerialize(): object
    {
        return (object) $this->toRecord()->getAll();
    }
}
