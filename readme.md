# Description

Create one easy and clean program how will be able to read the API Endpoint - http://www.mocky.io/v2/58ff37f2110000070cf5ff16  and filtered the information:
1. Activity_start_datetime “2017-10-30T11:59 and 2017-11-31T11:59”
2. Places_available between 1 - 30
3. The result should be stored in one csv file with ; like column separator.


**NOTE:**
Get full permission to the public folder

```
chmod -R 777 public/

```

### How to Run 

In Terminal

```
composer install

php index.php

```

then CSV file will be generated in the public folder (./public/csv/file.csv).