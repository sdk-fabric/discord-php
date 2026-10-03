
# discord-php

This [SDK](https://github.com/sdk-fabric/discord-php) is managed by the [SDK Fabric](https://sdk-fabric.org/) project, a global infrastructure to
automatically generate SDKs for every API.

You can find more information about this SDK at [TypeHub](https://typehub.cloud/):
https://app.typehub.cloud/d/sdkfabric/discord

## Usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$client = new \SdkFabric\Discord\Client::build('[access_token]');

// Get a channel by ID.
$response = $client->channel()->get('channel_id');

// Update a channel's settings.
$response = $client->channel()->update('channel_id', new Channel_Update());

// Delete a channel, or close a private message.
$response = $client->channel()->delete('channel_id');

// Returns all pinned messages in the channel as an array of message objects.
$response = $client->channel()->getPins('channel_id');

// Create a new invite object for the channel.
$response = $client->channel()->createInvite('channel_id', new Channel_Invite());

// Retrieves the messages in a channel.
$response = $client->message()->getAll('channel_id', 'around', 'before', 'after', 1);

// Retrieves a specific message in the channel.
$response = $client->message()->get('channel_id', 'message_id');

// Post a message to a guild text or DM channel.
$response = $client->message()->create('channel_id', new Message());

// Edit a previously sent message.
$response = $client->message()->update('channel_id', 'message_id', new Message());

// Delete a message.
$response = $client->message()->remove('channel_id', 'message_id');

// Crosspost a message in an Announcement Channel to following channels.
$response = $client->message()->crosspost('channel_id', 'message_id');

$response = $client->message()->getReactionsByEmoji('channel_id', 'message_id', 'emoji', 1, 'after', 1);

$response = $client->message()->deleteAllReactions('channel_id', 'message_id');

// Returns the user object of the requester's account.
$response = $client->user()->getCurrent();

// Returns a user object for a given user ID.
$response = $client->user()->get('user_id');
```
