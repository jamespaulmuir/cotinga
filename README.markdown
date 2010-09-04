# cotinga

## Installation
* init/update submodules
        git submodule init
        git submodule update
* Point cotinga directly to your dspace postgres database (read only access is sufficient):
        php symfony configure:database "pgsql:host=localhost;port=5432;dbname=dspace" dspace-user dspace-password




        