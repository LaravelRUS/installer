# LaravelRUS Skeleton Installer
[![Packagist Version](https://img.shields.io/packagist/v/atehnix/installer.svg)](https://packagist.org/packages/atehnix/installer)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/atehnix/installer/master/LICENSE)
[![Gitter Chat](https://img.shields.io/badge/Laravel-RUS-red.svg)](https://gitter.im/LaravelRUS/chat)

<p align="center">
    <img src="https://avatars3.githubusercontent.com/u/5966874?v=3&s=200"><br><br>
    <strong>Установщик <a href="https://github.com/LaravelRUS?query=skeleton">skeleton-проектов</a> сообщества LaravelRUS.</strong>
</p>

--

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
laravelrus new MyApp --type=api
```

#### Просмотр списка доступных типов приложений:
```
laravelrus types
```

## Удаление

#### Выполнить:
```
composer global remove atehnix/installer
```

## License
[MIT](https://raw.githubusercontent.com/atehnix/installer/master/LICENSE)