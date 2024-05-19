<?php
/**
 * ChannelTag automatically generated by SDKgen please do not edit this file manually
 * @see https://sdkgen.app
 */

namespace SdkFabric\Discord;

use GuzzleHttp\Exception\BadResponseException;
use Sdkgen\Client\Exception\ClientException;
use Sdkgen\Client\Exception\UnknownStatusCodeException;
use Sdkgen\Client\TagAbstract;

class ChannelTag extends TagAbstract
{
    public function message(): ChannelMessageTag
    {
        return new ChannelMessageTag(
            $this->httpClient,
            $this->parser
        );
    }

    /**
     * Returns all pinned messages in the channel as an array of message objects.
     *
     * @param string $channelId
     * @return array<Message>
     * @throws ClientException
     */
    public function getPins(string $channelId): array
    {
        $url = $this->parser->url('/channels/:channel_id/pins', [
            'channel_id' => $channelId,
        ]);

        $options = [
            'query' => $this->parser->query([
            ], [
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


}
