<h1 align="center">
<img src="https://www.tibiawiki.com.br/images/c/c3/Tibiapedia.gif"/> Laravel TibiaData API
</h1>

<p align="center">
An open source library that allows you to access <a href="https://tibiadata.com/" target="_blank">TibiaData API</a> from your Laravel app.
</p>

[![Latest Version on Packagist](https://img.shields.io/packagist/v/igorsgm/tibia-data-api.svg?style=flat-square)](https://packagist.org/packages/igorsgm/tibia-data-api)
[![Build Status](https://img.shields.io/travis/igorsgm/tibia-data-api/master.svg?style=flat-square)](https://travis-ci.org/igorsgm/tibia-data-api)
[![Quality Score](https://img.shields.io/scrutinizer/g/igorsgm/tibia-data-api.svg?style=flat-square)](https://scrutinizer-ci.com/g/igorsgm/tibia-data-api)
[![Total Downloads](https://img.shields.io/packagist/dt/igorsgm/tibia-data-api.svg?style=flat-square)](https://packagist.org/packages/igorsgm/tibia-data-api)

<a href="https://tibiadata.com/" target="_blank">TibiaData API</a> is a RESTful API providing information in JSON format containing information from Tibia’s official homepage tibia.com, so you can build your own small tools.

## ✨ Features

> - **Characters**: Get the pure information from characters of Tibia based on your character search.
> - **Guilds**: List all guilds of a certain world or get detailed information of a certain guild.
> - **Highscore**: List all highscores of a certain world and see who got the right skills to top the list.
> - **Houses**: List all houses in all the different worlds and towns of Tibia.
> - **News**: The latest 6 months of news and articles from tibia.com.
> - **Worlds**: List all worlds of Tibia or list all online players and more info of your favorite world.

## 1️⃣ Installation

You can install the package via composer:

```bash
composer require igorsgm/tibia-data-api
```

## 2️⃣ Usage

``` php
TibiaDataApi::characters()->get('Bobeek')
TibiaDataApi::highscores()->get('Antica', 'sword', 'all')
TibiaDataApi::houses()->get('Antica', 'Thais', 'houses')

// Guilds
TibiaDataApi::guild()->get('Red Rose')
TibiaDataApi::guilds()->get('Antica')

// Worlds
TibiaDataApi::worlds()->getList()
TibiaDataApi::worlds()->get('Antica')

// News
TibiaDataApi::news()->get(3560)
TibiaDataApi::news()->getLatestNews()
TibiaDataApi::news()->getNewstickers()
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- Tibia and TibiaME are trademarks of CipSoft GmbH. The official website for Tibia is [Tibia.com](https://tibia.com)
- [TibiaData API](https://tibiadata.com/)
- [Simivar](https://github.com/simivar)
- [Igor Moraes](https://github.com/igorsgm)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
