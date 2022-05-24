# Typo3 + MySQL + Gitpod

[![Gitpod Ready-to-Code](https://img.shields.io/badge/Gitpod-ready--to--code-blue?logo=gitpod)](https://gitpod.io/#https://github.com/itx-informationssysteme/one-day-at-itx/tree/typo3)

## Full web dev (front- and backend) environment in a browser

## Prerequisites

1. [Sign up for gitpod.io](https://gitpod.io/login)

## Try it out

1. Click on the following link [https://gitpod.io/#https://github.com/itx-informationssysteme/one-day-at-itx/tree/typo3](https://gitpod.io/#https://github.com/itx-informationssysteme/one-day-at-itx/tree/typo3)
2. Your environment is being prepared, wait about 40 seconds (A splash screen will appear)
3. VScode (or Theia depending on your settings) IDE will be displayed.
4. Note that one terminal is running sudo docker-up, and another terminal in parallel is running ddev start
5. Find your website's URL with `gp url 8080`
6. Open your website's URL (should be [http://localhost:8080](http://localhost:8080)) in a browser, you should see a PHP info screen.
7.  🎉

## TYPO3 CMS Base Distribution

**Setup:**

To start an interactive installation, you can do so by executing the following
command and then follow the wizard:

```
php vendor/bin/typo3cms install:setup
```

**Setup unattended (optional):**

If you're a more advanced user, you might want to leverage the unattended installation.
To do this, you need to execute the following command and substitute the arguments
with your own environment configuration.

```
php vendor/bin/typo3cms install:setup \
    --no-interaction \
    --database-user-name=root \
    --database-host-name=127.0.0.1 \
    --database-port=3306 \
    --database-name=testdb \
    --use-existing-database \
    --admin-user-name=admin \
    --admin-password=password \
    --site-setup-type=site \
    --web-server-config=apache
    
php vendor/bin/typo3cms configuration:set SYS/trustedHostsPattern ".*"
```

## All available pods

- [![Gitpod Ready-to-Code](https://img.shields.io/badge/https://img.shields.io/badge/Gitpod-php-blue?logo=gitpod)](https://gitpod.io/#https://github.com/itx-informationssysteme/one-day-at-itx)
- [![Gitpod Ready-to-Code](https://img.shields.io/badge/https://img.shields.io/badge/Gitpod-angular-blue?logo=gitpod)](https://gitpod.io/#https://github.com/itx-informationssysteme/one-day-at-itx/tree/angular)
- [![Gitpod Ready-to-Code](https://img.shields.io/badge/https://img.shields.io/badge/Gitpod-symfony-blue?logo=gitpod)](https://gitpod.io/#https://github.com/itx-informationssysteme/one-day-at-itx/tree/symfony)
- [![Gitpod Ready-to-Code](https://img.shields.io/badge/https://img.shields.io/badge/Gitpod-typo3-blue?logo=gitpod)](https://gitpod.io/#https://github.com/itx-informationssysteme/one-day-at-itx/tree/typo3)
  

# How to create an TYPO3 extension
## An extenstion development : We can think about a extenstion like Topic list. With Topic name ,Topic description, published date and status
### Step:1
- Folder structure prepare to develope the structure for the new extension.A unique identifier name similar with the extention name is required. 
- The local dirrectory of Typo3 with local extensions is typo3conf/ext/ we create a folder similar to extenstion key with lower case and underscore.For example: topic_list
- In this folder there are some sub folder for the extenstionClasses, Resources and Public . There is another fileext_emconf.php .We can copy and take this file from a existing extension

### Step:2
- We need to develope a domain model for the extension.
- In Classes/Domain/Model/ we can create a extenstion like topic.php .
- This class should be derived from AbstracEntity.
- Which is at \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
- In this class we can add the variable like topic descriotion, topic_date and status.

### Step 3:
- Now we can make Persistent layer configuration. We can genrate instance for the topic with properties
- Now we create a database table necessary for that.
- We can write Create table query at file with column name at the sql file.
- Then we can run the command EXT:topic_list/ext_tables.sql
- In the folder /Configuration/TCA/ a php file is there which  file returns an array with the all information
- THis file has some sections ctrl, basic characteristics are how the table name ,columns is described for each table column .
- If we install it at backend we can see the first outout of the extension(May be first topic)

### Step 4:
- application flow is now required with controller and action method.
- Now at the backend we can access. Then we need to go frontend. Frontend with HTML can be shown is done by the view.
- We make the connection between the model and the view is the controller.
- We can give the name TopicController.

### step 5:
- Now we should add a template.
- Resources/Private/Templates/TopicList/TopicList.html we can place a html template.
- Data is rendered from the table of DB and printed at frontend.

### step 5
- We need to configure the plugin
- Controller action combination is defeined at ext_localconf.php
- With the registration of the plugin, so it should appears in the selection box of the content element Plugin.
- We can do this both with the edit two function configurePlugin() and registerPlugin() function at two different location
- sys folder need to set so that topics can be set at the start pointer of plugin

### Step 6
- Install and test the extension