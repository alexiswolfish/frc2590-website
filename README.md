frc2590-website
===============

A website for Nemesis Robotics

***
Repository Setup::

	htmlMockups
	
		Contains fully functional HTML mockups ready to be ported over to php Templates
		for the server. When you clone the repository, you should be able to open any
		of these in chrome/firefox and preview how the website will look live
			
			Files that are synced on server ::
				
				css/main.css
				scripts/functions.php
				scripts/functions.js
				images
	
	processWire templates
		
		Final php templates to be uploaded to the server. 
	
***
How to contribute::

1. Fork the repository and clone it onto your desktop
2. Open and edit in Notepad++ or your text editor of choice
3. Preview your changes in Chrome, Firefox, Safarai and optionally Opera
  * the "inspect element" option in Chrome/Firefox is an excellent way to test/examine your html/css
4. After you've tested your changes, and are confident in their accuracy make a pull request
5. Check out the ToDO list, sometimes I'll post unGit related tasks that need to be finished

*make sure to set an "upstream" variable (that is me, alexiswolfish/frc2590-website.git) and fetch updates
from it regularly, since I'll be constantly updating this space with new pages. If you are using the beautiful
new Git for Windows client, it does not do this automatically, so make sure to follow the instructions on the
"Setting up Git", and "Forking a Repo" pages to do so.*


*If you are push/pulling from school, navigate to your repository and set

    git config http.sslVerify false

in order to get around the self signing certificate error

***
Useful Resources::

Merging a Pull request with your current repository
: https://help.github.com/articles/merging-a-pull-request

Using KDiff3 to merge
http://naleid.com/blog/2012/01/12/how-to-use-kdiff3-as-a-3-way-merge-tool-with-mercurial-git-and-tower-app/

HTML/CSS
https://developer.mozilla.org/en-US/
(for CSS transitions in Chrome/Safari, refer to a webkit reference)

CSS3 Animations Cheatsheet
http://www.justinaguilar.com/animations/index.html#
(this is an external library, but some useful references/examples of what you can do)

***
Using our CMS

ProcessWire API
http://processwire.com/api/
