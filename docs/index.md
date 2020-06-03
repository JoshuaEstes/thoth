---
title: Thoth - PHP Static Site Generator

---

Thoth is a php static site generator. It's mainly used to generate docs but can
be used to manage a blog as well.

# Requirements

* [Composer](https://getcomposer.org/)

# Installation

To install this globally run the command

```
composer global require "joshuaestes/thoth:dev-master"
```

# Generating Site

```
thoth generate --source=path/to/docs --destination=public
```

The `generate` command supports many options, to see them and to get more
information about running the `generate` command. Just run

```
thoth generate --help
```

# Support

* https://github.com/JoshuaEstes/thoth/issues
