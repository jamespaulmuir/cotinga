# cotinga

## Installation
* init/update submodules
        git submodule init
        git submodule update
* Point cotinga directly to your dspace postgres database (read only access is sufficient):
        php symfony configure:database "pgsql:host=localhost;port=5432;dbname=dspace" dspace-user dspace-password

* Make cache/log folders:
        mkdir log
        mkdir cache

* Publish assets, fix permissions, clear cache
        php symfony plugin:publish-assets
        php symfony project:permissions
        php symfony cc




        