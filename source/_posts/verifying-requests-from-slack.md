---
extends: _layouts.post
section: content
title: Verifying Requests from Slack
date: 2020-02-11
cover_image: /assets/images/blog/pankaj-patel-OXkUz1Dp-4g-unsplash-min.jpg
description: Verifying POST requests from Slack using Laravel. 
categories: [PHP, Slack, Coding, Laravel]
---

Recently, I have been developing and building more and more things for _Slack_.  More so, it was updating some apps that I created with just PHP without a framework, to use Laravel and make it a bit more expandable.  I also undertook a complete code base update, so that the application itself wasn't using the Dialogs but instead using their new Modals. 

Then this got me to thinking and wondering, I know that there is a Signing Secret key; though to be 100% honest, I never gave it considerable thought or pursued looking into what this Signing Secret was all about.  I'll admit this was a big rookie mistake, but something that I learned from and figured I would share with anyone else. 

So what exactly is this Signing Secret key?  The Signing Secret key is to be used in conjunction with verifying the headers of the request your application is receiving.  On each request that Slack sends out, they also attach an HTTP header, X-Slack-Signature.  This signature is created by Slack using your Signing Secret key, and the full body of the request that they are sending back.  Here is what Slack has to say about the Signing Secret key and information regarding it. 

> Slack creates a unique string for your app and shares it with you. Verify requests from Slack with confidence by verifying signatures using your signing secret.
> 
> On each HTTP request that Slack sends, we add an X-Slack-Signature HTTP header. The signature is created by combining the signing secret with the body of the request we're sending using a standard HMAC-SHA256 keyed hash.
> 
> The resulting signature is unique to each request and doesn't directly contain any secret information. That keeps your app secure, preventing bad actors from causing mischief.
> 
> Signing secrets replace the old verification tokens. Good news: the new signature is used exactly the same way as the deprecated verification token. It's just computed more securely.
> 
> Some SDKs perform signature verification automatically, accessible via an easy drop-in replacement of your signing secret for your old verification token. See the SDK support section for more detail.

Well, now you can see why I said it was indeed a rookie mistake by not including it the first time.  So, I went to make a middleware, which of course, Laravel, makes this painless. 

I looked and didn't see an example for PHP; however, from the documentation of Slack, it didn't look too hard to complete.  So I started my way making the middleware and came up with the following.

`php
<?php

namespace App\Http\Middleware;

use App\Exceptions\SlackHashMismtachException;
use App\Exceptions\SlackHeadersMissingException;
use Closure;


class VerifyRequestIsFromSlack
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws SlackHashMismtachException
     * @throws SlackHeadersMissingException
     */
    public function handle($request, Closure $next)
    {
        if (!$request->headers->has('X-Slack-Signature') || !$request->headers->has('X-Slack-Request-Timestamp')) {
            throw new SlackHeadersMissingException("Invaid HTTP headers.");
        }

        $version = explode('=', $request->header('X-Slack-Signature'));
        $timestamp = $request->header('X-Slack-Request-Timestamp');

        $slackSignature = "{$version[0]}:$timestamp:{$request->getContent()}";

        $slackHashedSignature = hash_hmac('sha256', $slackSignature, 'xxxxxxxSigningSecretxxxxxxxxx');

        if (!hash_equals($request->header('X-Slack-Signature'), "v0=$slackHashedSignature")) {
            throw new SlackHashMismtachException("Whoops, looks like that hash doesn't match");
        }

        return $next($request);
    }
}

`

In the above, we simply check if the HTTP headers for Slack exists; if the X-Slack-Signature or the X-Slack-Request-Timestamp is missing, we throw a custom exception.  Of course, throwing a generic exception would also work.  Thereafter, we simply grab the version from the X-Slack-Signature, X-Slack-Request-Timestamp.

Once I had that information, I passed that information into the hash_hmac function within PHP.  Along with the body of the request untouched.  After doing this, it is time to verify the hash that was just created to the hash that was sent in the X-Slack-Signature.  If the hashes don't match we again throw a custom exception, and if it does we continue and the request is fulfilled reached out Route, in Laravel to complete the request and therefor show the Modal. 

I will say, that I'm very much still learning about Slack and the API that it allows us to use.  Any other information that I find that may be helpful, I will for sure blog about it and share that new-found knowledge that I discovered.

I may also work on getting a Slack package for Laravel to build out Modals, but at the present time, I don't have any plans for that just yet. 

