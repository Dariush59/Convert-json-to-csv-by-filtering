# Description

Create one easy and clean program how will be able to read the API Endpoint - http://www.mocky.io/v2/58ff37f2110000070cf5ff16  and filtered the information:
1. Activity_start_datetime “2017-10-30T11:59 and 2017-11-31T11:59”
2. Places_available between 1 - 30
3. The result should be stored in one csv file with ; like column separator.

## Set up localhost on macOS High Sierra

### Turn on Apache

**Note:** Here is my definitive guide to getting a local web server running on OS X 10.13 "High Sierra". This is meant to be a development platform so that you can build and test your sites locally, then deploy to an internet server. This User Tip only contains instructions for configuring the Apache server, PHP module, and Perl module. I have another User Tip for installing and configuring MySQL and email servers.


1. Open Terminal to start your Apache

```
sudo apachectl start

```

2. Open your browser, type localhost in the address bar, and press enter.
It is! You should now see **It works!** in the browser.

### Turn on PHP


1. Open Terminal to edit your Apache config
```
sudo nano /etc/apache2/httpd.conf

```
	1.1 Press Ctrl+W which will bring up a search
	1.2 Search for php and press enter. 
	1.3 Delete the # from #LoadModule php7_module libexec/apache2/libphp7.so
	1.4 Press Ctrl+O followed by Enter to save the change you just made
	1.5 Press Ctrl+X to exit nano

2. To restart your Apache run the following command in the Terminal 

```
sudo apachectl restart

```

### Create Sites Folder

1. Go to HOME

```
cd ~

```

2. Create a new folder and name it Sites

```
mkdir Sites

```

3. Create a new folder inside the "Sites" folder and name it csv

```
cd Sites
mkdir csv

```

4. Get full permission to the csv folder

```
chmod -R 777 csv/

```

5. Go back to Terminal and enter sudo nano /etc/apache2/httpd.conf

```
sudo nano /etc/apache2/httpd.conf

```
	5.1 Press Ctrl+W to bring up search
	5.2 Search for Library and press enter
	5.3 Replace both occurrences of _/Library/WebServer/Documents_ with _/Users/your name OR your PC name/Sites_ .
	5.4 Press Ctrl+O followed by Enter to save these changes.
	5.5 Press Ctrl+X to exit nano

6. To restart your Apache run the following command in the Terminal 

```
sudo apachectl restart

```

### Pulling from github

1. Open Terminal.
2. Git clone

```
git clone https://github.com/Dariush59/filteredJsonToCsv

```
