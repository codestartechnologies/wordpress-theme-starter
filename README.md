# Wordpress Theme Starter

## Description

A boiler-plate for a wordpress theme. WordPress Theme Starter will help you create WordPress themes quickly and stress free. It reduces the time you'll normally spend creating a fully functioning theme. This boiler-plate is developed using Object Oriented Concepts (OOP), along with WordPress concepts and will help you build your theme in an object oriented manner.

WordPress Theme Starter is a project that was inspired from [oop-wordpress-starter-theme](<https://github.com/msn60/oop-wordpress-starter-theme>) by [Mehdi Soltani](<soltani.n.mehdi@gmail.com>)

## Built In Features

- Customizer Settings
- Admin Pages
- Admin Notices
- Setting Sections And Fields
- Sidebar Areas
- Widgets

## Using The Boiler Plate

- Clone the project from the repository.
- Rename the root folder (**wordpress-theme-starter**) to the name you want for your theme.
- Open the project with any editor of your choice and modify the default header comment section in **style.css** to match your theme information.
- Replace **screenshot.png** image file with your theme's screenshot png/jpeg file.

## Project Directories

### app

The app directory contains custom classes you will use to add functionalities to your theme. Examples are classes you will use to create customizer settings, admin pages, admin notices, custom setting sections and fields, sidebar areas, and widgets. It contains two (2) sub directories - **Admin** and **Public**.

### assets

The assets directory contains your theme asset files like css files, javascript files, image files, etc. It contains three (3) sub directories - **css**, **images**, and **js**.

### configs

The configs directory contains configuration files that you can either use to modify default settings, or use in setting up features required by your theme.

### languages

The languages directory will contain your theme's language translation files. Examples are your *POT files*, *PO files*, and *MO files*.

### src

The src directory contains core project files.

### template-parts

The template-parts directory contains files that your theme template files will include.

### vendor

The vendor directory contains core packages required by the boiler-plate.

### views

The views directory contains files that will be included at specific places within your theme. Examples are views that will be used to display an admin page or a widget content.

## Files In app Folder

### Hooks.php

**Hooks.php** file contains `Hook` class which you will use to add custom hooks to your theme. `register_actions()` method contains your action hooks, and `register_filters()` method contains your filter hooks.

### functions.php

You can create custom functions that you will need inside **functions.php** file.

### Constants.php

You can define constants for your theme inside the `define_constants()` method in **Constants.php** file.

### Bindings.php

**Bindings.php** contains `Bindings` class, where you register classes that will add functionalities to your theme.

Some classes will need to specify the path to their config settings. Example `WTSMenuPage` class, added to `$menus` array, specifies a config setting `admin-menus.wts_menu_page`. This config settings is gotten from an array key **wts_menu_page**, defined in **admin-menus.php** file located in the **configs** directory.

### Admin folder

The **Admin** directory stores classes with features that are meant to run in the admin area of the site.

Sub directories found inside the Admin folder includes:

- Customizer - used for storing classes that will create customizer settings.
- Menus - used for storing classes that will create admin pages.
- Notices - used for storing classes that will create admin notifications.
- Settings - used for storing classes that will create setting sections and fields.

### Public folder

The **Public** directory stores classes with features that are meant to run either in the admin or front-end area of the site.

Sub directories found inside the Admin folder includes:

- Sidebars - used for storing classes that will register sidebar areas.
- Widgets - used for storing classes that will register widgets.

## Documentation

Documentation is still being compiled.

## Issue With Namespace Conflicts

Due to the nature of WordPress, it is very likely that there will be namespace conflicts between two WordPress themes that are developed using this boiler-plate if they are installed on one website. There can be problems if two or more WordPress themes on your site are using different versions of **WordPress Theme Starter**.

To prevent namespace conflicts, ensure that namespaces for all the project classes are prefixed to allow them have unique namespace. That means classes in **src** and **app** directory should have unique namespace that will not conflict with namespaces from other WordPress projects developed using this boiler-plate.

## Manual Fix For Class Namespace Conflicts

Example: You can choose to prefix all namespaces with **Theme_Name**. That means any existing classes or newly created class in **app** directory that have a namespace of `WTS_Theme\App;` will have their namespace prefixed to `Theme_Name\WTS_Theme\App`. Also, all classes in the **src** directory will have their namespaces modified from `Codestartechnologies\WordpressThemeStarter\Abstracts;` to `Theme_Name\Codestartechnologies\WordpressThemeStarter\Abstracts;`.

Next, open **autoload.php** where you'll find `WTSAutoLoader` class. Set the value for `WTSAutoLoader::$prefix` to `Theme_Name`.

Remember to update other places within the project where classes are called using their namespace. That means every instance of `use WTS_Theme\App\...` and `use Codestartechnologies\WordpressThemeStarter\..` will be modified to `use Theme_Name\WTS_Theme\App\...` and `use Theme_Name\Codestartechnologies\WordpressThemeStarter\..`. Same with all instances of `\Codestartechnologies\WordpressThemeStarter\...` and `\WTS_Theme\App\...` should be modified to `\Theme_Name\Codestartechnologies\WordpressThemeStarter\..` and `\Theme_Name\WTS_Theme\App\...`.

## Fix For Class Namespace Conflicts Via C.L.I

We are currently working on a feature that will enable developers automatically generate custom namespace prefix via the command line interface for all classes used in the project except classes in **vendor/** directory. This feature will take away the need for editing files manualy.

## License

AGPL-3.0-or-later
