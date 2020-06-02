Thoth
=====

PHP Static Site Generator

---

# Install

`composer install -g thoth/thoth`

# Getting Started

# Configuration

Config done via .thoth.{yaml|yml} and .env{.local} files

```yaml
# .thoth.yml
theme: default # can use vendor/theme to pull from github
source: .
destination: ./public
```

# New Command

`thoth new [dir]`, "dir" defaults to currently directory

* Generates a new thoth project in given directory

# Watch Command

`thoth watch` will generate a new site if anything changes

* runs `thoth generate`

# Generate Command

`thoth generate` output to `/public`

* `/public` can be configured

# Serve Command

`thoth serve` will use php webserver to serve generated files?

* Option to --watch

# Deploy Command?

# Themes

Themes are stored in `themes` directory.
Directory is name of theme

themes/default
themes/blog
themes/docs

Theme files
* `base.html.twig`
* `home.html.twig`
* `page.html.twig`
* `post.html.twig`
* `_head.html.twig`
* `_header.html.twig`
* `_footer.html.twig`
* `full-width.layout.html.twig`

"included" files will be prefixed with an underscore

Assets are store in the `assets` directory for the theme, ie themes/blog/assets
