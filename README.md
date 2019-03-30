# [WordPress Cobblestone](https://github.com/gaambo/cobblestone-wp)

Cobblestone is heavily based on [Bedrock](https://roots.io/bedrock/) which is a modern WordPress stack that helps you get started with the best development tools and project structure.

For more Information about Bedrock see their [website](https://roots.io/bedrock/) and the original [readme](https://github.com/roots/bedrock).

We regularly sync changes from Bedrock to this repository and update WordPress versions.

## Quick Links

- [Installation](#Installation)
- [Getting Started](https://github.com/gaambo/cobblestone-wp/wiki/Getting-Started)

## Features

**Cobblestone** takes Bedrock and enhances it through the following features:

- [Docker Compose](https://docs.docker.com/compose/) for local developing (and for making deployment easier) including [Xdebug](https://xdebug.org/)
- A [WP-CLI](https://wp-cli.org/) Docker container
- JavaScript linting via [ESLint](https://eslint.org/) configuration
- PHP linting with [PSR2 Standards](https://www.php-fig.org/psr/psr-2/) via [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer)
- Different [flavors](#flavors) for different development requirements
- Deploying via [Deployer](https://deployer.org/) (coming soon)
- [Snippets](https://github.com/gaambo/cobblestone-wp/wiki/Snippets) for often used tools and plugins (e.g. installing of WordPress premium plugins like ACF Pro)

### Original Bedrock Features:

- Dependency management with [Composer](https://getcomposer.org)
- Easy WordPress configuration with environment specific files
- Environment variables with [Dotenv](https://github.com/vlucas/phpdotenv)
- Autoloader for mu-plugins (use regular plugins as mu-plugins)
- Enhanced security (separated web root and secure passwords with [wp-password-bcrypt](https://github.com/roots/wp-password-bcrypt))

## Flavors

Cobblestone provides multiple "flavors" for different development requirements and use cases. These flavors are implemented as git branches and each has its own additionall information in the readme.

- **Default** (_master branch_): A blank slate for any WordPress development without a theme, plugins or anything else. Just start from scratch.
- **Obsidian** (_obsidian branch_): Cobblestone boilerplate combined with a boilerplate theme based on [Timber](https://github.com/timber/timber) making usage of [Gulp](http://gulpjs.com/) with [LibSass](http://sass-lang.com/), [Babel](https://babeljs.io/), [PostCSS](https://github.com/postcss/postcss), [BrowserSync](https://www.browsersync.io/) etc. Perfect for custom developed themes and working with [Advanced Custom Fields](https://www.advancedcustomfields.com/).

## Requirements

- PHP >= 7.2
- Composer - [Install](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
- NodeJS / npm - [Install](https://www.npmjs.com/get-npm)

## Installation

1. Create a new project  
   a. Create composer project
   ```sh
   $ composer create-project gaambo/cobblestone
   ```
   b. Clone git repository
   ```sh
   $ git clone https://github.com/gaambo/cobblestone-wp website-dir
   $ cd website-dir && rm -rf .git
   $ git init
   ```
2. Update environment variables in the `.env` file (or copy `.env.example` if not existing):

- `DB_NAME` - Database name
- `DB_USER` - Database user
- `DB_PASSWORD` - Database password
- `DB_HOST` - Database host
- `WP_ENV` - Set to environment (`development`, `staging`, `production`)
- `WP_HOME` - Full URL to WordPress home (https://example.com)
- `WP_SITEURL` - Full URL to WordPress including subdirectory (https://example.com/wp)
- `AUTH_KEY`, `SECURE_AUTH_KEY`, `LOGGED_IN_KEY`, `NONCE_KEY`, `AUTH_SALT`, `SECURE_AUTH_SALT`, `LOGGED_IN_SALT`, `NONCE_SALT`
  - Generate with [wp-cli-dotenv-command](https://github.com/aaemnnosttv/wp-cli-dotenv-command)
  - Generate with [roots WordPress salts generator](https://roots.io/salts.html)

3. Install dependencies
   ```sh
   $ composer install
   $ npm install
   ```
4. Add theme(s) in `public/app/themes/` as you would for a normal WordPress site. For installing themes and plugins from the WordPress repository see the [Bedrock documentation about using composer for WordPress](https://roots.io/bedrock/docs/composer/).
5. If developing a custom theme or plugin which you want to include in the repository exclude it in `.gitignore`.
6. If developing a custom theme or plugin which you want to have JavaScript linting available exclude it in `.eslintignore`.
7. If developing a custom theme or plugin which you want to have Style (CSS/SCSS) linting available exclude it in `.stylelintignore`.
8. If developing a custom theme or plugin which you want to have PHP linting available include it in `phpcs.xml` via `<include-pattern>PATH</include-pattern>`.
9. Set the document root on your webserver to Bedrock's `web` folder: `/path/to/site/public/`
10. Access WordPress admin at `https://example.com/wp/wp-admin/`

## Documentation

Cobblestone specific documentation can be found in our [GitHub wiki](https://github.com/gaambo/cobblestone-wp/wiki)
Bedrock documentation is available at [https://roots.io/bedrock/docs/](https://roots.io/bedrock/docs/).

## Contributing

Contributions are welcome from everyone. Just open an [issue](https://github.com/gaambo/cobblestone-wp/issues) or contact me.

Bedrock has its own [contributing guidelines](https://github.com/roots/guidelines/blob/master/CONTRIBUTING.md).

## Why the name?

Since Bedrock is also a [Block](https://minecraft.gamepedia.com/Bedrock) in Minecraft I decided to name my boilerplate after a Block too: [Cobblestone](https://minecraft.gamepedia.com/Cobblestone). Also: Play [Minecraft](https://minecraft.net), it's great!

## Bedrock sponsors

As this boilerplate is heavily based on Bedrock I like to thank their team and their sponsors:

Help support our open-source development efforts by [becoming a patron](https://www.patreon.com/rootsdev).

<a href="https://kinsta.com/?kaid=OFDHAJIXUDIV"><img src="https://cdn.roots.io/app/uploads/kinsta.svg" alt="Kinsta" width="200" height="150"></a> <a href="https://k-m.com/"><img src="https://cdn.roots.io/app/uploads/km-digital.svg" alt="KM Digital" width="200" height="150"></a> <a href="https://www.itineris.co.uk/"><img src="https://cdn.roots.io/app/uploads/itineris.svg" alt="itineris" width="200" height="150"></a>

## Community

Keep track of Bedrock development and community news.

- Participate on the [Roots Discourse](https://discourse.roots.io/)
- Follow [@rootswp on Twitter](https://twitter.com/rootswp)
- Read and subscribe to the [Roots Blog](https://roots.io/blog/)
- Subscribe to the [Roots Newsletter](https://roots.io/subscribe/)
- Listen to the [Roots Radio podcast](https://roots.io/podcast/)
