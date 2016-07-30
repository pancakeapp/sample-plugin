# Pancake Sample Plugin

A sample plugin for Pancake 4, to serve as documentation on creating plugins. It shows you how to:

* Hook into events in Pancake (e.g. the cron job).
* Add fields for plugin settings, and retrieve their values.
* Add new items to the navigation bar / quick links sidebar.
* Add your own admin and frontend controllers, models and views.
* Listen to modifications for a particular model (e.g. Invoices).
* Use Composer to add any extra libraries you might need.

This sample plugin (and the Plugins API) is still a work in progress but we're committed to improving it as quickly as possible. To that end, all pull requests or issues raised here will be treated with the utmost urgency and will be resolved and merged in 48 hours.

We're working on improving both the sample plugin and the Plugins API as much as possible, so if you see have any questions or see anything missing, or that you need help with, feel free to let me know. My Skype's "brunodebarros.com". I know the entire Pancake codebase off by heart and am likely to be able to immediately answer any query you might have. Additionally, I have the ability to make modifications to the core, so if you need anything that's missing, it's easy for us to add it for you.

## How to install the plugin

1. Download [the ZIP](https://github.com/pancakeapp/sample-plugin/archive/master.zip) of this repository.
2. Create a folder called `sample_plugin` in `third_party/modules`.
3. Put all the files in this repository's ZIP in there.
4. In your Pancake, go to "Plugins" and enable the plugin.

That's it! Check out the code and play around with the sample plugin.