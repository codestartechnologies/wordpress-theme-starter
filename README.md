# Wordpress Theme Starter

## Description

A boiler-plate for a wordpress theme. WordPress Theme Starter will help you create a WordPress Theme quickly. It reduces the need for creating hooks using add_action() and add_filter() functions. It lets you focus on the functionalities that your theme will need.

## Features

- Customizers
- Admin Menus
- Admin Notices
- Settings
- Sidebar Areas
- Widgets

## Installation

- Clone the project from the repository.
- Rename the folder (wordpress-theme-starter) to the name of your theme.
- Open the project with any editor of your choice.
- Change the default theme information in style.css to match your theme information.
- Replace screenshot.png with your theme's screenshot png file.

## Project Directories

### app/ directory

The **app** directory contains your custom classes. Classes defined in this directory will be used to add functionalities for creating customizer sections, settings, and controls, creating admin menu pages, creating admin notices, registering settings and setting sections, registering sidebar areas and widgets. It also contains classes that will be used to add custom action and filter hooks, define constants, and register bindings.

### assets/ directory

The **assets** directory contains assets needed by your theme, like css files, javascript files, image files, etc.

### configs/ directory

The **configs** directory contains configuration files that you can use to alter default options that comes with the boiler-plate.

### languages/ directory

The **languages** directory will contain your theme's language translation files. Examples are your *POT files*, *PO files*, and *MO files*.

### src/ directory

The **src** directory contains the core project files. You don't have to edit any file in this directory.

### template-parts/ directory

The **template-parts** directory contains files that your theme template files will include.

### vendor/ directory

The **vendor** directory contains folders created by packages that your theme will require. You don't have to edit any file in this directory.

### views/ directory

The **views** directory contains files that will be included at specific places within your theme. Examples are views that will be used to display content for an admin menu page, a setting field, or a widget.

## Getting Started

### Create An Admin Notice

To create an admin notice, navigate to **app > Admin > Notices** directory and create a new php file with the same name as the class which will be used to create the notification. For example you can create a **HelloWorldNotice.php** file, which will contain **HelloWorldNotice** class. The **HelloWorldNotice** will need to extend `Codestartechnologies\WordpressThemeStarter\Abstracts\AdminNotice` abstract class, which is the main class responsible for registering the hooks needed to create an admin notice. After extending the **AdminNotice** abstract class, you will need to implement `notification()` method. The `notification()` method contains the output of your notice.

After creating the admin notice class, navigate to **app** directory, open **Bindings.php**, this file is where you bind classes that will add functionalities to your theme. Locate `public static array $admin_notices` inside the `Bindings` class, and add the **HelloWorldNotice** class to the `$admin_notices` array.

To get started quickly, see **WTSAdminNotice.php** located in the same directory. and change the output `notification()` method.

### Create Customizer Sections, Settings, And Controls

See **WTSCustomizer.php** in **app > Admin > Customizers** directory.

### Create Admin Menus

See **WTSMenuPage.php**, **WTSOptionsPage.php**, and **WTSThemePage.php** in **app > Admin > Menus** directory.

### Create Settings, Settings Section And Fields

See **WTSSettings.php** in **app > Admin > Settings** directory.

### Create A Sidebar

See **WTSSidebar.php** in **app > Public > Sidebars** directory.

### Create A Widget

See **WTSWidget.php** in **app > Public > Widgets** directory.

### Create Custom Action And Filter Hooks

**app > Hooks.php** file contains `Hook` class where you add custom hooks to your theme. `register_actions()` method contains your action hooks, and `register_filters()` method contains your filter hooks.

### Create Custom Helper Functions

You can create custom functions that you will need inside **app > functions.php** file.

### Define Custom Constants

You can define constants for your theme inside the `define_constants()` method in **app > Constants.php** file.

### Bind Classes To Theme Core

**app > Bindings.php** contains `Bindings` class, where you register classes that will add functionalities to your theme. The class contains default classes that have been registered with our theme. You can choose to comment them out.

Some classes will need to specify the path to their config settings. Example `WTSMenuPage` class, added to `$menus` array, specifies a config setting `admin-menus.wts_menu_page`. This config settings is gotten from an array key **wts_menu_page**, defined in **admin-menus.php** file located in the **configs** directory.

## Fix For Class Namespace Conflicts

To prevent *namespace* conflicts, ensure that classes you create in the **app** directory have unique *namespace*. Example: You can choose to prefix namespaces in **app/** with **Theme_Name**. Then you change all occurence of `WTS_Theme\App;` namespace to `Theme_Name\WTS_Theme\App`. Next, you open **autoloader.php** and change `$namespace = 'WTS_Theme\App';` to `$namespace = 'Theme_Name\WTS_Theme\App';` inside `wts_autoloader()` function.

Classes in **src** directory should also have unique *namespace* that will not conflict with other *namespaces* that may be registered by another theme. This will will help prevent *namespace* conflicts that can occur between two or more WordPress themes built with different versions of **WordPress Theme Starter**. Example: `Codestartechnologies\WordpressThemeStarter\Abstracts;` namespace can be modified to `Theme_Name\Codestartechnologies\WordpressThemeStarter\Abstracts;`.

We are currently working on a feature that will enable developers automatically generate custom *namespace* prefix for classes in the **src/** and **app/** directory from their C.L.I, rather than editing files manualy.

## License

AGPL-3.0-or-later
