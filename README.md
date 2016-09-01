# LaravelRUS Skeleton Installer
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/atehnix/installer/master/LICENSE)
[![Packagist Version](https://img.shields.io/packagist/v/atehnix/installer.svg)](https://packagist.org/packages/atehnix/installer)

Установщик skeleton-проектов сообщества LaravelRUS.

## Установка

####Выполнить:
```
composer global require atehnix/installer
```
Убедитесь в том, что директория `~/.composer/vendor/bin`  (или эквивалентная директория для вашей ОС) добавлена в переменную среды PATH, чтобы исполняемый файл `laravelrus` мог быть доступен в вашей системе.

## Использование

#### Создание нового приложения:
```
laravelrus new MyApp
```

#### Создание нового приложения определенного типа:
```
laravelrus new MyApp --type api
```

#### Просмотр списка доступных типов проектов:
```
laravelrus types
```