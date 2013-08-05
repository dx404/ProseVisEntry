ProseVis Gateway Server code

Introduction: What is ProseVis?
-------------------------------------------------------------------------------
	ProseVis is a text visualization tool developed to identify other features 
	than the "word" to analyze texts. These features comprise sound including 
	parts-of-speech, accent, phoneme, stress, tone, break index. It facilitates a 
	reader to analyze and disseminate the results in human readable form. Recreating 
	the context of the page not only allows for the simultaneous consideration of 
	multiple representations of knowledge or readings but it also allows for a more 
	transparent view of the underlying textual data. If a human can read the data 
	within the context and is able to know the mappings back onto the full text, the 
	reader is empowered within this familiar context to read what might otherwise be 
	an unfamiliar tabular representation of the text. For these reasons, we developed 
	ProseVis Web Application as a reader interface and a gateway to supercomputers in 
	order to reach more audience. It allows scholars to work with the data in a 
	language or context in which we are used to saying things about the world.

Running Environment 
-------------------------------------------------------------------------------
	The gateway server is currently hosted at an Apache/PHP web server at
 		http://tclement.ischool.utexas.edu/ProseVisTest/ProseVis/
	The absolute path of the project root directory is at
 		/var/www/localhost/htdocs/ProseVisTest/ProseVis
	The project depends on user-level installed binaries JDK 1.7.0_25 and Python 2.7.5. 
	They are respectively stored at
		/var/www/localhost/htdocs/ProseVisTest/bin/jdk1.7.0_25/bin/
		/var/www/localhost/htdocs/ProseVisTest/bin/Python-2.7.5/
	The above path information is recommended to be included in the environment path 
	variable ($PATH) in order to properly execute the program. The Python binaries are 
	built and tested from source. 

File Storage and Functionality
-------------------------------------------------------------------------------	
	index.php - 
		The index page of the ProseVis Project. It is present at the project root 
		directory. It provides the fundamental layout of the entire gateway-side application. 
		It retrieves page fragments based on HTTP GET request. The web application supports 
		five major page fragments, which are currently stored under the ./fragment directory. 
		To access these pages, the user can feed the 'page' attribute in the GET variable as 
		one of "home", "data", "doc", "code" and "people". A URL such as 
		   http://tclement.ischool.utexas.edu/ProseVisTest/ProseVis/index.php?page=data
		is a valid access. All paths other than the five predefined values are redirected to 
		the home page, i.e. index.php?page=home
	
	settings.php - 
		Another PHP file present under the project root directory. It provides a basic 
		interface for the administrative configuration. The computing server and account 
		name/token are expected to change accordingly. 
	
	style.css - 
		The cascade style sheet file configures all the style layouts regarding this project. 
	
	JS/ - 
		The client-side scripting is put under this ./JS directory. Depending on the jQuery 
		framework, ./JS/data.js controls two types of interface, single-document analysis and 
		multiple-document comparison. A user triggers this script while clicking one of the 
		mutual exclusive radio buttons. 
	
	fragment/ - 
		The fragment directory holds five major page fragments as well as one common menu widget. 
		All page fragments other than data.php are essentially static. The data.php provides the 
		major interactive interface for this project. Facilitating an user to upload and submit 
		data, the gateway server performs lightweight pre-processing. The pre-processing units are 
		installed under ./lib directory. These units verify the CAPTCHAS and file format. 
	
	lib/ProseVisTask.php - 
		The ProseVisTask class represents various tasks throughout the pre-processing process, 
		including receiving, meta-info generating, compressing, sending and invoking remote commands. 

	connector/ - 
		The connector module sends files and delivers remote commands. It uses the JSCH (Java 
		Secure Shell) library to access the target server via SSH protocol. The source java files 
		are included in the connector.jar file. conn.sh is the interface script for the connector. 
	
	crypto/ 
		A cryptographic unit is added to increase the security. The password to the remote server 
		is stored in encrypted form in the settings.php. Before connecting to the remote server, 
		the encrypted token is decrypted with a key file in the web-inaccessible region. 

	uploads/ - 
		An scratch space of this project which temporarily stores the user data. It retains a log file, 
		which records system commands and pre-processing information. 
