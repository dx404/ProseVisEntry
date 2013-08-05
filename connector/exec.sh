#!/bin/bash
java=/var/www/localhost/htdocs/ProseVisTest/bin/jdk1.7.0_25/bin/java
$java -classpath .:connector/jsch-0.1.50.jar connector.JEXEC "$1" "$2"





