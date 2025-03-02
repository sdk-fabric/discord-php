<?php
/**
 * ChannelTag automatically generated by SDKgen please do not edit this file manually
 * @see https://sdkgen.app
 */

namespace SdkFabric\Discord;

use GuzzleHttp\Exception\BadResponseException;
use Sdkgen\Client\Exception\ClientException;
use Sdkgen\Client\Exception\Payload;
use Sdkgen\Client\Exception\UnknownStatusCodeException;
use Sdkgen\Client\TagAbstract;

class ChannelTag extends TagAbstract
{
    /**
     * Get a channel by ID. Returns a channel object.
     *
     * @param string $channelId
     * @return Channel
     * @throws ErrorException
     * @throws ClientException
     */
    public function get(string $channelId): Channel
    {
        $url = $this->parser->url('/channels/:channel_id', [
            'channel_id' => $channelId,
        ]);

        $options = [
            'headers' => [
            ],
            'query' => $this->parser->query([
            ], [
            ]),
        ];

        try {
            $response = $this->httpClient->request('GET', $url, $options);
            $body = $response->getBody();

            $data = $this->parser->parse((string) $body, \PSX\Schema\SchemaSource::fromClass(Channel::class));

            return $data;
        } catch (ClientException $e) {
            throw $e;
        } catch (BadResponseException $e) {
            $body = $e->getResponse()->getBody();
            $statusCode = $e->getResponse()->getStatusCode();

            if ($statusCode >= 0 && $statusCode <= 999) {
                $data = $this->parser->parse((string) $body, \PSX\Schema\SchemaSource::fromClass(Error::class));

                throw new ErrorException($data);
            }

            throw new UnknownStatusCodeException('The server returned an unknown status code: ' . $statusCode);
        } catch (\Throwable $e) {
            throw new ClientException('An unknown error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Update a channel's settings. Returns a channel on success, and a 400 BAD REQUEST on invalid parameters.
     *
     * @param string $channelId
     * @param ChannelUpdate $payload
     * @return Channel
     * @throws ErrorException
     * @throws ClientException
     */
    public function update(string $channelId, ChannelUpdate $payload): Channel
    {
        $url = $this->parser->url('/channels/:channel_id', [
            'channel_id' => $channelId,
        ]);

        $options = [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'query' => $this->parser->query([
            ], [
            ]),
            'json' => $payload,
        ];

        try {
            $response = $this->httpClient->request('PATCH', $url, $options);
            $body = $response->getBody();

            $data = $this->parser->parse((string) $body, \PSX\Schema\SchemaSource::fromClass(Channel::class));

            return $data;
        } catch (ClientException $e) {
            throw $e;
        } catch (BadResponseException $e) {
            $body = $e->getResponse()->getBody();
            $statusCode = $e->getResponse()->getStatusCode();

            if ($statusCode >= 0 && $statusCode <= 999) {
                $data = $this->parser->parse((string) $body, \PSX\Schema\SchemaSource::fromClass(Error::class));

                throw new ErrorException($data);
            }

            throw new UnknownStatusCodeException('The server returned an unknown status code: ' . $statusCode);
        } catch (\Throwable $e) {
            throw new ClientException('An unknown error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Returns all pinned messages in the channel as an array of message objects.
     *
     * @param string $channelId
     * @return array<Message>
     * @throws ErrorException
     * @throws ClientException
     */
    public function getPins(string $channelId): array
    {
        $url = $this->parser->url('/channels/:channel_id/pins', [
            'channel_id' => $channelId,
        ]);

        $options = [
            'headers' => [
            ],
            'query' => $this->parser->query([
            ], [
            ]),
        ];

        try {
            $response = $this->httpClient->request('GET', $url, $options);
            $body = $response->getBody();

            $data = $this->parser->parse((string) $body, \PSX\Schema\SchemaSource::fromType('array<Message>', __NAMESPACE__));

            return $data;
        } catch (ClientException $e) {
            throw $e;
        } catch (BadResponseException $e) {
            $body = $e->getResponse()->getBody();
            $statusCode = $e->getResponse()->getStatusCode();

            if ($statusCode >= 0 && $statusCode <= 999) {
                $data = $this->parser->parse((string) $body, \PSX\Schema\SchemaSource::fromClass(Error::class));

                throw new ErrorException($data);
            }

            throw new UnknownStatusCodeException('The server returned an unknown status code: ' . $statusCode);
        } catch (\Throwable $e) {
            throw new ClientException('An unknown error occurred: ' . $e->getMessage());
        }
    }



}
