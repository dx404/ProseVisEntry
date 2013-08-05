#!/bin/bash
#=============================================================================
# conn -compile
# conn -send
# conn -exec
#=============================================================================

export PATH=\
/var/www/localhost/htdocs/ProseVisTest/bin/jdk1.7.0_25/bin/:\
$PATH

class_path=.:\
connector/jsch-0.1.50.jar:\
connector/connector.jar

operation=$1
recycle="../recycleProseVis/"

if [ "$operation" == "-compile" ]
then
	echo "compile"
	cd connector/
	javac -classpath jsch-0.1.50.jar *.java 
	jar -cf connector.jar *.class *.java
elif [ "$operation" == "-send" ]
then
	echo "send"
	src="$2"
	dest="$3"
	pw="$4"
	java -cp $class_path JSCP "$src" "$dest" "$pw"
elif [ "$operation" == "-exec" ]
then
	echo "exec"
	cmd="$2"
	pw="$3"
	java -cp $class_path JEXEC "$cmd" "$pw"
elif [ "$operation" == "-extract" ]
then
	echo "extract"
	cd connector/
	jar xvf connector.jar
elif [ "$operation" == "-clean" ]
then
	echo "clean"
	mv -f connector/*.class $recycle/
	mv -f connector/*.java $recycle/
	rm -rf connector/META-INF
else
	echo "Error"
fi

