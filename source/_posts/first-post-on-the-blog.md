---
extends: _layouts.post
section: content
title: First post on the blog
date: 2020-02-10
cover_image: /assets/images/blog/gabriel-crismariu-sOK9NjLArCw-unsplash.jpg
description: The very first post to the blog, how the website came to be, trails and errors, and more about Jason.
---
Hi, I'm Jason! Welcome to my first blog post.

Recently, blogs have become a great source and an abundance of knowledge. I wanted to present the sources of information that I have also come across and experienced. 

So, welcome to my brand-new website; I intend on blogging about programming, life, and what else may come to mind. I also want to write about what I've learned from the Laravel community. I'm also establishing a place to allow me to provide and yield tutorials, and overall a database of information I can look back on.

So if you're ready, we will go ahead and dive into it. I wanted to start my first post by providing information on what I made the website on.  I also thought that it was a great time to give readers that will visit my site, a bit more information about me. It allows you to know who is behind the scenes and writing these blog posts. Though that is always the troublesome part right... What should I start with? I guess I will present a bit more information about myself so that you know who is writing these blog posts.

### A Bit More About Jason

I'm an uncomplicated man that enjoys learning new things and teaching. I live in **Newport News, Virginia**. With my beautiful wife, who happens to also run her own business, [PreciousMemories Photography](https://preciousmemories.photography). Running a business with her has been an eye-opening adventure! I didn't understand how much work is involved in trying to create and run a business.

Between the two of us, we have 6 kids together; I have three girls and two boys that I couldn't be more delighted about. I'm also a stepfather of her son but at the end of the day... Do we need to put stepfather into something? I have always thought that blood doesn't define your family. The love and connection that you have with each other.

### The Road to Static Site Generators that Didn't Work Out.

Okay, okay I get it you are ready for the nuts and bolts that run this website. Well, I began making the website in a mixture of things. One of which I began to write it in was Laravel. It's a PHP framework that I absolutely appreciate, and want to use it on all projects.  Though, of course, we all know that each project has its own requirements. Building it with [Laravel](https://laravel.com) was sequentially going to be overkill.

I didn't want to use WordPress. It's a good firm blogging platform, though their vision has gone away from being just that. A blogging platform to a full-blown CMS. It tries too hard to be a CMS, and genuinely, the core isn't too bad? (pun intended) The issue is plugins and themes that you can get for it. Neglecting to patch things, and always trying to keep plugins/themes updated. People also tend to overdo it with plugins making their website slow. Not that WordPress by default isn't slow already... I wanted something that was going to be fast, simple, and easy to update.

Static sites here I come! So I went on the look for finding the most suitable static site generator that I could find. Though we know this is a user preference.

I started working with [Gatsby](https://www.gatsbyjs.org/), it was solid and felt great. I was also using Contentful as the backend after I found a post on [Medium](https://medium.com/@ryanwiemer/gatsby-and-the-jam-stack-91e31508f364) from [Ryan Wiemer](https://medium.com/@ryanwiemer). After a couple of weeks of development. It just felt **overly-complicated**... I thought about maintenance, do I want to rely that much on javascript?

I then found [Gridsome](https://gridsome.org/), *yes, okay I know it's also javascript and built using **Vuejs** rather than **Reactjs**.* So, I started playing with Gridsome, and naturally, to be quite outspoken, I truly _valued_ it over Gatsby. It was something that I knew and was familiar with. After all, I come from the Laravel community, where Vuejs is a notable player.

Everything was coming together, and I completed and launched the site with Netlify. Though, after a while, it still felt like something was yearning, or I was **overloading** it with *javascript*. So I had begun the hunt once again for something that may work out better.

### Jigsaw by TightenCo That Lead a Clear Path

I eventually came across and settled on [Jigsaw](https://jigsaw.tighten.co/), by TigtenCo. Accurately, I couldn't be more fulfilled with how things worked out. They have an astonishing [blog template](https://github.com/tightenco/jigsaw-blog-template) to start from. Which is being used right now with just edits to make it my style, on this very website!

All the blog posts are all done and wrote in Markdown, heck even my [uses](https://jasonkenyon.me/uses) page is done in Markdown! Which is just exceptional and robust enough so that I don't have to write a single line more of HTML. The CSS framework used is none other than [TailwindCSS](https://tailwindcss.com/). Which if you have not heard of it, or even tried it. I can't encourage you enough to, just stop reading this and try it out! It is an astounding CSS framework.

> Tailwind is different.
>
> Instead of unreasonable predesigned components, Tailwind provides low-level utility classes that let you build completely custom designs without ever leaving your HTML.

Though, if I ought to be genuine about what I prefer the most notable about **Jigsaw**, it would come down to just being able to use [Laravel's blade](https://laravel.com/docs/master/blade) templating. With the duo pack that is running now, I just feel overly satisfied with how things have come together. I will genuinely continue to use Jigsaw. It is just dead simple and easy to use and makes making static websites an easy task.

Overall, I'm still learning more and more about **Jigsaw**. I will continue to blog about my experience with it and post new updates on things that I'm working on. Any releases or new erudition that I think everyone will enjoy.

Until next time, stay searching and learning, and getting it!
