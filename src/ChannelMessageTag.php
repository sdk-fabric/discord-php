<?php
/**
 * ChannelMessageTag automatically generated by SDKgen please do not edit this file manually
 * @see https://sdkgen.app
 */

namespace SdkFabric\Discord;

use GuzzleHttp\Exception\BadResponseException;
use Sdkgen\Client\Exception\ClientException;
use Sdkgen\Client\Exception\UnknownStatusCodeException;
use Sdkgen\Client\TagAbstract;

class ChannelMessageTag extends TagAbstract
{
    /**
     * Retrieves the messages in a channel.
     *
     * @param string $channelId
     * @param string|null $around
     * @param string|null $before
     * @param string|null $after
     * @param int|null $limit
     * @return array<Message>
     * @throws ClientException
     */
    public function getAll(string $channelId, ?string $around = null, ?string $before = null, ?string $after = null, ?int $limit = null): array
    {
        $url = $this->parser->url('/channels/:channel_id/messages', [
            'channel_id' => $channelId,
        ]);

        $options = [
            'query' => $this->parser->query([
                'around' => $around,
                'before' => $before,
                'after' => $after,
                'limit' => $limit,
            ]),
        ];

        try {
            $response = $this->httpClient->request('GET', $url, $options);
            $data = (string) $response->getBody();

            return $this->parser->parse($data, Message::class, isArray: true);
        } catch (ClientException $e) {
            throw $e;
        } catch (BadResponseException $e) {
            $data = (string) $e->getResponse()->getBody();

            switch ($e->getResponse()->getStatusCode()) {
                default:
                    throw new UnknownStatusCodeException('The server returned an unknown status code');
            }
        } catch (\Throwable $e) {
            throw new ClientException('An unknown error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Retrieves a specific message in the channel. Returns a message object on success.
     *
     * @param string $channelId
     * @param string $messageId
     * @return Message
     * @throws ClientException
     */
    public function get(string $channelId, string $messageId): Message
    {
        $url = $this->parser->url('/channels/:channel_id/messages/:message_id', [
            'channel_id' => $channelId,
            'message_id' => $messageId,
        ]);

        $options = [
            'query' => $this->parser->query([
            ]),
        ];

        try {
            $response = $this->httpClient->request('GET', $url, $options);
            $data = (string) $response->getBody();

            return $this->parser->parse($data, Message::class);
        } catch (ClientException $e) {
            throw $e;
        } catch (BadResponseException $e) {
            $data = (string) $e->getResponse()->getBody();

            switch ($e->getResponse()->getStatusCode()) {
                default:
                    throw new UnknownStatusCodeException('The server returned an unknown status code');
            }
        } catch (\Throwable $e) {
            throw new ClientException('An unknown error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Post a message to a guild text or DM channel. Returns a message object. Fires a Message Create Gateway event. See message formatting for more information on how to properly format messages.
     *
     * @param string $channelId
     * @return Message
     * @throws ClientException
     */
    public function create(string $channelId): Message
    {
        $url = $this->parser->url('/channels/:channel_id/messages', [
            'channel_id' => $channelId,
        ]);

        $options = [
            'query' => $this->parser->query([
            ]),
        ];

        try {
            $response = $this->httpClient->request('POST', $url, $options);
            $data = (string) $response->getBody();

            return $this->parser->parse($data, Message::class);
        } catch (ClientException $e) {
            throw $e;
        } catch (BadResponseException $e) {
            $data = (string) $e->getResponse()->getBody();

            switch ($e->getResponse()->getStatusCode()) {
                default:
                    throw new UnknownStatusCodeException('The server returned an unknown status code');
            }
        } catch (\Throwable $e) {
            throw new ClientException('An unknown error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Edit a previously sent message. The fields content, embeds, and flags can be edited by the original message author. Other users can only edit flags and only if they have the MANAGE_MESSAGES permission in the corresponding channel. When specifying flags, ensure to include all previously set flags/bits in addition to ones that you are modifying. Only flags documented in the table below may be modified by users (unsupported flag changes are currently ignored without error).
     *
     * @param string $channelId
     * @param string $messageId
     * @param Message $payload
     * @return Message
     * @throws ClientException
     */
    public function update(string $channelId, string $messageId, Message $payload): Message
    {
        $url = $this->parser->url('/channels/:channel_id/messages/:message_id', [
            'channel_id' => $channelId,
            'message_id' => $messageId,
        ]);

        $options = [
            'query' => $this->parser->query([
            ]),
            'json' => $payload
        ];

        try {
            $response = $this->httpClient->request('PATCH', $url, $options);
            $data = (string) $response->getBody();

            return $this->parser->parse($data, Message::class);
        } catch (ClientException $e) {
            throw $e;
        } catch (BadResponseException $e) {
            $data = (string) $e->getResponse()->getBody();

            switch ($e->getResponse()->getStatusCode()) {
                default:
                    throw new UnknownStatusCodeException('The server returned an unknown status code');
            }
        } catch (\Throwable $e) {
            throw new ClientException('An unknown error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Delete a message. If operating on a guild channel and trying to delete a message that was not sent by the current user, this endpoint requires the MANAGE_MESSAGES permission.
     *
     * @param string $channelId
     * @param string $messageId
     * @return void
     * @throws ClientException
     */
    public function remove(string $channelId, string $messageId): void
    {
        $url = $this->parser->url('/channels/:channel_id/messages/:message_id', [
            'channel_id' => $channelId,
            'message_id' => $messageId,
        ]);

        $options = [
            'query' => $this->parser->query([
            ]),
        ];

        try {
            $response = $this->httpClient->request('DELETE', $url, $options);
            $data = (string) $response->getBody();

        } catch (ClientException $e) {
            throw $e;
        } catch (BadResponseException $e) {
            $data = (string) $e->getResponse()->getBody();

            switch ($e->getResponse()->getStatusCode()) {
                default:
                    throw new UnknownStatusCodeException('The server returned an unknown status code');
            }
        } catch (\Throwable $e) {
            throw new ClientException('An unknown error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Crosspost a message in an Announcement Channel to following channels. This endpoint requires the SEND_MESSAGES permission, if the current user sent the message, or additionally the MANAGE_MESSAGES permission, for all other messages, to be present for the current user.
     *
     * @param string $channelId
     * @param string $messageId
     * @return Message
     * @throws ClientException
     */
    public function crosspost(string $channelId, string $messageId): Message
    {
        $url = $this->parser->url('/channels/:channel_id/messages/:message_id/crosspost', [
            'channel_id' => $channelId,
            'message_id' => $messageId,
        ]);

        $options = [
            'query' => $this->parser->query([
            ]),
        ];

        try {
            $response = $this->httpClient->request('POST', $url, $options);
            $data = (string) $response->getBody();

            return $this->parser->parse($data, Message::class);
        } catch (ClientException $e) {
            throw $e;
        } catch (BadResponseException $e) {
            $data = (string) $e->getResponse()->getBody();

            switch ($e->getResponse()->getStatusCode()) {
                default:
                    throw new UnknownStatusCodeException('The server returned an unknown status code');
            }
        } catch (\Throwable $e) {
            throw new ClientException('An unknown error occurred: ' . $e->getMessage());
        }
    }


}
